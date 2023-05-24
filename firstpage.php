<?php

$server     = "localhost:3306";
$username     = "root";
$password     = "";
$DB         = "loraserver";

$conn = new mysqli($server, $username, $password,$DB);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error); 
} 

?>
<!DOCTYPE html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="style1.css">
    </head>
    

<body>

    <div class="box">

    
        <header> Login Here</header>

        <form name="myform"  method="POST" >

            <p>tenantName</p>
            <input type="text" name="tenantName" placeholder="Enter your tenantName " required="">

            <p>tenantId</p>
            <input type="password" name="tenantId" placeholder="Enter your tenantId" required="">

            <div class="error-container">

            
        
        <?php

if(isset($_POST['Login']) ){
// Get the submitted tenantid and tenantname
$submittedTenantId = $_POST['tenantId'];
$submittedTenantName = $_POST['tenantName'];

// Prepare and execute the database query
$sql = "SELECT * FROM loratable WHERE tenantid = ? AND tenantname = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $submittedTenantId, $submittedTenantName);
$stmt->execute();

// Check if a matching record is found
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    // The submitted tenantid and tenantname are correct
    // Proceed with the login process or other actions
    echo "Login successful!";
    header("Location: index.php");
    
} else {
    // No matching record found
    // Handle the case when the submitted tenantid and tenantname are incorrect
    echo '<div class="error">Invalid tenantid or tenantname. Please try again.</div>';
    
}

// Close the database connection and clean up
$stmt->close();
$conn->close();
}

?>

</div> 
<input type="submit" name="Login" class="button" value="Login">
<br><br>

  </form>

</div>
    

</body>
</html>