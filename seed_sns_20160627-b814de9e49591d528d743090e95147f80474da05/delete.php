<?php 
	session_start();
	require('dbconnect.php');

	//ログイン判定
	if (isset($_SESSION['id'])) {
		# code...
		$id = $_REQUEST['id'];

		// パラメータのidの値を元に削除したいデータを取得
		//投稿を検査する
		$sql = sprintf('SELECT * FROM `tweets` WHERE tweet_id=%d',
			mysqli_real_escape_string($db,$id));
		$record = mysqli_query($db,$sql) or die(mysqli_error($db));
		$table = mysqli_fetch_assoc($record);
		
		// 削除したい投稿データ投稿者idとログインしているユーザーのidが一致する場合のみ削除
		if ($table['member_id']==$_SESSION['id']) {
			# code...
			$sql = sprintf('DELETE FROM `tweets` WHERE tweet_id=%d',
				mysqli_real_escape_string($db,$id));
			mysqli_query($db,$sql) or die(mysqli_error($db));
		}
	}
	header('Location:index2.php');
	exit();
 ?>