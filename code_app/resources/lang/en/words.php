<?php

return [

	'titles' => [
		'register' => 'Register',
		'login' => 'Login',
		'profile' => ':name\'s Profile',
		'created_tasks' => ':name\'s Created Tasks',
		'approved_tasks' => 'Approved Tasks',
		'unapproved_tasks' => 'Unapproved Tasks',
		'your_profile' => 'Profile',
		'profile_edit' => 'Profile Edit',
		'tasks_list' => 'Tasks List',
		'task_create' => 'Task Create',
		'task_edit' => 'Task Edit',
		'answers_list' => 'Answers List',
		'admin_dashboard' => 'Admin Dashboard',
		'approved_tasks_list' => 'Approved Tasks',
		'unapproved_tasks_list' => 'Unapproved Tasks',
		'tasks_recent_unapproved_list' => 'Recent Unapproved Tasks',
		'tasks_recent_approved_list' => 'Recent Approved Tasks',
		'task_edit_or_approve' => 'Task Edit or Approve',
		'inquiries_list' => 'Inquiries List',
		'inquiry_create' => 'Create Inquiry',
	],

	'notices' => [
		'required' => 'Required',
		'optional' => 'Optional',
		'max_characters' => 'Up to :count characters',
		'max_mega_bytes' => 'Up to 5MB',
		'icon_size' => ':min &times; :min ~ :max &times; :max px',
		'valid_extensions' => 'Only jpg/png/bmp/gif/svg',
		'no_tasks' => 'There are no tasks that match the search conditions.',
		'no_created_tasks' => "There are no tasks.<br>Let's create !",
		'no_approved_tasks' => "There are no approved tasks by :name.",
		'no_unapproved_tasks' => "There are no unapproved tasks by :name.",
		'no_answers' => "There are no answers. <br>Let's solve !",
		'no_inquiries' => 'There are no inquiries.',
		'can_not_self_answer' => 'You can not answer the your created tasks.',
		'can_not_duplicate_answer' => 'You can not answer the correctly answered tasks.',
		'tasks_no_unapproved_list' => 'There is no unapproved tasks.',
		'tasks_no_approved_list' => 'There is no approved tasks.',
	],

	'flashes' => [
		'guest_logged_in' => 'Guest Logged In !',
		'session_expired' => 'Login session has expired. Please login again.',
		'invalid_access' => 'Invalid access',
		'no_user' => 'Invalid User ID',
		'no_task' => 'Invalid Task No.',
		'no_answer' => 'Invalid Answer No.',
		'no_inquiry' => 'Invalid Inquiry No.',
		'wrong_answer' => 'Incorrect answer...',
		'correct_answer' => 'Correct answer !',
		'profile_updated' => 'Your profile updated !',
		'task_created' => 'We have received a your suggestion ! Please wait for the review.',
		'task_updated' => 'The task was updated !',
		'task_deleted' => 'The task was deleted !',
		'task_approved' => 'The task was approved !',
		'inquiry_recived' => 'The Inquiry Recived !',
	],

	'authentication' => [
		'name' => 'Name',
		'mail' => 'E-mail Address',
		'password' => 'Password',
		'password_confirm' => 'Password Confirm',
		'remember' => 'Remember me',
	],

	'users' => [
		'registered_date' => 'Registered Date',
		'name' => 'User Name',
		'email' => 'E-Mail Address',
		'icon' => 'Icon',
		'recent_answers' => 'Recent Answers',
		'recent_tasks' => 'Recent Approved Tasks',
		'created_tasks' => 'Created Tasks List',
		'unapproved_tasks_count' => 'Unapproved Tasks',
		'approved_tasks_count' => 'Approved Tasks',
		'unapproved' => 'Unapproved',
		'approved' => 'Approved',
		'all_answers_count' => 'Answers',
		'correct_answers_count' => 'Correct Answers',
		'correct_answer_rate' => 'Correct Answer Rate',
	],

	'inquiries' => [
		'user_name' => 'User Name',
		'title' => 'Title',
		'categories' => 'Category',
		'contents' => 'Contents',
		'inquired_date' => 'Inquired Date',
		'other' => 'Other',
		'about_tasks' => 'About Tasks',
		'about_judges' => 'About Judges',
		'defect_report' => 'Defect Report',
		'new_features_request' => 'New Features Request',
	],

	'tasks' => [
		'basic_configuration' => 'Basic Configuration',
		'title' => 'Title',
		'title_search_placeholder' => 'Search by task title...',
		'statement' => 'Statement',
		'constraints' => 'Constraints',
		'input' => 'Input',
		'input_description' => 'Input Description',
		'output' => 'Output',
		'output_description' => 'Output Description',
		'difficulty' => 'Difficulty',
		'samples' => 'Sample Cases',
		'sample_input' => 'Sample Input',
		'sample_output' => 'Sample Output',
		'tests' => 'Test Cases',
		'test_input' => 'Test Input',
		'test_output' => 'Test Output',
		'creator' => 'Creator',
		'solved' => 'Solved',
		'examinees' => 'Examinees',
		'created_date' => 'Created Date',
		'created_and_updated_date' => 'Created / Updated Date',
		'approved_date' => 'Approved Date',
		'published_date' => 'Published Date',
		'no_select' => 'No Select',
		'no_examinees' => 'No Examinees',
		'include_no_examinees' => 'Include "No Examinees"',
		'lower_validity' => 'Validity Lower Limit',
		'upper_validity' => 'Validity Upper Limit',
		'validity' => [
			'validity' => 'Pass Ratio',
			'lower' => ':n% or more',
			'upper' => ':n% or less',
		],
	],

	'answers' => [
		'answer' => 'Answer',
		'answer_date' => 'Answer Date',
		'judge' => 'Judge',
		'byte' => 'Code Size',
		'code' => 'Source Code',
		'compile' => 'Compile Messeage',
		'testings' => 'Test Cases',
		'test_number' => 'Test No.',
	],

	'buttons' => [
		'register' => 'Register',
		'login' => 'Login',
		'logout' => 'Logout',
		'guest_login' => 'Guest Login',
		'or' => 'OR',
		'forgot' => 'Forgot password ?',
		'search' => 'Search',
		'submission' => 'Submission',
		'submission_confirm' => 'Do you want to submit it ?',
		'send' => 'Send',
		'send_confirm' => 'Do you want to send it ?',
		'approval' => 'Approval',
		'approval_confirm' => 'Do you approve of this task ?',
		'edit' => 'Edit',
		'update' => 'Update',
		'can_not_update' => 'Guest user cannot update  profile',
		'update_confirm' => 'Do you want to update ?',
		'update_only' => 'Update Only',
		'update_only_confirm' => 'Do you want to update ?',
		'delete' => 'Delete',
		'delete_confirm' => 'Do you want to delete \':title\' ?',
	],

	'mails' => [
		'subject_task_created' => 'Task Created Notification',
		'header_task_created' => 'The following task has been created:',
	],

];
