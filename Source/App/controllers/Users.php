<?php

class Users extends Controller
{
    protected $modalPage;

    public function __construct()
    {
        $this->modalPage = $this->model('_users');
    }

    public function index()
    {
        $data = ['title' => 'Page is not Found'];
        $this->view("e404/index", $data);
    }

    public function register()
    {
        // check request
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['title' => 'Register',
                "name" => $_POST['full_name'],
                "email" => $_POST['email'],
                'password' => $_POST['password'],
                'repeat_password' => $_POST['repeat_password'],
                "role" => $_POST['role'],
                "accept" => '',
                'email_error' => '',
                'name_error' => '',
                'password_error' => '',
                'password_confirm_error' => '',
                'role_error' => '',
                'accept_error' => ''];
            if (isset($_POST['accept'])) {
                $data["accept"] = $_POST['accept'];
            } else {
                $data["accept"] = '';
            }
            // process data :
            if (strlen($data['name']) > 55 or strlen($data['name']) < 6 or empty($data['name'])) {
                $data['name_error'] = 'Your Name should between 6 and 55 character';
            }
            if ($this->modalPage->Is_new_Email($data['email'])) {
                $data['email_error'] = 'Your Email already taken';
            }
            if (strlen($data['email']) > 255 or empty($data['email'])) {
                $data['email_error'] = 'Your Email should between 10 and 255';
            }
            if (strlen($data['password']) > 26 or empty($data['password'])) {
                $data['password_error'] = 'You can\'t leave This field empty, at least must be 6 character';
            }
            if (empty($data['repeat_password']) or $data['repeat_password'] != $data['password']) {
                $data['password_confirm_error'] = 'please confirm password ,passwords do not match';
            }
            if (empty($data['date'])) {
                $data['date_error'] = 'Date is not valid !';
            }
            if ($data['role'] == 'select your role') {
                $data['role_error'] = 'You will choose one option';
            }
            if (!isset($data['accept']) || @$data['accept'] == "") {
                $data['accept_error'] = 'You must accept terms and policy';
            }
            if (empty($data['email_error'])
                && empty($data['name_error'])
                && empty($data['password_error'])
                && empty($data['password_confirm_error'])
                && empty($data['role_error'])
                && !empty($data['accept'])
            ) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->modalPage->insertUser($data)) {
                    redirect('users/login');
                } else {
                    die('Something is wrong !');
                }
            }
        } else {
            //init data
            $data = ['title' => 'Register',
                "name" => "",
                "email" => "",
                'password' => "",
                'repeat_password' => "",
                "role" => "",
                "date" => "",
                "accept" => "",
                'email_error' => '',
                'name_error' => '',
                'password_error' => '',
                'password_confirm_error' => '',
                'role_error' => '',
                'accept_error' => ''];
        }
        if (isset($_SESSION['user_role'])) {
            redirect("dashboard/" . $_SESSION['user_role']);
        } else {
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['title' => 'login',
                "email" => $_POST['email'],
                "password" => $_POST['password'],
                'email_error' => '',
                'password_error' => '',
                'successLogin' => false,
            ];
            if (strlen($data['email']) > 255 or empty($data['email'])) {
                $data['email_error'] = 'Your Email should between 10 and 255';
            }
            if (strlen($data['password']) > 26 or empty($data['password'])) {
                $data['password_error'] = 'You can\'t leave This field empty, at least must be 6 character';
            }

            if (empty($data['email_error']) && empty($data['password_error'])) {
                $user = $this->modalPage->findUser($data['email'], $data['password']);
                if ($user) {
                    $this->loginSession($user);
                } else {
                    if ($this->modalPage->Is_new_Email($data['email'])) {
                        $data['password_error'] = 'Password is wrong';
                    } else {
                        $data["email_error"] = 'Email not found';
                    }
                    $this->view('users/login', $data);
                }
            }

        } else {
            //init data
            $data = ['title' => 'login',
                "email" => "",
                "password" => "",
                'email_error' => '',
                'password_error' => '',
            ];
        }
        if (isset($_SESSION['user_role'])) {
            redirect("dashboard/" . $_SESSION['user_role']);
        } else {
            $this->view('users/login', $data);
        }
    }

    private function loginSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_date'] = $user->birthday;
        $_SESSION['user_role'] = $user->role;
        if (isset($_SESSION['user_role'])) {
            redirect('dashboard/' . $_SESSION['user_role']);
        } else {
            die('Something is wrong!');
        }
    }
}