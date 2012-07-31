</div> <!-- end #container -->

<div id="footer">
	
	<div class="gen-info">
	
		<?php
		global $post;
		$category = get_cat_ID('Footer');
		$postslist = get_posts('numberposts=1&orderby=date&cat='.$category);
		foreach($postslist as $post) :
		setup_postdata($post);?>
			
			<h3><?php the_title();?></h3>
			<?php the_content(); ?>
						
		<?php endforeach; ?>		
	
	</div> <!-- end .gen-info -->
	
	<div class="get-involved">
		<h3>Disclaimer</h3>
		<p>All shows advertised on this website are not open to the public, and attendance will be limited to current Wesleyan students and their guests.</p>

	</div> <!-- end. get-involved -->
	
	<div style="clear:both;"></div>

</div> <!-- end #footer -->

	
</body>

</html>