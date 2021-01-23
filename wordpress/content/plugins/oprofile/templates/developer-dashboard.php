<?php get_header(); ?>
<main>
    <section>
        <h2 class="section-title">Mon profil</h2>
        <form style="color:black;padding:0 2em;" method="post">
            <div style="margin:2em;">
                <label>Prénom</label>
                <input type="text" name="user_firstname" placeholder="Prénom" value="<?= $oProfileCurrentUser->first_name; ?>">
            </div>
            <div style="margin:2em;">
                <label>Nom</label>
                <input type="text" name="user_lastname" placeholder="Nom" value="<?= $oProfileCurrentUser->last_name; ?>">
            </div>
            <div style="margin:2em;">
                <label>Pseudo</label>
                <input type="text" name="user_username" placeholder="Pseudo" value="<?= $oProfileCurrentUser->nickname; ?>">
            </div>
            <div style="margin:2em;">
                <label>Email</label>
                <input type="email" name="user_email" placeholder="Email" value="<?= $oProfileCurrentUser->user_email; ?>">
            </div>
            <div style="margin:2em;">
                <label>Biographie</label>
                <textarea name="user_bio" cols="30" rows="10 placeholder=" Biographie"><?= $oProfileCurrentUser->description; ?></textarea>
            </div>
            <div style="margin:2em;">
                <label>URL du site</label>
                <input type="text" name="user_url" placeholder="http://...." value="<?= $oProfileCurrentUser->user_url; ?>">
            </div>
            <div style="margin:2em;">
                <label>URL Github</label>
                <input type="text" name="user_github_url" placeholder="http://...." value="<?= get_user_meta($oProfileCurrentUser->ID, 'github_url', true) ?>">
            </div>

            <button class="ui button" type="submit">Sauvegarder les modifications</button>
        </form>
    </section>
</main>
<?php get_footer(); ?>