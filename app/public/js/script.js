$(document).ready(function() {
    $('#login_form').on('submit', function(event) {
        event.preventDefault();

        var nonce = "<?php echo wp_create_nonce( 'wp_rest' ); ?>";
        var form = $(this).serialize();

        $.ajax({
            method: 'POST',
            url: "<?php echo get_rest_url( null, 'slide-in-login-form/v1/send-email' ); ?>",
            headers: {
                'X-WP-Nonce': nonce
            },
            data: form,
            success: function(res) {
                console.log(res);
                alert('Form Submitted Successfully!');
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
});
