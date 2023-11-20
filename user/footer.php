<?php require_once __DIR__ . '../../shafy/logics/config/global.php';
require_once __DIR__ . '../../shafy/logics/libs/data.php';
// $cities = getCities();
$categories = getCategories(); ?>
<div class="footer">
    <div class="container">
        <div class="footer__header" data-animated>
            <div class="footer__header-left"><a href="./index.php" class="footer__brand"><img alt="SportEase"
                        src="..//shafy/img/sportease.png"></a>
                <p class="footer__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Magna sed tortor
                    nullam vel velit quis enim et amet.</p>
                <div class="footer__socmed-list"><a href="#" class="footer__socmed-link"><img alt="SportEase Facebook"
                            src="..//shafy/img/icons/facebook.png" class="footer__socmed-img"></a><a href="#"
                        class="footer__socmed-link"><img alt="SportEase Twitter" src="..//shafy/img/icons/twitter.png"
                            class="footer__socmed-img"></a><a href="#" class="footer__socmed-link"><img
                            alt="SportEase Instagram" src="..//shafy/img/icons/instagram.png"
                            class="footer__socmed-img"></a><a href="#" class="footer__socmed-link"><img
                            alt="SportEase LinkedIn" src="..//shafy/img/icons/linkedin-in.png"
                            class="footer__socmed-img"></a><a href="#" class="footer__socmed-link"><img
                            alt="SportEase Youtube" src="..//shafy/img/icons/youtube.png" class="footer__socmed-img"></a>
                </div>
            </div>
            <form action="" class="footer__header-right">
                <h3 class="footer__newsletter-title">Subscribe to our newsletter</h3>
                <div class="footer__newsletter-input-group"><input id="newsletter"
                        placeholder="Enter your email address" required type="email"> <label for="newsletter"><img
                            alt="Email" src="..//shafy/img/icons/email.png"></label></div><button
                    class="footer__newsletter-button" data-animated type="submit">Subscribe</button>
            </form>
        </div>
        <hr>
        <div class="footer__body">
            <div class="footer__body-left" data-animated>
                <div class="footer__menu-group">
                    <h3 class="footer__menu-title">Sport Fields</h3>
                    <div class="footer__menu-list">
                        <?php foreach ($categories as $category): ?><a href="./fields.php?category=<?= $category['id'] ?>"
                                class="footer__menu-link">
                                <?= $category['name'] ?>
                                <?= $category['id'] % 3 === 0 ? '<span class="footer__menu-badge">New</span>' : '' ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="footer__menu-group">
                    <h3 class="footer__menu-title">User</h3>
                    <div class="footer__menu-list"><a href="./sports-arenas.php" class="footer__menu-link">Sports
                            arenas</a> <a href="./my-rent.php" class="footer__menu-link">Rental history</a> <a
                            href="./login.php" class="footer__menu-link">Sign in</a> <a href="./register.php"
                            class="footer__menu-link">Sign up</a> <a href="./email-verification.php"
                            class="footer__menu-link">Email verification</a> <a href="./forgot-password.php"
                            class="footer__menu-link">Forgot password</a></div>
                </div>
                <div class="footer__menu-group">
                    <h3 class="footer__menu-title">Partner</h3>
                    <div class="footer__menu-list"><a href="./partner/login.php" class="footer__menu-link">Sign in
                            partner</a> <a href="./partner/register.php" class="footer__menu-link">Sign up partner</a>
                        <a href="./partner/email-verification.php" class="footer__menu-link">Email verification</a> <a
                            href="./partner/forgot-password.php" class="footer__menu-link">Forgot password</a></div>
                </div>
                <div class="footer__menu-group">
                    <h3 class="footer__menu-title">Company</h3>
                    <div class="footer__menu-list"><a href="./about.php" class="footer__menu-link">About SportEase</a>
                        <a href="./error.php?message=Maintenance" class="footer__menu-link">Blog</a> <a href="./faq.php"
                            class="footer__menu-link">FAQ</a> <a href="./contact.php"
                            class="footer__menu-link">Contact</a> <a href="./error.php?message=Maintenance"
                            class="footer__menu-link">Sitemap</a></div>
                </div>
                <div class="footer__menu-group">
                    <h3 class="footer__menu-title">Policy</h3>
                    <div class="footer__menu-list"><a href="./privacy-policy.php" class="footer__menu-link">Privacy
                            policy</a> <a href="./terms-of-service.php" class="footer__menu-link">Terms of service</a>
                        <a href="./disclaimer.php" class="footer__menu-link">Disclaimer</a></div>
                </div>
            </div>
            <!-- <div class="footer__body-right" data-animated>
                <h3 class="footer__menu-title">Explore by city</h3>
                <div class="footer__card-list">
                    <?php for ($i = 0; $i < 3; $i++): ?>
                        <div class="footer__card-item" <?= $i > 0 ? 'data-animated' : '' ?>><img alt="Surabaya"
                                src="..//<?= $cities[$i]['photo'] ?>" class="footer__card-img">
                            <div class="footer__card-body">
                                <h4 class="footer__card-title"><a href="..//fields.php?city=<?= $cities[$i]['id'] ?>">
                                        <?= $cities[$i]['name'] ?>, Indonesia
                                    </a> <i><img alt="See" src="..//shafy/img/icons/arrow-right.png"></i></h4>
                                <p class="footer__card-description">
                                    <?= $cities[$i]['description'] ?>
                                </p>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div> -->
        </div>
        <hr>
        <p class="footer__copyright">Copyright © 2023 SportEase. All Rights Reserved | Designed by <a href="#">Group
                Five</a></p>
    </div>
</div>
<script src="..//shafy/js/script.js"></script>
<script src="..//shafy/js/user/script.js"></script>