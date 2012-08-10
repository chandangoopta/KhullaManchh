<?php 
session_start();

if( isset($_POST['submit'])) {
   if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) ) {
		// Insert you code for processing the form here, e.g emailing the submission, entering it into a database. 
$tweet_text = $_POST["tweet_text"];
//print "Tweeting...\n";
if (preg_match ("/\@/i", $tweet_text)) {
	print "you cannot mention anybody in ur tweet!"; }
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
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
</head>
<body>
<!--<p> Read this <a href="disclaimer.php"> DISCLAIMER </a> before tweeting!
<!-- </br>
--> 
<p><i>Post Your Tweet </i></p>
<p> Share Something! </p>
 <form action="index.php" method="post"  style="height:100px;width:300px;" accept-charset="ISO-10646" >
  <input type="tweet" name="tweet_text" />
<!--  <input type="Submit" Name="Tweet!" VALUE = "Tweet">
--></br></br>
		<img src="CaptchaSecurityImages.php?width=100&height=40&characters=5" /><br />
</br></br>		<label for="security_code">Insert Code: </label><input id="security_code" name="security_code" type="text" /><br />
		<input type="submit" name="submit" value="Submit" />
	</form>
</br></br></br></br>
<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 20,
  interval: 30000,
  width: 250,
  height: 300,
  theme: {
    shell: {
      background: '#333333',
      color: '#ffffff'
    },
    tweets: {
      background: '#261126',
      color: '#ffffff',
      links: '#ebedf0'
    }
  },
  features: {
    scrollbar: true,
    loop: false,
    live: true,
    behavior: 'all'
  }
}).render().setUser('KhulaaManch').start();
</script>
</body>
</html>
<?php

?>
<?php
/**
A sample code which uses OAuth to post a tweet!
* @license GNU Public License
*/

function post_tweet($tweet_text) {
   
  // Use Matt Harris' OAuth library to make the connection
  require_once('tmhoauth/tmhOAuth.php');
    
  $connection = new tmhOAuth(array(
    'consumer_key' => '*********',
    'consumer_secret' => '*********',
    'user_token' => '***********',
    'user_secret' => '********',
  )); 
  
  // Make the API call
  $connection->request('POST',
    $connection->url('1/statuses/update'), 
    array('status' => $tweet_text));

  return $connection->response['code'];
}


?>

