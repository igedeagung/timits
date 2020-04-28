<?php
declare(strict_types=1);
use App\Forms\RegisterForm;
// use App\Forms\LoginForm;

class UserController extends ControllerBase
{
    public $loginForm;
    public $usersModel;

    public function onConstruct()
    {
    }

    public function initialize()
    {
        // $this->loginForm = new LoginForm();
        $this->usersModel = new Userku();
    }

    public function loginAction()
    {
        $sessions = $this->getDI()->getShared("session");

        if ($sessions->has("AUTH_ID")) {
            //if user is already logged we dont need to do anything 
            // so we redirect them to the main page
            return $this->response->redirect("/dashboard");
        }
    }
    public function loginSubmitAction()
    {
        $sessions = $this->getDI()->getShared("session");

        if ($sessions->has("AUTH_ID")) {
            //if user is already logged we dont need to do anything 
            // so we redirect them to the main page
            return $this->response->redirect("/dashboard");
        }

        if ($this->request->isPost()) {

            $password = $this->request->getPost("password");
            $username = $this->request->getPost("username");

            if ($username === "") {
                $this->flashSession->error("Username anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("user/login");
            }

            if ($password === "") {
                $this->flashSession->error("Password anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("user/login");
            }

            $user = Userku::findFirst([ 
                'username = :usern:',
                'bind' => [
                   'usern' => $username,
                ]
            ]);

            if ($user) {
                if (sha1($password) === $user->password)
                {
                    # https://docs.phalconphp.com/en/3.3/session#start
    
                    // Set a session
                    $this->session->set('AUTH_ID', $user->id);
                    $this->session->set('AUTH_NAME', $user->nama);
                    $this->session->set('AUTH_USERNAME', $user->usernama);
                    $this->session->set('AUTH_EMAIL', $user->email);    

                    return $this->response->redirect('/dashboard');
                }
            } else {
                // The validation has failed
                $this->flashSession->error("User tidak terdaftar");
                return $this->response->redirect('user/login');
            }
            // The validation has failed
            $this->flashSession->error("Password Salah");
            return $this->response->redirect('user/login');
        }
    }
    public function registerAction()
    {
        
    }
    public function registerSubmitAction()
    {
        $user = new Userku();
        
        if ($this->request->isPost()) {
            $nama = $this->request->getPost("nama");
            $email = $this->request->getPost("email");
            $password = $this->request->getPost("password");
            $kpassword = $this->request->getPost("kpassword");
            $username = $this->request->getPost("username");

            if ($nama === "") {
                $this->flashSession->error("Nama anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("user/register");
            }

            if ($email === "") {
                $this->flashSession->error("Email anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("user/register");
            }

            if ($username === "") {
                $this->flashSession->error("Username anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("user/register");
            }

            if ($password === "") {
                $this->flashSession->error("Password anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("user/register");
            }

            if ($kpassword === "") {
                $this->flashSession->error("Konfirmasi Password anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("user/register");
            }

            if ($password !== $kpassword) {
                $this->flashSession->error("Password anda Konfirmasi Password anda tidak cocok");
                //pick up the same view to display the flash session errors
                return $this->view->pick("user/register");
            }

            //assign value from the form to $user
            $user->assign(
                [
                    "nama" => $nama,
                    "username" => $username,
                    "password" => sha1($password),
                    "email" =>$email,
                ]
            );
            // Store and check for errors
            $success = $user->save();

            if ($success) {
                $this->flashSession->success("User telah terdaftar");;
                return $this->response->redirect('user/login');
            } else {
                $this->flashSession->error("Gagal mendaftar");
                return $this->response->redirect('user/register');
            }
        }
        
    }
    public function logoutAction()
    {
        # https://docs.phalconphp.com/en/3.3/session#remove-destroy

        // Destroy the whole session
        $this->session->destroy();
        return $this->response->redirect('user/login');
    }

    
}

