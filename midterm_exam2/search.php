
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search customers by country</title>
</head>
<body>
  <header>
    <form action="customer.php" method="get">
      <label for="country">
        <select name="country" id="country">
          <!-- add options hear ex.
          <option>Germany</option>
          -->
          
        </select>
      </label>
      <input type="submit" value="Search" name="submit">
    </form>
  </header>
  <?php
$mysqli = new mysqli('db403-mysql', 'root', 'P@ssw0rd', 'northwind');
$sql = "SELECT Country from customers";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
 echo "<option value='".$row['CompanyName']."'>" . $row['ContactName'] . "</option>";
}
 echo "</select>";

?>
</body>
</html>