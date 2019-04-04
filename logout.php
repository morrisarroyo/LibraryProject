<?php
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
		session_start();
}
unset($_SESSION['login_user']);
header("location: index.php");