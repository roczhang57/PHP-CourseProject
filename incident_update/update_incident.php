<?php include '../view/header.php'; ?>

<main>
    <h2>Update Incident</h2>

    
    
    <form action="." method="post" id="aligned">
    
        <input type="hidden" name="action" value="update_incident">
        <input type="hidden" name="incidentID" 
                   value="<?php echo $incident['incidentID']; ?>">

        <label>Incident ID: </label>
        <label><?php echo htmlspecialchars($incident['incidentID']); ?></label>
        <br>
        
        <label>Product Code: </label>
        <label><?php echo htmlspecialchars($incident['productCode']); ?></label>
        <br>
        
        <?php $new_date = date('n/j/Y', strtotime($incident['dateOpened'])); ?>
        <label>Date Opened: </label>
        <label><?php echo htmlspecialchars($new_date); ?></label>
        <br>

        <label>Date Closed:</label>
        <input type="text" name="closed"><br>
        
        <label>Title: </label>
        <label><?php echo htmlspecialchars($incident['title']); ?></label>
        <br>
        
        <label>Description: </label>
        <textarea name="description" cols="40" rows="5"><?php echo htmlspecialchars($incident['description']); ?></textarea>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Update Incident">           
    </form>    
    
    <p>You are logged in as <?php echo htmlspecialchars($_SESSION['tech_email']); ?></p>
    <form action="" method="post">
        <input type="hidden" name="action" value="logout">
        <input type="submit" value="Logout">
    </form>

</main>

<?php include '../view/footer.php'; ?>


