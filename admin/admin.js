(function($){
    $(document).ready(function($) {
        $(".lcsp-tabs-menu a").click(function(event) {
            event.preventDefault();
            $(this).parent().addClass("current");
            $(this).parent().siblings().removeClass("current");
            var tab = $(this).attr("href");
            $(".adl-tab-content").not(tab).css("display", "none");
            $(tab).fadeIn();
        });

        $("#sel5").change(function() {
            if ($(this).val() == 'grid') {

                $("#tab2").css('display', 'block');
                $("#tab1").css('display', 'none');
                $("#tab3").css('display', 'none');

            }
            if ($(this).val() == 'isotope') {

                $("#tab2").css('display', 'block');
                $("#tab1").css('display', 'none');
                $("#tab3").css('display', 'none');

            }
            if ($(this).val() == 'carousel') {
                $("#tab2").css('display', 'none');
                $("#tab1").css('display', 'block');
                $("#tab3").css('display', 'none');
                $("#tab4").css('display', 'none');

            }
        });

        /* Read more type color option */
        $('.gc-read-more-type-section .pgcu_post_type_depend').on('change', function(){
            if($(this).val() === 'link'){
                $('.read_more_link_color_option').show();
                $('.read_more_button_color_option').hide();
            }else if($(this).val() === 'button'){
                $('.read_more_link_color_option').hide();
                $('.read_more_button_color_option').show();
            }
        })
        if($('.gc-read-more-type-section .pgcu_post_type_depend option:selected').val() === 'link'){
            $('.read_more_link_color_option').show();
            $('.read_more_button_color_option').hide();
        }else if($('.gc-read-more-type-section .pgcu_post_type_depend option:selected').val() === 'button'){
            $('.read_more_link_color_option').hide();
            $('.read_more_button_color_option').show();
        }


        $("#pgcu_post_type").change(function() {
              var data = {
                'action': 'pgcu_post_type',
                'post_type': $(this).val(), // that's how we get params from wp_localize_script() function
            };

            $.ajax({ // you can also use $.post here
                url : pgcu_ajax.ajaxurl, // AJAX handler
                data : data,
                type : 'POST',
                success : function( data ){
                    if( data ) {
                        $('.pgcu_post_type_depend').empty().append(data);
                    }
                }
            });
        });


        jQuery('.cpa-color-picker').wpColorPicker();

         /* Read more section */
         $('input[name="gc[display_header_title]"]').each(function(id, elm){
            $(elm).on('change', function(){
                if($(elm).val() === 'no'){
                    $('.pgcu_header_title').css('display', 'none');
                }else{
                    $('.pgcu_header_title').css('display', 'table-row');
                }
            })
        })

        /* Read more section */
        $('input[name="gc[display_read_more]"]').each(function(id, elm){
            $(elm).on('change', function(){
                if($(elm).val() === 'no'){
                    $('.gc-read-more-type-section').css('display', 'none');
                }else{
                    $('.gc-read-more-type-section').css('display', 'table-row');
                }
            })
        })


        // Post Query Type. all all extra input field by default
    $('#aps_posts_bycategory, #aps_posts_byID, #aps_posts_byTag, #aps_posts_by_year, #aps_posts_from_month, #aps_posts_from_month_year, .specific-categories').hide();

    $('input[type="radio"]').click(function() {
        if($(this).attr('id') == 'aps_posts_type4') {
            $('#aps_posts_bycategory, .specific-categories.category').fadeIn();
        }
        else {
            $('#aps_posts_bycategory, .specific-categories.category').hide();
        }
    });



    $('input[type="radio"]').click(function() {
        if($(this).attr('id') == 'aps_posts_type5') {
            $('#aps_posts_byID, .id').fadeIn();
        }
        else {
            $('#aps_posts_byID, .id').hide();
        }
    });
    $('input[type="radio"]').click(function() {
        if($(this).attr('id') == 'aps_posts_type6') {
            $('#aps_posts_byTag, .tags').fadeIn();
        }
        else {
            $('#aps_posts_byTag, .tags').hide();
        }
    });
    $('input[type="radio"]').click(function() {
        if($(this).attr('id') == 'aps_posts_type7') {
            $('#aps_posts_by_year, .year').fadeIn();
        }
        else {
            $('#aps_posts_by_year, .year').hide();
        }
    });
    $('input[type="radio"]').click(function() {
        if($(this).attr('id') == 'aps_posts_type8') {
            $('#aps_posts_from_month, #aps_posts_from_month_year').fadeIn();
        }
        else {
            $('#aps_posts_from_month, #aps_posts_from_month_year').hide();
        }
    });


    // show if it is checked
    if( $('input[id=aps_posts_type1]').is(':checked') ) {
        $('#aps_latest_posts_bycategory, .specific-categories.latest').fadeIn();
    }
    if( $('input[id=aps_posts_type2]').is(':checked') ) {
        $('#aps_oldest_posts_bycategory, .specific-categories.oldest').fadeIn();
    }
    if( $('input[id=aps_posts_type4]').is(':checked') ) {
        $('#aps_posts_bycategory, .specific-categories.category').fadeIn();
    }
    if( $('input[id=aps_posts_type5]').is(':checked') ) {
        $('#aps_posts_byID').fadeIn();
    }
    if( $('input[id=aps_posts_type6]').is(':checked') ) {
        $('#aps_posts_byTag').fadeIn();
    }
    if( $('input[id=aps_posts_type7]').is(':checked') ) {
        $('#aps_posts_by_year').fadeIn();
    }
    if( $('input[id=aps_posts_type8]').is(':checked') ) {
        $('#aps_posts_from_month, #aps_posts_from_month_year').fadeIn();
    }




    });


    window.addEventListener('load', ()=>{
        if(document.getElementById('gc[display_read_more2]').hasAttribute('checked')){
            document.querySelector('.gc-read-more-type-section').style.display = 'none';
        }

        if(document.getElementById('gc[display_header_title2]').hasAttribute('checked')){
            document.querySelector('.pgcu_header_title').style.display = 'none';
        }
    })
})(jQuery)