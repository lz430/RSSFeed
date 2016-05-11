<<<<<<< HEAD
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
     <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>LZ Feed</title>
        <script type="text/javascript" src="js/jquery.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/inettuts.js.css" rel="stylesheet" type="text/css" />
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/inettuts.css" rel="stylesheet" type="text/css" />
        <link href="css/weather-icons.min.css" rel="stylesheet" type="text/css" />
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
          <div class="row">
            <div class="lz-container">
          <div id="greeting" data-fullname="Lenny" class="colorable box col-lg-4 col-md-4 col-sm-6 col-xs-12" data-colorable="border-bottom-color">
               <div class="content tab-content">
                  <div class="tab-pane fade in active" id="greetingview">
                     <h3 id="greet">Greeting...</h3><h2 id="name">Name...</h2>
                  </div>
                  <div class="tab-pane fade" id="greetingedit">
                     <h2>Settings</h2>
                     <br>
                     <h4>Name</h4>
                     <input id="greeting-fullname" type="text" class="form-control" placeholder="Your Name">
                     <br>
                     <button type="button" class="btn btn-info save">Save</button><button type="button" class="btn btn-default cancel">Discard</button>
                  </div>
               </div>
               <div class="edit"><a href="#greetingedit" data-placement="left" data-title="Configure" data-toggle="tab"><img src="img/icon-edit.png" class="colorable" data-colorable="background-color" alt="Edit"></a></div>
               <div class="clearfix"></div>
            </div><!--end greeting-->

            <div id="datetime" class="colorable box col-lg-4 col-md-4 col-sm-6 col-xs-12" data-colorable="">
               <h2 id="time">Time...</h2><h4 id="date">Date...</h4>
            </div>
            
            <div id="weather" data-location="Macomb, MI" data-units="metric" class="box col-lg-4 col-md-4 col-sm-4 col-xs-12">
               <div class="edit"><a href="#weatheredit" data-placement="left" data-title="Configure" data-toggle="tab"><img src="img/icon-edit.png" class="colorable" data-colorable="background-color" alt="Edit"></a></div>
               <div class="tab-pane fade in active col-lg-12 col-md-12 col-sm-12 col-xs-12" id="weatherview">
                  <i class="wi col-lg-4 col-md-4 col-sm-12 col-xs-12" data-colorable="color" alt="Weather"></i>
                  <h1 id="temperature" class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></h1>
                  <h3 id="condition" class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></h3>
               </div> <!--end weatherview-->
                <div class="tab-pane fade" id="weatheredit">
                     <h2>Settings</h2>
                     <br>
                     <h4>Location</h4>
                     <input id="weather-location" type="text" class="form-control" placeholder="Location (City,Country)">
                     <br>
                     <h4>Units</h4>
                     <select id="weather-units" class="form-control">
                        <option value="metric">Celcius</option>
                        <option value="imperial">Farenheit</option>
                     </select>
                     <br>
                     <h4>Tile Color</h4>
                     <div class="tilecolorselector"></div>
                     <br>
                     <button type="button" class="btn btn-info save">Save</button><button type="button" class="btn btn-default cancel">Discard</button>
                  </div>
               </div>
               <div class="clearfix"></div>
            </div> <!--end weather-->
            
         </div> <!-- end lz-container -->
      </div><!-- End .row -->
         </div>
     
         <div id="columns">
             <ul id="column1" class="col-md-4">
                 <li class="widget" id="intro">
                     <div class="widget-head">
                         <h3>
                          <a href="<? echo $feeds['feed1'] ?>" title="<? echo $feeds['feed1'] ?>">
                            <? echo $feeds['feed1'] ?>
                          </a>
                        </h3>
                        <span class="glyphicon glyphicon-fullscreen"></span>
                         <span class="glyphicon glyphicon-remove-circle"></span>
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
                         <span class="glyphicon glyphicon-fullscreen"></span>
                         <span class="glyphicon glyphicon-remove-circle"></span>
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
     
             <ul id="column2" class="col-md-4">
                 <li class="widget" id="widget3">  
                     <div class="widget-head">
                         <h3><a href="<? echo $feeds['feed3'] ?>" title="<? echo $feeds['feed3'] ?>"><? echo $feeds['feed3'] ?></a></h3>
                         <span class="glyphicon glyphicon-fullscreen"></span>
                         <span class="glyphicon glyphicon-remove-circle"></span>
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
                         <span class="glyphicon glyphicon-fullscreen"></span>
                         <span class="glyphicon glyphicon-remove-circle"></span>
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
             
             <ul id="column3" class="col-md-4">
                 <li class="widget" id="widget5">  
                     <div class="widget-head">
                         <h3><a href="<? echo $feeds['feed5'] ?>" title="<? echo $feeds['feed5'] ?>"><? echo $feeds['feed5'] ?></a></h3>
                         <span class="glyphicon glyphicon-fullscreen"></span>
                         <span class="glyphicon glyphicon-remove-circle"></span>
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
                        <span class="glyphicon glyphicon-fullscreen"></span>
                         <span class="glyphicon glyphicon-remove-circle"></span>
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
                         <span class="glyphicon glyphicon-fullscreen"></span>
                         <span class="glyphicon glyphicon-remove-circle"></span>
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
          <script src="js/jquery-ui-1.10.3.custom.min"></script>
          <!-- 
          <script src="js/cookie.jquery.js"></script>
          <script src="js/inettuts.js"></script>
           -->
          <script src="js/moment.min.js"></script>
          <script src="js/b64.min.js"></script>
          <script src="js/backstretch.min.js"></script>
          <script src="js/main.js"></script>

          <script type="text/javascript">
            $(document).ready(function(){
              // var maximize = $(".glyphicon-fullscreen");
              // var restore = $(".glyphicon-remove-circle");
              // $(maximize).click(function(){
              //   var active = $(this).closest(".widget");
              //   var original = $(active).html();
                // console.log(original);
                // $("#columns").toggle();
                // $("body").append(original);
              // });

             // $(restore).click(function(){
             //    var minimize = $(this).closest(".widget");
             //    var original = $(minimize).find("li").html();
             //    $(minimize).removeClass("maximize");
             //    $("#columns").toggle();
             //    $("body .widget").last().remove(original);
             //  });

            });

          </script>
     </body>
