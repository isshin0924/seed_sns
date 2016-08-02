<?php 
session_start();
require('dbconnect.php');

//ログイン判定
if (isset($_SESSION['id'])) {
	$id = $_SESSION['id'];

		// 	$sql = sprintf('SELECT * FROM `tweets` WHERE tweet_id=%d',
		// 	mysqli_real_escape_string($db,$id));
		// $record = mysqli_query($db,$sql) or die(mysqli_error($db));
		// $table = mysqli_fetch_assoc($record);

//投稿を取得して
	// 	 $sql = sprintf(
	// 'SELECT m.nick_name,
	//         m.picture_path,
	//         t.*
	// FROM `tweets` t,
	//      `members` m
	// WHERE t.member_id = m.member_id
	//   AND t.tweet_id = %d', 
	// mysqli_real_escape_string($db,$_SESSION['id']));
	//   $tweets = mysqli_query($db, $sql) or die(mysqli_error($db));

	// $sql2 = sprintf('INSERT INTO `like` SET ');
// $sql = sprintf('INSERT INTO `like` SET `tweet` = "%s", `member_id`= %d,`tweet_id` = %d',
// 	  	mysqli_real_escape_string($db,$_SESSION['tweet']),
// 	  	//いいね押したユーザーのid
// 	  	mysqli_real_escape_string($db,$id),
// 	  	//いいね押されたユーザーのid
// 	  	mysqli_real_escape_string($db,$_REQUEST['id'])
// 	  	);


	$sql = sprintf('SELECT * FROM `like` WHERE member_id = %d AND tweet_id=%d',
		mysqli_real_escape_string($db,$id),
		mysqli_real_escape_string($db,$_REQUEST['id'])
		);
	  $record = mysqli_query($db,$sql) or die(mysqli_error($db));
	  $table = mysqli_fetch_assoc($record);

	 if (empty($table)) {
	 	$sql = sprintf('INSERT INTO `like` SET member_id = %d, tweet_id=%d',
	 		mysqli_real_escape_string($db,$id),
		mysqli_real_escape_string($db,$_REQUEST['id'])
		);
		$record = mysqli_query($db,$sql) or die(mysqli_error($db));
	  $table = mysqli_fetch_assoc($record);
		 // $record = mysqli_query($db,$sql) or die(mysqli_error($db));
	  // $table = mysqli_fetch_assoc($record);
	 }else{
	 	$sql = sprintf('DELETE `like` WHERE member_id = %d AND tweet_id=%d',
	 		 mysqli_real_escape_string($db,$id),
		mysqli_real_escape_string($db,$_REQUEST['id'])
	 		 );
	 	mysqli_query($db,$sql) or die(mysqli_error($db));
	 }


		// // パラメータのidの値を元に削除したいデータを取得
		// 	//投稿を検査する
		// 	$sql = sprintf('SELECT * FROM `tweets` WHERE tweet_id=%d',
		// 		mysqli_real_escape_string($db,$id));
		// 	$record = mysqli_query($db,$sql) or die(mysqli_error($db));
		// 	$table = mysqli_fetch_assoc($record);




		// if ($table['member_id'] == $_SESSION['id']) {
		// 	# code...
		// 	$sql = sprintf('INSERT INTO `like` SET ')
		// }
}




header('Location:index2.php');
exit();
//ログイン判定
	// if (isset($_SESSION['id'])) {
	// 	# URLのパラメータ上にあるid

	// 	$id = $_REQUEST['id'];
		
	// 	// パラメータのidの値を元に削除したいデータを取得
	// 	//投稿を検査する
	// 	$sql = sprintf('SELECT * FROM `tweets` WHERE tweet_id=%d',
	// 		mysqli_real_escape_string($db,$id));
	// 	$record = mysqli_query($db,$sql) or die(mysqli_error($db));
	// 	$table = mysqli_fetch_assoc($record);
	// 	// 削除したい投稿データ投稿者idとログインしているユーザーのidが一致する場合のみ削除
		
	// 		$sql = sprintf('INSERT INTO `like` SET tweet_id=%d',
	// 			mysqli_real_escape_string($db,$id));
	// 		mysqli_query($db,$sql) or die(mysqli_error($db));
		
	// }
	// header('Location:index2.php');
	// exit();
 ?>