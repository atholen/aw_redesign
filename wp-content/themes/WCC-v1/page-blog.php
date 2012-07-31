<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

	<div id="main" class="blog">
		
		<div class="posts">

			<ul>
	
				<?php
				//The Query
				global $more;
				$more = 0;
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args=array(
				'paged'=>$paged, //Pulls the paged function into the query
				'posts_per_page'=>10, //Limits the amount of posts on each page
				'category_name'=>'whats-on-campus',
				);
				
				query_posts($args);
				
				//The Loop
				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<li class="post">
					<?php if ( has_post_thumbnail() ) { ?> <!--  check if the post has a thumb. -->
						<?php the_post_thumbnail('featured-large'); ?>
					<?php }; ?>						
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_content('Read more...'); ?>	
					
					<div class="meta">
						Posted on: <?php the_time('F j, Y \a\t g:i A') ?> |  <a href="<?php comments_link(); ?>"><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></a> 
					</div>				
				</li> <!-- end post -->
				
				
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

			
		</div> <!-- end .posts -->
		
		<div class="col-right">
		
			<div id="cse-search-form" style="width: 100%;">Loading</div>
			<script src="http://www.google.com/jsapi" type="text/javascript"></script>
			<script type="text/javascript"> 
			  google.load('search', '1', {language : 'en'});
			  google.setOnLoadCallback(function() {
			    var customSearchControl = new google.search.CustomSearchControl('007766977264376207088:t9anfsruqig');
			    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
			    var options = new google.search.DrawOptions();
			    options.enableSearchboxOnly("http://auralwes.org/search");    
			    customSearchControl.draw('cse-search-form', options);
			  }, true);
			</script>
			
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
			
			<div style="clear:both;"></div>
			
			<div class="blogroll">
				<?php wp_list_bookmarks('show_description=0'); ?>
			</div>
		
		</div> <!-- end .col-right -->
		
		<div style="clear:both;"></div>
			
	</div> <!-- end #main -->

<?php get_footer(); ?>