$(document).ready(function () {

    $('#position-option').click(function () { 
        $('#selected').val('position');
    });

    $('#major-option').click(function () { 
        $('#selected').val('major');
    });

    $('#name-option').click(function () { 
        $('#selected').val('company name');
    });

    $('#citybtn').click(function (e) { 
       //e.preventDefault();
       var city =  $('#city').val();
       $('#city-select').html(city);
    });

    $('#full').click(function () { 
        $('#time').val('Full time');
    });

    $('#part').click(function () { 
        $('#time').val('Part time');
    });

    


});