<?php
declare(strict_types=1);

class TimController extends ControllerBase
{

    public function indexAction()
    {
        if($this->session->has('AUTH_ID')){
            $this->view->teams = $this
            ->modelsManager
            ->executeQuery(
                'select * from teamku, userku where not exists(select joinku.team_id from joinku where joinku.team_id=teamku.team_id and joinku.id=:hid:) and teamku.id!=:hid2: and teamku.id=userku.id and teamku.jumlahkurang > 0', ['hid'=> $this->session->get('AUTH_ID'),'hid2'=> $this->session->get('AUTH_ID'),]
            );          
        }
        else{
            $this->view->teams = $this->modelsManager->createBuilder()
                                    ->from(array('Userku', 'Teamku'))
                                    ->where('Userku.id = Teamku.id')
                                    ->andWhere('Teamku.jumlahkurang > 0')
                                    ->getQuery()
                                    ->execute();
        }
        
    }

    public function createAction()
    {
        if(!$this->session->has('AUTH_ID')){
            $this->flashSession->error("Not Authorized");
            //pick up the same view to display the flash session errors
            return $this->response->redirect('/user/login');
        }
                
    }
    public function createSubmitAction()
    {
        if($this->session->has('AUTH_ID')){
            $team = new Teamku();
            
            if ($this->request->isPost()) {
                $namatim = $this->request->getPost("namatim");
                $kategori = $this->request->getPost("kategori");
                $namalomba = $this->request->getPost("namalomba");
                $kontak = $this->request->getPost("kontak");
                $jumlah = $this->request->getPost("jumlah");
                $deskripsi = $this->request->getPost("deskripsi");

                if ($namatim === "") {
                    $this->flashSession->error("Nama Tim anda kosong");
                    //pick up the same view to display the flash session errors
                    return $this->view->pick("tim/create");
                }

                if ($kategori === "") {
                    $this->flashSession->error("kategori anda kosong");
                    //pick up the same view to display the flash session errors
                    return $this->view->pick("tim/create");
                }

                if ($namalomba === "") {
                    $this->flashSession->error("Nama Lomba anda kosong");
                    //pick up the same view to display the flash session errors
                    return $this->view->pick("tim/create");
                }

                if ($kontak === "") {
                    $this->flashSession->error("Nomor Telepon anda kosong");
                    //pick up the same view to display the flash session errors
                    return $this->view->pick("tim/create");
                }

                if ($jumlah === "") {
                    $this->flashSession->error("Jumlah yang dibutuhkan anda kosong");
                    //pick up the same view to display the flash session errors
                    return $this->view->pick("tim/create");
                }

                if ($deskripsi === "") {
                    $this->flashSession->error("Deskripsi anda kosong");
                    //pick up the same view to display the flash session errors
                    return $this->view->pick("tim/create");
                }

                if (strlen($kontak) < 9) {
                    $this->flashSession->error("Nomor Telepon anda tidak valid");
                    //pick up the same view to display the flash session errors
                    return $this->view->pick("tim/create");
                }

                if ($jumlah < 1) {
                    $this->flashSession->error("Jumlah yang dibutuhkan tidak valid");
                    //pick up the same view to display the flash session errors
                    return $this->view->pick("tim/create");
                }

                //assign value from the form to $team
                $team->assign(
                    [
                        "team_nama" => $namatim,
                        "kategori" => $kategori,
                        "deskripsi" => $deskripsi,
                        "kontak" => $kontak,
                        "jumlahkurang" => $jumlah,
                        "nama_lomba" => $namalomba,
                        "id" => $this->session->get('AUTH_ID'),
                    ]
                );
                // Store and check for errors
                $success = $team->save();

                if ($success) {
                    $this->flashSession->success("Tim telah ditambahkan");;
                    return $this->response->redirect('/dashboard');
                } else {
                    $this->flashSession->error("Gagal menambah tim");
                    return $this->response->redirect('tim/create');
                }
            }
        }
        else{
            $this->flashSession->error("Not Authorized");
            return $this->response->redirect('/user/login');
        }        
    }

    public function deleteAction($id)
    {
        if($this->session->has('AUTH_ID')){
            $tims = Teamku::findFirst([ 
                'team_id = :id: and id=:id2:',
                'bind' => [
                'id' => $id,
                'id2' => $this->session->get('AUTH_ID'),
                ]
            ]);

            if($tims===null){
                $this->flashSession->error("Not Authorized");
                return $this->response->redirect('/dashboard');
            }
            else{
                $join = Joinku::find([ 
                    'team_id = :id:',
                    'bind' => [
                    'id' => $id,
                    ]
                ]);
                if($join !== null){
                    foreach($join as $joi){
                        $joi->delete();
                    }
                }
                if ($tims->delete() === false) {
                    $this->flashSession->error("Gagal menghapus tim");
                    return $this->response->redirect('/dashboard');
                } else {
                    $this->flashSession->success("Berhasil menghapus tim");
                    return $this->response->redirect('/dashboard');
                }
            }
        }
        else{
            $this->flashSession->error("Not Authorized");
            return $this->response->redirect('/user/login');
        }
    }

