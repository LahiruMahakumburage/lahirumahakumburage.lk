<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['name']) && isset($_POST['email']) &&
        isset($_POST['password']) && isset($_POST['telephone']) ) {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $telephone = $_POST['telephone'];
        
        

        $host = "localhost";
        $dbUsername = "id21385073_received_email";
        $dbPassword = "Lahiru12$$";
        $dbName = "id21385073_site";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            
            $Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO reg(name, email, password, telephone) values('$_POST[name]','$_POST[email]','$_POST[password]','$_POST[telephone]')";

            if($conn->query($Insert)===TRUE){
                echo "<script> alert ('Register Successfully.'); window.location='index.html' </script>" ;
            }else{
                echo "Error".$Insert."<br>" .$conn->error;
            }
            $conn->close();
        }
    }
    else {
        echo "<script> alert ('All field are required.'); window.location='signup.html' </script>" ;
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>        