<?php
/*
Template Name: Calendar
*/
?>

<?php get_header(); ?>

	<div id="main" class="blog">
		
		<div class="posts">
			<h2>Events Calendar</h2>
			<iframe src="https://www.google.com/calendar/embed?showTitle=0&mode=MONTH&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=wesconcertcommittee%40gmail.com&amp;color=%23182C57&amp;ctz=America%2FNew_York" style=" border-width:0 " width="600" height="600" frameborder="0" scrolling="no"></iframe>
			
		</div> <!-- end .posts -->
		
		<div class="col-right">

			<?php include("sidebars/events-side.php");?>		
		
		</div> <!-- end .col-right -->
		
		<div style="clear:both;"></div>
			
	</div> <!-- end #main -->

<?php get_footer(); ?>