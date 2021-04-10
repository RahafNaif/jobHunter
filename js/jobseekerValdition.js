$(document).ready(function () {

    var checkFname = false;
    var checkLname = false;
    var checkEmail=false;
    var checkPassword = false;
    var checkRe_password = false;
    var checkBirthDate = false;
    var checkGender = false;
    var checkNationality = false;
    var checkCity = false;
    var checkMajor = false;
    var checkExperince = false;
    var checkSkills = false;
    var checkCurrentJob = false;
    
    $('#firstName').mouseleave(function(){
        check_fname();
    });
    $('#lastName').mouseleave(function(){
        check_lname();
    });

    $('#email').mouseleave(function(){
        check_email();
    });

    $('#birthDate').mouseleave(function(){
        check_birthDate();
    });
    $('#gender').mouseleave(function(){
        check_gender();
    });
    $('#nationality').mouseleave(function(){
        check_nationality();
    });
    $('#city').mouseleave(function(){
        check_city();
    });

    $('#phone').mouseleave(function(){
        check_phone();
    });
    $('#major').mouseleave(function(){
        check_major();
    });

    $('#experince').mouseleave(function(){
        check_experince();
    });
    $('#skills').mouseleave(function(){
        check_skills();
    });
    $('#currentJob').mouseleave(function(){
        check_currentJob();
    });

    $('#password').mouseleave(function(){
        check_password();
    });

    $('#re_password').mouseleave(function(){
        check_re_password();
    });

    function check_fname(){
        var name = $('#firstName').val();
        if(name == ''){
            $('#firstName').css('border-color','red');
            $('#firstName_error').text('first Name name can not be empty');
            $('#firstName_error').css('visibility','visible');
        }else {
            $('#firstName').css('border-color','#ccc');
            $('#firstName_error').css('visibility','hidden');
            checkFname = true;
        }
    }

    function check_lastName(){
        var name = $('#lastName').val();
        if(name == ''){
            $('#lastName').css('border-color','red');
            $('#lastName_error').text('last Name can not be empty');
            $('#lastName_error').css('visibility','visible');
        }else {
            $('#lastName').css('border-color','#ccc');
            $('#lastName_error').css('visibility','hidden');
            checkLname = true;
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
            $('#email').css('border-color','#ccc');
            $('#email_error').css('visibility','hidden');
            checkEmail = true;
        }
    }

    function check_city(){
        var city = $('#city').val();
        if(city == ''){
            $('#city').css('border-color','red');
            $('#city_error').text('city can not be empty');
            $('#city_error').css('visibility','visible');
        }else {
            $('#city').css('border-color','#ccc');
            $('#city_error').css('visibility','hidden');
            checkCity = true;
        }
    }

    function check_phone(){
        var phone = $('#phone').val();
        if(phone.length!==10){
            $('#phone').css('border-color','red');
            $('#phone_error').text('Phone number should be 10 digits');
            $('#phone_error').css('visibility','visible');
        }else {
            $('#phone').css('border-color','#ccc')
            $('#phone_error').css('visibility','hidden')
            checkPhone = true;
        }
    }

    function check_birthDate(){
        var birthDate= $('#birthDate').val();
        if(birthDate == ''){
            $('#birthDate').css('border-color','red');
            $('#birthDate_error').text('birth Date can not be empty');
            $('#birthDate_error').css('visibility','visible');
        }else {
            $('#birthDate').css('border-color','#ccc');
            $('#birthDateerror').css('visibility','hidden');
            checkBirthDate = true;
        }
    }

    function check_gender(){
        var gender= $('#gender').val();
        if(gender == ''){
            $('#gender').css('border-color','red');
            $('#gender_error').text('Gender can not be empty');
            $('#gender_error').css('visibility','visible');
        }else {
            $('#gender').css('border-color','#ccc');
            $('#gender_error').css('visibility','hidden');
            heckGender = true;
        }
    }

    function check_nationality(){
        var nationality= $('#nationality').val();
        if(nationality == ''){
            $('#nationality').css('border-color','red');
            $('#nationality_error').text('nationality can not be empty');
            $('#nationality_error').css('visibility','visible');
        }else {
            $('#nationality').css('border-color','#ccc');
            $('#nationality_error').css('visibility','hidden');
            checkNationality = true;
        }
    }


    function check_major(){
        var major= $('#major').val();
        if(major == ''){
            $('#major').css('border-color','red');
            $('#major_error').text('major can not be empty');
            $('#major_error').css('visibility','visible');
        }else {
            $('#major').css('border-color','#ccc');
            $('#major_error').css('visibility','hidden');
            checkMajor = true;
        }
    }

    function check_experince(){
        var experince= $('#experince').val();
        if(experince == ''){
            $('#experince').css('border-color','red');
            $('#experince_error').text('experince can not be empty');
            $('#experince_error').css('visibility','visible');
        }else {
            $('#experince').css('border-color','#ccc');
            $('#experince_error').css('visibility','hidden');
            checkExperince = true;
        }
    }

    function check_skills(){
        var skills= $('#skills ').val();
        if(skills == ''){
            $('#skills ').css('border-color','red');
            $('#skills_error').text('skills can not be empty');
            $('#skills_error').css('visibility','visible');
        }else {
            $('#skills').css('border-color','#ccc');
            $('#skills_error').css('visibility','hidden');
            checkSkills  = true;
        }
    }

    function check_currentJob(){
        var currentJob= $('#currentJob ').val();
        if(currentJob == ''){
            $('#currentJob').css('border-color','red');
            $('#currentJob_error').text('current Job can not be empty');
            $('#currentJob_error').css('visibility','visible');
        }else {
            $('#currentJob').css('border-color','#ccc');
            $('#currentJob_error').css('visibility','hidden');
            checkCurrentJob = true;
        }
    }

    function check_password(){
        var pass= $('#password').val();
        if(pass.length<8){
            $('#password').css('border-color','red');
            $('#password_error').text('password should be 8 digits or more');
            $('#password_error').css('visibility','visible');
        }else {
            $('#password').css('border-color','#ccc');
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
            $('#re_password').css('border-color','#ccc');
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