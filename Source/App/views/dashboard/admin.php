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
            <input type="text" placeholder="search" class="search-box__input">
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
                <li><a href="<?php echo URLROOT . '/dashboard/user' ?>">Switch to user</a></li>
                <li class='danger'><a href="<?php echo URLROOT . '/dashboard/logout' ?>">Log out</a></li>

            </ul>
        </div>
    </nav>
</header>
<div class="reservation">
    <div class="table-responsive ">
        <caption>List of Reservations</caption>
        <table class="table table-striped ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Departure</th>
                <th scope="col">Arrival</th>
                <th scope="col">Trademark</th>
                <th scope="col">Admin</th>
                <th scope="col">Date Added</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data['flights'] as $flight) {
                $admin = $flight['admin'];
                if ($admin == ucwords($_SESSION['user_name'])) {
                    $admin = 'you';
                }
                $admin = ucwords($admin);
                echo '<tr>
                    <th scope="row">' . $flight['id'] . '</th>
                    <td class="date_flight">' . $flight['date_arriv'] . '</td>
                    <td class="departure_flight">' . $flight['departure'] . '</td>
                    <td class="arrival_flight">' . $flight['arrival'] . '</td>
                    <td class="trademark_flight">' . $flight['trademark'] . '</td>
                    <td class="admins_flight">
                         ' . $admin . '
                    </td>
                    <td class="date_add_flight">' . $flight['date_add'] . '</td>  
                    <td class="action_flight">
                    <button type="button" class="btn btn-outline-dark action_flight__edit">Edit</button>
                    <button type="button" class="btn btn-danger action_flight__delete">Delete</button>
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
        edit popup
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="module" src="<?php echo URLROOT . '/Assets/scripts/admin.js' ?>"></script>
</body>
</html>

