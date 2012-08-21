<?php 
session_start();

if( isset($_POST['submit'])) {
   if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) ) {
		// Insert you code for processing the form here, e.g emailing the submission, entering it into a database. 
$tweet_text = $_POST["tweet_text"];
//print "Tweeting...\n";
if (preg_match ("/\@/i", $tweet_text)) { print "you cannot mention anybody in tweeet!\n "; } 
else {
$result = post_tweet($tweet_text);} 
//print "Response code: " . $result . "\n";
if ($result=="200") echo "you are lovely. Your voice has been posted!";
//      print "You just tweeted: " . $tweet_text . "\n";}       
        else echo "ERROR";

//		echo 'Thank you. Your message said "'.$_POST['message'].'"';
		unset($_SESSION['security_code']);
   } else {
		// Insert your code for showing an error message here
		echo 'Sorry, you have provided an invalid security code';
   }
}
?>

<!--	<form action="form.php" method="post">
i--> 
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="exampl.css" type="text/css" media="screen" />
		<script type="text/javascript" src="mtaTwitterStatuses.js"></script>
		<title>mtaTwitterStatuses.js Example</title>
</head>
<body>
<table style="text-align: left; width 963px; height: 278px; "border="0"
cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td style ="Vertical-align: top; width: 380px; height:243px;"><br>
<img style="width: 348px; height: 128px;" alt="khulaa"
src="khulaa.png"><br>
<p> Post Your Voice </p> 
<form action="form.php" method="post"    accept-charset="ISO-10646" >
<textarea name="tweet_text" cols="30" rows="5">
</textarea><br>
</br></br>
		<img src="CaptchaSecurityImages.php?width=100&height=40&characters=5" /><br />
		<label for="security_code">Insert Code: </label><input id="security_code" name="security_code" type="text" /><br />
		<input type="submit" name="submit" value="Submit" />
	</form>
</br></br></br></br>
</div>
</td>
<td style="vertical-align: top; width: 428px; height: 243px;"><br>
<!-- BEGIN TWITTER BADGE -->
                <div id="mtaTwitter"></div>
                <!-- OPTIONAL: -->
                <script type="text/javascript">
                        makkintosshu.twitterStatuses.elementId = 'mtaTwitter';
                        makkintosshu.twitterStatuses.tweetCount = 20;
                        makkintosshu.twitterStatuses.filterReplies = false;
                        makkintosshu.twitterStatuses.showIcon = true;
                </script>
                <!-- REQUIRED: -->
                <script type="text/javascript" src="http://www.twitter.com/statuses/user_timeline/khulaamanch.json?skip_user=true&callback=makkintosshu.twitterStatuses.twitterCallback"></script>
                <!-- END TWITTER BADGE -->
</td>
</tr>
</div>
</body>
</html>
<?php

?>
<?php
/**
A sample code which uses OAuth to post a tweet!
* @license GNU Public License
*/

//$tweet_text = $argv[1];
//$tweet_text="Test Tweets! 1 2 3 .... ";

//$tweet_text = $_POST["tweet_text"];
//print "Tweeting...\n";
//$result = post_tweet($tweet_text);
//print "Response code: " . $result . "\n";
//if ($result=="200") echo "you are lovely. Your voice has been posted!";
//      print "You just tweeted: " . $tweet_text . "\n";}       
 //       else echo "We have tweetwet alot today! Try after few hours!";
function post_tweet($tweet_text) {
   
  // Use Matt Harris' OAuth library to make the connection
  require_once('tmhoauth/tmhOAuth.php');
    
  $connection = new tmhOAuth(array(
    'consumer_key' => '****************',
    'consumer_secret' => '***********************************',
    'user_token' => '************************************',
    'user_secret' => '',
  )); 
  
  // Make the API call
  $connection->request('POST',
    $connection->url('1/statuses/update'), 
    array('status' => $tweet_text));

  return $connection->response['code'];
}


?>
