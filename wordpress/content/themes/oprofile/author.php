<?php
// wp_get_current_user() renvoie des infos sur l'utilisateur connecté (si user conecté il y a)
// var_dump(wp_get_current_user());
// var_dump($author_name);

$author = get_user_by('slug', $author_name);
// var_dump($author->roles);
if (!in_array('developer', $author->roles)) {
    wp_redirect(get_bloginfo('home'));
}

get_header();

?>

<section class="profile-card">
    <header class="profile-card__header">
        <div class="profile-card__portrait portait" style="background-image: url('https://source.unsplash.com/CZ9AjMGKIFI');"></div>
    </header>

    <div class="profile-card__info">
        <h2><?php echo $author->display_name; ?></h2>
        <ul>
            <li class="profile-card__info__item">
                <div class="profile-card__info__icon"><i class="fas fa-user-graduate"></i></div>
                <div class="profile-card__info__text">DevOps</div>
            </li>
            <li class="profile-card__info__item">
                <div class="profile-card__info__icon"><i class="fas fa-map-marker-alt"></i></div>
                <div class="profile-card__info__text">Paris</div>
            </li>
        </ul>
        <div class="profile-card__info__status profile-card__info__status--available">
            Disponible <i class="fas fa-circle"></i>
        </div>
        <div class="profile-card__info__cta">
            <a href="mailto:<?php echo $author->user_email; ?>" class="button">Me Contacter</a>
        </div>
    </div>

</section>

<?php

// on peut récupérer les articles de l'auteur
// if (have_posts()) : while (have_posts()) : the_post();


//     endwhile;
// endif;

?>


<section>
    <h2 class="section-title">Profil de <?php echo $author->display_name; ?></h2>
    <h3 class="section-title">Biographie</h3>
    <p class="biography"><?php echo $author->user_description; ?></p>
    <div class="customer-quotes">
        <h3 class="section-title customer-quotes__title">Quelques retours des clients</h3>
        <div class="customer-quotes__container carousel">
            <p class="customer-quotes__item carousel__item" data-number="1">Lorem ipsum dolor sit, amet consectetur adipisicing
                elit. Recusandae perspiciatis itaque repellat explicabo inventore magni, ipsa non laboriosam
                molestias vel officiis, minima error architecto. Ad commodi corporis similique? Fugiat, saepe.
            </p>
            <p class="customer-quotes__item carousel__item" data-number="2">Ad accusantium illo reiciendis non quis aliquid
                exercitationem molestiae ipsam, temporibus harum perferendis sit sed minima, qui iste
                praesentium necessitatibus reprehenderit consectetur? Iure consequatur saepe rem minus
                reiciendis. Iusto, temporibus.</p>
            <p class="customer-quotes__item carousel__item" data-number="3">Tenetur voluptate sed mollitia. Labore voluptatem
                doloribus minus ullam impedit beatae id veniam aperiam voluptate temporibus, quas praesentium
                optio? Pariatur doloribus explicabo non enim corrupti voluptatem consequuntur facere impedit
                maxime!</p>
        </div>
        <div class="customer-quotes__nav carousel__nav">
            <!-- <div class="carousel__nav__bar active carousel__nav__button" data-slide-number="0"></div> -->
            <!-- <div class="carousel__nav__bar carousel__nav__button"></div> -->
        </div>
    </div>
</section>
<section>
    <h2 class="section-title">Compétences</h2>
    <div class="skills">

    <?php developer_skills($author->ID); ?>

    </div>
</section>
<section>
    <h2 class="section-title">Mes technos préférées</h2>
    <div class="technolgy-list">
        <article class="technology">
            <img src="assets/images/github-logo.png" alt="Le logo de Github" class="technology__logo">
            <h3 class="technology__title">Company name</h3>
            <p class="technology__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit impedit
                officia
                odit nobis eius, dolorem ex quos porro repudiandae aliquid! Minima sint quisquam non repellendus
                illo exercitationem, eum nam dolor!</p>
        </article>
        <article class="technology">
            <img src="assets/images/github-logo.png" alt="Le logo de Github" class="technology__logo">
            <h3 class="technology__title">Company name</h3>
            <p class="technology__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit impedit
                officia
                odit nobis eius, dolorem ex quos porro repudiandae aliquid! Minima sint quisquam non repellendus
                illo exercitationem, eum nam dolor!</p>
        </article>
        <article class="technology">
            <img src="assets/images/github-logo.png" alt="Le logo de Github" class="technology__logo">
            <h3 class="technology__title">Company name</h3>
            <p class="technology__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit impedit
                officia
                odit nobis eius, dolorem ex quos porro repudiandae aliquid! Minima sint quisquam non repellendus
                illo exercitationem, eum nam dolor!</p>
        </article>
        <article class="technology">
            <img src="assets/images/github-logo.png" alt="Le logo de Github" class="technology__logo">
            <h3 class="technology__title">Company name</h3>
            <p class="technology__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit impedit
                officia
                odit nobis eius, dolorem ex quos porro repudiandae aliquid! Minima sint quisquam non repellendus
                illo exercitationem, eum nam dolor!</p>
        </article>
        <article class="technology">
            <img src="assets/images/github-logo.png" alt="Le logo de Github" class="technology__logo">
            <h3 class="technology__title">Company name</h3>
            <p class="technology__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit impedit
                officia
                odit nobis eius, dolorem ex quos porro repudiandae aliquid! Minima sint quisquam non repellendus
                illo exercitationem, eum nam dolor!</p>
        </article>
    </div>
</section>

<?php

get_footer();
