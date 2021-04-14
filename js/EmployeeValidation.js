$(document).ready(function () {

    var checkName = false;
    var checkEmail = false;
    var checkPassword = false;
    var checkRe_password = false;
    var checKScope = false;
    var checkAddress = false;
    var checkDes = false;
    var checkPhone = false;
    var checkMission = false;
    var checkVision = false;
    
    $('#name').mouseleave(function(){
        check_name();
    });

    $('#email').mouseleave(function(){
        check_email();
    });

    $('#scope').mouseleave(function(){
        check_scope();
    });

    $('#phone').mouseleave(function(){
        check_phone();
    });

    $('#address').mouseleave(function(){
        check_address();
    });

    $('#des').mouseleave(function(){
        check_des();
    });

    $('#mission').mouseleave(function(){
        check_mission();
    });

    $('#vision').mouseleave(function(){
        check_vision();
    });

    $('#password').mouseleave(function(){
        check_password();
    });

    $('#re_password').mouseleave(function(){
        check_re_password();
    });

    function check_name(){
        var name = $('#name').val();
        if(name == ''){
            $('#name').css('border-color','red');
            $('#name_error').text('Company name can not be empty');
            $('#name_error').css('visibility','visible');
        }else {
            $('#name').css('border-color','white');
            $('#name_error').css('visibility','hidden');
            checkName = true;
        }
    }

    function check_email(){
        var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var email = $('#email').val();
        if((!pattern.test(email)) || (email =='')){
            $('#email').css('border-color','red');
            $('#email_error').text('Invaild email format');
            $('#email_error').css('visibility','visible');
        }else {
            $('#email').css('border','white');
            $('#email_error').css('visibility','hidden');
            checkEmail = true;
        }
    }

    function check_scope(){
        var scope = $('#scope').val();
        if(scope == ''){
            $('#scope').css('border-color','red');
            $('#scope_error').text('Company Scope can not be empty');
            $('#scope_error').css('visibility','visible');
        }else {
            $('#scope').css('border-color','white');
            $('#scope_error').css('visibility','hidden');
            checkScope = true;
        }
    }

    function check_phone(){
        var phone = $('#phone').val();
        var isPhone = phone_validate(phone);

        if(!isPhone || phone.length!==10){
            $('#phone').css('border-color','red');
            $('#phone_error').text('Phone number should be 10 digits');
            $('#phone_error').css('visibility','visible');
        }else {
            $('#phone').css('border-color','white')
            $('#phone_error').css('visibility','hidden')
            checkPhone = true;
        }
    }

    function phone_validate(phno) { 
        var regexPattern=new RegExp(/^[0-9-+]+$/);    // regular expression pattern
        return regexPattern.test(phno); 
    } 

    function check_address(){
        var address= $('#address').val();
        if(address == ''){
            $('#address').css('border-color','red');
            $('#address_error').text('Address can not be empty');
            $('#address_error').css('visibility','visible');
        }else {
            $('#address').css('border-color','white');
            $('#address_error').css('visibility','hidden');
            checkAddress = true;
        }
    }

    function check_des(){
        var address= $('#des').val();
        if(address == ''){
            $('#des').css('border-color','red');
            $('#des_error').text('Description can not be empty');
            $('#des_error').css('visibility','visible');
        }else {
            $('#des').css('border-color','white');
            $('#des_error').css('visibility','hidden');
            checkDes = true;
        }
    }

    function check_mission(){
        var mission= $('#mission').val();
        if(mission == ''){
            $('#mission').css('border-color','red');
            $('#mission_error').text('mission can not be empty');
            $('#mission_error').css('visibility','visible');
        }else {
            $('#mission').css('border-color','white');
            $('#mission_error').css('visibility','hidden');
            checkMission = true;
        }
    }

    function check_vision(){
        var vision= $('#vision').val();
        if(vision == ''){
            $('#vision').css('border-color','red');
            $('#vision_error').text('vision can not be empty');
            $('#vision_error').css('visibility','visible');
        }else {
            $('#vision').css('border-color','white');
            $('#vision_error').css('visibility','hidden');
            checkVision = true;
        }
    }

    function check_password(){
        var pass= $('#password').val();
        if(pass.length<8){
            $('#password').css('border-color','red');
            $('#password_error').text('password should be 8 digits or more');
            $('#password_error').css('visibility','visible');
        }else {
            $('#password').css('border-color','white');
            $('#password_error').css('visibility','hidden');
            checkPassword = true;
        }
    }

    function check_re_password(){
        var pass= $('#password').val();
        var repass= $('#re_password').val();
        if(repass!==pass){
            $('#re_password').css('border-color','red');
            $('#re_password_error').text('passwords did not match');
            $('#re_password_error').css('visibility','visible');
        }else {
            $('#re_password').css('border-color','white');
            $('#re_password_error').css('visibility','hidden');
            checkRe_password = true;
        }
    }

    $('#form').on('submit', function(e) {
        
        if((checkName!==true) || (checkEmail!==true)  || (checkPassword!==true) || (checkRe_password!==true) || (checkScope!==true)  || (checkDes!==true)  || (checkAddress!==true)  || (checkMission!==true)  || (checkVision!==true)  || (checkPhone!==true)){
            e.preventDefault();
            $('.alert').css('display','block');
        }
  
    });


});