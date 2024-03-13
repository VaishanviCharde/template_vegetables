$(function() {

    $('#sign_up_modal').on('show.bs.modal', function() {
        // Reset the form fields
        $('#signup-form')[0].reset();

        // Reset the validation errors and remove error classes
        $('form[name="signup-form"]').validate().resetForm();
        $('form[name="signup-form"] .error-form-field').removeClass('error-form-field');
    });

    // Sign Up Action
    $("form[name='signup-form']").validate({
        ignore: "#salutation [value='']",
        rules: {
            salutation: {
                required: true
            },
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            "mobile[main]": {
                required: true,
                number: true,
                minlength: 10
            },
            signup_username: {
                required: true
            },
            sign_password: {
                required: true,
                minlength: 8
            },
            conf_password: {
                required: true,
                minlength: 8,
                equalTo: "#sign_password"
            }
        },
        messages: {
            salutation: {
                required: "Please select your salutation"
            },
            first_name: {
                required: "Please enter your first name"
            },
            last_name: {
                required: "Please enter your last name"
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email"
            },
            "mobile[main]": {
                required: "Please enter your mobile number",
                number: "Please enter a valid number",
                minlength: "Mobile number must be at least 10 digits long"
            },
            signup_username: {
                required: "Please enter your username"
            },
            sign_password: {
                required: "Please enter a password",
                minlength: "Password must be at least 8 characters long"
            },
            conf_password: {
                required: "Please enter the confirmation password",
                minlength: "Password must be at least 8 characters long",
                equalTo: "Passwords do not match"
            }
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "password") {
                error.insertAfter(element.parent());
            } if (element.attr("name") === "salutation") {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
            if (error) {
                $(".iti__selected-flag").css('height', '62%');
                element.addClass("error-form-field");
            } else {
                $(".iti__selected-flag").css('height', '100%');
                element.removeClass("error-form-field");
            }

            // if($("#salutation").val() != "") {
            //     $("#salutation-error").css('display', 'none')
            // }
        },
        submitHandler: function(form) {
            var site_url = $("#site_url").val();
            $("#signUpSubmitBtn").html('Sign Up &nbsp; <i class="fa fa-spinner fa-spin"></i>');
            $("#signUpSubmitBtn").prop('disabled', true);

            var formData = $(form).serialize();
            $.ajax({
                url: site_url+"sign-up-action",  
                type: "post", 
                dataType: 'json',
                data: formData,
                success:function(response){
                    if(response.success == 1) {
                        $(form).trigger("reset");
                        $("#signUpSubmitBtn").html('Sign Up');
                        $("#signUpSubmitBtn").prop("disabled", false);
                        $('#sign_up_modal').modal('hide');
                        $('#sign_in_modal').modal('show');
                        Swal.fire({
                            toast: true,
                            text: response.message,
                            icon: 'success',
                            showCloseButton: true,
                            position: 'bottom',
                            timer: 5000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    } else {
                        $("#signUpSubmitBtn").html('Sign Up');
                        $("#signUpSubmitBtn").prop("disabled", false);
                        Swal.fire({
                            toast: true,
                            text: response.message,
                            icon: 'error',
                            showCloseButton: true,
                            position: 'bottom',
                            timer: 5000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(xhr, status, error) {
                    $("#signUpSubmitBtn").html('Sign Up');
                    $("#signUpSubmitBtn").prop("disabled", false);
                    Swal.fire({
                        toast: true,
                        text: 'Could not reach server, please try again later.  - '+error,
                        icon: 'error',
                        showCloseButton: true,
                        position: 'bottom',
                        timer: 5000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });
                }
            });
        },
        focusInvalid: true,
    });

    $('#sign_in_modal').on('show.bs.modal', function() {
        var remembermechecker = $("#remembermechecker").val();
        if(remembermechecker != true) {
            // Reset the form fields
            $('#signin-form')[0].reset();

            // Reset the validation errors and remove error classes
            $('form[name="signin-form"]').validate().resetForm();
            $('form[name="signin-form"] .error-form-field').removeClass('error-form-field');
        }
    });

    // Sign In Action   
    $("form[name='signin-form']").validate({
        rules: {
            username: {
                required: true
            },
            password: {
                required: true,
                minlength: 8
            }
        },
        messages: {
            username: {
                required: "Please enter your username"
            },
            password: {
                required: "Please enter a password",
                minlength: "Password must be at least 8 characters long"
            }
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element);
            if (element.attr("name") === "password") {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
            if (error) {
                element.addClass("error-form-field");
            } else {
                element.removeClass("error-form-field");
            }
        },
        submitHandler: function(form) {
            var site_url = $("#site_url").val();
            $("#signInBtn").html('<b>Sign In Now &nbsp; <i class="fa fa-spinner fa-spin"></i></b>');
            $("#signInBtn").prop('disabled', true);

            var formData = $(form).serialize();
            $.ajax({
                url: site_url+"sign-in-action",  
                type: "post", 
                dataType: 'json',
                data: formData,
                success:function(response){
                    console.log(response);
                    if(response.success == 1) {
                        $(form).trigger("reset");
                        $('#custId').val(response.customer_id);
                        $("#loginUsername").html(response.customer_name);
                        $('#sign_in_modal').modal('hide');
                        $("#signInBtn").prop("disabled", false);
                        $("#signInBtn").html('<b>Sign In Now</b>');
                        $("#signInBtn1").addClass('d-none');
                        $("#myAccBtn").removeClass('d-none');
                        Swal.fire({
                            toast: true,
                            text: response.message,
                            icon: 'success',
                            showCloseButton: true,
                            position: 'bottom',
                            timer: 5000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    } else {
                        $("#signInBtn").prop("disabled", false);
                        $("#signInBtn").html('<b>Sign In Now</b>');
                        Swal.fire({
                            toast: true,
                            text: response.message,
                            icon: 'error',
                            showCloseButton: true,
                            position: 'bottom',
                            timer: 5000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(xhr, status, error) {
                    $("#signInBtn").prop("disabled", false);
                    $("#signInBtn").html('<b>Sign In Now</b>');
                    Swal.fire({
                        toast: true,
                        text: 'Could not reach server, please try again later.  - '+error,
                        icon: 'error',
                        showCloseButton: true,
                        position: 'bottom',
                        timer: 5000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });
                }
            });
        }
    });

    $('#guest_sign_in_modal').on('show.bs.modal', function() {
        // Reset the form fields
        $('#guest-login-form')[0].reset();

        // Reset the validation errors and remove error classes
        $('form[name="guest-login-form"]').validate().resetForm();
        $('form[name="guest-login-form"] .error-form-field').removeClass('error-form-field');
    });

    // Guest Login Action
    $("form[name='guest-login-form']").validate({
        rules: {
            "guest_mobile[main]": {
                required: true,
                number: true,
                minlength: 10
            }
        },
        messages: {
            "guest_mobile[main]": {
                required: "Please enter your mobile number",
                number: "Please enter a valid number",
                minlength: "Mobile number must be at least 10 digits long"
            }
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element);
            if (error) {
                $(".iti__selected-flag").css('height', '62%');
                element.addClass("error-form-field");
            } else {
                $(".iti__selected-flag").css('height', '100%');
                element.removeClass("error-form-field");
            }
        },
        submitHandler: function(form) {
            $(".iti__selected-flag").css('height', '100%');
            var site_url = $("#site_url").val();
            $("#guestSignInBtn").html('<b>Request OTP &nbsp; <i class="fa fa-spinner fa-spin"></i></b>');
            $("#guestSignInBtn").prop('disabled', true);

            var formData = $(form).serialize();
            $.ajax({
                url: site_url+"guest-signin-action",  
                type: "post", 
                dataType: 'json',
                data: formData,
                success:function(response){
                    if(response.success == 1) {
                        $(form).trigger("reset");
                        $("#number").html(response.guest_mobile);
                        $("#guestSignInBtn").html('<b>Request OTP</b>');
                        $("#guestSignInBtn").prop("disabled", false);
                        $('#guestModalForm').addClass('d-none');
                        $('#OTPModalForm').removeClass('d-none');
                        Swal.fire({
                            toast: true,
                            text: response.message,
                            icon: 'success',
                            showCloseButton: true,
                            position: 'bottom',
                            timer: 5000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    } else {
                        $("#guestSignInBtn").html('<b>Request OTP</b>');
                        $("#guestSignInBtn").prop("disabled", false);
                        Swal.fire({
                            toast: true,
                            text: response.message,
                            icon: 'error',
                            showCloseButton: true,
                            position: 'bottom',
                            timer: 5000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(xhr, status, error) {
                    $("#guestSignInBtn").html('<b>Request OTP</b>');
                    $("#guestSignInBtn").prop("disabled", false);
                    Swal.fire({
                        toast: true,
                        text: 'Could not reach server, please try again later.  - '+error,
                        icon: 'error',
                        showCloseButton: true,
                        position: 'bottom',
                        timer: 5000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });
                }
            });
        }
    });

    // Guest OTP Verification
    $("form[name='otp-verify-form']").validate({
        rules: {
            "otp1": {
                required: true,
            },
            "otp2": {
                required: true,
            },
            "otp3": {
                required: true,
            },
            "otp4": {
                required: true,
            }
        },
        errorPlacement: function (error, element) {
            error.insertAfter('.otp-field');
            if (error) {
                element.addClass("error-form-field");
                $("#otp1-error").css('margin-left', '25%');
                $("#otp2-error").css('margin-left', '25%');
                $("#otp3-error").css('margin-left', '25%');
                $("#otp4-error").css('margin-left', '25%');
            } else {
                element.removeClass("error-form-field");
            }
        },
        submitHandler: function(form) {
            var site_url = $("#site_url").val();
            $("#otpBtn").html('<b>Verify &nbsp; <i class="fa fa-spinner fa-spin"></i></b>');
            $("#otpBtn").prop('disabled', true);
            let otp1 = $("#otp1").val();
            let otp2 = $("#otp2").val();
            let otp3 = $("#otp3").val();
            let otp4 = $("#otp4").val();
            let number = $("#number").html();

            $.ajax({
                url: site_url+"otp-verify-action",  
                type: "post", 
                dataType: 'json',
                data: {otp1:otp1, otp2:otp2, otp3:otp3, otp4:otp4, number:number},
                success:function(response){
                    if(response.success == 1) {
                        $(form).trigger("reset");
                        $('#custId').val(response.customer_id);
                        $("#loginUsername").html(response.customer_name);
                        $('#guest_sign_in_modal').modal('hide');
                        $("#otpBtn").prop("disabled", false);
                        $("#otpBtn").html('<b>Verify</b>');
                        $('#OTPModalForm').addClass('d-none');
                        $("#guestSignInBtn").html('<b>Request OTP</b>');
                        $("#guestSignInBtn").prop("disabled", false);
                        $("#guestModalForm").removeClass('d-none');
                        $("#signInBtn1").addClass('d-none');
                        $("#myAccBtn").removeClass('d-none');
                        Swal.fire({
                            toast: true,
                            text: response.message,
                            icon: 'success',
                            showCloseButton: true,
                            position: 'bottom',
                            timer: 5000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    } else {
                        $("#otpBtn").prop("disabled", false);
                        $("#otpBtn").html('<b>Verify</b>');
                        Swal.fire({
                            toast: true,
                            text: response.message,
                            icon: 'error',
                            showCloseButton: true,
                            position: 'bottom',
                            timer: 5000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(xhr, status, error) {
                    $("#otpBtn").prop("disabled", false);
                    $("#otpBtn").html('<b>Verify</b>');
                    Swal.fire({
                        toast: true,
                        text: 'Could not reach server, please try again later.  - '+error,
                        icon: 'error',
                        showCloseButton: true,
                        position: 'bottom',
                        timer: 5000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });
                }
            });
        }
    });

    // Forgot Password
    $("form[name='forgot-password-form']").validate({
        rules: {
            "f_username": {
                required: true,
            }
        },
        messages: {
            f_username: {
                required: "Please enter your username"
            }
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element);
            if (error) {
                element.addClass("error-form-field");
            } else {
                element.removeClass("error-form-field");
            }
        },
        submitHandler: function(form) {
            var site_url = $("#site_url").val();
            $("#forgotPassBtn").html('<b>Reset &nbsp; <i class="fa fa-spinner fa-spin"></i></b>');
            $("#forgotPassBtn").prop('disabled', true);
            var formData = $(form).serialize();
            $.ajax({
                url: site_url+"forgot-password-action",  
                type: "post", 
                dataType: 'json',
                data: formData,
                success:function(response){
                    if(response.success == 1) {
                        $(form).trigger("reset");
                        $("#forgotPassBtn").prop("disabled", false);
                        $("#forgotPassBtn").html('<b>Reset</b>');
                        $('#fotgot_password_modal').modal('hide');
                        $('#sign_in_modal').modal('show');
                        Swal.fire({
                            toast: true,
                            text: response.message,
                            icon: 'success',
                            showCloseButton: true,
                            position: 'bottom',
                            timer: 5000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    } else {
                        $("#forgotPassBtn").prop("disabled", false);
                        $("#forgotPassBtn").html('<b>Reset</b>');
                        Swal.fire({
                            toast: true,
                            text: response.message,
                            icon: 'error',
                            showCloseButton: true,
                            position: 'bottom',
                            timer: 5000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(xhr, status, error) {
                    $("#forgotPassBtn").prop("disabled", false);
                    $("#forgotPassBtn").html('<b>Reset</b>');
                    Swal.fire({
                        toast: true,
                        text: 'Could not reach server, please try again later.  - '+error,
                        icon: 'error',
                        showCloseButton: true,
                        position: 'bottom',
                        timer: 5000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });
                }
            });
        }
    });

    // Forgot Username
    $("form[name='forgot-username-form']").validate({
        rules: {
            "f_email": {
                required: true,
                email: true
            }
        },
        messages: {
            f_email: {
                required: "Please enter your email",
                email: "Please enter a valid email",
            }
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element);
            if (error) {
                element.addClass("error-form-field");
            } else {
                element.removeClass("error-form-field");
            }
        },
        submitHandler: function(form) {
            var site_url = $("#site_url").val();
            $("#forgotEmailBtn").html('<b>Reset &nbsp; <i class="fa fa-spinner fa-spin"></i></b>');
            $("#forgotEmailBtn").prop('disabled', true);
            var formData = $(form).serialize();
            $.ajax({
                url: site_url+"forgot-username-action",  
                type: "post", 
                dataType: 'json',
                data: formData,
                success:function(response){
                    if(response.success == 1) {
                        $(form).trigger("reset");
                        $("#forgotEmailBtn").prop("disabled", false);
                        $("#forgotEmailBtn").html('<b>Reset</b>');
                        $('#fotgot_username_modal').modal('hide');
                        $('#sign_in_modal').modal('show');
                        Swal.fire({
                            toast: true,
                            text: response.message,
                            icon: 'success',
                            showCloseButton: true,
                            position: 'bottom',
                            timer: 5000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    } else {
                        $("#forgotEmailBtn").prop("disabled", false);
                        $("#forgotEmailBtn").html('<b>Reset</b>');
                        Swal.fire({
                            toast: true,
                            text: response.message,
                            icon: 'error',
                            showCloseButton: true,
                            position: 'bottom',
                            timer: 5000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(xhr, status, error) {
                    $("#forgotEmailBtn").prop("disabled", false);
                    $("#forgotEmailBtn").html('<b>Reset</b>');
                    Swal.fire({
                        toast: true,
                        text: 'Could not reach server, please try again later.  - '+error,
                        icon: 'error',
                        showCloseButton: true,
                        position: 'bottom',
                        timer: 5000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });
                }
            });
        }
    });  

    // Add click event handler to each menu item
    $("#catList").on("click", ".categoryClass", function() {
        // Remove the "active" class from all menu items
        $(".categoryClass").removeClass("active");
        $(".categoryClass").find("i").removeClass("active");

        // Add the "active" class to the clicked menu item
        $(this).addClass("active");
        $(this).find("i").addClass("active"); // Add "active" class to the <i> element
        var catId1 = $(this).attr('my-cat');
        getProductList(catId1);
    });

    // var $activeLi = $('.categoryClass.active');
    // var catId = $activeLi.attr('my-cat');
    // getProductList(catId);

    function getProductList(catId) {
        var site_url = $("#site_url").val();
        var base_url = $("#base_url").val();
        var TEMPNAME = $("#TEMPNAME").val();
        $.ajax({
            url: site_url+"get-products-by-category",  
            type: "post", 
            dataType: 'json',
            data: {catId: catId},
            beforeSend:function () {
                $('#loader').show();
            },
            success:function(response){
                $('#loader').hide();
                console.log("hiii");
                if(response.success == 1) {
                    // $("#productListDiv").html(response.pListHtml);
                    // $("#productListDiv1").html(response.pListHtml1);
                    var productList = response.productList;
                    if(productList.length > 0) {
                        var pListHtml = '';
                        var pListHtml1 = '';
                        for (var i = 0; i < productList.length; i++) {
                            var addedToCart = '';
                            var title= "Add to Cart";
                            var isAdded = 'isAddToCart';
                            if ($.inArray(productList.product_id, response.pIdList)) {
                                addedToCart = 'prd_active';
                                title= "Already In Cart";
                                isAdded = 'isNotAddToCart';
                            }
                            console.log(addedToCart);
                            let product_url = base_url+'assets'+TEMPNAME+'img/product/NoProductImg.png';
                            if(productList[i].product_url != '') {
                                product_url = productList[i].product_url;
                            }
                            let product_name = 'NA';
                            if(productList[i].product_name != '') {
                                product_name = productList[i].product_name;
                            }
                            let isStock = '';
                            if(productList[i].in_stock != true) {
                                isStock = '<div class="product-badge"><ul><li class="sale-badge">Out Off Stock</li></ul></div>';
                            }
                            let price = '0.00';
                            if(productList[i].price != '') {
                                price = productList[i].price;
                            }
                            let MRP = '0.00';
                            if(productList[i].MRP != '') {
                                MRP = productList[i].MRP;
                            }
                            let product_id = btoa(productList[i].product_id);
                            pListHtml += "<div class='col-xl-4 col-sm-6 col-6'><div class='ltn__product-item ltn__product-item-3 text-center'><div class='product-img'><a href='javascript:void(0)'><img src='"+product_url+"' loading='lazy' alt='Product Image' class='pImg'></a>"+isStock+"<div class='product-hover-action'><ul><li class='quick_view_button' data-key="+product_id+"><a href='javascript:void(0)' title='Quick View'><i class='far fa-eye'></i></a></li><li class='add_to_cart "+isAdded+"' data-key='"+btoa(productList[i].product_id)+"' data-price='"+btoa(productList[i].price)+"'><a href='javascript:void(0)' title='"+title+"' class="+addedToCart+"><i class='fas fa-shopping-cart'></i></a></li></ul></div></div><div class='product-info'><h2 class='product-title pTitleHeight'><a href='javascript:void(0)'>"+product_name+"</a></h2><div class='product-price'><span>₹"+price+"</span><del>₹"+MRP+"</del></div></div></div></div>";
                            pListHtml1 += "<div class='col-lg-12'><div class='ltn__product-item ltn__product-item-3'><div class='product-img'><a href='javascript:void(0)'><img src='"+product_url+"' loading='lazy' alt='Product Image'></a>"+isStock+"</div><div class='product-info'><h2 class='product-title'><a href='javascript:void(0)'>"+product_name+"</a></h2><div class='product-price'><span>₹"+price+"</span><del>₹"+MRP+"</del></div><div class='product-brief'><p>"+productList[i].extra+"</p></div><div class='product-hover-action'><ul><li class='quick_view_button' data-key="+product_id+"><a href='javascript:void(0)' title='Quick View'><i class='far fa-eye'></i></a></li><li class='add_to_cart "+isAdded+"' data-key='"+btoa(productList[i].product_id)+"' data-price='"+btoa(productList[i].price)+"'><a href='javascript:void(0)' title='"+title+"' class="+addedToCart+"><i class='fas fa-shopping-cart'></i></a></li></ul></div></div></div></div>";
                        }
                        $("#productListDiv").html(pListHtml);
                        $("#productListDiv1").html(pListHtml1);
                    } else {
                        $("#productListDiv").html('<label class="txt-center">No Listings Available</label>');
                    }
                    // hideLoader();
                } else {
                    $("#productListDiv").html('<label class="txt-center">No Listings Available</label>');
                }
            },
            error: function(xhr, status, error) {
                $('#loader').hide();
                $("#productListDiv").html('<label class="txt-center">No Listings Available</label>');
            }
        });
    }
});

function isNumber(e) {
    var t = (e = e || window.event).which ? e.which : e.keyCode;
    return !(t > 31 && (t < 48 || t > 57));
}

/** Logout Action */
$(".logout-btn").on("click", function() {
    var site_url = $("#site_url").val();

    $.ajax({
        url: site_url+"logout",  
        type: "post", 
        dataType: 'json',
        data: [],
        success:function(response){
            if(response.success == 1) {
                $("#signInBtn1").removeClass('d-none');
                $("#myAccBtn").addClass('d-none');
                $('#custId').val('');
            } else {
                Swal.fire({
                    toast: true,
                    text: 'Service temporarily unavailable, try again later',
                    icon: 'error',
                    showCloseButton: true,
                    position: 'bottom',
                    timer: 5000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                toast: true,
                text: 'Could not reach server, please try again later.  - '+error,
                icon: 'error',
                showCloseButton: true,
                position: 'bottom',
                timer: 5000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        }
    });
});

/** Change Number for login */
$("#changeNumber").on("click", function() {
    $('#guestModalForm').removeClass('d-none');
    $('#OTPModalForm').addClass('d-none');
});

/** Request OTP Again */
$("#requestOTPAgain").on("click", function() {
    var site_url = $("#site_url").val();
    var number = $("#number").html();

    $.ajax({
        url: site_url+"guest-signin-action",  
        type: "post", 
        dataType: 'json',
        data: {number:number},
        success:function(response){
            if(response.success == 1) {
                // $('#guestModalForm').removeClass('d-none');
                // $('#OTPModalForm').addClass('d-none');
                Swal.fire({
                    toast: true,
                    text: response.message,
                    icon: 'success',
                    showCloseButton: true,
                    position: 'bottom',
                    timer: 5000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            } else {
                Swal.fire({
                    toast: true,
                    text: response.message,
                    icon: 'error',
                    showCloseButton: true,
                    position: 'bottom',
                    timer: 5000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                toast: true,
                text: 'Could not reach server, please try again later.  - '+error,
                icon: 'error',
                showCloseButton: true,
                position: 'bottom',
                timer: 5000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        }
    });
});

// Capture scroll position before opening modal
$('.tab-content').on('click', '.quick_view_button', function() {
    var scrollPosition = $(window).scrollTop();
    // Show the modal
    $('#quick_view_modal').modal('show');
    
    // Set the scroll position to the current position to prevent scrolling
    $(window).scrollTop(scrollPosition);
});

$('#quick_view_modal').on('hidden.bs.modal', function () {
    var scrollPosition = $(window).scrollTop();
    $(window).scrollTop(scrollPosition);
});

/** Quick View Appended Html */
$('.tab-content').on('click', '.quick_view_button', function() {
    let prdId = atob($(this).data('key'));
    var site_url = $("#site_url").val();
    var base_url = $("#base_url").val();
    var TempName = $("#TempName").val();

    $('#prdImg').attr('src', base_url+'assets/'+TempName+'/img/grey-bg.jpg');
    $("#prdTitle").html('--');
    $("#prdPrice").html('0.00');
    $("#prdDelMRP").html('0.00');

    $.ajax({
        url: site_url+"get-single-product",  
        type: "post", 
        dataType: 'json',
        data: {prdId:prdId},
        beforeSend:function () {
            $('.loading').show();
        },
        success:function(response){
            $(".loading").hide();
            if(response.success == 1) {
                var prdCur = '$';
                if(response.currency == 'inr' || response.currency == 'INR') {
                    prdCur = '₹';
                }
                var product_url = base_url+'assets/'+TempName+'/img/product/NoProductImg.png';
                if(response.productDetails.product_url != "") {
                    product_url = response.productDetails.product_url;
                }
                $('#prdImg').attr('src', product_url);
                $("#prdTitle").html(response.productDetails.product_name);
                $("#prdPrice").html(prdCur+response.productDetails.price);
                $("#prdDelMRP").html(prdCur+response.productDetails.MRP);
                $("#quick_view_modal").modal('show');
            } else {
                Swal.fire({
                    toast: true,
                    text: response.message,
                    icon: 'error',
                    showCloseButton: true,
                    position: 'bottom',
                    timer: 5000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            }
        },
        error: function(xhr, status, error) {
            $(".loading").hide();
            Swal.fire({
                toast: true,
                text: 'Could not reach server, please try again later.  - '+error,
                icon: 'error',
                showCloseButton: true,
                position: 'bottom',
                timer: 5000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        }
    });
});

/** Quick view Popup */
$(".quick_view_button").on("click", function(){
    
    let prdId = atob($(this).data('key'));
    var site_url = $("#site_url").val();
    var base_url = $("#base_url").val();
    var TempName = $("#TempName").val();

    $('#prdImg').attr('src', base_url+'assets/'+TempName+'/img/grey-bg.jpg');
    $("#prdTitle").html('--');
    $("#prdPrice").html('0.00');
    $("#prdDelMRP").html('0.00');

    $.ajax({
        url: site_url+"get-single-product",  
        type: "post", 
        dataType: 'json',
        data: {prdId:prdId},
        beforeSend:function () {
            $('.loading').show();
        },
        success:function(response){
            $(".loading").hide();
            if(response.success == 1) {
                var prdCur = '$';
                if(response.currency == 'inr' || response.currency == 'INR') {
                    prdCur = '₹';
                }
                var product_url = base_url+'assets/'+TempName+'/img/product/NoProductImg.png';
                if(response.productDetails.product_url != "") {
                    product_url = response.productDetails.product_url;
                }
                $('#prdImg').attr('src', product_url);
                $("#prdTitle").html(response.productDetails.product_name);
                $("#prdPrice").html(prdCur+response.productDetails.price);
                $("#prdDelMRP").html(prdCur+response.productDetails.MRP);
                $("input[name='prdCurrency']").val(prdCur);
                $("input[name='prdPrice']").val(response.productDetails.price);
                $("input[name='prdDelMRP']").val(response.productDetails.MRP);
                $(".quickAddToCart").attr('data-key', btoa(prdId))
                $("input[name='qtybutton']").val(1);
                $("#quick_view_modal").modal('show');
            } else {
                Swal.fire({
                    toast: true,
                    text: response.message,
                    icon: 'error',
                    showCloseButton: true,
                    position: 'bottom',
                    timer: 5000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            }
        },
        error: function(xhr, status, error) {
            $(".loading").hide();
            Swal.fire({
                toast: true,
                text: 'Could not reach server, please try again later.  - '+error,
                icon: 'error',
                showCloseButton: true,
                position: 'bottom',
                timer: 5000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        }
    });
});

/** Add to Cart */
$(document).on("click", ".isAddToCart", function() {
    let $clickedButton = $(this);
    let prdId = atob($(this).data('key'));
    let price = atob($(this).data('price'));
    let site_url = $("#site_url").val();
    let base_url = $("#base_url").val();
    let TempName = $("#TempName").val();
    let custId = $("#custId").val();
    let cartId = $("#cartId").val();
    // $("input[name='qtybutton']").val(1);
    if(custId != '' && cartId != '') {
        $.ajax({
            url: site_url+"add-to-cart",  
            type: "post", 
            dataType: 'json',
            data: {prdId:prdId,price:price,custId:custId,cartId:cartId},
            beforeSend:function () {
                $('.loading').show();
            },
            success:function(response){
                $(".loading").hide();
                if(response.success == 1) {
                    $clickedButton.removeClass('isAddToCart').addClass('isNotAddToCart');
                    $clickedButton.find('a').addClass('prd_active').attr('title', 'Already In Cart');
                    $("#cartCount").html(response.cartCount);

                    alert("hiii");

                    Swal.fire({
                        toast: true,
                        text: response.message,
                        icon: 'success',
                        showCloseButton: true,
                        position: 'bottom',
                        timer: 5000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });
                } else {
                    Swal.fire({
                        toast: true,
                        text: response.message,
                        icon: 'error',
                        showCloseButton: true,
                        position: 'bottom',
                        timer: 5000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });
                }
            },
            error: function(xhr, status, error) {
                $(".loading").hide();
                Swal.fire({
                    toast: true,
                    text: 'Could not reach server, please try again later.  - '+error,
                    icon: 'error',
                    showCloseButton: true,
                    position: 'bottom',
                    timer: 5000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            }
        });

    } else {
        Swal.fire({
            toast: true,
            text: 'Please Login First',
            icon: 'error',
            showCloseButton: true,
            position: 'bottom',
            timer: 5000,
            timerProgressBar: true,
            showConfirmButton: false
        });
    }
});

/** Add to Cart */
$(document).on("click", ".quickAddToCart", function() {
    let $clickedButton = $(this);
    let prdId = atob($(this).data('key'));
    let price = $("input[name='prdPrice']").val();
    let prdInstruction = $("#prdInstruction").val();
    let site_url = $("#site_url").val();
    let base_url = $("#base_url").val();
    let TempName = $("#TempName").val();
    let custId = $("#custId").val();
    let cartId = $("#cartId").val();

    if(custId != '' && cartId != '') {
        $.ajax({
            url: site_url+"add-to-cart",  
            type: "post", 
            dataType: 'json',
            data: {prdId:prdId,price:price,custId:custId,cartId:cartId,prdInstruction:prdInstruction},
            beforeSend:function () {
                $('.loading').show();
            },
            success:function(response){
                $(".loading").hide();
                if(response.success == 1) {
                    $clickedButton.removeClass('isAddToCart').addClass('isNotAddToCart');
                    $clickedButton.find('a').addClass('prd_active').attr('title', 'Already In Cart');
                    $("#cartCount").html(response.cartCount);
                    $("#quick_view_modal").modal('hide');
                    Swal.fire({
                        toast: true,
                        text: response.message,
                        icon: 'success',
                        showCloseButton: true,
                        position: 'bottom',
                        timer: 5000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });
                } else {
                    Swal.fire({
                        toast: true,
                        text: response.message,
                        icon: 'error',
                        showCloseButton: true,
                        position: 'bottom',
                        timer: 5000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });
                }
            },
            error: function(xhr, status, error) {
                $(".loading").hide();
                Swal.fire({
                    toast: true,
                    text: 'Could not reach server, please try again later.  - '+error,
                    icon: 'error',
                    showCloseButton: true,
                    position: 'bottom',
                    timer: 5000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            }
        });

    } else {
        Swal.fire({
            toast: true,
            text: 'Please Login First',
            icon: 'error',
            showCloseButton: true,
            position: 'bottom',
            timer: 5000,
            timerProgressBar: true,
            showConfirmButton: false
        });
    }
});
/** Cart Plus Minus Values */
$(".cart-plus-minus").prepend('<div class="dec qtybutton">-</div>');
$(".cart-plus-minus").append('<div class="inc qtybutton">+</div>');

$(".qtybutton").on("click", function() {
    var $button = $(this);
    var oldValue = parseFloat($button.siblings("input").val());
    let prdPrice = parseFloat($("input[name='prdPrice']").val());
    let prdDelMRP = parseFloat($("input[name='prdDelMRP']").val());
    let prdCurrency = $("input[name='prdCurrency']").val();
    if ($button.text() == "+") {
        var newVal = oldValue + 1;
    } else {
        if (oldValue > 1) {
            var newVal = oldValue - 1;
        } else {
            var newVal = 1;
        }
    }

    var newPrdPrice = newVal * prdPrice;
    var newPrdDelMRP = newVal * prdDelMRP;

    $button.siblings("input").val(newVal);
    $("#prdPrice").text(prdCurrency+newPrdPrice.toFixed(2));
    $("#prdDelMRP").text(prdCurrency+newPrdDelMRP.toFixed(2));

    $("input[name='updatedPrdPrice']").val(newPrdPrice.toFixed(2));
    $("input[name='updatedPrdDelMRP']").val(newPrdDelMRP.toFixed(2)); 
});