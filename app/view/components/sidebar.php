<style>
    header section {
        background-color: #fff;
        position: fixed;
        top: 0;
        right: -500px;
        height: 100%;
        display: grid;
        place-items: center;
        width: 500px;
        transition: right .2s ease-in-out;
    }
    
    header section.toggle {
        position: fixed;
        right: 0px;
        /* transition: right .2s ease-in-out; */
    }

    header section #login_form {
        padding: 0 40px;
    }
    header section div {
        position: relative;
    }

    header section #sidebar_form_menu {
        position: absolute;
        height: 75px;
        width: 70px;
        left: -110px;
        top: 50%;
        transform: translate(50%, -50%);
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        box-shadow: -1.5px 1.5px 2px 0px rgba(0, 0, 0, 0.075);
        cursor: pointer;
    }

    header section #visitor_form {
        padding: 0px 40px;
    }

    header section #sidebar_form_menu .fa-xmark {
        display: none;
    }

    header section.toggle #sidebar_form_menu .fa-xmark {
        display: block;
    }

    header section #sidebar_form_menu .fa-headset {
        display: 'd-block';
        color: royalblue;
    }
    header section.toggle #sidebar_form_menu .fa-headset {
        display: none;
    }

    header section #sidebar_form_menu .fa-solid {
        font-size: 25px;
    }

    section form label {
        font-size: 15px;
    }

    section form .form-control {
        height: 50px;
        font-size: 16px;
        border: 1px solid gainsboro;
    }

    section form .form-control:focus {
        border: 1px solid rgb(114, 146, 241);
    }

    #colophon {
        display: none;
    }
    
    #visitor_form {
        padding: 0 40px;
    }

    #logo_icon {
        font-size: 55px;
    }

    #close_sidebar_mobile {
        position: absolute;
        top: 20px;
        right: 20px;
        height: 35px;
        width: 35px;
        cursor: pointer;
        display: none;
    }

    @media (max-width: 768px) {
        header section {
            width: 400px;
            position: fixed;
            top: 0;
            right: -400px;
            height: 100%;
            display: grid;
            place-items: center;
            transition: right .2s ease-in-out;
        }
        header section.toggle {
            position: fixed;
            right: 0px;
        }
        header section #sidebar_form_menu {
            position: absolute;
            height: 65px;
            width: 60px;
            left: -90px;
        }
        section form .form-control {
            height: 45px;
            font-size: 16px;
            border: 1px solid gainsboro;
        }
        header section #login_form {
            padding: 0 30px;
        }
    }

    @media (max-width: 576px) {
        header section {
            width: 350px;
            position: fixed;
            top: 0;
            right: -350px;
            height: 100%;
            display: grid;
            place-items: center;
            transition: right .2s ease-in-out;
        }
        header section #visitor_form {
            padding: 0px 20px;
        }
        header section.toggle {
            position: fixed;
            right: 0px;
        }
        header section #login_form {
            padding: 0 15px;
        }
        header section #sidebar_form_menu {
            position: absolute;
            height: 60px;
            width: 55px;
            left: -80px;
        }
        #logo_icon {
            font-size: 45px;
        }
    }

    @media (max-width: 420px) {
        header section {
            width: 350px;
            position: fixed;
            top: 0;
            right: -350px;
            height: 100%;
            display: grid;
            place-items: center;
            transition: right .2s ease-in-out;
            /* overflow-y: scroll; */
        }
        header section.toggle {
            position: fixed;
            width: 100%;
            right: 0px;
        }
        header section #login_form {
            padding: 0 15px;
        }
        header section #sidebar_form_menu {
            display: none;
            position: absolute;
            height: 60px;
            width: 55px;
            left: -80px;
        }
        #close_sidebar_mobile {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }
        #logo_icon {
            font-size: 35px;
            display: none;
        }
    }

    #input_error_message {
        font-size: 14px;
    }
    
    .custom-loader {
        display: none;
        width: 9px;
        height: 9px;
        background: #FFF;
        border-radius: 50%;
        box-shadow: 18px 0 #F4F4F422,-18px 0 #F4F4F4;
        animation:d5 1s infinite linear alternate;
    }
    @keyframes d5 {
        0% {box-shadow: 18px 0 #F4F4F4,-18px 0 #F4F4F422;background: #F4F4F4}
        33%{box-shadow: 18px 0 #F4F4F4,-18px 0 #F4F4F422;background: #F4F4F422}
        66%{box-shadow: 18px 0 #F4F4F422,-18px 0 #F4F4F4;background: #F4F4F422}
    }
</style>
<?php
    $icon = $data["form_icon"];
    $font_color = $data["form_font_color"];
    $bg_color = $data["form_bg_color"];
?>
<header class="container-sm">
    <section class="shadow-sm" id="sidebar_container" style="z-index: 999; background-color: <?php echo $bg_color; ?>;">
        <div class="position-relative d-flex align-items-center justify-content-center h-100">
            <div class="p-3 position-absolute border rounded" id="close_sidebar_mobile">
                <i class="fa-solid fa-xmark" style="color: <?php echo $font_color; ?>;"></i>
            </div>
            <div id="sidebar_form_menu" class="d-flex align-items-center justify-content-center" style="background-color: <?php echo $bg_color; ?>;">
                <i class="fa-solid fa-xmark" style="color: <?php echo $font_color; ?>;"></i>
                <i class="fa-solid fa-headset" style="color: <?php echo $font_color; ?>;"></i>
            </div>
            <form action="<?= BASE_URL ?>/home" method="post" id="visitor_form" class="w-100">
                <input type="hidden" name="action" value="insert">
                <div class="mb-4 d-flex align-items-center justify-content-center flex-column">
                    <div class="mb-md-5 mb-2">
                        <i class="<?php echo $icon; ?>" id="logo_icon" style="color: <?php echo $font_color; ?>;"></i>
                    </div>
                    <h1 class="h4 mb-md-3 mb-2 fw-bold" style="color: <?php echo $font_color; ?>;">Get In Touch</h1>
                    <small class="text-center" style="color: <?php echo $font_color; ?>">Haven't found what you're looking for? Contact us for more help.</small>
                    <?php echo "" ?? "" ?>
                </div>
                <div class="mb-2">
                    <label for="first_name" class="form-label" style="color: <?php echo $font_color; ?>;">First Name</label>
                    <input type="text" class="form-control w-100 px-3 rounded shadow-none" name="first_name" id="first_name" autocomplete="off" value="">
                    <small id="first_name_error_message" class="text-danger d-none"></small>
                </div>
                <div class="mb-2">
                    <label for="last_name" class="form-label" style="color: <?php echo $font_color; ?>;">Last Name</label>
                    <input type="text" class="form-control w-100 px-3 rounded shadow-none" name="last_name" id="last_name" autocomplete="off" value="">
                    <small id="last_name_error_message" class="text-danger d-none"></small>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label" style="color: <?php echo $font_color; ?>;">Email Address</label>
                    <input type="email" class="form-control w-100 px-3 rounded shadow-none" name="email_address" id="email" autocomplete="off" value="">
                    <small id="email_error_message" class="text-danger d-none"></small>
                </div>
                <div class="mb-3">
                    <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>
                    <small id="recaptcha_error_message" class="mt-1 text-danger d-none"></small>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2 position-relative" style="height: 50px;">
                    <span class="fw-bold" style="letter-spacing: 1px;">Submit</span>
                    <div class="custom-loader position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%);"></div>
                    <i class="fa-solid fa-circle-check d-none position-absolute" style="font-size: 20px; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
                    <i class="fa-solid fa-circle-xmark d-none position-absolute" style="font-size: 20px; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
                </button>
                <div class="mt-3 w-100 d-flex align-items-center justify-content-center">
                    <small class="text-center" id="result_message"></small>
                </div>
            </form>
        </div>
    </section>
</header>
<input type="hidden" id="current_route" value="<?php echo 'http://localhost/wp/wp-content/plugins/techworms/app/controller/form.php'; ?>">
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        
        $("#visitor_form").on("submit", function(event) {
            event.preventDefault();

            const data_form = $(this).serialize()
            let result = {};
            const route = $("#current_route").val();

            const submit_form = $(this).find('button[type="submit"]');

            $(submit_form).prop('disabled', true);
            $(submit_form).find('span').addClass('d-none');
            $(submit_form).find('.custom-loader').show();
            
            $.ajax({
                url: route,
                method: "POST",
                data: data_form,
                success: function(response) {
                    const result_response = JSON.parse(response);

                    // object = passed
                    // string = have an error
                    if (result_response[0] === "form" && !result_response[1]) {
                        grecaptcha.reset()

                        if (typeof result_response[2].first_name === 'string') {
                            $("#first_name").addClass('border border-danger');
                            $("#first_name_error_message").removeClass('d-none').text("* " + result_response[2].first_name);
                        } else {
                            $("#first_name").removeClass('border border-danger');
                            $("#first_name_error_message").addClass('d-none').text("");
                        }
                        if (typeof result_response[2].last_name === 'string') {
                            $("#last_name").addClass('border border-danger');
                            $("#last_name_error_message").removeClass('d-none').text("* " + result_response[2].last_name);
                        } else {
                            $("#last_name").removeClass('border border-danger');
                            $("#last_name_error_message").addClass('d-none').text("");
                        }
                        if (typeof result_response[2].email_address === 'string') {
                            $("#email").addClass('border border-danger');
                            $("#email_error_message").removeClass('d-none').text("* " + result_response[2].email_address);
                        } else {
                            $("#email").removeClass('border border-danger');
                            $("#email_error_message").addClass('d-none').text("");
                        }
                        (typeof result_response[2].recaptcha === 'string') ? $("#recaptcha_error_message").removeClass('d-none').text("* " + result_response[2].recaptcha) : $("#recaptcha_error_message").addClass('d-none').text("");
                        
                        $(submit_form).find('span').removeClass('d-none');
                        $(submit_form).find('.custom-loader').hide();
                        $(submit_form).prop('disabled', false);
                        
                    } else {
                        if (result_response[0] === "insert" && !result_response[1]) {
                            grecaptcha.reset()
                            $(submit_form).removeClass('btn-primary').addClass('btn-danger');
                            
                            clear_form_input();
                            
                            setTimeout(() => {
                                setTimeout(() => {
                                    $(submit_form).find('span').removeClass('d-none');
                                    $(submit_form).prop('disabled', false);
                                    $(submit_form).find('.fa-circle-xmark').addClass('d-none');
                                    $(submit_form).removeClass('btn-danger').addClass('btn-primary');
                                }, 1500);
                                $(submit_form).find('.custom-loader').hide();
                                $(submit_form).find('.fa-circle-xmark').removeClass('d-none');
                                $("#result_message").addClass('text-danger').text(result_response[2]);
                            }, 1000);
                        } else {
                            grecaptcha.reset()
                            $(submit_form).removeClass('btn-primary').addClass('btn-success');

                            clear_form_input()

                            setTimeout(() => {
                                setTimeout(() => {
                                    $(submit_form).find('span').removeClass('d-none');
                                    $(submit_form).prop('disabled', false);
                                    $(submit_form).find('.fa-circle-check').addClass('d-none');
                                    $(submit_form).removeClass('btn-success').addClass('btn-primary');
                                    $("#result_message").addClass('d-none');
                                }, 2500);
                                $(submit_form).find('.custom-loader').hide();
                                $(submit_form).find('.fa-circle-check').removeClass('d-none');
                                $("#result_message").addClass('text-success').text(result_response[2]);
                            }, 1500);
                        }

                    }
                }, error: function(error) {
                    $(submit_form).find('.custom-loader').hide();
                    $(submit_form).find('.fa-circle-check').removeClass('d-none');
                    $(submit_form).prop('disabled', false);
                    console.error(error);
                }
            });
        });
        
        const sidebar_menu = $("#sidebar_form_menu");

        $(sidebar_menu).on('click', function(event) {
            event.preventDefault();

            const sidebar = $(this).closest('section');
            $(sidebar).toggleClass('toggle');

            setItemStorage();
        });

        $("#close_sidebar_mobile").on('click', function(event) {
            event.preventDefault();

            if ($(sidebar_menu).closest('#sidebar_container').hasClass('toggle')) {
                $(sidebar_menu).closest('#sidebar_container').removeClass('toggle');
            }
        });
        
        if (checkStorage()) {
            setTimeout(() => {
                if (!$(sidebar_menu).closest('section').hasClass('toggle')) {
                    $(sidebar_menu).closest('section').addClass('toggle');
                    setItemStorage();
                }
            }, 10000);
        }        
    });

    function clear_form_input() {
        $("#first_name").removeClass('border border-danger').val("");
        $("#first_name_error_message").addClass('d-none').text("");
        
        $("#last_name").removeClass('border border-danger').val("");
        $("#last_name_error_message").addClass('d-none').text("");
        
        $("#email").removeClass('border border-danger').val("");
        $("#email_error_message").addClass('d-none').text("");
        
        $("#recaptcha_error_message").addClass('d-none').text("");
    }
    
    function setItemStorage() {
        localStorage.setItem('Date', Date.now().toString());
        sessionStorage.setItem('check_slide_in', 'true');
    }

    function checkStorage() {
        const lastShown = localStorage.getItem('Date');
        const shownThisSession = sessionStorage.getItem('check_slide_in');
        
        if (shownThisSession) {
            return false;
        }

        // if more than 24 hours
        if (!lastShown || (Date.now() - parseInt(lastShown)) > 24 * 60 * 60 * 1000) {
            return true;
        }
        
        return false;
    }
</script>