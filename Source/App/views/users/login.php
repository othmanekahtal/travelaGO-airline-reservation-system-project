<?php
require_once APPROOT . '/views/include/header.php';

?>
  <body class="d-flex">
  <style>
      .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
      }

      @media (min-width: 768px) {
          .bd-placeholder-img-lg {
              font-size: 3.5rem;
          }
      }
  </style>
<main class="container m-auto">
  <form method="post">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating mb-3">
      <input type="email" name="email" class="form-control <?php if(!empty($data['email_error'])){echo 'is-invalid';}?>"
             id="floatingInput" placeholder="name@example.com" value="<?php echo $data['email']?>">
      <label for="floatingInput">Email address</label>
        <span class="span-feedback invalid-feedback">
            <?php echo $data['email_error']?>
        </span>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control <?php if(!empty($data['password_error'])){echo
      'is-invalid';}?>"
             id="floatingPassword"
             placeholder="Password">
      <label for="floatingPassword">Password</label>
        <span class="span-feedback invalid-feedback">
            <?php echo $data['password_error']?>
        </span>
    </div>

    <div class="checkbox mb-3 text-start">
        <a class="nav-link link-primary px-0 my-4 text-start fw-bold text-capitalize" href="register">create a new account ?</a>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
</main>

  <?php
  require_once APPROOT . '/views/include/footer.php';
  ?>
