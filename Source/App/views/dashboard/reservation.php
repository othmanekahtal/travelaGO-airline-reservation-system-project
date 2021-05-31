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
                <li><a href="<?php echo URLROOT . '/dashboard/user' ?>">Dashboard</a></li>
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
    <div class="position-absolute top-50 start-50 translate-middle p-4 bg-light">
        <div class=" h1 text-center mb-4">Reserve Now :</div>
        <p class="mb-4">please take your choice, and enjoy for your flight !</p>
        <div class="text-center">
            <button class="btn me-4 me-reservation btn-outline-dark text-capitalize">for me</button>
            <button class="btn other-reservation btn-outline-primary text-capitalize">for other</button>

        </div>
    </div>
</div>
<div class="container-fluid position-absolute bottom-0">
    <?php require_once APPROOT . '/views/include/footer.php'; ?>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="module" src="<?php echo URLROOT . '/Assets/scripts/reservation.js' ?>"></script>
<script type="module" src="<?php echo URLROOT . '/Assets/scripts/navbar.js' ?>"></script>
</body>
</html>
