    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/img/bg/5.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">//  Welcome to our company</h6>
                            <h1 class="section-title white-color">About Us</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="<?= site_url(); ?>">Home</a></li>
                                <li>About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-120--- pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-left">
                        <img src="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/img/others/6.png" alt="About Us Image">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">Know More About Shop</h6>
                            <h1 class="section-title">Trusted Organic <br class="d-none d-md-block">  Food  Store</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                        </div>
                        <p>sellers who aspire to be good, do good, and spread goodness. We
                                democratic, self-sustaining, two-sided marketplace which thrives
                                on trust and is built on community and quality content.</p>
                        <div class="about-author-info d-flex">
                            <div class="author-name-designation  align-self-center">
                                <h4 class="mb-0">Jerry Henson</h4>
                                <small>/ Shop Director</small>
                            </div>
                            <div class="author-sign">
                                <img src="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/img/icons/icon-img/author-sign.png" alt="#">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->
	<?php $this->load->view(TEMPNAME.'/layouts/footer.php'); ?>
</body>
</html>