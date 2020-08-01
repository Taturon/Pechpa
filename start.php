<?php
// セッションの開始
session_start();

// セッション変数の初期化
$_SESSION = [];
if (isset($_COOKIE['PHPSESSID'])) {
	setcookie('PHPSESSID', '', time() - 1800, '/');
}
session_destroy();

// 初期メッセージの設定
$msg = '名前を入力して下さい';

// POSTされた場合
if (!empty($_POST)) {

	// 変数への代入
	$name = $_POST['name'];

	// 名前のバリデーション
	if (empty(trim($name))) {
		$msg = '名前を入力してください(空白は無効です)';
	} elseif (mb_strlen($name) > 10) {
		$msg = '名前は10字以内にしてください';
	} elseif ($name !== preg_replace('/\A[\x00\s]++|[\x00\s]++\z/u', '', $name)) {
		$msg = '名前の前後に空白を入れないでください';
	}

	// エラーメッセージではなかった場合
	if ($msg === '名前を入力して下さい') {
		$_SESSION = [
			'name' => $name,
			'permission' => $_POST['permission']
		];
		//header('Location:selection.php');
		exit();
	}
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<title>性格診断探索ゲーム</title>
</head>
<body>
<div class="content">
<div class="form">
<h1>性格診断探索ゲーム</h1>
<hr>
<h3>ある日のこと...</h3>
<p>
あなたはひいおじいさんから
<br>別荘にある「<b>ある物</b>」を
<br>取ってくるように頼まれました
</p>
<p>
特に用事のなかったあなたは
<br>ひいおじいさんのお願いを聞く事にしました
</P>
<p>「<b>ある物</b>」は<b>別荘の地下室</b>にあるそうです</p>
<p><b>早速出発しましょう!</b></p>
<hr>
<p><?php echo $msg; ?></p>
<hr>
<form action="" method="POST">
<label>名前<small> (10字以内)</small><br><input type="text" name="name" required value="
<?php
if (isset($name)) {
	echo $name;
}
?>">
</label>
<p>
<span>結果一覧への登録</span><br>
<label><input type="radio" name="permission" value="not_allow" checked>許可しない</label>
<label><input type="radio" name="permission" value="allow">許可する</label>
</p>
<input type="submit" value="開始する！">
</form>
</div>
</div>
</body>
</html>
