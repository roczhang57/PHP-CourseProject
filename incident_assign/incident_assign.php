<?php 
require_once('../model/secure_connection.php');
include '../view/header.php'; ?>
<main>

    <h2>Assign Incident</h2>
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
        <p><a href="?action=list_incidents">Select Another Incident</a></p>
    <?php else: ?>
        <form action="" method="post" id="aligned">
            <input type="hidden" name="action" value="submit_assign">

            <label>Customer:</label>
            <label><?php echo htmlspecialchars(
                    $customer['firstName'] . ' ' . 
                    $customer['lastName']); ?></label>
            <br>

            <label>Product:</label>
            <label><?php echo htmlspecialchars($incident['productCode']); ?></label>
            <br>

            <label>Technician:</label>
            <label><?php echo htmlspecialchars($technician['firstName'] . ' ' . $technician['lastName']); ?></label>
            <br>

            <label>&nbsp;</label>
            <input type="submit" value="Assign Incident">
        </form>
    <?php endif; ?>

</main>
<?php include '../view/footer.php'; ?>