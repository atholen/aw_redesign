<?php
/*
Template Name: Contacts
*/
?>

<?php get_header(); ?>

	<div id="main" class="venue">

		<div class="breadcrumbs">
		<?php
		if(function_exists('bcn_display'))
		{
		    bcn_display();
		}
		?>
		</div>
	
		<h2> <?php the_title(); ?> </h2>
		
		<div class="nav-side">

			<!-- list sub-pages -->
			<?php
			
			  /* If page has sub pages list them... */
			  $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0&depth=1');
			  if ($children) { ?>
			  <ul>
			  <?php echo $children; ?>
			  </ul>
			  <?php }

			  /* ...if not, list sub pages of parent */
			  elseif ((int)$post->post_parent != 0) {
			  $children = wp_list_pages('title_li=&child_of='.$post->post_parent.'&echo=0&depth=1');?>
			  <ul>
			  <?php echo $children; ?>
			  </ul>			  
			  <?php }
			  
			  else{ ?>
			  	<ul>
			  		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			  	</ul>
			  	 
			  	<?php }
			   
			?>
					
		</div> <!-- end .nav-side -->
		
		<div class="content">
			
			<div class="summary">

				<?php 
				if ( has_post_thumbnail() ) { ?> <!--  check if the post has a Post Thumbnail assigned to it. -->
					<div class="thumb">
						<?php the_post_thumbnail('square-130'); ?>
					</div> <!-- end .thumb -->
				<?php }; ?>
				
				<div class="info">
					<?php if(get_post_meta($post->ID,"Position",true) !== ""){ ?>
						<h3 class="grey"><?php echo get_post_meta($post->ID, "Name", true); ?>: </h3> &nbsp; <h3 class="red"><?php echo get_post_meta($post->ID, "Name", true); ?></h3><br/>
					<?php }?>
					<?php if(get_post_meta($post->ID,"Email",true) !== ""){ ?>
						<h3 class="grey">Email: </h3> &nbsp; <h3 class="red"><?php echo get_post_meta($post->ID, "Email", true); ?></h3><br/>
					<?php }?>
					<?php if(get_post_meta($post->ID,"Link_URL",true) !== ""){ ?>
						<a href="<?php echo get_post_meta($post->ID, "Link_URL", true); ?>" class="button" target="_blank">See more pictures</a>
					<?php }?>
				</div> <!-- end .info -->
				
				<div style="clear:both;"></div>
				
			</div> <!-- end .summary -->
			
			


			<!-- main text goes here: -->
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
			<?php endwhile; endif; ?>
			<!-- end main text -->


		</div> <!-- end .content -->
		
		<div style="clear:both;"></div>
			
	</div> <!-- end #main -->

<?php get_footer(); ?>