<header class="app-header fixed-top">
    <div class="app-header-inner">
        <div class="container-fluid py-2">
            <div class="app-header-content">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
                                <title>Menu</title>
                                <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="search-mobile-trigger d-sm-none col">
                        <i class="search-mobile-trigger-icon fas fa-search"></i>
                    </div>
                    <div class="app-search-box col">
                        <form class="app-search-form">
                            <input type="text" placeholder="<?= __("search") ?>..." name="search" class="form-control search-input">
                            <button type="submit" class="btn search-btn btn-primary" value="search"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="app-utilities col-auto">
                        <div class="app-utility-item">
                            <a href="settings.php">
                                <i class="fa-solid fa-gear"></i>
                            </a>
                        </div>
                        <div class="app-utility-item app-user-dropdown dropdown">
                            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="<?= $user['logo'] ?>"></a>
                            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                <li><a class="dropdown-item" href="account.php"><?= __("account") ?></a></li>
                                <li><a class="dropdown-item" href="settings.php"><?= __("setting") ?></a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php"><?= __("logout") ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="app-sidepanel" class="app-sidepanel">
        <div id="sidepanel-drop" class="sidepanel-drop"></div>
        <div class="sidepanel-inner d-flex flex-column">
            <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
            <div class="app-branding">
                <a class="app-logo" href="index.php"><img class="logo-icon me-2" src="<?= @$user['logo'] ?>" alt="logo"><span class="logo-text"><?= @$setting['name'] ?></span></a>
            </div>
            <?php include __DIR__."/nav.php" ?>
            <div class="app-sidepanel-footer">
                <?php include __DIR__."/nav-footer.php" ?>
            </div>
        </div>
    </div>
</header>
