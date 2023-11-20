<div class="topbar">
    <div class="container container_partner topbar__container">
        <div class="topbar__left">
            <h1 class="topbar__title"><?= $title ?? '' ?></h1>
            <form action="" class="topbar__search"><label for="search"><img alt="Search" src="../shafy/img/icons/magnifier-gray.png"></label> <input id="search" name="search" placeholder="Search for..." type="search"></form>
        </div>
        <div class="topbar__right"><a class="topbar__notification" href="#"><img alt="Notification" src="../shafy/img/icons/bell.png"></a>
            <div class="topbar__profile"><a class="topbar__profile-toggler" href="javascript:void(0)"><img alt="" src="../<?= $_SESSION['partner_photo'] ?>" class="topbar__profile-img"> <span class="topbar__profile-name"><?= $_SESSION['partner_name'] ?></span><img alt="See" src="../shafy/img/icons/chevron-right-black.png" class="topbar__profile-dropdown-img"></a>
                <div class="topbar__profile-menu-list"><a class="topbar__profile-menu-link" href="./profile.php"><img alt="" src="../shafy/img/icons/person-primary.png"> View profile</a> <a class="topbar__profile-menu-link" href="./change-password.php"><img alt="" src="../shafy/img/icons/lock-primary.png"> Change password</a>
                    <hr class="topbar__profile-menu-divider"><a class="topbar__profile-menu-link" href="./logout.php"><img alt="" src="../shafy/img/icons/arrow-right-primary.png"> Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>