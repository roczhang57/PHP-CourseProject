<?php 
    require_once('../model/secure_connection.php');
    include '../view/header.php';
?>
    <main>
        <h2>Admin Login</h2>  
        <form action="." method="post" id="aligned">
             <input type="hidden" name="action" value="login_admin" />
             <label>Username:</label>
             <input type="text" name="username" />
             <br />
             
             <label>Password:</label>
             <input type="password" name="password" />
             <br />
             
             <label>&nbsp;</label>
             <input type="submit" value="Login" />
          <br />   
        </form>
    </main>
<?php include '../view/footer.php'; ?>