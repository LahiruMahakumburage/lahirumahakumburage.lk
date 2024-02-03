<?php
if (isset ($_POST["submit"])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $con = new mysqli("localhost","id21385073_received_email","Lahiru12$$","id21385073_site");

    if($con->connect_error){
    die ("Connection Error");
    }else{
        $stmt = $con->prepare("select * from reg where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){
            echo "<script> alert ('Login Successfully.'); window.location='index.html#about-section' </script>" ;
            } else {
            echo "<script> alert ('Please Enter Valid Password.'); window.location='signin.html' </script>" ;
            }
        } else {
            echo "<script> alert ('Please Enter Valid Email or Password.'); window.location='signin.html' </script>" ;
        }
    }
}
else {
    /*header("location:./index.html");*/
    echo "<script> alert ('Your account has been locked by the host. So, Try again later.'); window.location='signin.html' </script>" ;
}
