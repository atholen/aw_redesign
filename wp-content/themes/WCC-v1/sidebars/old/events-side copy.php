<h3 class="events">Upcoming Events</h3>

<?php
global $post;
$category = get_cat_ID('Event');
$postslist = get_posts('numberposts=100&orderby=date&cat='.$category);

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

	$postID = get_the_ID();
	$eventArray = array('$eventDate' => $eventDate, 'postID' => $postID);
	
	/*
		Now let's nest this array in an array called $postArray.  This will let us sort the posts by their $eventNum.  
		Note that $postArray was already initiated earlier on.
	*/
	
	$postArray[$i] = $eventArray;
	$i += 1;

endforeach; 

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

$postArray = subval_sort($postArray,'$eventDate');

?>

<?php

/* Get today's date */

$curDate = date("m.d.Y");
$dateUnits = explode(".", $curDate);

/* $dateUnits[0] => month; [1] => day; [2] => year */
$curDate = $dateUnits[2].$dateUnits[0].$dateUnits[1];

?>

<!-- START EVENTS BOX -->
<ul class="events">

	<?php
	/* Fetch and display posts from $postArray (which is ordered by eventDate) */
	$postCounter = 0;
	foreach($postArray as $postID){
		$eventDate = $postArray[$postCounter]['$eventDate'];
		$postID = $postArray[$postCounter]['postID'];
		$post = get_post($postID);
		setup_postdata($post);
		$postCounter += 1;
		
		/* Only show events that haven't already occured */	
		if((int)$eventDate >= (int)$curDate){	
	?>
		
			<li><a href="<?php the_permalink(); ?>">
				<div class="info">
					<span class="time"><?php echo get_post_meta($post->ID, "Date", true); ?></span>
					<span class="venue"><?php echo get_post_meta($post->ID, "Venue", true); ?></span>
				</div> <!-- end .info -->
				
				<div class="content">
					<?php the_post_thumbnail('featured-medium'); ?>
					<strong><?php the_title(); ?></strong><br/>
					<?php echo get_post_meta($post->ID, "Kicker", true); ?>	
				</div> <!-- end .content -->
				<div style="clear:both;"></div>
			</a></li>
				
		
	<?php 
		}; /* end if */
	}; /* end foreach */
	?>

</ul>
<!-- END EVENTS BOX -->

<h3 class="events">Show More Events</h3>
