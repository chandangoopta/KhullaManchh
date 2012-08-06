<?php
/**
A sample code which uses OAuth to post a tweet!
* @license GNU Public License
*/

//$tweet_text = $argv[1];
//$tweet_text="Test Tweets! 1 2 3 .... ";
$tweet_text = $_POST["tweet_text"];
print "Tweeting...\n";
$result = post_tweet($tweet_text);
if ($result=="200") echo "Successful.";
	else echo "Try again!";
function post_tweet($tweet_text) {

  // Use Matt Harris' OAuth library to make the connection
  require_once('tmhoauth/tmhOAuth.php');
      
  $connection = new tmhOAuth(array(
    'consumer_key' => '**************',
    'consumer_secret' => '************************',
    'user_token' => '************************************',
    'user_secret' => '**************************************',
  )); 
  
  // Make the API call
  $connection->request('POST', 
    $connection->url('1/statuses/update'), 
    array('status' => $tweet_text));
  
  return $connection->response['code'];
}
?>
<html>
<body>
  <form action="post_tweet.php" method="post">
  <input type="tweet" name="tweet_text" />
  <input type="Submit" Name="Tweet!" VALUE = "Tweet">
  </form>
</body>
</html>

