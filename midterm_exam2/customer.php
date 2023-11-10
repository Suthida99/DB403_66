<?php
    $conn = new mysqli('db403-mysql','root','P@ssw0rd','northwind');
    if ($conn->connect_error) {
        echo $conn->connect_error;
        die();
    }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customers</title>
</head>
<body>
  <!-- Show country in h1. Ex: List of customer in Germany -->
  <?php
  $sql = "SELECT CompanyName, ContactName from customers where Country='Germany";
  ?>
  <h1>List of customer in </h1>
  <table>
    <tr>
      <th>Company name</th>
      <th>Contact name</th>
    </tr>
    <!-- add table rows hear ex.
    <tr>
      <td>Alfreds Futterkiste</td>
      <td>Maria Anders</td>
    </tr>
    -->    
    <?php
     $sql = 'SELECT CompanyName,ContactName FROM customers';
     $result = $conn ->query($sql);
     while ($row = $result->fetch_assoc()) {
        echo "<tr> 
            <td>{$row['CompanyName']}</td>
            <td>{$row['ContactName']}</td>
            </tr>";
     }
    ?>
  </table>
</body>
</html>