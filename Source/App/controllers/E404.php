<?php

class E404 extends Controller
{
    public function index()
    {
        $data=['title'=>'Page is not Found'];
        $this->view("e404/index",$data);
    }
}