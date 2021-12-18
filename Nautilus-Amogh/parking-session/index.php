<?php
// session_start();
if (isset($_SESSION['user']['id'])) {
	$_SESSION['max_size'];

	if(isset($_SESSION['arr']) && $_SESSION['user']['parking-lot-confirmation']) {
		if (count($_SESSION['arr']) < $_SESSION['max_size'] / 2) {
			
			for ($i = 1; $i <= $_SESSION['max_size']; $i++) {
				if (empty($_SESSION['arr'][$i])) {
					$_SESSION['arr'][$i] = $_SESSION['user']['id'];
					$_SESSION['user']['index'] = $i;
					$_SESSION['floor'] = 'F1';
					$data = $_SESSION['arr'][$i];
					unset($_SESSION['user']['parking-lot-confirmation']);
					// echo "<script>alert('Parking Lot Alloted Successfully.')</script>";
					break;
				}
			}
		} elseif(count($_SESSION['arr']) < $_SESSION['max_size']) {
			for ($i = 1; $i <= $_SESSION['max_size']; $i++) {
				if (empty($_SESSION['arr'][$i])) {
					$_SESSION['arr'][$i] = $_SESSION['user']['id'];
					$_SESSION['user']['index'] = $i;
					$_SESSION['floor'] = 'F2';
					$data = $_SESSION['arr'][$i];
					unset($_SESSION['user']['parking-lot-confirmation']);
					// echo "<script>alert('Parking Lot Alloted Successfully.')</script>";
					break;
				}
			}
		} else {
			$id = $_SESSION['user']['id'];
			$conn = new mysqli('localhost', 'root', '', 'nautilus');
			$sql = "DELETE FROM entry_1 WHERE id='$id'";
			$conn->query($sql);
			header('location: parking-lot-full.php');
		}
	} else {
		header("location: index.php?register-entry-error=1");
	}
}
?>