<?php
require "./database/connect.php";

// Fetch all expenses from the database
$sql_exp = "SELECT * FROM exp";
$result_exp = mysqli_query($conn, $sql_exp);

$sql_category = "SELECT * FROM categories";
$result_category = mysqli_query($conn, $sql_category);

$expenses = mysqli_fetch_all($result_exp, MYSQLI_ASSOC);
$categories = mysqli_fetch_all($result_category, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
<h1>Expense Tracker</h1>
    <main>
        <form action="add.php" method="post">
            <label for="">Entry type:</label>
            <select name="dropdown">
                <?php
                // Display categories in the dropdown
                foreach($categories as $category) {
                    echo "<option value='{$category['id']}'>{$category['label']}</option>";
                }
                ?>
            </select><br><br>
            <label for="">Name : </label>
            <input type="text" name="ename"><br><br>
            <label for="">Amount : </label>
            <input type="number" name="amt"><br><br>
            <button type="submit">Add Expense</button>
        </form>
        <div>
            <table>
                <tr>
                    <th>S.no.</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                // Display expenses in the table
                foreach($expenses as $expense) {
                    echo "<tr>";
                    echo "<td>{$expense['id']}</td>";
                    echo "<td>{$expense['title']}</td>";
                    echo "<td>{$expense['amount']}</td>";
                    echo "<td>
                            <form action='edit.php' method='POST'>
                                <input type='hidden' name='id' value='{$expense['id']}'>
                                <button type='submit'>Edit</button>
                            </form>
                          </td>";
                    echo "<td>
                            <form action='delete.php' method='POST'>
                                <input type='hidden' name='id' value='{$expense['id']}'>
                                <button type='submit'>Delete</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </main>
</body>
</html>
