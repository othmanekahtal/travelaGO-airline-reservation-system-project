<?php

class Dashboard extends Controller
{
    protected $modalPage;

    public function __construct()
    {
        $this->modalPage = $this->model('dashboard_');

    }
    public function index(){
        $data['title']='Home';
        $this->view("Home/index", $data);

    }
    public function user()
    {
        $data['title'] = 'User Dashboard';
        $this->view("Dashboard/user", $data);
    }
    public function admin()
    {
        $data['title'] = 'Admin Dashboard';
        $this->view("Dashboard/admin", $data);
    }
}