    public function viewAction($id)
    {
        if($this->session->has('AUTH_ID')){
            $detailteam=Teamku::findfirst([
                'team_id = :id: and id=:usid:',
                'bind' => [
                'id' => $id,
                'usid' => $this->session->get('AUTH_ID'),
                ]
            ]);

            if ($detailteam===null){
                $this->flashSession->error("Not Authorized");
                return $this->response->redirect('/dashboard');
            }
            else{
                $this->view->detailteam=$detailteam;
                $this->view->candidates = $this->modelsManager->createBuilder()
                                    ->from(array('Userku', 'Teamku', 'Joinku'))
                                    ->where('Userku.id = Joinku.id')
                                    ->andWhere('Teamku.team_id = Joinku.team_id')
                                    ->andWhere('Teamku.team_id = :id:',  ['id'=>$id])
                                    ->getQuery()
                                    ->execute();
            }
        }
        else{
            $this->flashSession->error("Not Authorized");
            return $this->response->redirect('/user/login');
        }
    }

    public function joinAction($id)
    {
        $join=new Joinku();
        if($this->session->has('AUTH_ID')){
            $cek=Teamku::findfirst([
                'team_id = :id:',
                'bind' => [
                   'id' => $id,
                ]
            ]);
    
            if($cek === null){
                $this->flashSession->error("Tim tidak ditemukan");
                return $this->response->redirect('/');
            }
            else{
                if($cek->jumlahkurang == 0 ){
                    $this->flashSession->error("Tim ini tidak membutuhkan persetujuan bergabung");
                    return $this->response->redirect('/');
                }
                $join->assign(
                    [
                        "team_id" => $id,
                        "id" => $this->session->get('AUTH_ID'),
                        "status" => "Tunggu"
                    ]
                );
                $success = $join->save();

                if ($success) {
                    $this->flashSession->success("Berhasil bergabung, Tunggu konfirmasi dari Ketua Tim");;
                    return $this->response->redirect('/tim');
                } else {
                    $this->flashSession->error("Gagal bergabung di tim");
                    return $this->response->redirect('/tim');
                }
            }
        }
        else{
            $this->flashSession->error("Not Authorized");
            return $this->response->redirect('/user/login');
        }
    }

    public function editAction($id)
    {
        if($this->session->has('AUTH_ID')){
            $tims = Teamku::findFirst([ 
                'team_id = :id: and id = :id2:',
                'bind' => [
                'id' => $id,
                'id2' => $this->session->get('AUTH_ID'),
                ]
            ]);
            
            if($tims === null){
                $this->flashSession->error("Not Authorized");
                return $this->response->redirect('/dashboard');
            }
            $this->view->tims=$tims;
            
        }
        else{
            $this->flashSession->error("Not Authorized");
            return $this->response->redirect('/user/login');
        }

    }

    public function editSubmitAction($id)
    {
        if($this->session->has('AUTH_ID')){
            $team = Teamku::findFirst([ 
                'team_id = :id:',
                'bind' => [
                'id' => $id,
                ]
            ]);
            
            if ($this->request->isPost()) {
                $namatim = $this->request->getPost("namatim");
                $kategori = $this->request->getPost("kategori");
                $namalomba = $this->request->getPost("namalomba");
                $kontak = $this->request->getPost("kontak");
                $jumlah = $this->request->getPost("jumlah");
                $deskripsi = $this->request->getPost("deskripsi");

                if ($namatim === "") {
                    $this->flashSession->error("Nama Tim anda kosong");
                    //pick up the same view to display the flash session errors
                    return $this->view->pick("tim/create");
                }

                if ($kategori === "") {
                    $this->flashSession->error("kategori anda kosong");
                    //pick up the same view to display the flash session errors
                    return $this->view->pick("tim/create");
                }

                if ($namalomba === "") {
                    $this->flashSession->error("Nama Lomba anda kosong");
                    //pick up the same view to display the flash session errors
                    return $this->view->pick("tim/create");
                }

                if ($kontak === "") {
                    $this->flashSession->error("Nomor Telepon anda kosong");
                    //pick up the same view to display the flash session errors
                    return $this->view->pick("tim/create");
                }

                if ($jumlah === "") {
                    $this->flashSession->error("Jumlah yang dibutuhkan anda kosong");
                    //pick up the same view to display the flash session errors
                    return $this->view->pick("tim/create");
                }

                if ($deskripsi === "") {
                    $this->flashSession->error("Deskripsi anda kosong");
                    //pick up the same view to display the flash session errors
                    return $this->view->pick("tim/create");
                }

                if (strlen($kontak) < 9) {
                    $this->flashSession->error("Nomor Telepon anda tidak valid");
                    //pick up the same view to display the flash session errors
                    return $this->view->pick("tim/create");
                }

                if ($jumlah < 1) {
                    $this->flashSession->error("Jumlah yang dibutuhkan tidak valid");
                    //pick up the same view to display the flash session errors
                    return $this->view->pick("tim/create");
                }

                //assign value from the form to $team
                $team->team_nama = $namatim;
                $team->kategori = $kategori;
                $team->deskripsi = $deskripsi;
                $team->kontak = $kontak;
                $team->jumlahkurang = $jumlah;
                $team->nama_lomba = $namalomba;
                // Store and check for errors
                $success=$team->update();

                if ($success) {
                    $this->flashSession->success("Tim telah diupdate");;
                    return $this->response->redirect('tim/view/'.$id);
                } else {
                    $this->flashSession->error("Gagal mengupdate tim");
                    return $this->response->redirect('tim/edit/'.$id);
                }
            }
        }
        else{
            $this->flashSession->error("Not Authorized");
            return $this->response->redirect('/user/login');
        } 
    }       
    

}