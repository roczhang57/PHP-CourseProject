<?php 
require_once('../model/secure_connection.php');
require_once('../model/admin_validation.php');
include '../view/header.php'; ?>
<main>
    <nav>    
    <h2>Administrators</h2>
    <ul>
        <li><a href="../product_manager">Manage Products</a></li>
        <li><a href="../technician_manager">Manage Technicians</a></li>
        <li><a href="../customer_manager">Manage Customers</a></li>
        <li><a href="../incident_create">Create Incident</a></li>
        <li><a href="../incident_assign">Assign Incident</a></li>
        <li><a href="../incident_display">Display Incidents</a></li>
    </ul>
    <h2>Login Status</h2>
    <p>You are logged in as <?php echo $_SESSION['admin_username']; ?>.</p>
    <form action="" method="post">
        <input type="hidden" name="action" value="logout_admin">
        <input type="submit" value="Logout">
    </form>
    </nav>
</main>
<?php include '../view/footer.php'; ?>