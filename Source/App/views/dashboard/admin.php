<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo URLROOT . '/Assets/dist/admin.css' ?>"/>
    <link rel="shortcut icon" href="<?php echo URLROOT . '/Assets/images/logo.png' ?>" type="image/x-icon">
    <title><?php echo SITE_NAME . ' | ' . $data['title'] ?></title>
</head>
<body class="position-relative">
<header class="header">
    <nav class="d-flex justify-content-between align-items-center">
        <div class="logo rounded-circle">
            <a href="#">
                <img src="<?php echo URLROOT . '/Assets/images/logo.png' ?>" alt="logo">
            </a>
        </div>
        <form class="search-box">
            <input type="text" placeholder="Search by admin" class="search-box__input">
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
                <li><a href="<?php echo URLROOT . '/dashboard/add' ?>">Add Flight</a></li>
                <li><a href="<?php echo URLROOT . '/dashboard/user' ?>">Switch to user</a></li>
                <li class='danger'><a href="<?php echo URLROOT . '/dashboard/logout' ?>">Log out</a></li>

            </ul>
        </div>
    </nav>
</header>
<div class="container">

    <div class="table-responsive ">
        <caption><h1 class="text-center mb-5">List of Reservations</h1></caption>
        <table class="table table-striped ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Depart date</th>
                <th scope="col">Arrival date</th>
                <th scope="col">Departure</th>
                <th scope="col">Arrival</th>
                <th scope="col">reset place</th>
                <th scope="col">Trademark</th>
                <th scope="col">Admin</th>
                <th scope="col">Date Added</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data['flights'] as $flight) {
                if ($flight['limit_place'] < 25) {
                    $place_class = 'place__flight text-danger fw-bold';

                } else {
                    $place_class = 'place__flight';
                }
                $admin = ucwords($flight['admin']);
                if ($admin == ucwords($_SESSION['user_name'])) {
                    $admin = 'you';
                }
                $class_edit = 'btn btn-outline-dark action_flight__edit';
                $class_delete = 'btn btn-danger action_flight__delete';
                $admin = ucwords($admin);
                echo '<tr>
                    <th scope="row">' . $flight['id'] . '</th>
                    <td class="date_flight">' . $flight['date_depart'] . '</td>
                    <td class="date_flight">' . $flight['date_arriv'] . '</td>
                    <td class="departure_flight">' . $flight['departure'] . '</td>
                    <td class="arrival_flight">' . $flight['arrival'] . '</td>
                    <td class="' . $place_class . '">' . $flight['limit_place'] . '</td>                   
                    <td class="trademark_flight">' . $flight['trademark'] . '</td>
                    <td class="admins_flight">
                         ' . $admin . '
                    </td>
                    <td class="date_add_flight">' . $flight['date_add'] . '</td>  
                    <td class="action_flight">
                    <button type="button" class="' . $class_edit . '">Edit</button>
                    <button type="button" class="' . $class_delete . '">Delete</button>
                    </td>
                </tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<div class="popup position-absolute align-items-center justify-content-center hidden-element">
    <div class="popup__edit">
        <form>
            <div class="form-row">
                <div class="text-center mb-4">
                    <h1>
                        Update flight
                    </h1>
                </div>
                <div class="col mb-4">
                    <input type="number" class="form-control popup__limit-place" placeholder="Limit Place"
                           required>
                </div>
                <div class="col mb-4">
                    <input type="date" class="form-control popup__depart-date" placeholder="Depart date" required>
                </div>
                <div class="col mb-4">
                    <input type="date" class="form-control popup__arrival-date" placeholder="Arrival date" required>
                </div>
                <div class="col mb-4">
                    <input type="text" class="form-control popup__arrival" placeholder="Arrival" required>
                </div>
                <div class="col mb-4">
                    <input type="text" class="form-control popup__departure" placeholder="Departure" required>
                </div>
                <div class="col mb-4">
                    <input type="text" class="form-control popup__trademark" placeholder="trademark" required>
                </div>
                <div class="col d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-danger popUpCancelButton">Cancel</button>
                    <button type="button" class="btn btn-success popUpApplyButton">Apply</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="module" src="<?php echo URLROOT . '/Assets/scripts/admin.js' ?>"></script>
</body>
</html>

