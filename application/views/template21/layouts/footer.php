<!-- FOOTER AREA START -->
    <footer class="ltn__footer-area  ">
        <div class="footer-top-area  section-bg-1 plr--5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-5 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-about-widget">
                            <?php if(isset(TEMP_1['HEAD']['TEMP_LOGO']) && TEMP_1['HEAD']['TEMP_LOGO'] != NULL && TEMP_1['HEAD']['TEMP_LOGO'] != "") { ?>
                                <div class="footer-logo mb-10">
                                    <div class="site-logo">
                                        <img src="<?php if(isset(TEMP_1['HEAD']['TEMP_LOGO']) && TEMP_1['HEAD']['TEMP_LOGO'] != NULL && TEMP_1['HEAD']['TEMP_LOGO'] != "") { echo TEMP_1['HEAD']['TEMP_LOGO']; } else { echo ""; } ?>" class="foot-logo-img" alt="Logo">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if(isset(TEMP_1['ABOUT']['desc']) && TEMP_1['ABOUT']['desc'] != NULL && TEMP_1['ABOUT']['desc'] != "") { ?>
                                <p><?php echo TEMP_1['ABOUT']['desc']; ?></p>
                            <?php } ?>
                            <?php if(isset(TEMP_1['SOCIAL']) && TEMP_1['SOCIAL'] != NULL && TEMP_1['SOCIAL'] != "") {  ?>
                            <div class="ltn__social-media mt-20">
                                    <ul>
                                    <?php if(isset(TEMP_1['SOCIAL']) && TEMP_1['SOCIAL'] != NULL && TEMP_1['SOCIAL'] != "") { 
                                    foreach(TEMP_1['SOCIAL'] as $social) { ?>
                                        <li><a href="<?php if(isset($social['link']) && $social['link'] != NULL && $social['link'] != "") { echo $social['link']; } else { echo ""; } ?>" title="<?php if(isset($social['title']) && $social['title'] != NULL && $social['title'] != "") { echo $social['title']; } else { echo ""; } ?>" <?php if(isset($social['attr']) && $social['attr'] != NULL && $social['attr'] != "") { echo $social['attr']; } else { echo ""; } ?>><i class="<?php if(isset($social['icon']) && $social['icon'] != NULL && $social['icon'] != "") { echo $social['icon']; } else { echo ""; } ?>"></i></a></li>
                                        <?php } } ?>
                                </ul>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">Pages</h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="<?= site_url('about-us'); ?>">About Us</a></li>
                                    <li><a href="<?= site_url('product'); ?>">Product</a></li>
                                    <li><a href="<?= site_url('contact-us'); ?>">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-6 col-sm-12 col-12">
                        <div class="footer-widget footer-newsletter-widget">
                            <h4 class="footer-title">Address</h4>
                            <div class="footer-address">
                                <ul>
                                    <?php if(isset(TEMP_1['DETAILS']['TEMP_ADD']) && TEMP_1['DETAILS']['TEMP_ADD'] != NULL && TEMP_1['DETAILS']['TEMP_ADD'] != "") { ?>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-placeholder"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p><?php echo TEMP_1['DETAILS']['TEMP_ADD']; ?></p>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <?php if(isset(TEMP_1['DETAILS']['TEMP_MOB']) && TEMP_1['DETAILS']['TEMP_MOB'] !== NULL && TEMP_1['DETAILS']['TEMP_MOB'] != "") { ?>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-call"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p><a href="tel:<?php echo TEMP_1['DETAILS']['TEMP_MOB']; ?>"><?php echo TEMP_1['DETAILS']['TEMP_MOB']; ?></a></p>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <?php if(isset(TEMP_1['DETAILS']['TEMP_EMAIL']) && TEMP_1['DETAILS']['TEMP_EMAIL'] !== NULL && TEMP_1['DETAILS']['TEMP_EMAIL'] != "") { ?>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-mail"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p><a href="mailto:<?php echo TEMP_1['DETAILS']['TEMP_EMAIL']; ?>"><?php echo TEMP_1['DETAILS']['TEMP_EMAIL']; ?></a></p>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <h5 class="mt-30">We Accept</h5>
                            <img src="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/img/icons/payment-4.png" alt="Payment Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ltn__copyright-area ltn__copyright-2 section-bg-1 border-top  ltn__border-top-2--- plr--5">
            <div class="container-fluid">
                <div class="row">
                    <?php if(isset(TEMP_1['DETAILS']['TEMP_COPYRIGHT']) && TEMP_1['DETAILS']['TEMP_COPYRIGHT'] != NULL && TEMP_1['DETAILS']['TEMP_COPYRIGHT'] != "") { ?>
                        <div class="col-md-6 col-12">
                            <div class="ltn__copyright-design clearfix">
                                <p><?php if(isset(TEMP_1['DETAILS']['TEMP_COPYRIGHT']) && TEMP_1['DETAILS']['TEMP_COPYRIGHT'] != NULL && TEMP_1['DETAILS']['TEMP_COPYRIGHT'] != "") { echo TEMP_1['DETAILS']['TEMP_COPYRIGHT']; } else { echo ""; } ?> <span class="current-year"></span></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if(isset(TEMP_1['FOOTMENU']) && TEMP_1['FOOTMENU'] != NULL && TEMP_1['FOOTMENU'] != "") { ?>
                        <div class="col-md-6 col-12 align-self-center">
                            <div class="ltn__copyright-menu text-right text-end">
                                <ul>
                                    <?php if(isset(TEMP_1['FOOTMENU']) && TEMP_1['FOOTMENU'] != NULL && TEMP_1['FOOTMENU'] != "") { 
                                        foreach(TEMP_1['FOOTMENU'] as $footmenu) { ?>
                                        <li><a href="<?php if(isset($footmenu['link']) && $footmenu['link'] != NULL && $footmenu['link'] != "") { echo $footmenu['link']; } else { echo ""; } ?>" <?php if(isset($footmenu['attr']) && $footmenu['attr'] != NULL && $footmenu['attr'] != "") { echo $footmenu['attr']; } else { echo ""; } ?>><?php if(isset($footmenu['title']) && $footmenu['title'] != NULL && $footmenu['title'] != "") { echo $footmenu['title']; } else { echo ""; } ?></a></li>
                                    <?php } } ?>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <input type="hidden" id="site_url" name="site_url" value="<?= site_url(); ?>" />
        <input type="hidden" id="base_url" name="base_url" value="<?= base_url(); ?>" />
        <input type="hidden" id="TempName" name="TempName" value="<?= TEMPNAME; ?>" />
        <?php
            $customerId = isset($_SESSION['login_data']['customer_id']) ? $_SESSION['login_data']['customer_id'] : 0;
            $cartId = isset($_SESSION['cartId']) ? $_SESSION['cartId'] : '';
        ?>
        <input type="hidden" name="custId" id="custId" value="<?= $customerId; ?>" />
        <input type="hidden" name="cartId" id="cartId" value="<?= $cartId; ?>" />
    </footer>
    <!-- FOOTER AREA END -->

    <!-- MODAL AREA START (Sign In Modal) -->
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="sign_in_modal" tabindex="-1" style="z-index:9999;">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="section-title text-center mb-20">
                                    <span class="span-bg">Sign In</span>
                                    <!-- <h4 class="mt-20 mb-20">Sign In to Your Account!</h4> -->
                                </div>
                                <form method="post" id="signin-form" name="signin-form" autocomplete="off">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Username <span class="error">*</span></label>
                                                <input type="text" name="username" id="username" placeholder="Enter your username" class="form-control" value="<?php if($this->input->cookie('username', TRUE) && $this->input->cookie('rememberme', TRUE) ? print_r(base64_decode($this->input->cookie('username', TRUE))) : print_r("") )?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label id="email-label">Password <span class="error">*</span></label>
                                                <input type="password" name="password" id="password" placeholder="Enter your password" class="form-control" value="<?php if($this->input->cookie('password', TRUE) && $this->input->cookie('rememberme', TRUE) ? print_r(base64_decode($this->input->cookie('password', TRUE))) : print_r("") )?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- <div class="col-md-6">
                                            <button type="submit" id="submit" class="btn btn-primary btn-block">Sign In</button>
                                        </div> -->
                                        <div class="col-lg-5 col-sm-5 form-condition">
                                            <div class="agree-label">
                                                <input type="checkbox" id="chb2" name="rememberme" <?php if($this->input->cookie('rememberme', TRUE) ? print_r('checked') : print_r("") )?> >
                                                <label for="chb2">
                                                    <b>Remember Me</b>
                                                </label>
                                                <input type="hidden" id="remembermechecker" name="remembermechecker" value="<?php if($this->input->cookie('rememberme', TRUE) ? print_r('true') : print_r('false') )?>"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-sm-7">
                                            <p class="account-desc float-right"><b>
                                                Login as Guest?
                                                <a href="javascript:void(0)" title="Sign Up" data-bs-toggle="modal" data-bs-target="#guest_sign_in_modal" data-bs-dismiss="modal">Guest Sign In</a></b>
                                            </p>
                                        </div>
                                        <div class="col-lg-12 col-md-12 text-center mt-10 mb-20">
                                            <button type="submit" class="theme-btn-1 default-btn" id="signInBtn">
                                                <b>Sign In Now</b>
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <p class="account-desc text-center mb-10"><b>
                                                Not a member?
                                                <a href="javascript:void(0)" title="Sign Up" data-bs-toggle="modal" data-bs-target="#sign_up_modal" data-bs-dismiss="modal">Sign Up</a></b>
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 mt-30">
                                            <a class="forget" href="javascript:void(0)" title="Forgot Password" data-bs-toggle="modal" data-bs-target="#fotgot_password_modal" data-bs-dismiss="modal"><b>Forgot Password?</b></a>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 mt-30">
                                            <a class="forget float-right" href="javascript:void(0)" title="Forgot Username" data-bs-toggle="modal" data-bs-target="#fotgot_username_modal" data-bs-dismiss="modal"><b>Forgot Username?</b></a>
                                        </div>
                                    </div>

                                </form>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Sign Up Modal) -->
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="sign_up_modal" tabindex="-1" style="z-index:9999;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="section-title text-center mb-20">
                                    <span class="span-bg">Sign Up</span>
                                    <!-- <h4 class="mt-20 mb-20">Sign In to Your Account!</h4> -->
                                </div>
                                <form id="signup-form" name="signup-form" method="post" autocomplete="off">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Salutation <span class="error">*</span></label>
                                                <select class="form-control nice-select list" name="salutation" id="salutation" required="">
                                                    <option value="">Select Salutation</option>
                                                    <option value="Mr.">Mr.</option>
                                                    <option value="Mrs.">Mrs.</option>
                                                    <option value="Miss.">Miss.</option>
                                                    <option value="Ms.">Ms.</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>First Name <span class="error">*</span></label>
                                                <input type="text" name="first_name" id="first_name" placeholder="Enter your first name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Last Name <span class="error">*</span></label>
                                                <input type="text" name="last_name" id="last_name" placeholder="Enter your last name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Email <span class="error">*</span></label>
                                                <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Mobile Number <span class="error">*</span></label>
                                                <input type="text" name="mobile[main]" id="mobile" placeholder="Enter your mobile number" class="form-control" onkeypress="return isNumber(event)" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Username <span class="error">*</span></label>
                                                <input type="text" name="signup_username" id="signup_username" placeholder="Enter your username" class="form-control" onkeydown="restrictSpaces(event)" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label id="email-label">Password <span class="error">*</span></label>
                                                <input type="password" name="sign_password" id="sign_password" placeholder="Enter your password" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label id="email-label">Password <span class="error">*</span></label>
                                                <input type="password" name="conf_password" id="conf_password" placeholder="Enter your confirm password" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 text-center mt-10 mb-20">
                                            <button type="submit" class="theme-btn-1 default-btn" id="signUpSubmitBtn">
                                                <b>Sign Up</b>
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <p class="account-desc text-center mt-10">
                                                <b>
                                                    Already have an account?
                                                    <a href="javascript:void(0)" title="Sign In" data-bs-toggle="modal" data-bs-target="#sign_in_modal" data-bs-dismiss="modal">Sign In</a>
                                                </b>
                                            </p>
                                        </div>
                                    </div>

                                </form>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Guest Login Modal) -->
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="guest_sign_in_modal" tabindex="-1" style="z-index:9999;">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item" id="guestModalForm">
                                <div class="section-title text-center mb-20">
                                    <span class="span-bg">Guest Sign In</span>
                                    <h4 class="mt-20 mb-20">Sign In as a Guest User!</h4>
                                </div>
                                <form method="post" id="guest-login-form" name="guest-login-form" autocomplete="off">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Mobile Number <span class="error">*</span></label>
                                                <input type="text" name="guest_mobile[main]" id="guest_mobile" class="form-control" placeholder="Enter your mobile number" onkeypress="return isNumber(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 text-center mt-10 mb-20">
                                            <button type="submit" class="theme-btn-1 default-btn" id="guestSignInBtn">
                                                <b>Request OTP</b>
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <p class="account-desc text-center mb-10"><b>
                                                Not a member?
                                                <a href="javascript:void(0)" title="Sign Up" data-bs-toggle="modal" data-bs-target="#sign_up_modal" data-bs-dismiss="modal">Sign Up</a></b>
                                            </p>
                                        </div>
                                    </div>

                                </form>
                             </div>

                             <div class="modal-product-item d-none" id="OTPModalForm">
                                <div class="section-title text-center mb-20">
                                    <span class="span-bg">OTP Verification</span>
                                    <h5 class="mt-20 mb-20">Please enter the OTP sent to <a href="javascript:void(0);" id="number">+919527276077</a>. <a href="javascript:void(0)" title="Change Number" class="txt-underline" id="changeNumber"><b>Change Number</b></a></h5>
                                </div>
                                <form method="post" id="otp-verify-form" class="otp-verify-form" name="otp-verify-form">
                                    <div class="row">
                                        <div class="col-lg-12 mb-20">
                                            <div class="form-group">
                                                <div class="otp-field mt-10">
                                                    <input type="number" id="otp1" name="otp1" maxlength="1" />
                                                    <input type="number" id="otp2" name="otp2" maxlength="1" disabled />
                                                    <input type="number" id="otp3" name="otp3" maxlength="1" disabled />
                                                    <input type="number" id="otp4" name="otp4" maxlength="1" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 text-center mt-10">
                                            <button type="submit" class="theme-btn-1 default-btn" id="otpBtn">
                                                <b>Verify</b>
                                            </button>
                                            <p class="resend text-muted mt-20">
                                                Didn't receive code? <a href="javascript:void(0)" class="txt-underline" id="requestOTPAgain">Request again</a>
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p class="account-desc text-center mt-20 mb-0"><b>
                                                Not a member?
                                                <a href="javascript:void(0)" title="Sign Up" data-bs-toggle="modal" data-bs-target="#sign_up_modal" data-bs-dismiss="modal">Sign Up</a></b>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Forgot username Modal) -->
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="fotgot_username_modal" tabindex="-1" style="z-index:9999;">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="section-title text-center mb-20">
                                    <span class="span-bg">Reset Username</span>
                                </div>
                                <form method="post" id="forgot-username-form" name="forgot-username-form" autocomplete="off">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email <span class="error">*</span></label>
                                                <input type="text" name="f_email" id="f_email" class="form-control" placeholder="Enter your email" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 text-center mt-10 mb-20">
                                            <button type="submit" class="theme-btn-1 default-btn" id="forgotEmailBtn">
                                                <b>Reset</b>
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <p class="account-desc text-center mb-10"><b>
                                                Not a member?
                                                <a href="javascript:void(0)" title="Sign Up" data-bs-toggle="modal" data-bs-target="#sign_up_modal" data-bs-dismiss="modal">Sign Up</a></b>
                                            </p>
                                        </div>
                                    </div>

                                </form>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Forgot Password Modal) -->
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="fotgot_password_modal" tabindex="-1" style="z-index:9999;">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item" id="forgotPassModalForm">
                                <div class="section-title text-center mb-20">
                                    <span class="span-bg">Reset Password</span>
                                </div>
                                <form method="post" id="forgot-password-form" name="forgot-password-form" autocomplete="off">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Username <span class="error">*</span></label>
                                                <input type="text" name="f_username" id="f_username" class="form-control" placeholder="Enter your username" onkeydown="restrictSpaces(event)" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 text-center mt-10 mb-20">
                                            <button type="submit" class="theme-btn-1 default-btn" id="forgotPassBtn">
                                                <b>Reset</b>
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <p class="account-desc text-center mb-10"><b>
                                                Not a member?
                                                <a href="javascript:void(0)" title="Sign Up" data-bs-toggle="modal" data-bs-target="#sign_up_modal" data-bs-dismiss="modal">Sign Up</a></b>
                                            </p>
                                        </div>
                                    </div>

                                </form>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Quick View Modal) -->
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="quick_view_modal" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="loading"></div>
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-img">
                                            <!-- <img src="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/img/product/4.png" alt="Product Image" id="prdImg"> -->
                                            <img src="" alt="Product Image" id="prdImg">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-info">
                                            <!-- <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                    <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                </ul>
                                            </div> -->
                                            <h3 id="prdTitle"></h3>
                                            <div class="product-price">
                                                <span id="prdPrice"></span>
                                                <del id="prdDelMRP"></del>
                                                <input type="hidden" value="" name="prdPrice">
                                                <input type="hidden" value="" name="prdDelMRP">
                                                <input type="hidden" value="" name="updatedPrdPrice">
                                                <input type="hidden" value="" name="updatedPrdDelMRP">
                                                <input type="hidden" value="" name="prdCurrency">
                                            </div>
                                            <div class="modal-product-meta ltn__product-details-menu-1">
                                                <ul>
                                                    <li>
                                                        <textarea class="textarea" id="prdInstruction" name="prdInstruction" placeholder="Enter Instructions" rows="2"></textarea>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__product-details-menu-2">
                                                <ul>
                                                    <li>
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="1" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="theme-btn-1 btn btn-effect-1 quickAddToCart" title="Add to Cart">
                                                        <!-- data-bs-toggle="modal" data-bs-target="#add_to_cart_modal" -->
                                                            <i class="fas fa-shopping-cart"></i>
                                                            <span>ADD TO CART</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- <div class="ltn__product-details-menu-3">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i>
                                                            <span>Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="" title="Compare" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                            <i class="fas fa-exchange-alt"></i>
                                                            <span>Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <hr> -->
                                            <!-- <div class="ltn__social-media">
                                                <ul>
                                                    <li>Share:</li>
                                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                                    
                                                </ul>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Add To Cart Modal) -->
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="add_to_cart_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            <img src="" alt="Product Img" id="cartImg">
                                        </div>
                                         <div class="modal-product-info">
                                            <h5><a href="product-details.html" id="cartTitle"></a></h5>
                                            <p class="added-cart"><i class="fa fa-check-circle"></i>  Successfully added to your Cart</p>
                                            <div class="btn-wrapper">
                                                <a href="cart.html" class="theme-btn-1 btn btn-effect-1 h-37">View Cart</a>
                                                <a href="checkout.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                            </div>
                                         </div>
                                         <!-- additional-info -->
                                         <div class="additional-info d-none">
                                            <p>We want to give you <b>10% discount</b> for your first order, <br>  Use discount code at checkout</p>
                                            <div class="payment-method">
                                                <img src="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/img/icons/payment.png" alt="#">
                                            </div>
                                         </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->
