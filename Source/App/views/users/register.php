<?php
require_once APPROOT . '/views/include/header.php';
//require_once APPROOT . '/views/include/navbar.php';
?>
<main class="container">
    <form>
        <h1 class="h3 mb-3 fw-normal text-center"> sign up</h1>
        <div class="form-floating mb-3">
            <input type="text" name="full_name" class="form-control" id="floatingInput"
                   placeholder="name@example
            .com">
            <label for="floatingInput">Full name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="repeat_password" class="form-control" id="floatingPassword"
                   placeholder="repeat your password">
            <label for="floatingPassword">repeat your password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" name="date"/>
        </div>
        <select class="form-select form-select-lg mb-3" aria-label="Default select example">

        <option name="role" selected>select your role</option>
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="accept" name="accept"> I accept all terms and policy
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <a class="nav-link link-primary px-0 my-4 text-start fw-bold text-capitalize" href="login">have an account ?</a>

    </form>
</main>

<?php
require_once APPROOT . '/views/include/footer.php';
?>
