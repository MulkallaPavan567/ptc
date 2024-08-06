<?php
   $fullname = $_POST['fullname'];
   $email = $_POST['email'];
   $feedback = $_POST['feedback'];
   

   //database connection
   $conn = new mysqli('127.0.0.1:3308', 'root', '', 'coders_paradise');
   //prepare inserting the queries into the table
   $stmt = $conn->prepare("insert into feedback(fullname, email, feedback) values(?,?,?)");
   if(!$stmt){
        die('Connection Failed : '.$conn->error);
   }
    
    //bind the ? with proper datatype
    $stmt->bind_param("sss",$fullname, $email, $feedback);
    if($stmt->execute()){
        echo "<script>alert('Your feedback sent successfully')</script>";
    ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/ptc/index.html">
    <?php
    }else{
        echo "Error in sending feedback: " . $stmt->error;
    }
    $stmt->close();   //closing
    $conn->close();   //closing connection
   
?>