$(document).ready(function(){

    $('.addbtn').click(function () { 
        $('.addForm-parent').css('display','block');
        $('.continer').css('filter','blur(3px)');
    });

    $('.addForm-parent').click(function(){
        $('.addForm-parent').css('display','none');
        $('.continer').css('filter','blur(0px)');
    });

});