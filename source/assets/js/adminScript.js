$(document).ready(function(){
    $('#open-menu').click(function(){
        if($("#left-menu").hasClass('active')){
            $("#left-menu").removeClass('active').hide();
        }else{
            $("#left-menu").addClass('active').show();
        }
    });

    $("input:text").click(function() {
        $(this).parent().find("input:file").click();
    });

    $('input:file', '.ui.action.input').on('change', function(e) {
        let name = e.target.files[0].name;
        $('input:text', $(e.target).parent()).val(name);
    });

    $('.message .close').on('click', function() {
        $(this).closest('.message').transition('fade');
    });
});
