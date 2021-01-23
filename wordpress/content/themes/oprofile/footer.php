</main>
    <footer class="footer">
        <div class="footer__info">
            <div class="footer__item">
                <div class="footer__item-icon"><i class="fas fa-envelope"></i></div>
                <div class="footer__item-text">
                    <h3>Email</h3>

                    <p>
                    <?php
                    
                    // https://developer.wordpress.org/reference/functions/get_theme_mod/
                    // permet de récupérer la valeur du setting 'oprofile_theme_footer_email' configurée depuis le Customizer
                    echo get_theme_mod('oprofile_theme_footer_email'); 
                    
                    ?>
                    </p>
                </div>
            </div>
            <div class="footer__item">
                <div class="footer__item-icon"><i class="fas fa-phone-alt"></i></div>
                <div class="footer__item-text">
                    <h3>Téléphone</h3>
                    <p>+33 2 03 04 05 06</p>
                </div>
            </div>
            <div class="footer__item">
                <div class="footer__item-icon"><i class="fas fa-home"></i></div>
                <div class="footer__item-text">
                    <h3>Adresse</h3>
                    <p>55 rue du Faubourg Saint Honoré<br>75008 Paris</p>
                </div>
            </div>
        </div>
        <ul class="footer__links">
            <li class="footer__links__item"><a href="#">A propos de nous</a></li>
            <li class="footer__links__item"><a href="#">Team</a></li>
            <li class="footer__links__item"><a href="#">Jobs</a></li>
            <li class="footer__links__item"><a href="#">Presse</a></li>
            <li class="footer__links__item"><a href="#">Mentions légales</a></li>
            <li class="footer__links__item"><a href="#">FAQ</a></li>
        </ul>
        <div class="footer__social social">
            <ul class="social__links">
                <li>
                    <a href="" class="social__links__item"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                    <a href="" class="social__links__item"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                    <a href="" class="social__links__item"><i class="fab fa-google-plus-g"></i></a>
                </li>
                <li>
                    <a href="" class="social__links__item"><i class="fab fa-instagram"></i></a>
                </li>
                <li>
                    <a href="" class="social__links__item"><i class="fab fa-github"></i></a>
                </li>
            </ul>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>

</html>