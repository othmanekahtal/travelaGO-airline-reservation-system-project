<?php

class Pages extends Controller
{
    private $modalPage;

    public function __construct()
    {
        $this->modalPage = $this->model('post');
    }

    public function index()
    {
        $count = $this->modalPage->getPost();
        $data = ['title' => 'index', 'count' => $count];
        $this->view("pages/index", $data);
    }
    public function login()
    {
        $data = $data = ['title' => 'login'];
        $this->view("pages/login", $data);
    }

}
