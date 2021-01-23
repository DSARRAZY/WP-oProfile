<nav class="main-menu main-menu--hidden">
    <div class="close-button"><i class="fas fa-times"></i></div>
    <ul>
        <?php foreach (getMainMenuItems() as $menuItem) : ?>
            <li class="main-menu__item"><a href="<?php echo $menuItem->url; ?>"><?php echo $menuItem->title; ?></a></li>
            <!-- <li class="main-menu__item"><a href="javascript:void(0)">Blog</a></li>
            <li class="main-menu__item"><a href="javascript:void(0)">Projects</a></li>
            <li class="main-menu__item"><a href="javascript:void(0)">Examples</a></li>
            <li class="main-menu__item"><a href="javascript:void(0)">Contact</a></li> -->
        <?php endforeach; ?>
    </ul>
</nav>