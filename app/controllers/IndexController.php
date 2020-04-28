<?php
declare(strict_types=1);

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function dashboardAction()
    {
        if(!$this->session->has('AUTH_ID')){
            $this->flashSession->error("Not Authorized");
            return $this->response->redirect('user/login');
        }
        $this->view->teams=Teamku::find([
            'conditions'=>'id = :id:',
            'bind'=>['id'=> $this->session->get('AUTH_ID')]
        ]);

        $this->view->joins=$this->modelsManager->createBuilder()
                                ->from(array('Joinku', 'Teamku', 'Userku'))
                                ->where('Joinku.team_id = Teamku.team_id')
                                ->andWhere('Joinku.id=:id:', ['id'=>$this->session->get('AUTH_ID')])
                                ->andWhere('Userku.id = Teamku.id')
                                ->getQuery()
                                ->execute();
    }

}

