<!DOCTYPE>
<html>
	<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=1;">
	<title>Job rssfeed</title>
			
			<link href="http://430designs.com/css/reset.css" rel="stylesheet" type="text/css">
			<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
			<style type="text/css">
				.wrapper{margin:2% 0;float:left;width:100%;}
				.column{float:left;width:30%;margin:0 1%;min-width: 240px;}
				.column h1{padding:.5em;background:#ff8108;}
				.column h1 a{font-size:1em;text-decoration:none;text-align:center;color:#fff;display:block;text-shadow:2px 2px #8E4B0A;}
				.box{width:90%;float:left;margin:0.8%;}
				.box h2{float:left;clear:both;margin:.2em;}
				.box h2 a{text-decoration:none;font-size:.9em;padding:3px 3px 5px 3px;background:#ccc;color:#333;text-shadow: 2px 2px #F2F2F2;line-height:1.3em;margin-bottom:1em;}
				.box .posted{float:left;font-size:0.7em;	font-style: italic;margin: 0.4em;}
				.box p{float:left;clear:both;font-size: 0.8em;margin:.4em;}
				
				@media only screen and (max-device-width: 720px) {				
					.column{float:left;clear:both;width:100%;}
					.box h2 a{text-decoration:none;font-size:1.3em;padding:3px 3px 5px 3px;background:#ccc;color:#333;text-shadow: 2px 2px #F2F2F2;line-height:1.3em;margin-bottom:1em;}
					.box .posted{display:none;}
					.box{border-bottom:1px inset#333;}
					.column h1 a{font-size:2em;text-decoration:none;text-align:center;color:#fff;display:block;text-shadow:2px 2px #8E4B0A;}
				}
				/* iPhone [portrait + landscape] */
				@media only screen and (max-device-width: 480px){
					.column{float:left;clear:both;width:100%;}
					.box .posted{display:none;}
					.box h2 a{text-decoration:none;font-size:1.5em;padding:3px 3px 5px 3px;background:#ccc;color:#333;text-shadow: 2px 2px #F2F2F2;line-height:1.3em;margin-bottom:1em;}
					.box p{float:left;clear:both;font-size: 1.3em;margin:.4em;}
					.box{border-bottom:1px inset#333;}
				}
			</style>
	</head>
	
	<body>
     	<div class="wrapper">
          	<div class="column ui-state-highlight">
               	<h1><a href="<? echo $feeds['feed1'] ?>" title="<? echo $feeds['feed1'] ?>"><? echo $feeds['feed1'] ?></a></h1>
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
							echo '<h2><a href="'.$link.'" title="'.$title.'" target="_blank">'.$title.'</a></h2>';
							echo '<div class="posted">Posted on '.$date.'</div>';
							echo '<p>'.$description.'</p>';
						echo '</div>';
					}
                     ?>
				</div><!--end column -->
                    <div class="column">
                    <?php 
					error_reporting(E_ALL);
					echo "<pre>";
					
					// REQUIRED FOR PHP 5.1+
					date_default_timezone_set('America/Chicago');
	
					// AN ARRAY OF RSS FEEDS
					$feeds[] ="http://detroit.craigslist.org/web/index.rss";
					$feeds[] ="http://detroit.craigslist.org/cpg/index.rss";
					$feeds[] ="http://detroit.craigslist.org/eng/index.rss";
					$feeds[] ="http://jobs.smashingmagazine.com/rss/all/";
					$feeds[]="http://www.authenticjobs.com/rss/index.xml";
					$feeds[] ="http://www.krop.com/services/rssfeeds/rss/latest/";
					$feeds[] ="http://jobs.freelanceswitch.com/";
					$feeds[] ="http://jobs.37signals.com/categories/2/jobs.rss";
					
					// USE AN ITERATOR TO ACCESS EACH RSS FEED
					foreach ($feeds as $feed_url)
					{
					    // SEE BELOW FOR AN EXAMPLE OF HOW TO READ THE XML STRING
					    $xml = my_curl($feed_url);
					    if (!$xml)
					    {
						   echo PHP_EOL . "UNAVAILABLE: $feed_url";
					    }
					    else
					    {
						   echo PHP_EOL . "FOUND: $feed_url";
					
						   // CONVERT THE XML TO AN OBJECT
						   $obj = @SimpleXML_Load_String($xml);
						   if (!$obj)
						   {
							  echo PHP_EOL . "INVALID XML AT $feed_url";
							  echo PHP_EOL;
						   }
						   else
						   {
							  // PROCESS THE RSS/ATOM FEED HERE USING OOP NOTATION
							  $t = (string)$obj->channel->title;
							  echo PHP_EOL . "CHANNEL TITLE: $t";
							  echo PHP_EOL;
					
							  // ACTIVATE THIS TO SEE THE RSS OBJECT
							  // var_dump($obj);
						   }
					    }
					}
					
					
					// A FUNCTION TO RUN A CURL-GET CLIENT CALL TO A FOREIGN SERVER
					function my_curl
					( $url
					, $get_array=array()
					, $timeout=2
					, $error_report=TRUE
					)
					{
					    // PREPARE THE ARGUMENT STRING IF NEEDED
					    $get_string = NULL;
					    foreach ($get_array as $key => $val)
					    {
						   $get_string
						   = $get_string
						   . $key
						   . '='
						   . urlencode($val)
						   . '&';
					    }
					    $get_string = rtrim($get_string, '&');
					    if (!empty($get_string)) $url .= '?' . $get_string;
					
					    // START CURL
					    $curl = curl_init();
					
					    // HEADERS AND OPTIONS APPEAR TO BE A FIREFOX BROWSER REFERRED BY GOOGLE
					    $header[] = "Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
					    $header[] = "Cache-Control: max-age=0";
					    $header[] = "Connection: keep-alive";
					    $header[] = "Keep-Alive: 300";
					    $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
					    $header[] = "Accept-Language: en-us,en;q=0.5";
					    $header[] = "Pragma: "; // BROWSERS USUALLY LEAVE THIS BLANK
					
					    // SET THE CURL OPTIONS - SEE http://php.net/manual/en/function.curl-setopt.php
					    curl_setopt( $curl, CURLOPT_URL,            $url  );
					    curl_setopt( $curl, CURLOPT_USERAGENT,      'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.1.6) Gecko/20091201 Firefox/3.5.6'  ); // HISTORY
					    curl_setopt( $curl, CURLOPT_USERAGENT,      'Mozilla/5.0 (Windows NT 5.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1'  ); // HISTORY
					    curl_setopt( $curl, CURLOPT_USERAGENT,      'Mozilla/5.0 (Windows NT 6.1; rv:13.0) Gecko/20100101 Firefox/13.0.1'  );
					    curl_setopt( $curl, CURLOPT_HTTPHEADER,     $header  );
					    curl_setopt( $curl, CURLOPT_REFERER,        'http://www.google.com'  );
					    curl_setopt( $curl, CURLOPT_ENCODING,       'gzip,deflate'  );
					    curl_setopt( $curl, CURLOPT_AUTOREFERER,    TRUE  );
					    curl_setopt( $curl, CURLOPT_RETURNTRANSFER, TRUE  );
					    curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, TRUE  );
					    curl_setopt( $curl, CURLOPT_TIMEOUT,        $timeout  );
					
					    // THIS SEEMS TO LET IT WORK WITH HTTPS SITES
					    curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
					
					    // RUN THE CURL REQUEST AND GET THE RESULTS
					    $htm = curl_exec($curl);
					
					    // ON FAILURE HANDLE ERROR MESSAGE
					    if ($htm === FALSE)
					    {
						   if ($error_report)
						   {
							  $err = curl_errno($curl);
							  $inf = curl_getinfo($curl);
							  echo "CURL FAIL: $url TIMEOUT=$timeout, CURL_ERRNO=$err";
							  var_dump($inf);
						   }
						   curl_close($curl);
						   return FALSE;
					    }
					
					    // ON SUCCESS RETURN XML / HTML STRING
					    curl_close($curl);
					    return $htm;
					}
				?>
                    
                    </div><!--end column -->
		</div><!--end wrapper -->

			<script type="text/javascript" src="includes/jquery.js"></script>
			<script type="text/javascript" src="includes/jquery-ui.js"></script>
			<script type="text/javascript" src="http://masonry.desandro.com/jquery.masonry.min.js"></script>
			<script type="text/javascript">
				$('#wrapper').masonry({
					itemSelector: '.box',
					columnWidth: 250
				});


				/*$(function() {
					$( ".column" ).draggable({ snap: true,	animate: true	});
					$( ".column" ).droppable({
						hoverClass: "ui-state-active",
							drop: function( event, ui ) {
								$( this )
									.addClass( "ui-state-highlight" )
							}
						});
				});
				*/
			</script>
	
	</body>
</html>