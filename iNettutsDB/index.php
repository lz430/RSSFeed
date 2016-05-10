<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
     <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>RSS Feed</title>
        <script type="text/javascript" src="js/jquery.js"></script>
        <link href="css/fancybox.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/inettuts.css" rel="stylesheet" type="text/css" />
        <link href="css/inettuts.js.css" rel="stylesheet" type="text/css" />


    
     </head>
     <body>
	 <?php 
             $feeds['feed1'] ="http://detroit.craigslist.org/web/index.rss";
             $feeds['feed2'] ="http://detroit.craigslist.org/cpg/index.rss";
             $feeds['feed3'] ="http://detroit.craigslist.org/eng/index.rss";
             $feeds['feed4'] ="http://jobs.smashingmagazine.com/rss/all/all";
             $feeds['feed5'] ="http://www.authenticjobs.com/rss/index.xml";
             $feeds['feed6'] ="http://www.krop.com/services/feeds/rss/latest/";
             $feeds['feed7'] ="http://feeds.feedburner.com/FSAllJobs?format=xml";
             $feeds['feed8'] ="https://weworkremotely.com/categories/2/jobs.rss";
          ?>
     
         
         
         <div id="head">
            <h2>RSS Feed</h2>
             <div id="date"><? echo date("m/d/Y"); ?></div>
         </div>
     
         <div id="columns">
             
             <ul id="column1" class="column">
                 <li class="widget color-green" id="intro">
                     <div class="widget-head">
                         <h3>
                          <a href="<? echo $feeds['feed1'] ?>" title="<? echo $feeds['feed1'] ?>">
                            <? echo $feeds['feed1'] ?>
                          </a>
                          
                        </h3>
                     </div>
                     <div class="widget-content">
                         <?
                         $rss = new DOMDocument();
                         $rss->load($feeds['feed1']);
					$feed = array();		
						foreach ($rss->getElementsByTagName('item') as $node) {
							$item = array ( 
								'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
								'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
								'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
								'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
								);
							array_push($feed, $item);
						}
                                          $limit = 5;
						for($x=0;$x<$limit;$x++) {
							$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
							$link = $feed[$x]['link'];
							$description = $feed[$x]['desc'];
							$description = substr($description, 0, 150);
							$date = date('l F d, Y', strtotime($feed[$x]['date']));                         
							echo '<div class="box">';
							echo '<h2><a href="'.$link.'" title="'.$title.'"  class="" target="_blank">'.$title.'</a></h2> ';
							// //echo '<div class="posted">Posted on '.$date.'</div>';
							//echo '<p>'.$description.'</p>';
						echo '</div>';
					}
                     ?>
                     </div>
                 </li>
                 <li class="widget" id="widget2">  
                     <div class="widget-head">
                         <h3><a href="<? echo $feeds['feed2'] ?>" title="<? echo $feeds['feed2'] ?>"><? echo $feeds['feed2'] ?></a></h3>
                     </div>
                     <div class="widget-content">
                         <?
                         $rss = new DOMDocument();
                         $rss->load($feeds['feed2']);
					$feed = array();		
						foreach ($rss->getElementsByTagName('item') as $node) {
							$item = array ( 
								'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
								'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
								'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
								'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
								);
							array_push($feed, $item);
						}
                              $limit = 5;
						for($x=0;$x<$limit;$x++) {
							$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
							$link = $feed[$x]['link'];
							$description = $feed[$x]['desc'];
							$description = substr($description, 0, 150);
							$date = date('l F d, Y', strtotime($feed[$x]['date']));                         
							echo '<div class="box">';
							echo '<h2><a href="'.$link.'" title="'.$title.'"  class="" target="_blank">'.$title.'</a></h2>';
							//echo '<div class="posted">Posted on '.$date.'</div>';
							//echo '<p>'.$description.'</p>';
						echo '</div>';
					}
                     ?>
                     </div>
                 </li>
             </ul>
     
             <ul id="column2" class="column">
                 <li class="widget" id="widget3">  
                     <div class="widget-head">
                         <h3><a href="<? echo $feeds['feed3'] ?>" title="<? echo $feeds['feed3'] ?>"><? echo $feeds['feed3'] ?></a></h3>
                     </div>
                     <div class="widget-content">
                         <?
                         $rss = new DOMDocument();
                         $rss->load($feeds['feed3']);
					$feed = array();		
						foreach ($rss->getElementsByTagName('item') as $node) {
							$item = array ( 
								'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
								'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
								'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
								'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
								);
							array_push($feed, $item);
						}
                              $limit = 5;
						for($x=0;$x<$limit;$x++) {
							$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
							$link = $feed[$x]['link'];
							$description = $feed[$x]['desc'];
							$description = substr($description, 0, 150);
							$date = date('l F d, Y', strtotime($feed[$x]['date']));                         
							echo '<div class="box">';
							echo '<h2><a href="'.$link.'" title="'.$title.'"  class="" target="_blank">'.$title.'</a></h2>';
							//echo '<div class="posted">Posted on '.$date.'</div>';
							//echo '<p>'.$description.'</p>';
						echo '</div>';
					}
                     ?>
                     </div>
                 </li>
                 <li class="widget" id="widget4">  
                     <div class="widget-head">
                         <h3><a href="<? echo $feeds['feed4'] ?>" title="<? echo $feeds['feed4'] ?>"><? echo $feeds['feed4'] ?></a></h3>
                     </div>
                     <div class="widget-content">
                         <?
                         $rss = new DOMDocument();
                         $rss->load($feeds['feed4']);
					$feed = array();		
						foreach ($rss->getElementsByTagName('item') as $node) {
							$item = array ( 
								'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
								'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
								'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
								'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
								);
							array_push($feed, $item);
						}
                              $limit = 5;
						for($x=0;$x<$limit;$x++) {
							$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
							$link = $feed[$x]['link'];
							$description = $feed[$x]['desc'];
							$description = substr($description, 0, 150);
							$date = date('l F d, Y', strtotime($feed[$x]['date']));                         
							echo '<div class="box">';
							echo '<h2><a href="'.$link.'" title="'.$title.'"  target="_blank">'.$title.'</a></h2>';
							//echo '<div class="posted">Posted on '.$date.'</div>';
							//echo '<p>'.$description.'</p>';
						echo '</div>';
					}
                     ?>
                     </div>
                 </li>
             </ul>
             
             <ul id="column3" class="column">
                 <li class="widget" id="widget5">  
                     <div class="widget-head">
                         <h3><a href="<? echo $feeds['feed5'] ?>" title="<? echo $feeds['feed5'] ?>"><? echo $feeds['feed5'] ?></a></h3>
                     </div>
                     <div class="widget-content">
                         <?
                         $rss = new DOMDocument();
                         $rss->load($feeds['feed5']);
					$feed = array();		
						foreach ($rss->getElementsByTagName('item') as $node) {
							$item = array ( 
								'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
								'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
								'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
								'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
								);
							array_push($feed, $item);
						}
                              $limit = 5;
						for($x=0;$x<$limit;$x++) {
							$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
							$link = $feed[$x]['link'];
							$description = $feed[$x]['desc'];
							$description = substr($description, 0, 150);
							$date = date('l F d, Y', strtotime($feed[$x]['date']));                         
							echo '<div class="box">';
							echo '<h2><a href="'.$link.'" title="'.$title.'"  target="_blank">'.$title.'</a></h2>';
							//echo '<div class="posted">Posted on '.$date.'</div>';
							//echo '<p>'.$description.'</p>';
						echo '</div>';
					}
                     ?>
                     </div>
                 </li>
                 <li class="widget" id="widget6">  
                     <div class="widget-head">
                         <h3>
                            <a href="<? echo $feeds['feed6'] ?>" title="<? echo $feeds['feed6'] ?>">
                            <? echo $feeds['feed6'] ?>
                          </a>
                        </h3>
                     </div>
                     <div class="widget-content">
                         <?
                         $rss = new DOMDocument();
                         $rss->load($feeds['feed6']);
					$feed = array();		
						foreach ($rss->getElementsByTagName('item') as $node) {
							$item = array ( 
								'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
								'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
								'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
								'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
								);
							array_push($feed, $item);
						}
                              $limit = 5;
						for($x=0;$x<$limit;$x++) {
							$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
							$link = $feed[$x]['link'];
							$description = $feed[$x]['desc'];
							$description = substr($description, 0, 150);
							$date = date('l F d, Y', strtotime($feed[$x]['date']));                         
							echo '<div class="box">';
							echo '<h2><a href="'.$link.'" title="'.$title.'"  target="_blank">'.$title.'</a></h2>';
							//echo '<div class="posted">Posted on '.$date.'</div>';
							//echo '<p>'.$description.'</p>';
						echo '</div>';
					}
                     ?>
                     </div>
                 </li>
                 <!-- <li class="widget" id="widget7">  
                     <div class="widget-head">
                         <h3><a href="<? echo $feeds['feed7'] ?>" title="<? echo $feeds['feed7'] ?>"><? echo $feeds['feed7'] ?></a></h3>
                     </div>
                     <div class="widget-content">
                         <?
                         $rss = new DOMDocument();
                         $rss->load($feeds['feed7']);
          $feed = array();    
            foreach ($rss->getElementsByTagName('item') as $node) {
              $item = array ( 
                'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
                'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
                'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
                'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
                );
              array_push($feed, $item);
            }
            $limit = 5;
            for($x=0;$x<$limit;$x++) {
              $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
              $link = $feed[$x]['link'];
              $description = $feed[$x]['desc'];
              $description = substr($description, 0, 150);
              $date = date('l F d, Y', strtotime($feed[$x]['date']));                         
              echo '<div class="box">';
                echo '<h2><a href="'.$link.'" title="'.$title.'"  target="_blank">'.$title.'</a></h2>';
                //echo '<div class="posted">Posted on '.$date.'</div>';
                //echo '<p>'.$description.'</p>';
              echo '</div>';
          }
                     ?>
                     </div>
                 </li> -->
                
                  <li class="widget" id="widget8">  
                     <div class="widget-head">
                         <h3><a href="<? echo $feeds['feed8'] ?>" title="<? echo $feeds['feed8'] ?>"><? echo $feeds['feed8'] ?></a></h3>
                     </div>
                     <div class="widget-content">
                         <?
                            $rss = new DOMDocument();
                            $rss->load($feeds['feed8']);
                            $feed = array();
                            foreach ($rss->getElementsByTagName('item') as $node) {
                              $item = array (
                              'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
                              'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
                              'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
                              'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
                            );
                            array_push($feed, $item);
                            }
                            $limit = 5;
                              for($x=0;$x<$limit;$x++) {
                              $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
                              $link = $feed[$x]['link'];
                              $description = $feed[$x]['desc'];
                              $date = date('l F d, Y', strtotime($feed[$x]['date']));                         
                              echo '<div class="box">';
                                echo '<h2><a href="'.$link.'" title="'.$title.'"  target="_blank">'.$title.'</a></h2>';
                                //echo '<div class="posted">Posted on '.$date.'</div>';
                                //echo '<p>'.$description.'</p>';
                              echo '</div>';
                            }
                     ?>
                     </div>
                 </li>

             </ul>
             
         </div>
          <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min"></script>
          <script type="text/javascript" src="js/cookie.jquery.js"></script>
          <script type="text/javascript" src="js/inettuts.js"></script>

          <script type="text/javascript">
            $(document).ready(function(){
              $('.refresh').click(function(){
                $(this).find()
                var url = <?php echo json_encode($myVarValue); ?>
              });
            });

          </script>
     </body>
</html>