<?php

return [

	'titles' => [
		'register' => '新規登録',
		'login' => 'ログイン',
		'profile' => ':nameさんのプロフィール',
		'your_profile' => 'プロフィール',
		'profile_edit' => 'プロフィール編集',
		'tasks_list' => '問題一覧',
		'task_create' => '問題作成',
		'answers_list' => '回答一覧',
		'admin_dashboard' => '管理者ダッシュボード',
		'unapproved_tasks_list' => '承認待ち問題一覧',
		'approved_task' => '承認済み問題',
		'tasks_recent_unapproved_list' => '直近の承認待ち問題',
		'tasks_recent_approved_list' => '直近の承認済み問題',
		'task_approval' => '問題の承認',
	],

	'notices' => [
		'required' => '必須',
		'optional' => '任意',
		'max_characters' => '最大:count文字',
		'max_mega_bytes' => '最大5MB',
		'icon_size' => ':min &times; :min ~ :max &times; :max px',
		'valid_extensions' => 'jpg/png/bmp/gif/svgのみ',
		'no_tasks' => '検索条件に該当する問題がありません',
		'no_answers' => "まだ回答がありません<br>問題一覧ページから回答してみましょう！",
		'can_not_answer' => '作成した問題には回答できません',
		'tasks_no_unapproved_list' => '承認待ち問題はありません',
		'tasks_no_approved_list' => '承認済み問題はありません',
	],

	'flashes' => [
		'guest_logged_in' => '簡単ログインしました！',
		'invalid_access' => '不正なアクセスです',
		'no_user' => '存在しないユーザーです',
		'no_task' => '存在しない問題です',
		'no_answer' => '存在しない回答です',
		'wrong_answer' => '不正解です...',
		'correct_answer' => '正解です！',
		'profile_updated' => 'プロフィールを更新しました！',
		'task_created' => '問題を提案をお受けしました！ 運営のレビューをお待ち下さい',
	],

	'authentication' => [
		'name' => '名前',
		'mail' => 'メールアドレス',
		'password' => 'パスワード',
		'password_confirm' => 'パスワード(確認)',
		'remember' => 'ログイン情報の保存',
	],

	'users' => [
		'registered_date' => '登録日時',
		'name' => 'ユーザー名',
		'email' => 'メールアドレス',
		'icon' => 'アイコン',
		'approved_tasks_count' => '承認された問題数',
		'all_answers_count' => '回答数',
		'correct_answers_count' => '正解数',
		'correct_answer_rate' => '正答率',
	],

	'tasks' => [
		'basic_configuration' => '基本設定',
		'title' => '問題名',
		'title_search_placeholder' => '問題名で検索',
		'statement' => '問題文',
		'constraints' => '制約',
		'input' => '入力',
		'input_description' => '入力の説明',
		'output' => '出力',
		'output_description' => '出力の説明',
		'difficulty' => '難易度',
		'samples' => 'サンプルケース',
		'sample_input' => '入力例',
		'sample_output' => '出力例',
		'tests' => 'テストケース',
		'test_input' => 'テスト入力',
		'test_output' => 'テスト出力',
		'creator' => '作成者',
		'solved' => '正解者数',
		'examinees' => '回答者数',
		'created_date' => '作成日時',
		'published_date' => '公開日時',
		'no_select' => '選択しない',
		'no_examinees' => '回答者無し',
		'include_no_examinees' => '「回答者無し」を含める',
		'lower_validity' => '正答率下限',
		'upper_validity' => '正答率上限',
		'validity' => [
			'validity' => '合格率',
			'lower' => ':n%以上',
			'upper' => ':n%以下',
		],
	],

	'answers' => [
		'answer' => '回答',
		'answer_date' => '回答日時',
		'judge' => '判定',
		'byte' => 'バイト数',
		'code' => '提出コード',
		'compile' => 'コンパイルメッセージ',
		'testings' => 'テストケース',
		'test_number' => 'テスト番号',
	],

	'buttons' => [
		'register' => '新規登録',
		'login' => 'ログイン',
		'logout' => 'ログアウト',
		'guest_login' => '簡単ログイン',
		'or' => 'または',
		'forgot' => 'パスワードを忘れた方はこちら',
		'search' => '検索',
		'submission' => '提出',
		'submission_confirm' => '提出しますか?',
		'send' => '送信',
		'send_confirm' => '送信しますか?',
		'approval' => '承認',
		'approval_confirm' => 'この問題を承認しますか？',
		'edit' => '編集',
		'update' => '更新',
		'can_not_update' => 'ゲストユーザーはプロフィールを更新できません',
		'update_confirm' => '更新しますか？',
		'update_only' => '更新のみ',
		'update_only_confirm' => '更新しますか？',
	],

	'mails' => [
		'subject_task_created' => '問題作成通知',
		'header_task_created' => '問題が作成されました',
	],

];
