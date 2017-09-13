<?php 
$action = '';
$user_action = empty($_REQUEST['action']) ? '' : $_REQUEST['action'];

if (!auth()) {
	if ($user_action == "login") {
		login();
		$action = "hasLogin";
	} else {
		$action = "login";
	}
} else {
	$action = "hasLogin";
}

switch ($user_action) {
	case 'logout':
	    logout(); 
	    $action = "login";
	    break;
	default:
}

function login() {
	setcookie("username", "test_username");
	setcookie("password", "test_password");
}


function auth() {
	if (empty($_COOKIE['username'])) {
	    return false;
    } else {
    	return true;
    }
}

function logout() {
	setcookie("username", "");
	setcookie("password", "");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Title</title>
</head>
<body>
<?php switch($action): ?>
<?php case 'login': ?>
<form method="get" action="main.php">
    <input type="text" name="action" value="login" hidden>
	<input type="text" name="username">
	<input type="text" name="password">
	<input type="submit" value="Submit">
</form>
<?php break; ?>
<?php case 'hasLogin': ?>
<button><a href="main.php?action=logout">Logout</a></button>
<?php break; ?>
<?php default: ?>
Nothing
<?php endswitch; ?>
</body>
</html>