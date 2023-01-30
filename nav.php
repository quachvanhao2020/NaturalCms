<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
        <?php foreach ($menus as $key => $value) { $hassub = count($value['sub']) > 0;?>
        <li class="nav-item <?= $hassub ? "has-submenu" : "" ?>">
            <?php if(!$hassub){?>
            <a class="nav-link <?= @$menu == $value['key'] ? "active" : "" ?>" href="<?= $value['href'] ?>">
                <span class="nav-icon">
                    <i class="<?= isset($value['icon']) ? $value['icon'] : "fa-regular fa-folder" ?>"></i>
                </span>
                <span class="nav-link-text"><?= __($value['key']) ?></span>
            </a>
            <?php };?>
            <?php if($hassub){?>
            <a class="nav-link submenu-toggle <?=  @$menu == $value['key'] ? "active" : "" ?>" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-<?= $value['key'] ?>" aria-expanded="false">
                <span class="nav-icon">
                    <i class="<?= isset($value['icon']) ? $value['icon'] : "fa-regular fa-folder" ?>"></i>
                </span>
                <span class="nav-link-text"><?= __($value['key']) ?></span>
                <span class="submenu-arrow">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                    </svg>
                </span>
            </a>
            <div id="submenu-<?= $value['key'] ?>" class="collapse submenu submenu-<?= $value['key'] ?> <?= @$menu == $value['key'] ? "show" : "" ?>" data-bs-parent="#menu-accordion">
                <ul class="submenu-list list-unstyled">
                    <?php foreach ($value['sub'] as $k1 => $v1) { ?>
                    <li class="submenu-item"><a class="submenu-link <?= @$submenu == $v1['key'] ? "active" : "" ?>" href="<?= $v1['href'] ?>"><?= __($v1['key']) ?></a></li>
                    <?php };?>
                </ul>
            </div>
            <?php };?>
        </li>
        <?php };?>
    </ul>
</nav>