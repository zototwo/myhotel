$(function(){
    $('.mymodal').click(function (){
        $(($(this).attr('data-target'))).modal('toggle');
        $('.mymodal_form').find("input[name=room_number]").val($(this).attr('data-room'));
    });

    $('.mymodal_close').click(function(){
        $(($(this).attr('data-target'))).modal('hide');
        $('.mymodal_form').show();
        $('.modal-body .myAnswer').hide();
        $('.myModal_send_btn').show();
        $('.myModal_answer_btn').hide();
    });
    //$dataFrom,$dataTo
    $('.mymodal_send').click(function(){
        let target = ($(this).attr('data-target'));
        let str = $('form, ' + target).serialize();
        //ajax-запрос
        let my_data_search = window.location.search;
        my_data_search = my_data_search.replace('?','');

        str = str + "&" + my_data_search;
        $.ajax({
            url : "/helpers/toOrder.php",
            type : "GET",
            data : str,
            success: function(dataOut){
                console.log(dataOut);
                $('.mymodal_form').hide();
                $('.modal-body .myAnswer').show();
                $('.myModal_send_btn').hide();
                $('.myModal_answer_btn').show();
            }
        }).done(function (){

        });
    });

    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        items:1,
    });
    $(window).scroll(function() {
        if ($(this).scrollTop() > 20) {
            $('#toTopBtn').fadeIn();
        } else {
            $('#toTopBtn').fadeOut();
        }
    });

    $('#toTopBtn').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 0);
        return false;
    });
});