=======
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
     <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>LZ Feed</title>
        <script type="text/javascript" src="js/jquery.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/inettuts.js.css" rel="stylesheet" type="text/css" />
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/inettuts.css" rel="stylesheet" type="text/css" />
        <link href="css/weather-icons.min.css" rel="stylesheet" type="text/css" />
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
          <div class="row">
            <div class="lz-container">
          <div id="greeting" data-fullname="Lenny" class="colorable box col-lg-4 col-md-4 col-sm-6 col-xs-12" data-colorable="border-bottom-color">
               <div class="content tab-content">
                  <div class="tab-pane fade in active" id="greetingview">
                     <h3 id="greet">Greeting...</h3><h2 id="name">Name...</h2>
                  </div>
                  <div class="tab-pane fade" id="greetingedit">
                     <h2>Settings</h2>
                     <br>
                     <h4>Name</h4>
                     <input id="greeting-fullname" type="text" class="form-control" placeholder="Your Name">
                     <br>
                     <button type="button" class="btn btn-info save">Save</button><button type="button" class="btn btn-default cancel">Discard</button>
                  </div>
               </div>
               <div class="edit"><a href="#greetingedit" data-placement="left" data-title="Configure" data-toggle="tab"><img src="img/icon-edit.png" class="colorable" data-colorable="background-color" alt="Edit"></a></div>
               <div class="clearfix"></div>
            </div><!--end greeting-->

            <div id="datetime" class="colorable box col-lg-4 col-md-4 col-sm-6 col-xs-12" data-colorable="">
               <h2 id="time">Time...</h2><h4 id="date">Date...</h4>
            </div>
            
            <div id="weather" data-location="Macomb, MI" data-units="metric" class="box col-lg-4 col-md-4 col-sm-4 col-xs-12">
               <div class="edit"><a href="#weatheredit" data-placement="left" data-title="Configure" data-toggle="tab"><img src="img/icon-edit.png" class="colorable" data-colorable="background-color" alt="Edit"></a></div>
               <div class="tab-pane fade in active col-lg-12 col-md-12 col-sm-12 col-xs-12" id="weatherview">
                  <i class="wi col-lg-4 col-md-4 col-sm-12 col-xs-12" data-colorable="color" alt="Weather"></i>
                  <h1 id="temperature" class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></h1>
                  <h3 id="condition" class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></h3>
               </div> <!--end weatherview-->
                <div class="tab-pane fade" id="weatheredit">
                     <h2>Settings</h2>
                     <br>
                     <h4>Location</h4>
                     <input id="weather-location" type="text" class="form-control" placeholder="Location (City,Country)">
                     <br>
                     <h4>Units</h4>
                     <select id="weather-units" class="form-control">
                        <option value="metric">Celcius</option>
                        <option value="imperial">Farenheit</option>
                     </select>
                     <br>
                     <h4>Tile Color</h4>
                     <div class="tilecolorselector"></div>
                     <br>
                     <button type="button" class="btn btn-info save">Save</button><button type="button" class="btn btn-default cancel">Discard</button>
                  </div>
               </div>
               <div class="clearfix"></div>
            </div> <!--end weather-->
            
         </div> <!-- end lz-container -->
      </div><!-- End .row -->
         </div>
     
         <div id="columns">
             <ul id="column1" class="col-md-4">
                 <li class="widget" id="intro">
                     <div class="widget-head">
                         <h3>
                          <a href="<? echo $feeds['feed1'] ?>" title="<? echo $feeds['feed1'] ?>">
                            <? echo $feeds['feed1'] ?>
                          </a>
                        </h3>
                        <span class="glyphicon glyphicon-fullscreen"></span>
                         <span class="glyphicon glyphicon-remove-circle"></span>
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
                         <span class="glyphicon glyphicon-fullscreen"></span>
                         <span class="glyphicon glyphicon-remove-circle"></span>
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
     
             <ul id="column2" class="col-md-4">
                 <li class="widget" id="widget3">  
                     <div class="widget-head">
                         <h3><a href="<? echo $feeds['feed3'] ?>" title="<? echo $feeds['feed3'] ?>"><? echo $feeds['feed3'] ?></a></h3>
                         <span class="glyphicon glyphicon-fullscreen"></span>
                         <span class="glyphicon glyphicon-remove-circle"></span>
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
                         <span class="glyphicon glyphicon-fullscreen"></span>
                         <span class="glyphicon glyphicon-remove-circle"></span>
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
             
             <ul id="column3" class="col-md-4">
                 <li class="widget" id="widget5">  
                     <div class="widget-head">
                         <h3><a href="<? echo $feeds['feed5'] ?>" title="<? echo $feeds['feed5'] ?>"><? echo $feeds['feed5'] ?></a></h3>
                         <span class="glyphicon glyphicon-fullscreen"></span>
                         <span class="glyphicon glyphicon-remove-circle"></span>
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
                        <span class="glyphicon glyphicon-fullscreen"></span>
                         <span class="glyphicon glyphicon-remove-circle"></span>
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
                         <span class="glyphicon glyphicon-fullscreen"></span>
                         <span class="glyphicon glyphicon-remove-circle"></span>
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
          <script src="js/jquery-ui-1.10.3.custom.min"></script>
          <!-- 
          <script src="js/cookie.jquery.js"></script>
          <script src="js/inettuts.js"></script>
           -->
          <script src="js/moment.min.js"></script>
          <script src="js/b64.min.js"></script>
          <script src="js/backstretch.min.js"></script>
          <script src="js/main.js"></script>

          <script type="text/javascript">
            $(document).ready(function(){
              // var maximize = $(".glyphicon-fullscreen");
              // var restore = $(".glyphicon-remove-circle");
              // $(maximize).click(function(){
              //   var active = $(this).closest(".widget");
              //   var original = $(active).html();
                // console.log(original);
                // $("#columns").toggle();
                // $("body").append(original);
              // });

             // $(restore).click(function(){
             //    var minimize = $(this).closest(".widget");
             //    var original = $(minimize).find("li").html();
             //    $(minimize).removeClass("maximize");
             //    $("#columns").toggle();
             //    $("body .widget").last().remove(original);
             //  });

            });

          </script>
     </body>
>>>>>>> 326e2a79f17e3b750e4692caacae63534ee35da1
</html>