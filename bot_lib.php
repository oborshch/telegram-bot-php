<?php
/********************************************************
*  Function library
*
*  https://coderlog.top
*  https://youtube.com/CoderLog
********************************************************/




function add_user($connect, $username, $chat_id, $name, $old_id){
	$username = trim($username);
	$chat_id = trim($chat_id);
	$name = trim($name);

	if($chat_id == $old_id)
		return false;
	$t = "INSERT INTO users (username, chat_id, name) VALUES ('%s', '%s', '%s')";
	$query = sprintf($t, mysqli_real_escape_string($connect, $username),
						mysqli_real_escape_string($connect, $chat_id),
						mysqli_real_escape_string($connect, $name));
	$result = mysqli_query($connect, $query);
	if(!$result)
		die(mysqli_error($connect));
	return true;
}

function get_user($connect, $chat_id){
	$query = sprintf("SELECT * FROM users WHERE chat_id=%d", (int)$chat_id);
	$result = mysqli_query($connect, $query);
	if(!$result)
		die(mysqli_error($connect));
	$get_user = mysqli_fetch_assoc($result);
	return $get_user;

}


?>