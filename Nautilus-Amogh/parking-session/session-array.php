<?php
$_SESSION['arr'] = [];
$_SESSION['max_size'] = 4;

if (isset($_GET['session_set'])) {
	echo "<script>alert('Session Array cleared and reset.'); </script>";
}
?>