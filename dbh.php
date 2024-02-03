<?php
    if (isset($_POST['submit'])) {
            
                
                
                $name = $_POST['name'];
                $email = $_POST['email'];
                $subject = $_POST['subject'];
                $massage = $subject = $_POST['massage'];
                

                $host = "localhost";
                $dbUsername = "id21385073_received_email";
                $dbPassword = "Lahiru12$$";
                $dbName = "id21385073_site";

                $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

                if ($conn->connect_error) {
                    die('Could not connect to the database.');
                }
                else {
                    
                    
                    $Insert = "INSERT INTO received_email(name, email, subject, massage) values('$_POST[name]','$_POST[email]','$_POST[subject]','$_POST[massage]')";

                    if($conn->query($Insert)===TRUE){
                        
                      /*alert*/
                       echo "<script> alert ('Email send Successfully.Thank for your message.'); window.location='index.html#contact-section' </script>" ;
                        
                    }else{
                        echo "Error".$Insert."<br>" .$conn->error;
                    }
                    $conn->close();
                }
        
        }
     else {
            echo "Submit button is not set";
        }
?> 
        

