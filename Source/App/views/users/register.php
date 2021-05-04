<?php
require_once APPROOT . '/views/include/header.php';
//require_once APPROOT . '/views/include/navbar.php';
?>
<main class="container">
    <form method="post">
        <h1 class="h3 mb-3 fw-normal text-center"> sign up</h1>

        <div class="form-floating mb-3">
            <input type="text" name="full_name" class="form-control <?php
            if(!empty($data['name_error'])){
            echo 'is-invalid';
            }
            ?>" id="floatingInput"
                   placeholder="name@example
            .com" value = "<?php echo $data['name']?>">
            <label for="floatingInput">Full name</label>
            <div class="span-feedback invalid-feedback">
                test
                <?php echo $data['name_error'] ?>
            </div>
        </div>

        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control <?php echo (!empty($data['email_error']) ?
                'is-invalid' : '') ?>" id="floatingInput" placeholder="name@example
            .com" value = "<?php echo $data['email']?>">
            <label for="floatingInput">Email address</label>
            <span class="span-feedback invalid-feedback">
                <?php echo $data['email_error'] ?>
            </span>
        </div>

        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control <?php echo (!empty($data['password_error']) ?
                'is-invalid' : '') ?>" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
            <span class="span-feedback invalid-feedback">
                <?php echo $data['password_error'] ?>
            </span>
        </div>

        <div class="form-floating mb-3">
            <input type="password" name="repeat_password"
                   class="form-control <?php echo (!empty($data['password_confirm_error']) ?
                       'is-invalid' : '') ?>"
                   id="floatingPassword"
                   placeholder="repeat your password">
            <label for="floatingPassword">repeat your password</label>
            <span class="span-feedback invalid-feedback"><?php echo $data['password_confirm_error'] ?></span>
        </div>

        <div class="form-floating mb-3">
            <input type="date" class="<?php echo (!empty($data['date_error']) ?
                'is-invalid' : '') ?>" name="date" value = "<?php echo $data['date']?>"/>
            <span class="span-feedback invalid-feedback"><?php echo $data['date_error'] ?></span>
        </div>

        <div class="">
            <select  name="role" class="form-select form-select-lg mb-3 <?php echo (($data['role']=='select your role')?
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
            <span style="display: block !important;" class="span-feedback invalid-feedback"><?php if(!empty($data['accept_error']))
            {echo
                $data['accept_error'];} ?></span>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <a class="nav-link link-primary px-0 my-4 text-start fw-bold text-capitalize" href="login">have an account ?</a>

    </form>
</main>

<?php
require_once APPROOT . '/views/include/footer.php';
?>
