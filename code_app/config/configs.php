<?php

return [

	'inquiries' => [
		'categories' => [
			'words.inquiries.other',
			'words.inquiries.about_tasks',
			'words.inquiries.about_judges',
			'words.inquiries.defect_report',
			'words.inquiries.new_features_request',
		],
	],

	'pagings' => [
		'user_tasks' => 10,
		'user_answers' => 10,
		'user_created_tasks' => 5,
		'admin_approved_tasks' => 15,
		'admin_unapproved_tasks' => 15,
		'admin_inquiries' => 15,
		'admin_users' => 15,
	],

	'limits' => [
		'admin_approved_tasks' => 5,
		'admin_unapproved_tasks' => 5,
		'admin_inquiries' => 5,
		'admin_users' => 5,
		'user_icon_size' => [
			'min' => 100,
			'max' => 600,
		],
	],

	'default' => [
		'default_icon_filename' => 'default.png',
	],

];
