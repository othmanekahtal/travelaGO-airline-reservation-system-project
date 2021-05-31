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
        if ($this->loggedIn()) {
            $data['flights'] = $this->modalPage->getFlights();
            $data['title'] = 'Welcome ' . $_SESSION['user_name'];
            $this->view("dashboard/user", $data);
        } else {
            redirect('users/login');
        }

    }


    public function admin()
    {

//        $data['title'] = 'Admin dashboard';
        if ($this->loggedIn()) {
            $data['flights'] = $this->modalPage->getFlights();
            $data['name'] = $_SESSION['user_name'];
            $data['title'] = 'dashboard ' . $_SESSION['user_name'];
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
        if ($this->loggedIn()) {
            $data['flights'] = $this->modalPage->getFlights();
            $data['title'] = 'Profile ' . $_SESSION['user_name'];
            $this->view("dashboard/profile", $data);

        } else {
            redirect('users/login');
        }
    }

    public function tickets()
    {
        if ($this->loggedIn()) {

            $data['title'] = 'Your tickets';
            $data['Tickets'] = $this->modalPage->GetReservations($_SESSION['user_id']);
//            die($data['Tickets'][0]->id);
            $this->view("dashboard/tickets", $data);
        } else {
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

    public function reservation($id)
    {

        if ($this->loggedIn()) {
            if ($id) {
                $data['title'] = "booking page";
                $this->view("dashboard/reservation", $data);
            } else {
                $data = ['title' => 'Page is not Found'];
                $this->view("e404/index", $data);
            }
        } else {
            redirect('users/login');
        }
    }


    public function addReservation($id)
    {
        if ($this->loggedIn()) {

            if (isset($id[0])) {
                $json = json_decode(file_get_contents('php://input'));
                if ($json) {
                    $r = $this->modalPage->addReservation($_SESSION['user_id'], $id[0], 0, $json->name);
                    print_r(json_encode(['message' => $r]));
                } else {
                    $r = $this->modalPage->addReservation($_SESSION['user_id'], $id[0], 1, $_SESSION['user_name']);
                    print_r(json_encode(['message' => $r]));
                }

            } else {
                print_r(json_encode(['NO_ID']));
            }
        } else {
            redirect('users/login');
        }
    }

    public function deleteflight($id)
    {
        if ($this->loggedIn()) {


            $r = $this->modalPage->deleteFlights($id[0]);
            print_r(json_encode([$r]));
        } else {
            redirect('users/login');
        }
    }

    public function editflight()
    {
        if ($this->loggedIn()) {

            $json = json_decode(file_get_contents('php://input'));
            $r = $this->modalPage->editFlights($json->id, $json->departDate, $json->arrivalDate, $json->departure,
                $json->arrival, $json->resetPlace, $json->Trademark);
            if ($r) {
                print_r(json_encode($json));
            } else {
                print_r(json_decode(false));
            }
        } else {
            redirect('users/login');
        }
    }

    public function addflight()
    {
        if ($this->loggedIn()) {
            $json = json_decode(file_get_contents('php://input'));
            $r = $this->modalPage->addFlight($_SESSION['user_name'], $json->departDate, $json->arrivalDate, $json->departure,
                $json->arrival, $json->resetPlace, $json->Trademark);
            print_r(json_encode($r));
        } else {
            redirect('users/login');
        }
    }

    public function add()
    {
        if ($this->loggedIn()) {

            $data['title'] = 'Add flight';
            $this->view("dashboard/add", $data);
        } else {
            redirect('users/login');
        }
    }
}