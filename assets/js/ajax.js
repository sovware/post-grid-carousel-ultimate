(function($) {

    "use strict";

    $('.pgcu-post-sortable__btn').on("click", function(e){
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

})(jQuery);