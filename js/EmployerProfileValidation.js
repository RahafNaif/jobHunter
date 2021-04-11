$(document).ready(function () {
    var checkPassword = true;
    var checkPhone = true;

    $('#password').mouseleave(function () {
        check_password();
    });

    $('#phone').mouseleave(function () {
        check_phone();
    });

    function check_password() {
        var pass = $('#password').val();
        if (pass.length < 8) {
            checkPassword = false;
            $('#password').css('border-color', 'red');
            $('#password_error').text('password should be 8 digits or more');
            $('#password_error').css('visibility', 'visible');
        } else {
            $('#password').css('border-color', '#ccc');
            $('#password_error').css('visibility', 'hidden');
            checkPassword = true;
        }
    }

    function check_phone() {
        var phone = $('#phone').val();
        if (phone.length == 10) {
            $('#phone').css('border-color', '#ccc')
            $('#phone_error').css('visibility', 'hidden')
            checkPhone = true;
        } else {
            checkPhone = false;
            $('#phone').css('border-color', 'red');
            $('#phone_error').text('Phone number should be 10 digits');
            $('#phone_error').css('visibility', 'visible');
         
        }
    }

    $('#form').on('submit', function (e) {
        if ((!checkPassword || !checkPhone)) {
            e.preventDefault();
            $('.alert').css('display', 'block');
        }

    });
});