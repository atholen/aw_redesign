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