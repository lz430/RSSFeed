<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
     <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LZ Feed</title>
        <script type="text/javascript" src="js/jquery.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/weather-icons.min.css" rel="stylesheet" type="text/css" />
        <!-- Google Web Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300italic,300' rel='stylesheet' type='text/css'>

     </head>
     <body>
        
       <div id="head">
          <div class="row">
            <div class="lz-container clearfix">
              <div id="greeting" data-tilecolor="#65b676" data-fullname="Lenny" class="colorable box col-lg-4 col-md-4 col-sm-4 col-xs-6" data-colorable="nope">
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
               <div class="edit"><a href="#greetingedit" data-placement="left" data-title="Configure" data-toggle="tab"><img src="img/icon-edit.png" class="colorable" data-colorable="nope" alt="Edit"></a></div>
               <div class="clearfix"></div>
            </div><!--end greeting-->

            <div id="datetime" data-tilecolor="#e8c883" class="colorable box col-lg-4 col-md-4 col-sm-4 col-xs-6" data-colorable="">
               <h4 id="date">Date...</h4>
               <h2 id="time">Time...</h2>
            </div>

            <div id="weather" data-tilecolor="#76b7ee" data-location="Montreal,CA" data-units="metric" class="box col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="edit"><a href="#weatheredit" data-placement="left" data-title="Configure" data-toggle="tab"><img src="img/icon-edit.png" class="colorable" data-colorable="nope" alt="Edit"></a></div>
                <div class="content tab-content">
                  <div class="tab-pane fade active in col-lg-12 col-md-12 col-sm-12 col-xs-12" id="weatherview">
                    <div class="temp-container">
                      <h3 id="temperature"></h3>
                      <i class="wi" data-colorable="color" alt="Weather"></i>
                      <div class="clearfix"></div>
                    </div>
                    <h3 id="condition" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></h3>
                    <div class="clearfix"></div>
                    
                    <h3 id="location" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></h3>
                    <div class="loader">
                      <div id="noTrespassingOuterBarG">
                        <div id="noTrespassingFrontBarG" class="noTrespassingAnimationG">
                          <div class="noTrespassingBarLineG"></div>
                          <div class="noTrespassingBarLineG"></div>
                          <div class="noTrespassingBarLineG"></div>
                          <div class="noTrespassingBarLineG"></div>
                          <div class="noTrespassingBarLineG"></div>
                          <div class="noTrespassingBarLineG"></div>
                        </div>
                      </div>
                      </div> <!-- end loader-->
                  </div>
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
                    <button type="button" class="btn btn-info save">Save</button><button type="button" class="btn btn-default cancel">Discard</button>
                 </div>
              </div> <!--end tab .content-tab-->
            </div> <!--end weather-->

         </div> <!-- end lz-container -->
      </div><!-- End .row -->
      </div><!-- End #head -->
        <?php 
            $feeds['feed1'] ="http://detroit.craigslist.org/web/index.rss";
            $feeds['feed2'] ="http://detroit.craigslist.org/cpg/index.rss";
            $feeds['feed3'] ="http://detroit.craigslist.org/sof/index.rss";
            $feeds['feed4'] ="http://jobs.smashingmagazine.com/rss/all/all";
            $feeds['feed5'] ="http://www.authenticjobs.com/rss/index.xml";
            $feeds['feed6'] ="http://www.krop.com/services/feeds/rss/latest/";
            $feeds['feed7'] ="http://feeds.feedburner.com/FSAllJobs?format=xml";
            $feeds['feed8'] ="https://weworkremotely.com/categories/2-programming/jobs.rss";
        ?>
         <div id="columns">
             <ul id="column1" class="col-md-4">
                 <li class="widget" id="intro">
                     <div class="widget-head">
                         <h3>
                          <a href="<? echo $feeds['feed1'] ?>" title="<? echo $feeds['feed1'] ?>">
                            <? echo $feeds['feed1'] ?>
                          </a>
                        </h3>
                     </div>
                     <div class="widget-content">
                      <?
                         // $rss = simplexml_load_string( utf8_encode($feeds['feed1']) );
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
                            echo '<h2><a href="'.$link.'" title="'.$title.'"  class="" target="_blank">'.$title.'</a></h2>';
                            //echo '<div class="posted">Posted on '.$date.'</div>';
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
     
             <ul id="column2" class="col-md-4">
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
             
             <ul id="column3" class="col-md-4">
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
                              'desc'  => $node->getElementsByTagName('description')->item(0)->nodeValue,
                              'link'  => $node->getElementsByTagName('link')->item(0)->nodeValue,
                              'date'  => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
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




        
  <!-- jQuery -->
   <script src="js/jquery.js"></script>
   <!-- Bootstrap -->
   <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
   <!-- Scripts -->
   <script type="text/javascript">
    $(document).ready(function(){
      $("a[href^='http']").each(function() {
        $(this).css({
            background: "url(http://www.google.com/s2/favicons?domain=" + this.href + ") left center no-repeat",
            "padding-left": "24px"
        });
      });
    });
  </script>
   <script src="js/moment.min.js"></script>
   <script src="js/b64.min.js"></script>
   <script src="js/backstretch.min.js"></script>
   <script src="js/main.js"></script>
  
     </body>
</html>