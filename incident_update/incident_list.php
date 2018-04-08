<?php include '../view/header.php'; ?>

<main>
    <h2>Select Incident</h2>
    
    
    <?php if (empty($incidents)) : ?>
        <p>There are no open incidents.</p>
        <p><a href="?action=show_list">Refresh List Of Incidents</a></p>   
    <?php else: ?>
        <table>
            <tr>
                <th>Customer</th>
                <th>Product</th>
                <th>Date Opened</th>
                <th>Title</th>
                <th>Description</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($incidents as $incident) : ?>
            <tr>
                <td><?php echo htmlspecialchars($incident['firstName'].' '.$incident['lastName']); ?></td>
                <td><?php echo htmlspecialchars($incident['productCode']); ?></td>

                <?php $new_date = date('n/j/Y', strtotime($incident['dateOpened'])); ?>
                <td><?php echo htmlspecialchars($new_date); ?></td>
                <td><?php echo htmlspecialchars($incident['title']); ?></td>
                <td><?php echo htmlspecialchars($incident['description']); ?></td>


                <td><form action="." method="post" id="aligned">
                    <input type="hidden" name="action"
                           value="show_update_form">
                    <input type="hidden" name="id"
                           value="<?php echo htmlspecialchars($incident['incidentID']); ?>">
                    <input type="submit" value="Select"></form>
                </td>

            </tr>
            <?php endforeach; ?>
        </table>
    
    <?php endif; ?>

    
    <p>You are logged in as <?php echo htmlspecialchars($_SESSION['tech_email']); ?></p>
    <form action="" method="post">
        <input type="hidden" name="action" value="logout">
        <input type="submit" value="Logout">
    </form>

</main>

<?php include '../view/footer.php'; ?>


