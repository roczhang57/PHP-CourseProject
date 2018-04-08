<?php 
require_once('../model/secure_connection.php');
include '../view/header.php'; ?>
<main>
    <h1>Select Technician</h1>

    <!-- display a table of products -->
    <table>
        <tr>
            <th>Name</th>
            <th>Open Incidents</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($technicians as $technician) :?>
        <tr>
            <td><?php echo htmlspecialchars($technician['firstName'] . ' ' . $technician['lastName']); ?></td>
            <td><?php echo htmlspecialchars($technician['openIncidentCount']); ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action"
                       value="assign_incident">
                <input type="hidden" name="technician_id"
                       value="<?php echo htmlspecialchars($technician['techID']); ?>">
                <input type="submit" value="Select">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>

</main>
<?php include '../view/footer.php'; ?>