<script>
$('.send_register').submit(function(e) {
    e.preventDefault();
    let first_name = $('.first_name').val();
    let last_name = $('.last_name').val();
    let e_mail = $('.e_mail').val();
    let phone_number = $('.phone_number').val();
    let password = $('.password').val();
    let confirm_password = $('.confirm_password').val();
    let full_name = first_name + " " + last_name;

    // Check if email is valid
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    // Show error message for invalid email

    if (!first_name) {
        $('.first_name').addClass('error').removeClass('form-control');
        $('.first_name').next('.error-message').text('Please enter a first name').show();

    } else {
        $('.first_name').removeClass('error').addClass('form-control');
        $('.first_name').next('.error-message').hide();

    }

    if (!last_name) {
        $('.last_name').addClass('error').removeClass('form-control');
        $('.last_name').next('.error-message').text('Please enter a first name').show();

    } else {
        $('.last_name').removeClass('error').addClass('form-control');
        $('.last_name').next('.error-message').hide();

    }
    if (!phone_number) {
        $('.phone_number').addClass('error').removeClass('form-control');
        $('.phone_number').next('.error-message').text('Please enter a phone number').show();

    } else {
        $('.phone_number').removeClass('error').addClass('form-control');
        $('.phone_number').next('.error-message').hide();

    }
    if (!emailPattern.test(e_mail)) {
        $('.e_mail').addClass('error').removeClass('form-control');
        $('.e_mail').next('.error-message').text('Please enter a valid email').show();


        return; // Stop form submission if email is invalid
    } else {
        $('.e_mail').removeClass('error').addClass('form-control');
        $('.e_mail').next('.error-message').hide();
    }
    if (password === confirm_password) {



        // Remove error classes if passwords match and password length is greater than or equal to 8
        $('.password').removeClass('error').addClass('form-control');
        $('.confirm_password').removeClass('error').addClass('form-control');
        $('.password').next('.error-message').hide();
        $('.confirm_password').next('.error-message').hide();



        // Check password length
        if (password.length < 8) {
            // Show error message for password length
            $('.password').addClass('error').removeClass('form-control');
            $('.confirm_password').addClass('error').removeClass('form-control');
            $('.password').next('.error-message').text('Password must be at least 8 characters long')
                .show();
            $('.confirm_password').next('.error-message').text(
                'Password must be at least 8 characters long').show();
        }
    } else {
        // Show error message for password mismatch
        $('.confirm_password').addClass('error').removeClass('form-control');
        $('.password').addClass('error').removeClass('form-control');
        $('.confirm_password').next('.error-message').text('Passwords do not match').show();
        $('.password').next('.error-message').text('Passwords do not match').show();
    }


    if (first_name && last_name && e_mail && password && confirm_password && phone_number) {

        $.post('functions/users/add_users.php', {

                name: full_name,
                email: e_mail,
                password: password,
                prive: null,
                gender: 1,

            },
            (function(data) {
                $('.valCall').html(data);
                $('.send_register')[0].reset();
            }))
    }
    // Check if passwords match


});
</script>