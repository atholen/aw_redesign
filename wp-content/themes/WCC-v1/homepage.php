<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>



	<script type="text/javascript"> 
 
		$(function () {
 
			$('#slider2').anythingSlider({
				width               : 600,       // if resizeContent is false, this is the default width if panel size is not defined
				height              : 350,       // if resizeContent is false, this is the default height if panel size is not defined
				resizeContents      : false,     // If true, solitary images/objects in the panel will expand to fit the viewport
				autoPlay            : true,     // This turns off the entire slideshow FUNCTIONALY, not just if it starts running or not
				buildNavigation     : true
			})

			$('p.kicker').hide()
			
			$('.blog-box').mouseenter(function(){
				$('p.kicker').slideDown();
			})

			$('.blog-box').mouseleave(function(){
				$('p.kicker').slideUp();
			})

		});

	</script> 

	<div id="main" class="home">
	
		<div class="featured-content">

			<!-- AnythingSlider #2 -->
			<ul id="slider2">

				<?php
				global $post;
				$category = get_cat_ID('Featured');
				$postslist = get_posts('numberposts=10&orderby=date&cat='.$category);
				foreach($postslist as $post) :
				setup_postdata($post);?>
				
				<li class="panel">
				
					<div class="featured-image">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-large'); ?></a>
					</div>
					
					<h2><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a></h2>
					
					<div class="blurb">

						<!-- Is an info box necessary? -->
						<?php if( (get_post_meta($post->ID,"Date",true) != "") || (get_post_meta($post->ID,"Venue",true) != "") || (get_post_meta($post->ID,"Link_URL",true) != "") ){ ?>
	
						<div class="info">
						
							<!-- Check for date -->
							<?php if(get_post_meta($post->ID,"Date",true) != ""){ ?>
								<h3 class="grey">When: </h3><h3 class="red"><?php echo get_post_meta($post->ID, "Date", true); ?></h3>
							<?php }?>
	
							<!-- Check for venue -->
							<?php if(get_post_meta($post->ID,"Venue",true) != ""){ ?>
								<h3 class="grey">Where: </h3><h3 class="red"><?php echo get_post_meta($post->ID, "Venue", true); ?></h3>
							<?php }?>

							<!-- Check for time -->
							<?php if(get_post_meta($post->ID,"Doors",true) !== ""){ ?>
								<h3 class="grey">Doors: </h3><h3 class="red"><?php echo get_post_meta($post->ID, "Doors", true); ?></h3>
							<?php }?>
	
							<!-- Check for external link -->
							<?php if(get_post_meta($post->ID,"Link_URL",true) != ""){ ?>
								<a class="button" href="<?php echo get_post_meta($post->ID, "Link_URL", true); ?>"><?php echo get_post_meta($post->ID, "Link_Text", true); ?></a>
							<?php }?>
						
						</div> <!-- end .info -->
						
						<?php }?>
						<!-- end if info box necessary -->

						<?php the_excerpt(); ?>		
								
					</div> <!-- end .blurb -->

					<div style="clear:both;"></div>
	
				</li>
	
				<?php endforeach; ?>

			</ul>
			<!-- END AnythingSlider #2 -->		

		
		</div> <!-- end .featured-content -->
		
		<div class="col-right">
		
			<div class="events">
	
				<?php include("sidebars/events-side.php");?>
			
			</div> <!-- end .events -->

			<div style="clear:both;"></div>
			
			<div class="blog-box">
				<h3>Latest from the blog</h3>

				<?php
				global $post;
				$category = get_cat_ID("What's On Campus");
				$postslist = get_posts('numberposts=1&orderby=date&cat='.$category);
				foreach($postslist as $post) :
				setup_postdata($post);?>
				
					<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
					<a href="<?php comments_link(); ?>" class="comments"><?php comments_number( '', '(1)', '(%)' ); ?></a><br/>
					<p class="kicker"><?php echo get_post_meta($post->ID, "Kicker", true); ?></p>
				
				<?php endforeach; ?>
				
			</div>			
			
		</div><!-- end .col-right -->
		
		<div style="clear:both;"></div>
	
	</div> <!-- end #main -->

<?php get_footer(); ?>