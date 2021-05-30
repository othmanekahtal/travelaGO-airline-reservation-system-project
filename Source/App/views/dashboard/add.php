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
<body class="position-relative" style="height: 100vh">
<header class="header">
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
                <li><a href="<?php echo URLROOT . '/dashboard/admin' ?>">Dashboard</a></li>
                <li><a href="<?php echo URLROOT . '/dashboard/user' ?>">Switch to user</a></li>
                <li class='danger'><a href="<?php echo URLROOT . '/dashboard/logout' ?>">Log out</a></li>

            </ul>
        </div>
    </nav>
</header>

<div style="top: 45%" class="container mt-5 position-absolute start-50 translate-middle">
    <div class="text-center mb-4">
        <h1 class="text-center text-uppercase">
            add flight :
        </h1>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <form class="d-block form mb-4">
                <div class="form-row">
                    <div class="col mb-4">
                        <input type="number" class="form-control add__limit-place" placeholder="Limit Place"
                               required>
                    </div>
                    <div class="col mb-4">
                        <input type="date" class="form-control add__depart-date" placeholder="Depart date" required>
                    </div>
                    <div class="col mb-4">
                        <input type="date" class="form-control add__arrival-date" placeholder="Arrival date" required>
                    </div>
                    <div class="col mb-4">
                        <input type="text" class="form-control add__arrival" placeholder="Arrival" required>
                    </div>
                    <div class="col mb-4">
                        <input type="text" class="form-control add__departure" placeholder="Departure" required>
                    </div>
                    <div class="col mb-4">
                        <input type="text" class="form-control add__trademark" placeholder="trademark" required>
                    </div>
                    <div class="col d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-danger CancelButton">Cancel</button>
                        <button type="button" class="btn btn-success ApplyButton">Apply</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<div class="position-absolute w-100 bottom-0">
    <?php
    require_once APPROOT . '/views/include/footer.php';
    ?>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="module" src="<?php echo URLROOT . '/Assets/scripts/add.js' ?>"></script>
<script type="module" src="<?php echo URLROOT . '/Assets/scripts/navbar.js' ?>"></script>
</body>
</html>

