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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet"/>
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
                <?php if ($_SESSION['user_role'] == 'admin') {
                    echo '<li><a href=' . URLROOT . '/dashboard/admin>Switch to admin</a></li>';
                } ?>
                <li class='danger'><a href="<?php echo URLROOT . '/dashboard/logout' ?>">Log out</a></li>

            </ul>
        </div>
    </nav>
</header>
<!--we need this classes to implement our application
date :
<tr>
    <th scope="row">1</th>
    <td class="date_flight">2021-02-12</td>
    <td class="departure_flight">s</td>
    <td class="arrival_flight">d</td>
</tr>
-->
<div class="reservation">
    <div class="reservation-search">
        <h1 class="primary-title">Take your flight now</h1>
        <form class="search-form">
            <div class="input input__date">
                <label for="date_search">date</label>
                <input class type="date" name="date" id="date_search">
            </div>
            <div class="input input__primary">
                <label for="depart">depart</label>
                <input type="text" id="depart">
            </div>
            <div class="input input__primary">
                <label for="depart">arrival</label>
                <input type="text" id="arrival">
            </div>
            <div class="input input__submit">
                <input type="submit" value="search">
            </div>
        </form>

        <div class="table-responsive ">
            <caption>List of Reservations</caption>
            <table class="table table-striped ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Departure</th>
                    <th scope="col">Arrival</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // it's work
                echo print_r($this->modalPage);
                //                foreach (true) {
                echo '<tr>
                    <th scope="row">1</th>
                    <td class="date_flight">2021-02-12</td>
                    <td class="departure_flight">s</td>
                    <td class="arrival_flight">d</td>
                </tr>';
                //                }
                ?>
                </tbody>
            </table>

        </div>
    </div>

    <script type="module" src="<?php echo URLROOT . '/Assets/scripts/user.js' ?>"></script>
</body>
</html>
