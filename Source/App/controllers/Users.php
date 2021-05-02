<?php
class Users extends Controller {
protected $modalPage;
    public function __construct()
    {
        $this->modalPage = $this->model('users_');
    }
    public function register(){
        // check request
        if($_SERVER['REQUEST_METHOD']=='POST'){
            // check the input and request :
        }
        else {
            //init data
            $data=['title'=>'Register'];

        }
        $this->view("users/register", $data);
    }
    public function login(){
        $email = null;
        $password = null;
        $data = json_decode(file_get_contents("php://input"));
            if($data ){
                print_r(json_encode($data));
            }
            else {
                print_r(json_encode(array(
                    "error"=>'false'
                )));
            }

        $data=['title'=>'login',"email" => $email,
        'password' => $password];
        $this->view("users/login", $data);
    }
}