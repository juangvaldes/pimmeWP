$( document ).ready(function() {
	
	var path_wp = $("#path_wp").val();
	var page_blog = $("#page-blog").val();

	if(typeof page_blog !== 'undefined' && page_blog == "true") {
		validate_header();
		$(window).scroll(function(){
            if($(window).scrollTop() == 0) {
            	validate_header();
            }
        });
	}

    $.get( path_wp + "/../../../wp-json/wp-api-menus/v2/menus/2", function( data ) {
	 	if(data.items.length > 0) {
	 		var nav = $('nav#primary-menu');
	 		var ul = $('<ul>').appendTo(nav);
	 		$.each(data.items, function(v, k) {
	 			var li = $('<li/>')
		        .appendTo(ul);
		        var aaa = $('<a/>')
		        .attr("href", k.url)
		        .appendTo(li);
		        var div = $('<div/>')
		        .appendTo(aaa);
		        var i = $('<i/>')
		        .addClass(k.classes)
		        .appendTo(div)
		        .after(k.title);
	 		});
	 	}
	});

	$.get( path_wp + "/../../../wp-json/wp/v2/categories", function( data ) {
	 	if(data.length > 0) {
	 		var ul = $('ul#blog-menu');
	 		var category_slug = $("#category-slug").val();
	 		$.each(data, function(v, k) {
	 			if(k.id != 1) {
		 			var li = $('<li/>')
			        .appendTo(ul);
			        if(v == 1 && category_slug == '') {
	 					li.addClass("current");	
	 				} else if (category_slug == k.slug) {
	 					li.addClass("current");	
	 				}
	 				if(k.slug == 'todos') {
	 					var path_category = path_wp + "/../../../blog";
	 				} else {
	 					var path_category = path_wp + "/../../../blog?category="+k.slug;
	 				}
			        var aaa = $('<a/>')
			        .attr("href", path_category)
			        .appendTo(li);
			        var div = $('<div/>')
			        .text(k.name)
			        .appendTo(aaa);
		    	}
	 		});
	 	}
	});

	$.get( path_wp + "/../../../wp-json/wp/v2/categories", function( data ) {
	 	if(data.length > 0) {
	 		var div = $('.categorias-single-blog');
	 		$.each(data, function(v, k) {
	 			if(k.id != 1) {
	 				if(k.slug == 'todos') {
	 					var path_category = path_wp + "/../../../blog";
	 				} else {
	 					var path_category = path_wp + "/../../../blog?category="+k.slug;
	 				}
			        var aaa = $('<a/>')
			        .attr("href", path_category)
			        .text(k.name)
			        .appendTo(div);
			        
		    	}
	 		});
	 	}
	});
});

function validate_header() {
	$("header").removeClass("transparent-header");
	$("header").removeClass("dark");
	var logo_blog = $(".standard-logo img").attr("src");
	$(".standard-logo img").attr("src", logo_blog.replace("logo-dark.png","logo.png"));
}