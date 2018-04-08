<?php
	require_once('../model/secure_connection.php');
    include '../view/header.php'; 
?>
    <main>
        <!-- display a table of unassigned incidents -->
        <h2>Unassigned Incidents</h2>
        <p><a href="?action=assigned_incidents">View Assigned Incidents</a></p>
        <table>
            <tr>
                <th>Customer</th>
                <th>Product</th>
                <th>Incident</th>
            </tr>
            <?php foreach ($incidents as $incdts) : ?>
            <tr>
                <td><?php echo $incdts['firstName']; ?>
                	<?php echo $incdts['lastName'] ?></td>
                <td><?php echo $incdts['productName']; ?></td>
                <td>
                	<table id="no_border">
                		<tr>
                			<td>ID:</td>
                			<td><?php echo $incdts['incidentID']; ?></td>
                		</tr>
                		<tr>
                			<td>Opened:</td>
							<td><?php $openDate = new DateTime($incdts['dateOpened']);
                  					  echo $openDate->format('n/j/Y'); ?></td>
						</tr>
						<tr>
							<td>Title:</td>
							<td><?php echo $incdts['title']; ?></td>
						</tr>
						<tr>
							<td>Description:</td>
							<td><?php echo $incdts['description']; ?></td>
						</tr>
					</table>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </main>
<?php include '../view/footer.php'; ?>
