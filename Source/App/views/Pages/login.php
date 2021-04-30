<?php
require_once APPROOT . '/views/include/header.php';
?>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
<!--        <div class="fadeIn first">-->
<!--            <img src="" id="icon" alt="User Icon" />-->
<!--        </div>-->

        <!-- Login Form -->
        <form method="post" action="<?php echo APPROOT . '/models/users_.php'?>">
            <h1 class="title_form">Login form</h1>
            <input type="text" id="login" class="input fadeIn second" name="username" placeholder="login">
            <input type="password" id="password" class="input fadeIn third" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>
</div>
<?php
require_once APPROOT . '/views/include/footer.php';
?>
