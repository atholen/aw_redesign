<?php get_header(); ?>

	<div id="main">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php if (in_category('Band') || in_category('Old Friend')) { ?>

				<div class="band-single">
					<div class="albm-art">
						<?php if ( has_post_thumbnail() ) { ?> <!--  check if the post has a thumb. -->
							<?php the_post_thumbnail('featured-300'); ?>
						<?php }; ?>						
					</div> <!-- end .albm-art -->				
					<div class="post">
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>

						<!-- Check for media -->
						<?php if(get_post_meta($post->ID,"audio-embed",true) !== ""){ ?>
							<div class="media">
								<h3>Music Sample</h3>
								<?php /* incase multiple players ... */
								$players = get_post_meta($post->ID, 'audio-embed', false); ?>
								<?php foreach($players as $player) {
									echo $player;
									} ?>
							</div>
						<?php }?>						
					</div> <!-- end .post -->
					
					<div style="clear:both;"></div>								
				
				</div> <!-- end .band-single -->
			<?php } 
			


			elseif (in_category('Venue Contact')) { ?>

				<div class="band-single">
					<div class="albm-art">
						<?php if ( has_post_thumbnail() ) { ?> <!--  check if the post has a thumb. -->
							<?php the_post_thumbnail('featured-300'); ?>
						<?php }; ?>						
					</div> <!-- end .albm-art -->	
								
					<div class="post">
						<h2><?php the_title(); ?></h2>

						<div class="summary">
			
							<div class="info">
								<?php if(get_post_meta($post->ID,"Position",true) !== ""){ ?>
									<h3 class="grey"><?php echo get_post_meta($post->ID, "Position", true); ?>: </h3> &nbsp; <h3 class="red"><?php echo get_post_meta($post->ID, "Name", true); ?></h3><br/>
								<?php }?>
								
								<?php if(get_post_meta($post->ID,"Email",true) !== ""){ ?>
									<h3 class="grey">Email: </h3> &nbsp; <a href="mailto:<?php echo get_post_meta($post->ID, "Email", true); ?>"><h3 class="red"><?php echo get_post_meta($post->ID, "Email", true); ?></h3></a><br/>
								<?php }?>
								<?php if(get_post_meta($post->ID,"Link_URL",true) !== ""){ ?>
									<a href="<?php echo get_post_meta($post->ID, "Link_URL", true); ?>" class="button" target="_blank">See more pictures</a>
								<?php }?>
							</div> <!-- end .info -->
							
							<div style="clear:both;"></div>
							
						</div> <!-- end .summary -->


						<?php the_content(); ?>

						<!-- Check for media -->
						<?php if(get_post_meta($post->ID,"audio-embed",true) !== ""){ ?>
							<div class="media">
								<h3>Music Sample</h3>
								<?php /* incase multiple players ... */
								$players = get_post_meta($post->ID, 'audio-embed', false); ?>
								<?php foreach($players as $player) {
									echo $player;
									} ?>
							</div>
						<?php }?>						
					</div> <!-- end .post -->
					
					<div style="clear:both;"></div>								
				
				</div> <!-- end .band-single -->

				<h2> Other Venues:</h2>
				
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


			<?php } 



			elseif (!in_category('Event')) { ?>
				
				<div class="single">
					<?php 
					if ( has_post_thumbnail() ) { ?> <!--  check if the post has a Post Thumbnail assigned to it. -->
						<div class="featured-image">
							<?php the_post_thumbnail('featured-large'); ?>
						</div> <!-- end .featured-image -->
					<?php }; ?>
	
					<h2><?php the_title(); ?></h2>
					
					<div class="blurb">
	
						<!-- Is an info box necessary? -->
							<?php if( (get_post_meta($post->ID,"Date",true) != "") || (get_post_meta($post->ID,"Venue",true) != "") || (get_post_meta($post->ID,"Link_URL",true) != "") ){ ?>
	
						<div class="info">
						
							<!-- Check for date -->
							<?php if(get_post_meta($post->ID,"Date",true) !== ""){ ?>
								<h3 class="grey">When: </h3><h3 class="red"><?php echo get_post_meta($post->ID, "Date", true); ?></h3><br/>
							<?php }?>
	
							<!-- Check for venue -->
							<?php if(get_post_meta($post->ID,"Venue",true) !== ""){ ?>
								<h3 class="grey">Where: </h3><h3 class="red"><?php echo get_post_meta($post->ID, "Venue", true); ?></h3><br/>
							<?php }?>

							<!-- Check for time -->
							<?php if(get_post_meta($post->ID,"Doors",true) !== ""){ ?>
								<h3 class="grey">Doors: </h3><h3 class="red"><?php echo get_post_meta($post->ID, "Doors", true); ?></h3><br/>
							<?php }?>


	
							<!-- Check for external link -->
							<?php if(get_post_meta($post->ID,"Link_URL",true) !== ""){ ?>
								<a class="button" href="<?php echo get_post_meta($post->ID, "Link_URL", true); ?>"><?php echo get_post_meta($post->ID, "Link_Text", true); ?></a>
							<?php }?>
						
						</div> <!-- end .info -->
						
						<?php }?>
						<!-- end if info box necessary -->
	
						<?php the_content(); ?>	
						
						<div class="comments" name="comments" id="comments">							
							<?php comments_template(); ?> 
						</div> <!-- end .comments -->
					
					</div> <!-- end .blurb -->

				</div> <!-- end .single -->
				
				<div class="blog-side">
				
					<?php include("sidebars/blog-single-side.php");?>
					
				</div> <!-- end .blog-side -->
				
				<div style="clear:both;"></div>
				
			<?php } 

			
			 else { ?>

				<div class="single">

					<?php 
					if ( has_post_thumbnail() ) { ?> <!--  check if the post has a Post Thumbnail assigned to it. -->
						<div class="featured-image">
							<?php the_post_thumbnail('featured-large'); ?>
						</div> <!-- end .featured-image -->
					<?php }; ?>
	
					<h2><?php the_title(); ?></h2>
					
					<div class="blurb">
	
						<!-- Is an info box necessary? -->
							<?php if( (get_post_meta($post->ID,"Date",true) != "") || (get_post_meta($post->ID,"Venue",true) != "") || (get_post_meta($post->ID,"Link_URL",true) != "") ){ ?>
	
						<div class="info">
						
							<!-- Check for date -->
							<?php if(get_post_meta($post->ID,"Date",true) !== ""){ ?>
								<h3 class="grey">When: </h3><h3 class="red"><?php echo get_post_meta($post->ID, "Date", true); ?></h3><br/>
							<?php }?>
	
							<!-- Check for venue -->
							<?php if(get_post_meta($post->ID,"Venue",true) !== ""){ ?>
								<h3 class="grey">Where: </h3><h3 class="red"><?php echo get_post_meta($post->ID, "Venue", true); ?></h3><br/>
							<?php }?>

							<!-- Check for time -->
							<?php if(get_post_meta($post->ID,"Doors",true) !== ""){ ?>
								<h3 class="grey">Doors: </h3><h3 class="red"><?php echo get_post_meta($post->ID, "Doors", true); ?></h3>
							<?php }?>
	
							<!-- Check for external link -->
							<?php if(get_post_meta($post->ID,"Link_URL",true) !== ""){ ?>
								<a class="button" href="<?php echo get_post_meta($post->ID, "Link_URL", true); ?>"><?php echo get_post_meta($post->ID, "Link_Text", true); ?></a>
							<?php }?>
						
						</div> <!-- end .info -->
						
						<?php }?>
						<!-- end if info box necessary -->
	
						<?php the_content(); ?>	
						
						<div class="comments">							
							<?php comments_template(); ?> 
						</div> <!-- end .comments -->
					
					</div> <!-- end .blurb -->

				</div> <!-- end .single -->
				
				<div class="events">
				
					<?php include("sidebars/events-side.php");?>		
				
				</div> <!-- end .events -->
				
				<div style="clear:both;"></div>
				
			<?php } ?>
	
		<?php endwhile; else: ?>
	
			<p>Sorry, no posts matched your criteria.</p>
	
		<?php endif; ?>
		
	</div> <!-- end #main -->


<?php get_footer(); ?>
