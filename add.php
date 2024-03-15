<?php
    require "./database/connect.php";
    $name = $_POST['ename'];
    $amount = $_POST['amt'];
    $sql = "INSERT INTO exp (title, amount) VALUES ('$name','$amount')";
    // $sql = "INSERT INTO exp (title, amount) VALUES ('test','100.00')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "New record created successfully";
    }
    else{
        echo"Failed to Add Expense";
    }
 header("Location: index.php");
 ?>