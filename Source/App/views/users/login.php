<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/Assets/dist/css/style.css">

    <title><?php echo SITE_NAME . ' | ' . $data['title'] ?></title>
</head>
<body>
<div class="container m-auto">
    <div class="row justify-content-center align-items-center" style="height: 100vh">
        <div class="col-md-6">
            <form method="post">
                <h1 class="mb-4 fw-normal text-center text-uppercase">Please sign in :</h1>

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control <?php if (!empty($data['email_error'])) {
                        echo 'is-invalid';
                    } ?>"
                           id="floatingInput" placeholder="name@example.com" value="<?php echo $data['email'] ?>">
                    <label for="floatingInput">Email address</label>
                    <span class="span-feedback invalid-feedback">
            <?php echo $data['email_error'] ?>
        </span>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password"
                           class="form-control <?php if (!empty($data['password_error'])) {
                               echo
                               'is-invalid';
                           } ?>"
                           id="floatingPassword"
                           placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    <span class="span-feedback invalid-feedback">
            <?php echo $data['password_error'] ?>
        </span>
                </div>

                <div class="checkbox mb-3 text-start">
                    <a class="nav-link link-primary px-0 my-4 text-start fw-bold text-capitalize" href="register">create
                        a
                        new
                        account ?</a>
                </div>
                <div class="text-center">
                    <button class="btn btn-lg btn-outline-dark px-4" type="submit">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once APPROOT . '/views/include/footer.php';
?>
