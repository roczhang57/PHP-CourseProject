<?php
if (!isset($_SESSION['is_valid_admin'])) {
	header("Location: ../admin_login/index.php" );
}
?>