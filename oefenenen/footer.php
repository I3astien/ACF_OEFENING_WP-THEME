<?php
?>
</main>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="footer__info text-small">
                    <h3>Algemene info.</h3>

                    <div class="footer__info__item">
                        <strong>Showroom</strong>
                        <p>Peterseliestraat 86, 8000 Brugge</p>
                    </div>

                    <div class="footer__info__item">
                        <strong>Email</strong>
                        <p><a href="mailto:info@sanskriet.be">info@sanskriet.be</a></p>
                    </div>

                    <div class="footer__info__item">
                        <strong>Telefoon</strong>
                        <p><a href="tel:0506167 61">050 61 67 61</a></p>
                    </div>

                    <div class="footer__info__item">
                        <strong>Openingsuren</strong>
                        <p>Di-zat: 10u-12u & 13u30-18u</p>
                    </div>

                    <p>Vrije toegang of op afspraak</p>
                    <p>Eigen gratis parking</p>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="footer__newsletter text-small">
                    <h3>Nieuwste acties van dit moment.</h3>
                    <p>Wil je graag op de hoogte blijven van onze nieuwste acties, toonzaalmodellen en nieuwe modellen
                        in ons assortiment?</p>

                    <h4>Schrijf je nu in.</h4>

                    <form class="newsletter-form">
                        <div class="newsletter-form__group">
                            <label for="voornaam">Voornaam*</label>
                            <input type="text" id="voornaam" name="voornaam" required>
                        </div>

                        <div class="newsletter-form__group">
                            <label for="achternaam">Achternaam*</label>
                            <input type="text" id="achternaam" name="achternaam" required>
                        </div>

                        <div class="newsletter-form__group">
                            <label for="email">Email*</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <p class="newsletter-form__privacy text-small">Sanskriet gebruikt je contactgegevens om je te
                            informeren
                            over onze producten en diensten. Je kunt je altijd afmelden. Zie ons privacybeleid voor
                            afmeldinformatie en details over privacybescherming.</p>

                        <button type="submit" class="btn">Ik wil op de hoogte blijven</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="footer__bottom text-small">
                    <div class="footer__logo">
                        <img src="<?= THEME_URL; ?>/assets/logo.png" alt="<?php bloginfo('name'); ?>">
                    </div>
                    <p class="footer__copyright">© 2025 Sanskriet nv - Disclaimer - Privacy policy & cookies - made by
                        CNIP</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>