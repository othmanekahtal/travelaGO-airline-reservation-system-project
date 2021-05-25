<header>
    <nav class="d-flex justify-content-between align-items-center">
        <div class="logo rounded-circle">
            <a href="#">
                <img src="<?php echo URLROOT . '/Assets/images/logo.png' ?>" alt="logo">
            </a>
        </div>
        <form class="search-box">
            <input type="text" placeholder="search" class="search-box__input">
            <button class="btn search-box__btn">
                <i class="search-box__btn__icon bi bi-search"></i>
            </button>
        </form>
        <div class="profile position-relative overflow-hidden">
            <div class="profile__profile justify-content-center d-flex align-items-center">
                <div class="profile__image rounded-circle justify-content-center d-flex align-items-center">
                    <img src="<?php echo URLROOT . '/Assets/images/' . strtolower($_SESSION['user_role']) . '.jpg' ?>"
                         alt="profile">
                </div>
                <div class="caret--icon">
                    <i class="bi bi-caret-down-fill"></i>
                    <!-- <i class="bi bi-caret-up-fill"></i> -->
                </div>
            </div>
            <div class="position-absolute list-group profile__options">
                <a href="#" class="list-group-item list-group-item-action">
                    profile
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    Setting
                </a>
                <?php
                if ($_SESSION['user_role'] == 'admin') {
                    echo '<a href=' . URLROOT . '/dashboard/user' . ' class="list-group-item list-group-item-action">
                Switch to user
            </a>';
                }
                ?>

            </div>
        </div>
    </nav>
</header>
