<?php
/*
Template Name: Contacts Landing
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

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
			</div>
			<?php endwhile; endif; ?>
			
			<script type="text/javascript">var host = (("https:" == document.location.protocol) ? "https://secure." : "http://");document.write(unescape("%3Cscript src='" + host + "wufoo.com/scripts/embed/form.js' type='text/javascript'%3E%3C/script%3E"));</script>
			
			<script type="text/javascript">
			var m7x3w7 = new WufooForm();
			m7x3w7.initialize({
			'userName':'auralwes', 
			'formHash':'m7x3w7', 
			'autoResize':true,
			'height':'577',
			'header':'show'});
			m7x3w7.display();
			</script>


		</div> <!-- end .content -->
		
		<div style="clear:both;"></div>
			
	</div> <!-- end #main -->

<?php get_footer(); ?>