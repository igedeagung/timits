<?php
declare(strict_types=1);

class JoinController extends ControllerBase
{
    public function cancelAction($id)
    {
        if($this->session->has('AUTH_ID')){
            $tims = Joinku::findFirst([ 
                'team_id = :id: AND id = :idd: AND status = "Tunggu"',
                'bind' => [
                'id' => $id,
                'idd' => $this->session->get('AUTH_ID'),
                ]
            ]);

            if($tims===null){
                $this->flashSession->error("Not Authorized");
                return $this->response->redirect('/dashboard');
            }
            if ($tims->delete() === false) {
                $this->flashSession->error("Gagal membatalkan tim");
                return $this->response->redirect('/dashboard');
            } else {
                $this->flashSession->success("Berhasil membatalkan tim");
                return $this->response->redirect('/dashboard');
            }
        }
        else{
            $this->flashSession->error("Not Authorized");
            return $this->response->redirect('/user/login');
        }
      
    }
    public function accAction($id_team, $id_user)
    {
        if($this->session->has('AUTH_ID')){
            $join = Joinku::findFirst([ 
                'team_id = :id: AND id = :idd:',
                'bind' => [
                'id' => $id_team,
                'idd' => $id_user,
                ]
            ]);

            $tim=Teamku::findFirst([
                'team_id = :id: and id= :uid:',
                'bind' => [
                    'id' => $id_team,
                    'uid'=>$this->session->get('AUTH_ID'),
                ]
            ]);

            if($tim === null){
                $this->flashSession->error("Not Authorized");
                return $this->response->redirect('/dashboard');
            }

            $join->status="Diterima";
            $join->update();
            $tim->jumlahkurang--;
            $jumlah=$tim->jumlahkurang;
            $tim->update();
            if($jumlah === 0){
                $hapus=Joinku::find([
                    'team_id = :idk: and status = "Tunggu"',
                    'bind' => [
                        'idk' => $id_team,
                    ]
                ]);
                if($hapus !== null){
                    foreach($hapus as $hapu){
                        $hapu->delete();
                    }
                }
            }
            $this->flashSession->success("Berhasil menerima anggota");
            return $this->response->redirect('/tim/view/'.$id_team);
        }
        else{
            $this->flashSession->error("Not Authorized");
            return $this->response->redirect('/user/login');
        }
    }

    public function decAction($id_team, $id_user)
    {
        if($this->session->has('AUTH_ID')){
            $tims = Joinku::findFirst([ 
                'team_id = :id: AND id = :idd:',
                'bind' => [
                'id' => $id_team,
                'idd' => $id_user,
                ]
            ]);

            $cek=Teamku::findFirst([
                'team_id = :id: and id= :uid:',
                'bind' => [
                    'id' => $id_team,
                    'uid'=>$this->session->get('AUTH_ID'),
                ]
            ]);

            if($cek === null){
                $this->flashSession->error("Not Authorized");
                return $this->response->redirect('/dashboard');
            }

            if ($tims->delete() === false) {
                $this->flashSession->error("Gagal menolak kandidat");
                return $this->response->redirect('/tim/view/'.$id_team);
            } else {
                $this->flashSession->success("Berhasil menolak anggota");
                return $this->response->redirect('/tim/view/'.$id_team);
            }
        }
        else{
            $this->flashSession->error("Not Authorized");
            return $this->response->redirect('/user/login');
        }
      
    }
}

