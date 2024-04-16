<?php
  $connection = new mysqli("localhost","root","","bityeartwo2024");
    if($connection ->connect_error){
        die("Connect failed: ".$connection -> connect_error);
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $password =password_hash($_POST['password'],PASSWORD_DEFAULT);
        $sql = "INSERT INTO user(firstname, lastname, username, email, telephone, password) VALUES('$firstname','$lastname','$username','$email','$telephone','$password')";
            if($connection->query($sql)==TRUE){
                echo "Registration successful";
            } else {
                echo "Error: ".$sql."<br>".$connection->error;
            }
    }
  $connection->close();
?>