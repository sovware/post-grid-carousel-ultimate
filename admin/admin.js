jQuery(document).ready(function($) {

    $(".tabs-menu a").click(function(event) {
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

            $("#tab2").css('display', 'none');
            $("#tab1").css('display', 'none');
            $("#tab3").css('display', 'block');
            $("#tab4").css('display', 'none');

        }
        if ($(this).val() == 'carousel') {
            console.log("yes")
            $("#tab2").css('display', 'block');
            // $("#tab1").css('display', 'block');
            $("#tab3").css('display', 'none');

        }
    });


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



});