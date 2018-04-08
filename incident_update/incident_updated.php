<?php include '../view/header.php'; ?>

<main>
    <h2>Update Incident</h2>
    <p>This incident was updated.</p>
    
    <a href="?action=show_list">Select Another Incident</a>
    <br>
    <br>

    
    <p>You are logged in as <?php echo htmlspecialchars($_SESSION['tech_email']); ?></p>
    <form action="" method="post">
        <input type="hidden" name="action" value="logout">
        <input type="submit" value="Logout">
    </form>

</main>

<?php include '../view/footer.php'; ?>


