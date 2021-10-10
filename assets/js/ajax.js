(function($) {

    "use strict";

    $('.pgcu-post-sortable__btn').click(function(e){
		e.preventDefault();
		var button = $(this),
		    data = {
			'action'	: 'pgcu_sortable',
			'id'		: $(this).attr('data-id'),
            'term_id'	: $(this).attr('data-sortable-nav'),
			'query'	    : pgcu_ajax.query
		};
		$.ajax({ // you can also use $.post here
			url : pgcu_ajax.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			success : function( data ){
				$('.pgcu-row').empty().append( data );
			}
		});
	});

	$('.pgcu_load_more').click(function(){
 
		var button = $(this),
		    data = {
			'action': 'pgcu_loadmore',
			'query': pgcu_ajax.query, // that's how we get params from wp_localize_script() function
			'page' : pgcu_ajax.current_page,
            'id'   : $(this).attr('data-id')
		};
 
		$.ajax({ // you can also use $.post here
			url : pgcu_ajax.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
                button.text('Load More');
				if( data ) { 
					$('.pgcu-row').append(data); // insert new posts
					pgcu_ajax.current_page++;
 
					if ( pgcu_ajax.current_page == pgcu_ajax.max_page ) 
						button.remove(); // if last page, remove the button
 
					// you can also fire the "post-load" event here if you use a plugin that requires it
					// $( document.body ).trigger( 'post-load' );
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});

})(jQuery);