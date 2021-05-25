<?php

class Dashboard extends Controller
{
    protected $modalPage;

    public function __construct()
    {
        $this->modalPage = $this->model('_Dashboard');
    }
    public function index(){
        $data = ['title' => 'Page is not Found'];
        $this->view("e404/index", $data);

    }
    public function user()
    {
        $data['title'] = 'Welcome '.$_SESSION['user_name'];
        $this->view("dashboard/user",$data);
    }
    public function loggedIn(): bool
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
    public function admin()
    {
//        $data['title'] = 'Admin dashboard';
        if ($this->loggedIn()) {
            $data['name']=$_SESSION['user_name'];
            $data['title']='dashboard '.$_SESSION['user_role'];
//            die(print_r($data));
            $this->view("dashboard/" . $_SESSION['user_role'], $data);

        }else {
            redirect('users/login');
        }

    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_date']);
        unset($_SESSION['user_role']);
        session_destroy();
        redirect('users/login');
    }
}