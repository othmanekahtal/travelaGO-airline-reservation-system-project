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
                <h1 class="mb-3 fw-normal text-center text-uppercase"> sign up now :</h1>
                <div class="form-floating mb-3">
                    <input type="text" name="full_name" class="form-control <?php
                    if (!empty($data['name_error'])) {
                        echo 'is-invalid';
                    }
                    ?>" id="floatingInput"
                           placeholder="name@example
            .com" value="<?php echo $data['name'] ?>">
                    <label for="floatingInput">Full name</label>
                    <div class="span-feedback invalid-feedback">
                        test
                        <?php echo $data['name_error'] ?>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control <?php echo(!empty($data['email_error']) ?
                        'is-invalid' : '') ?>" id="floatingInput" placeholder="name@example
            .com" value="<?php echo $data['email'] ?>">
                    <label for="floatingInput">Email address</label>
                    <span class="span-feedback invalid-feedback">
                <?php echo $data['email_error'] ?>
            </span>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password"
                           class="form-control <?php echo(!empty($data['password_error']) ?
                               'is-invalid' : '') ?>" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    <span class="span-feedback invalid-feedback">
                <?php echo $data['password_error'] ?>
            </span>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="repeat_password"
                           class="form-control <?php echo(!empty($data['password_confirm_error']) ?
                               'is-invalid' : '') ?>"
                           id="floatingPassword"
                           placeholder="repeat your password">
                    <label for="floatingPassword">repeat your password</label>
                    <span class="span-feedback invalid-feedback"><?php echo $data['password_confirm_error'] ?></span>
                </div>

                <div class="">
                    <select name="role"
                            class="form-select p-3 mb-3 <?php echo(($data['role'] == 'select your role') ?
                                'is-invalid' : '') ?>" aria-label="Default select example">
                        <option selected>select your role
                        </option>
                        <option value="admin">admin</option>
                        <option value="user">user</option>
                    </select>
                    <span class="span-feedback invalid-feedback"><?php echo $data['role_error'] ?></span>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="on" name="accept[]"> I accept all terms and policy
                    </label>
                    <span style="display: block !important;"
                          class="span-feedback invalid-feedback"><?php if (!empty($data['accept_error'])) {
                            echo
                            $data['accept_error'];
                        } ?></span>
                </div>
                <div class="text-center">
                    <button class="btn btn-lg btn-outline-dark px-4" type="submit">Sign in</button>
                </div>
                <a class="nav-link link-primary px-0 my-4 text-start fw-bold text-capitalize" href="login">have an
                    account ?</a>

            </form>
        </div>
    </div>
</div>

<?php
require_once APPROOT . '/views/include/footer.php';
?>
