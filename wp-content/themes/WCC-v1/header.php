<!DOCTYPE HTML>
<html>
<head>
	<title>
		<?php if (is_home()) { echo bloginfo('name');
		} elseif (is_404()) {
		echo '404 Not Found';
		} elseif (is_category()) {
		echo 'Category:'; wp_title('');
		} elseif (is_search()) {
		echo 'Search Results';
		} elseif ( is_day() || is_month() || is_year() ) {
		echo 'Archives:'; wp_title('');
		} else {
		echo wp_title('');
		}
		?>
	</title>

    <meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<meta name="description" content="<?php bloginfo('description') ?>" />
	<?php if(is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
    <?php }?>

	<link rel="shortcut icon" href="/favicon.png">
	<link rel="apple-touch-icon" href="/favicon.png">

	<!-- core stylesheets -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
	<link rel="stylesheet" media="screen and (max-device-width: 500px)" href="<?php bloginfo('template_url'); ?>/style/narrow.css" />	
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<!-- END core stylesheets -->

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!-- jQuery (required) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>

	<!-- Anything Slider -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style/anythingslider.css" type="text/css" media="screen"> <!-- Anything Slider stylesheet -->
	<script  src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.2.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/anythingslider.js"></script>
	<!-- end Anything Slider -->

	<!-- Superfish dropdown -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style/superfish.css" media="screen"> 
	<script src="<?php bloginfo('template_url'); ?>/js/hoverIntent.js"></script> 
	<script src="<?php bloginfo('template_url'); ?>/js/superfish.js"></script> 
	<script>
		// initialise plugins
	    $(document).ready(function() { 
	        $('ul.sf-menu').superfish({ 
	            delay:       1000,                            // one second delay on mouseout 
	            animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
	            speed:       'fast',                          // faster animation speed 
	            autoArrows:  false,                           // disable generation of arrow mark-up 
	            dropShadows: false                            // disable drop shadows 
	        }); 
	    }); 
 
	</script>
	<!-- end Superfish dropdown -->

	<!-- Chosen -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/chosen/chosen.css" />

	<!-- qTip Tooltip -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/qtip/jquery.qtip.css" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/qtip/jquery.qtip.min.js" />
	
	<!-- Google Analytics -->
	<script>	
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-24377591-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
	<!-- end Google Analytics -->

	<!-- Google CSE -->
    <script src="https://www.google.com/jsapi?key=ABQIAAAAa2_4CDP7xWxPjqRMKkzFDRRVMzaDosm3H6e0BnxyZzavVqFJxRRdd6H0-xSKf4Ww0sngQOnJo-igDA"></script>
    <script>
    //<![CDATA[

    google.load("search", "1");

    function OnLoad() {
      // Create a search control
      var searchControl = new google.search.SearchControl();

      // Add in a full set of searchers
      var localSearch = new google.search.LocalSearch();
      searchControl.addSearcher(localSearch);
      searchControl.addSearcher(new google.search.WebSearch());
      searchControl.addSearcher(new google.search.VideoSearch());
      searchControl.addSearcher(new google.search.BlogSearch());

      // Set the Local Search center point
      localSearch.setCenterPoint("New York, NY");

      // Tell the searcher to draw itself and tell it where to attach
      searchControl.draw(document.getElementById("searchcontrol"));

      // Execute an inital search
      searchControl.execute("Google");
    }
    google.setOnLoadCallback(OnLoad);

    //]]>
    </script>
	<!-- end Google CSE -->

	<link rel="stylesheet" href="http://www.google.com/cse/style/look/default.css" type="text/css" />
	<style type="text/css">
	  input.gsc-input {
	    border-color: #cccccc;
	    line-height: 35px !important;
	  }
	</style>		

</head>



<body>

<div id="container">

	<div id="header">
	
		<a href="/"><div class="logo">
			<img src="http://auralwes.org/wp-content/themes/WCC-v1/images/aw-logo2.png" alt="Aural Wes" />
		</div></a> <!-- end .logo -->
		
		<div class="nav">
		
			<ul class="sf-menu">

				<li>
					<a href="/blog">What's On Campus</a>
					<ul>
						<li><a href="/blog/">What's On Campus</a></li>
						<li><a href="/blog/bands/">Bands</a></li>
						<li><a href="/blog/old-friends/">Old Friends</a></li>
					</ul>
				</li>

				<li><a href="/calendar">Calendar</a></li>

				<li>
					<a href="/for-concert-bookers">For Concert Bookers</a>
					<ul>
						<li><a href="/for-concert-bookers/how-to-plan-a-concert/">Plan A Concert</a></li>
						<li><a href="/for-concert-bookers/existing-on-campus-booking-groups/">Campus Booking Groups</a></li>
						<li><a href="/for-concert-bookers/important-paperwork-for-you/">Important Paperwork</a></li>
					</ul>
				</li>
								
				<li>
					<a href="/contacts">Contacts</a>
					<ul>
						<li><a href="/contacts/concert-committee-contacts/">Concert Committee</a></li>
						<li><a href="/contacts/school-admin-contacts/">School Admin</a></li>
						<li><a href="/contacts/venue-contacts/">Venue Contacts</a></li>
						<li><a href="/contacts/">Contact Aural Wes</a></li>
					</ul>
				</li>

				<li>
					<a href="/for-agents">For Agents</a>
					<ul>
						<li><a href="/for-agents/what-we-do/">What We Do</a></li>
						<li><a href="/for-agents/how-to-book-your-band-here/">Book Your Band Here</a></li>
						<li><a href="/for-agents/getting-your-bands-here/">Get Your Band Here</a></li>
						<li><a href="/for-agents/what-we-have/">What We Have</a></li>
					</ul>
				</li>
				
				<li><a href="/faqs">FAQs</a></li>

			</ul>
			
			<select onchange="window.location.href=this.options[this.selectedIndex].value">
				<option value="" selected="selected">Select</option> 
				
				<option value="/">Home</option>
				<option value="/blog">What's On Campus</option>
				<option value="/calendar">Calendar</option>
				<option value="/for-concert-bookers">For Concert Bookers</option>
				<option value="/contacts">Contacts</option>
				<option value="/for-agents">For Agents</option>
				<option value="/faqs">FAQs</option>
			</select> 

			<div style="clear:both;"></div>
		
		</div> <!-- end .nav -->
		
	
	</div> <!-- end #header -->

