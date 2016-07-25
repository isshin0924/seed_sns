<?php 
	session_start();
	require('dbconnect.php');

	//$_SESSION['id']を使ってログインユーザーのデータを取得
	//$_SESSION['id']が存在する　これがログインしているかどうかの条件

	if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
		# code...
		$_SESSION['time'] == time();
		//ログインしている場合

		//ログインユーザの情報をデータベースより取得
		$sql = sprintf('SELECT * FROM `members` WHERE `member_id` = %d',
			mysqli_real_escape_string($db,$_SESSION['id']));

		$record = mysqli_query($db,$sql) or die(mysql_error($db));
		$member = mysqli_fetch_assoc($record);
	}
		
	else{
		//ログインしていない場合
		// loginページへリダイレクトさせる
		 header('Location: login.php');
        exit(); 
	}



	//投稿内容を保存する
if (!empty($_POST)) {
	if (isset($_POST['tweet'])){
    if ($_POST['tweet'] != '') {
      $sql = sprintf('INSERT INTO `tweets` SET `tweet`="%s", `member_id`=%d, `reply_tweet_id`=%d, `created`= now()',
        mysqli_real_escape_string($db, $_POST['tweet']),
        mysqli_real_escape_string($db, $member['member_id']));
        //mysqli_real_escape_string($db, $_POST['reply_tweet_id']));
      mysqli_query($db, $sql) or die(mysqli_error($db));
      header('Location: index.php');
      exit();
    }
}
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>
 	<?php echo $member['member_id']; ?>

 </p>

 <p>
 	<?php echo $member['nick_name']; ?>

 </p>

 <p>
 	<?php echo $member['email']; ?>

 </p>

 <form action="" method="post">
 	<textarea name="message" cols = "50" rows="5"></textarea>
 	<input type="submit" value="post">
 </form>
</body>
</html>
 