<?php get_header(); ?>

<style type="text/css">

	#slideshow {
	    position:relative;
	    height:350px;
	}
	
	#slideshow IMG {
	    position:absolute;
	    top:0;
	    left:0;
	    z-index:8;
	}
	
	#slideshow IMG.active {
	    z-index:10;
	}
	
	#slideshow IMG.last-active {
	    z-index:9;
	}

</style>

<script>

function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 3000 );
});

$(function() {
    $('#bug-tracker').hide();
    $('p#toggle').click(function(){
    	$('#bug-tracker').slideToggle();
    });
});
</script>

<div id="main" class="error-page">

	<div id="slideshow">
	    <img src="http://auralwes.org/wp-content/themes/WCC-v1/images/404-1.jpg" alt="" class="active" />
	    <img src="http://auralwes.org/wp-content/themes/WCC-v1/images/404-2.jpg" alt="" />
	</div>
	
	<div class="col-left">
	
	</div><!-- end .col-left -->
	
	<div class="col-mid">

		<div class="breadcrumbs">
			<?php if(function_exists('bcn_display')){
			    bcn_display();
			}?>
		</div>		
		
		<h2>Probably not.</h2>
		<p>But before you leave, help us help you!</p><br/>
		<p id="toggle">If you arrived here from a link on our site, please let us know by clicking this message. Be sure to tell us where you came from and what you were looking for, and we'll do our best to fix it.</p>
		
		<div id="bug-tracker">

			<script type="text/javascript">var host = (("https:" == document.location.protocol) ? "https://secure." : "http://");document.write(unescape("%3Cscript src='" + host + "wufoo.com/scripts/embed/form.js' type='text/javascript'%3E%3C/script%3E"));</script>
			
			<script type="text/javascript">
			var z7x3k7 = new WufooForm();
			z7x3k7.initialize({
			'userName':'auralwes', 
			'formHash':'z7x3k7', 
			'autoResize':true,
			'height':'558',
			'header':'show'});
			z7x3k7.display();
			</script>
		
		</div><!-- end #bug-tracker -->
	</div> <!-- end .col-mid -->
	
	<div class="col-right">
	
	</div> <!-- end .col-right -->
	
	<div style="clear:both;"></div>	
		
</div>
<?php get_footer(); ?>