</div>
<!-- Body main wrapper end -->    
    <!-- preloader area start -->
    <div class="preloader d-none" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->
    <!-- All JS Plugins -->
    <script src="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/js/main.js"></script>
    <!-- sweetalert2 JS -->
    <script src="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/js/sweetalert2.min.js"></script>
    <!-- jquery validate JS -->
    <script src="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/js/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/js/intlTelInput.min.js"></script>  
    <!-- App Common Custom JS -->
    <script src="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/js/app-custom.js"></script>
    <script>
        $(function() {
            // var custId = $("#custId").val();
            var custId = '<?php if(!empty($_SESSION['login_data']) && isset($this->session->userdata('login_data')['customer_id'])) { echo $this->session->userdata('login_data')['customer_id']; } ?>';

            if($.trim(custId) !== "" && custId !== null && typeof custId !== 'undefined') {
                $("#signInBtn1").hide();
                $("#myAccBtn").removeClass('d-none');
            } else {
                $("#myAccBtn").addClass('d-none');
                $("#signInBtn1").show();
            }
        });
        var phone_number = window.intlTelInput(document.querySelector("#mobile"), {
            separateDialCode: true,
            preferredCountries:['IN', 'US', 'UK'],
            hiddenInput: "full",
            utilsScript: "<?= base_url(); ?>assets/<?= TEMPNAME; ?>/js/utils.js"
        });

        var phone_number1 = window.intlTelInput(document.querySelector("#guest_mobile"), {
            separateDialCode: true,
            preferredCountries:['IN', 'US', 'UK'],
            hiddenInput: "full",
            utilsScript: "<?= base_url(); ?>assets/<?= TEMPNAME; ?>/js/utils.js"
        });

        function restrictSpaces(event) {
            if (event.keyCode === 32) {
                event.preventDefault();
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const otpInputs = document.querySelectorAll('.otp-field input');
            
            otpInputs.forEach(function (input, index) {
                input.addEventListener('input', function () {
                    if (input.value && index < otpInputs.length - 1) {
                        otpInputs[index + 1].removeAttribute('disabled');
                        otpInputs[index + 1].focus();
                    }
                });

                input.addEventListener('keydown', function (e) {
                    if (e.key === 'Backspace' && index > 0 && !input.value) {
                        otpInputs[index - 1].focus();
                    }
                });
            });
            
            // Focus on the first input by default
            otpInputs[0].focus();
        });
    </script>