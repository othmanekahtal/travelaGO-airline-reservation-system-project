<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo URLROOT . '/Assets/dist/user.css' ?>"/>
    <link rel="shortcut icon" href="<?php echo URLROOT . '/Assets/images/logo.png' ?>" type="image/x-icon">
    <title><?php echo SITE_NAME . ' | ' . $data['title'] ?></title>
</head>
<body>
<header>
    <nav class="d-flex justify-content-between align-items-center">
        <div class="logo rounded-circle">
            <a href="#">
                <img src="<?php echo URLROOT . '/Assets/images/logo.png' ?>" alt="logo">
            </a>
        </div>
        <form class="search-box">
            <input type="text" placeholder="search by trademark" class="search-box__input">
            <button class="search-box__btn">
                <i class="search-box__btn__icon bi bi-search"></i>
            </button>
        </form>
        <div class="profile-control">
            <div class="profile">
                <div class="profile__avatar">
                    <img src="<?php echo URLROOT . '/Assets/images/' . strtolower($_SESSION['user_role']) . '.jpg' ?>"
                         alt="user-avatar">
                </div>
                <span class="profile__username"><?php echo $_SESSION['user_name']; ?></span>
            </div>
            <ul class="panel">
                <li><a href="<?php echo URLROOT . '/dashboard/edit' ?>">Setting</a></li>
                <li><a href="<?php echo URLROOT . '/dashboard/tickets' ?>">Your Tickets</a></li>
                <?php if ($_SESSION['user_role'] == 'admin') {
                    echo '<li><a href=' . URLROOT . '/dashboard/admin>Switch to admin</a></li>';
                } ?>
                <li class='danger'><a href="<?php echo URLROOT . '/dashboard/logout' ?>">Log out</a></li>

            </ul>
        </div>
    </nav>
</header>
<div class="container">
    <div class="reservation">
        <div class="reservation-search">
            <div class="h1 text-center mt-4 text-uppercase">Take your flight now :</div>
            <div class="container">
                <div class="row mt-3 justify-content-center">
                    <div class="col-md-6 m-5 bg-light rounded pt-5 px-4">
                        <form class="search-form">
                            <div class="form-group mb-3">
                                <label for="date_search" class="mb-2 text-capitalize">Depart date :</label>
                                <input type="date" class="form-control" name="date" id="date_search">
                            </div>
                            <div class="form-group mb-3">
                                <label for="depart" class="mb-2 text-capitalize">depart :</label>
                                <input class="form-control" type="text" id="depart" placeholder="Rabat">
                            </div>
                            <div class="form-group mb-3">
                                <label for="arrival" class="mb-2 text-capitalize">arrival :</label>
                                <input class="form-control" type="text" id="arrival" placeholder="New York">
                            </div>

                            <div class="my-4 input input__submit text-center">
                                <input class="btn btn-outline-dark" type="submit" value="search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="table-responsive my-5">
                <div class="h2 text-center mb-5 text-uppercase ">List of Reservations :</div>

                <table class="table table-striped ">
                    <thead>
                    <tr>
                        <th scope="col" class="px-4">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Arrival date</th>
                        <th scope="col">Departure</th>
                        <th scope="col">Arrival</th>
                        <th scope="col">reset place</th>
                        <th scope="col">Trademark</th>
                        <th scope="col">Reservation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // it's work
                    //                echo print_r($data['flights']);
                    foreach ($data['flights'] as $flight) {
//                    echo $flight['id'];
                        if ($flight['limit_place'] < 25) {
                            $place_class = 'place__flight text-danger fw-bold';

                        } else {
                            $place_class = 'place__flight';
                        }
                        $class_reservation_button = 'btn btn-outline-success reserve_btn';
                        $flight['limit_place'] == 0 && $class_reservation_button = 'btn btn-success disabled';
                        echo '<tr>
                    <th scope="row" class="px-3">' . $flight['id'] . '</th>
                    <td class="date_flight">' . $flight['date_depart'] . '</td>
                    <td class="date_arrival">' . $flight['date_arriv'] . '</td>
                    <td class="departure_flight">' . $flight['departure'] . '</td>
                    <td class="arrival_flight">' . $flight['arrival'] . '</td>
                    <td class="' . $place_class . '">' . $flight['limit_place'] . '</td>                    
                    <td class="trademark_flight">' . $flight['trademark'] . '</td>
                    <td class="reserv_flight">
                    <a href="' . URLROOT . '/dashboard/reservation/' . $flight['id'] . '" class="' .
                            $class_reservation_button . '">Reserve now</a></td>
                </tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once APPROOT . '/views/include/footer.php'; ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="module" src="<?php echo URLROOT . '/Assets/scripts/user.js' ?>"></script>
</body>
</html>
