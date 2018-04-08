<?php 
	require_once('../model/secure_connection.php');
    include '../view/header.php';
?>
<main>
        <!-- display a table of assigned incidents -->
        <h2>Assigned Incidents</h2>
        <p><a href="?action=unassigned_incidents">View Unassigned Incidents</a></p>
        <table>
            <tr>
                <th>Customer</th>
                <th>Product</th>
                <th>Technician</th>
                <th>Incident</th>
            </tr>
            <?php 
            
            foreach ($incidents as $incdts) : ?>
            <tr>
                <td><?php echo $incdts['customerFirstName']; ?>
                	<?php echo $incdts['customerLastName'] ?></td>
                <td><?php echo $incdts['productName']; ?></td>
                <td><?php echo TechnicianDB::get_technician($incdts['techID'])['firstName']; ?>
                	<?php echo TechnicianDB::get_technician($incdts['techID'])['lastName']; ?></td>
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
							<td>Closed:</td>
							<td><?php if (isset($incdts['dateClosed'])) {
                					 $closeDate = new DateTime($incdts['dateClosed']);
                  					 echo $closeDate->format('n/j/Y'); 
                				 } else {
									 echo "OPEN";
								 }
								?>
							</td>
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

