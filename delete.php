<?php
    require "./database/connect.php";
        $expense_id = $_POST['id'];
        $sql = "DELETE FROM exp WHERE id = $expense_id";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "Expense deleted successfully";
        }
        else{
            echo "Failed to delete expense";
        }
        header("Location: index.php");
        exit();
?>