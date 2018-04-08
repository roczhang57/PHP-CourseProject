<?php include '../view/header.php'; ?>
<main>

    <h2>Technician Login</h2>
    <p>You must login before you can update an incident.</p>
    
    <form action="." method="post" id="aligned">
             <input type="hidden" name="action" value="technician_login" />
              
             <label>Email:</label>
             <input type="text" name="email" />
             <br />
              
             <label>Password:</label>
             <input type="password" name="password" />
             <br />

             <label>&nbsp;</label>
             
             <input type="submit" value="Login" />
         <br />   
        </form>
<?php include '../view/footer.php'; ?>




