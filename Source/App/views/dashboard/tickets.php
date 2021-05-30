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
                <?php if ($_SESSION['user_role'] == 'admin') {
                    echo '<li><a href=' . URLROOT . '/dashboard/admin>Switch to admin</a></li>';
                } ?>
                <li class='danger'><a href="<?php echo URLROOT . '/dashboard/logout' ?>">Log out</a></li>

            </ul>
        </div>
    </nav>
</header>
<div class="container">
    <?php
    if (count($data['Tickets'])) {
        foreach ($data['Tickets'] as $arr => $obj) {
            echo '
                <div class="row">
                      <div class="col-sm-6 my-4">
                        <div class="card">
                          <div class="card-body">
                            <p><span class="fw-bold">ID RESERVATION: </span>#000000' . $obj->id . '</p>
                            <p ><span class="fw-bold">ID FLIGHT: </span> ' . $obj->id_flight . '</p>
                            <p><span class="fw-bold">ID PASSENGER: </span>' . $obj->id_passanger . '</p>
                            <a href="#" class="btn btn-outline-dark">GET TICKET</a>
                          </div>
                        </div>
                      </div>
                  </div>';
        }
    } else {
        echo '
            <div class="row justify-content-center align-items-center" style="height: 85vh">
              <div class="col-sm-6 my-4 text-uppercase">
              <h1 class="text-center" style="color: #adb5bd">
                you don\'t have any tickets yeat!
               </h1>
               <div class="text-center mt-4">
                    <a class="btn btn-outline-primary" href="' . URLROOT . '/dashboard/user">get one now</a>
              </div>
              </div>
          </div>
        
        ';
    }
    ?>
</div>
<?php require_once APPROOT . '/views/include/footer.php'; ?>

<script type="module" src="<?php echo URLROOT . '/Assets/scripts/navbar.js' ?>"></script>
</body>
</html>
