<?php

class Dashboard extends Controller
{
    public $modalPage;

    public function __construct()
    {
        $this->modalPage = $this->model('_Dashboard');
    }

    public function index()
    {
        $data = ['title' => 'Page is not Found'];
        $this->view("e404/index", $data);

    }

    public function user()
    {
        $data['flights'] = $this->modalPage->getFlights();
        $data['reservations'] = $this->modalPage->GetReservations();

        $data['title'] = 'Welcome ' . $_SESSION['user_name'];
        $this->view("dashboard/user", $data);
    }


    public function admin()
    {
        $data['flights'] = $this->modalPage->getFlights();

//        $data['title'] = 'Admin dashboard';
        if ($this->loggedIn()) {
            $data['name'] = $_SESSION['user_name'];
            $data['title'] = 'dashboard ' . $_SESSION['user_name'];
//            die(print_r($data));
            $this->view("dashboard/" . $_SESSION['user_role'], $data);

        } else {
            redirect('users/login');
        }

    }

    public function loggedIn(): bool
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function edit()
    {
        // edit here :
        die('edit profile');
    }

    public function tickets()
    {
        die('Your Tickets here !');
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

    public function reservation($id)
    {
        $data['title'] = $_SESSION['user_name'];
        $this->view("dashboard/reservation", $data);
        die($id[0]);
    }

    public function deleteflight($id)
    {
        $r = $this->modalPage->deleteFlights($id[0]);
        print_r(json_encode([$r]));
    }

    public function editflight()
    {
        
    }
}