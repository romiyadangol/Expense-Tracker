<?php
require "connect.php";

// Check if expense ID is set
if(isset($_POST['id'])) {
    $expense_id = $_POST['id'];

    // Fetch expense details from the database
    $sql = "SELECT * FROM exp WHERE id = $expense_id";
    $result = mysqli_query($conn, $sql);

    // Check if the expense exists
    if(mysqli_num_rows($result) > 0) {
        $expense = mysqli_fetch_assoc($result);
    } else {
        echo "Expense not found.";
        exit(); // Stop further execution if expense is not found
    }
} else {
    echo "Expense ID is not set.";
    exit(); // Stop further execution if expense ID is not set
}

// Check if all required POST variables are set
if (isset($_POST['ename'], $_POST['amt'])) {
    $name = $_POST['ename'];
    $amount = $_POST['amt'];

    // Update expense details in the database
    $sql = "UPDATE exp SET title = '$name', amount = '$amount' WHERE id = $expense_id";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        echo "Expense updated successfully";
        // Redirect to index.php after successful update
        header('Location: index.php');
        exit();
    } else {
        echo "Failed to update expense: " . mysqli_error($conn); // Error message
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Expense</title>
</head>
<body>
    <main>
        <h2>Edit Expense</h2>
        <form action="edit.php" method="post"> <!-- Specify the correct action -->
            <label for="ename">ID: </label>
            <input type="text" name="id" value="<?php echo $expense['id']; ?>"><br><br>
            <label for="ename">Name: </label>
            <input type="text" name="ename" value="<?php echo $expense['title']; ?>"><br><br>
            <label for="amt">Amount: </label>
            <input type="number" name="amt" value="<?php echo $expense['amount']; ?>"><br><br>
            <button type="submit">Save Changes</button>
        </form><br><br>

        <button><a href="index.php">&lt;- Back</a></button>
    </main>
</body>
</html>
