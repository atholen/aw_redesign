<h3 class="events">Upcoming Events</h3>

<?php
global $post;
$category = get_cat_ID('Event');
$postslist = get_posts('numberposts=100&orderby=date&cat='.$category);

	/* Get today's date */
	
	$curDate = date("m.d.Y");
	$dateUnits = explode(".", $curDate);
	
	/* $dateUnits[0] => month; [1] => day; [2] => year */
	$curDate = $dateUnits[2].$dateUnits[0].$dateUnits[1];


$i = 0; /* initialization for $postArray */
$postArray = array();

/* Creat an array that pairs a post(ID) with its event date */
foreach($postslist as $post) :
	setup_postdata($post);
	
	/* 
		The date of each event is entered in the form MM.DD.YYYY.
		If we break the date down to its component parts we can we can concatanate each unit to produce a new number in the form YYYYMMDD.
		In this format, later dates will always have higher values than earlier dates.
		We can use this number ($eventNum) to order events, regardless of the date the event was published.   
	*/	
	
	$date = get_post_meta($post->ID, "Date", true);
	$dateUnits = explode(".", $date);
	
	/* $dateUnits[0] => month; [1] => day; [2] => year */
	$eventDate = $dateUnits[2].$dateUnits[0].$dateUnits[1];


	/*
		Now let's create an array in which each post is associated with an $eventNum:
	*/

	/* Only show events that haven't already occured */	
	if((int)$eventDate >= (int)$curDate){	
			
		/*Get post variables*/
		$postID = get_the_ID();
		$permalink = get_permalink();
		$title = get_the_title();
		$venue = get_post_meta($post->ID, "Venue", true);
		$the_date = get_post_meta($post->ID, "Date", true);
		
		/*Populate array*/
		$eventArray = array('eventDate' => $eventDate, 'postID' => $postID, 'permalink' => $permalink, 
							'title' => $title, 'venue' => $venue, 'the_date' => $the_date);
		
		/*
			Now let's nest this array in an array called $postArray.  This will let us sort the posts by their $eventNum.  
			Note that $postArray was already initiated earlier on.
		*/
		
		$postArray[$i] = $eventArray;
		$i += 1;
		
	}; /* end if */

endforeach; 

if(sizeof($postArray)>0){ /* This if statement is just to check if there are even events to sort */

	/*Sort Function*/
	
	function subval_sort($a,$subkey) {
		foreach($a as $k=>$v) {
			$b[$k] = strtolower($v[$subkey]);
		}
		asort($b);
		foreach($b as $key=>$val) {
			$c[] = $a[$key];
		}
		return $c;
	}
	
	/* Sort the posts in $postArray by the $eventDate */
	
	$postArray = subval_sort($postArray,'eventDate');
	
	$jsonArray = json_encode($postArray);
}

?>


<!-- START EVENTS BOX -->
<ul class="events scroll">

	<?php

	/* Set number of posts to disply */

	$desiredPosts = sizeof($postArray);

	/* Old code for only showing 5 posts
	
		if (sizeof($postArray) >= 5){
			$desiredPosts = 5;
		}
		else ( $desiredPosts = sizeof($postArray));

	*/

	/* Fetch and display posts from $postArray (which is ordered by eventDate) */
	
	/* if there aren't any events...*/
	
	if($desiredPosts == 0){?>

		<a href="http://www.auralwes.org/for-concert-bookers/how-to-plan-a-concert/">
		<li>
			<div class="content">
				<span class="title">No scheduled events</span><br/>
			</div> <!-- end .content -->

			<div class="info">
			</div> <!-- end .info -->
			
			<div style="clear:both;"></div>
		</a></li>
		
	<?php
	}
	
	else{

		for($eventCounter = 0; $eventCounter < $desiredPosts; $eventCounter++){
	
			$eventDate = $postArray[$eventCounter]['eventDate'];
	
			$postID = $postArray[$eventCounter]['postID'];
			$post = get_post($postID);
			setup_postdata($post);
	
			$e_parts = explode(".", get_post_meta($post->ID, "Date", true));
				$e_year = $e_parts[2];
				$e_month = $e_parts[0];
				$e_day = $e_parts[1];
	
		?>
		
			<li><a href="<?php the_permalink(); ?>">
	
				<div class="content">
					<?php the_post_thumbnail('featured-medium'); ?>
					<span class="title"><?php the_title(); ?></span><br/>
					<?php echo get_post_meta($post->ID, "Kicker", true); ?>	
				</div> <!-- end .content -->
	
				<div class="info">
					<span class="day">
						<?php
							/* If the event is today...*/
							if($curDate == (int)$e_year.$e_month.$e_day){
								echo 'Today';
							} 
							/* If not...*/
							else{
								echo date ( "l", mktime(0, 0, 0, $e_month, $e_day, $e_year)); 
							}
						?>
					</span>
					<span class="time" title="<?php echo date ( "l F j, Y", mktime(0, 0, 0, $e_month, $e_day, $e_year)); ?>"><?php echo date ( "M. j", mktime(0, 0, 0, $e_month, $e_day, $e_year)); ?></span>
					<span class="venue"><?php echo get_post_meta($post->ID, "Venue", true); ?></span><br/>
					<span class="venue"><?php echo get_post_meta($post->ID, "Doors", true); ?></span>
				</div> <!-- end .info -->
				
				<div style="clear:both;"></div>
			</a></li>
			
		<?php 
	
		}; /* end foreach */
		?>
	
	<?php } /* end else (no events...) */
	?>

</ul>
<!-- END EVENTS BOX -->




