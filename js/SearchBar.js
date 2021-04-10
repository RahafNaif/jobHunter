$(document).ready(function () {

    $('#position-option').click(function () { 
        $('#selected').html('position');
    });

    $('#major-option').click(function () { 
        $('#selected').html('major');
    });

    $('#name-option').click(function () { 
        $('#selected').html('company name');
    });

    $('#citybtn').click(function (e) { 
        // e.preventDefault();
       var city =  $('#city').val();
       $('#city-select').html(city);
    });

    $('#full').click(function () { 
        $('#time').html('Full time');
    });

    $('#part').click(function () { 
        $('#time').html('Part time');
    });

    


});