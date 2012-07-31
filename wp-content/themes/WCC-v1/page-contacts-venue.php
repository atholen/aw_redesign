<?php
/*
Template Name: Venue Contacts
*/
?>

<?php get_header(); ?>

	<div id="main" class="band">

		<div class="breadcrumbs">
		<?php
		if(function_exists('bcn_display'))
		{
		    bcn_display();
		}
		?>
		</div>
	
		<h2> <?php the_title(); ?> </h2>

		<div id="thumb-container">
			<ul>
			<?php
			//The Query
			global $more;
			$more = 0;
			$counter = 1;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args=array(
			'paged'=>$paged, //Pulls the paged function into the query
			'posts_per_page'=>60, //Limits the amount of posts on each page
			'category_name'=>'venue-contact',
			'orderby' =>'title',
			'order' =>'asc',			
			);
			
			query_posts($args);
			
			//The Loop
			if ( have_posts() ) : while ( have_posts() ) : the_post();

				if($counter % 6){
					$thumb_pos = '';
				}
				else{
					$thumb_pos = 'end';
				}?>

				<li class="<?php echo $thumb_pos; ?>">
					<div class="thumb-wrap">
						<div class="thumb">
						<?php if ( has_post_thumbnail() ) { ?> <!--  check if the post has a thumbnail -->
							<?php the_post_thumbnail('square-150'); ?>
						<?php } 
							else{
								echo '<div class="no-thumb"><span class="title">'.get_the_title().'</span></div>';
							}
						?>						
						</div>
						<a href="<?php the_permalink(); ?>"><div class="overlay">
							<span class="title"><?php the_title(); ?></span>
						</div></a>			
					</div><!-- end .thumb-wrap -->
				</li>
				<?php $counter ++; ?>
				<?php endwhile; endif;?>
	
				<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
					<?php if(function_exists('wp_paginate')) {
					    wp_paginate();
					} ?>				
	
				 	<?php/* next_posts_link( __( '&larr; Older posts', 'twentyten' ) ); ?>
					<?php previous_posts_link( __( 'Newer posts &rarr;', 'twentyten' ) ); */?>
	<?php endif; ?>
	
				<?php wp_reset_query(); ?>
			</ul>
		</div> <!-- end #thumb-container -->
		<div style="clear:both;"></div>


	</div> <!-- end #main -->

<?php get_footer(); ?>