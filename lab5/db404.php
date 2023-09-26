<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<body>
    <title>คำสั่ง SQL สำหรับเรียกดูข้อมูล</title>
    <style> 
    table{
        border-spacing:0; 
        margin:5px;
    }
    table,th,td{
        border:1px solid black;
    }
    th,td{
        padding :2px;
    }
    code{
        display:block;
        width :1 ;
        margin :5px 5px 0;
        padding :2px;
        background-color:yellow; 
 }
    </style>
</head>
<?php
    $conn = new mysqli('db403-mysql','root','P@ssw0rd','northwind');
    if ($conn->connect_error) {
        echo $conn->connect_error;
        die();
    }
    ?>
    <ol>
     <li>
        เรียกดูชื่อสินค้าที่เลิกผลิตแล้ว แต่ยังมีจำนวนสินค้าคงเหลือค้างอยู่ใน Stock
        <div>
        <code>
            SELECT ProductName,UnitinStock,Discontinued FROM product WHERE Discontinued = 1 AND UnitsInStock> 0
        </code>
        <br>
        <table>
            <tr>
                <th>ProductName</th>
                <th>UnitinStock</th>
                <th>Discontinued</th>
        </tr>
    <?php
     $sql = 'SELECT ProductName,UnitsinStock, Discontinued FROM products
             WHERE Discontinued = 1 AND UnitsInStock> 0 ';
     $result = $conn ->query($sql);
     while ($row = $result->fetch_assoc()) {
        echo "<tr> 
            <td>{$row['ProductName']}</td>
            <td>{$row['UnitsinStock']}</td>
            <td>{$row['Discontinued']}</td>
            </tr>";
     }
    ?>
        </table>
        <div>
        <li>
        เรียกดูชื่อสินค้าที่มียอดสั่งซื้อมูลค่าเกิน 500
            <code>
            SELECT ProductName, UnitPrice, UnitsOnOrder, UnitPrice*UnitsOnOrder As Amount FROM products WHERE UnitPrice * UnitsOnOrder >500;
            </code>
            <br>
            <table>
                <tr>
                    <th> ProductName </th>
                    <th> UnitPrice </th>
                    <th> UnitsOnOrder </th>
                    <th> Amount </th>
                </tr>
    <?php
        $sql = 'SELECT ProductName, UnitPrice, UnitsOnOrder, UnitPrice*UnitsOnOrder 
                As Amount FROM products 
                WHERE UnitPrice * UnitsOnOrder >500';
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr> 
                    <td>{$row['ProductName']}</td>
                    <td>{$row['UnitPrice']}</td>
                    <td>{$row['UnitsOnOrder']}</td>
                    <td>{$row['Amount']}</td>
                 </tr>";
        }
    ?>
            </table>
            </div>
    </li>
     <li>
        ลูกค้าจากประเทศ France มาจากเมือง (city) อะไรบ้าง
        <div>
            <code>
            SELECT DISTINCT City, country FROM customers WHERE Country = 'France' ;
            </code>
            <br>
            <table>
                <tr>
                    <th> City </th>
                    <th> country </th>
                </tr>
    <?php
        $sql = 'SELECT DISTINCT City, country 
                FROM customers 
                WHERE Country = "France"';
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr> 
                    <td>{$row['City']}</td>
                    <td>{$row['country']}</td>
                 </tr>";
        }
    ?>
            </table>
            </div>
    </li>
     <li>
        
        เรียกดูรายชื่อผู้ติดต่อ (ContactName) และชื่อบริษัท (CompanyName) ของลูกค้า เฉพาะบริษัทที่มีชื่อขึ้นต้นด้วย a
     </li>
     <div>
            <code>
            SELECT ContactName, CompanyName  FROM customers WHERE CompanyName LIKE 'a%';
            </code>
            <br>
            <table>
                <tr>
                    <th> ContactName </th>
                    <th> CompanyName </th>
                    
                </tr>
    <?php
        $sql = 'SELECT ContactName, CompanyName  
                FROM customers WHERE CompanyName LIKE "a%"';
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr> 
                    <td>{$row['ContactName']}</td>
                    <td>{$row['CompanyName']}</td>
                 </tr>";
        }
    ?>
            </table>
            </div>
     <li>
         เรียกดูชื่อผู้ติดต่อ (ContactName) และชื่อบริษัท (CompanyName) ของลูกค้า เฉพาะบริษัทที่ชื่อลงท้ายว่า markets
     </li>
     <div>
            <code>
            SELECT ContactName, CompanyName  FROM customers WHERE CompanyName LIKE '%markets';
            </code>
            <br>
            <table>
                <tr>
                    <th> ContactName </th>
                    <th> CompanyName </th>
                    
                </tr>
    <?php
        $sql = 'SELECT ContactName, CompanyName  
        FROM customers WHERE CompanyName LIKE "%markets"';
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr> 
                    <td>{$row['ContactName']}</td>
                    <td>{$row['CompanyName']}</td>
                 </tr>";
        }
    ?>
            </table>
            </div>  
     <li>
         เรียกดูชื่อผู้ติดต่อ (ContactName) และชื่อบริษัท (CompanyName) ของลูกค้า เฉพาะบริษัทที่มีตัวอักษร et อยู่ในชื่อบริษัท
     </li>
     <div>
            <code>
            SELECT ContactName,CompanyName FROM customers WHERE CompanyName LIKE '%et';
            </code>
            <br>
            <table>
                <tr>
                    <th> ContactName </th>
                    <th> CompanyName </th>
                    
                </tr>
    <?php
        $sql = 'SELECT ContactName, CompanyName  
        FROM customers WHERE CompanyName LIKE "%et"';
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr> 
                    <td>{$row['ContactName']}</td>
                    <td>{$row['CompanyName']}</td>
                 </tr>";
        }
    ?>
            </table>
            </div>  
     <li>
        เรียกดูชื่อผู้ติดต่อ (ContactName) และชื่อบริษัท (CompanyName) ของลูกค้า เฉพาะชื่อบริษัทที่มีตัวอักษร e และ t
        โดยมีตัวอักษร 1 ตัว คั่นกลางระหว่าง e และ t เช่น ect, ent, est
        <div>
            <code>
            SELECT ContactName,CompanyName FROM customers WHERE CompanyName LIKE '%e_t%';
            </code>
            <br>
            <table>
                <tr>
                    <th> ContactName </th>
                    <th> CompanyName </th>
                    
                </tr>
    <?php
        $sql = 'SELECT ContactName, CompanyName  
        FROM customers WHERE CompanyName LIKE "%e_t%"';
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr> 
                    <td>{$row['ContactName']}</td>
                    <td>{$row['CompanyName']}</td>
                 </tr>";
        }
    ?>
            </table>
            </div>  
     </li>
     <li>
        เรียกดูชื่อผู้ติดต่อ (ContactName) และชื่อบริษัท (CompanyName) ของลูกค้า เฉพาะบริษัทที่มีชื่อขึ้นต้นด้วยตัวอักษร b
        และลงท้ายด้วย s
     </li>
     <div>
            <code>
            SELECT ContactName,CompanyName FROM customers WHERE CompanyName LIKE 'b%s';
            </code>
            <br>
            <table>
                <tr>
                    <th> ContactName </th>
                    <th> CompanyName </th>
                    
                </tr>
    <?php
        $sql = 'SELECT ContactName, CompanyName  
        FROM customers WHERE CompanyName LIKE "b%s"';
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr> 
                    <td>{$row['ContactName']}</td>
                    <td>{$row['CompanyName']}</td>
                 </tr>";
        }
    ?>
            </table>
            </div>  
     <li>
        รายชื่อสินค้าและราคาต่อหน่วย เฉพาะสินค้าที่มีราคาต่อหน่วยตั้งแต่ 20 ถึง 50
     </li>
     <code>
            SELECT ProductName, Unitprice FROM products WHERE Unitprice BETWEEN 20 And  50;
            </code>
            <br>
            <table>
                <tr>
                    <th> ProductName </th>
                    <th> Unitprice </th>
                    
                </tr>
    <?php
        $sql = 'SELECT ProductName, Unitprice 
                FROM products WHERE Unitprice 
                BETWEEN 20 And  50;';
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr> 
                    <td>{$row['ProductName']}</td>
                    <td>{$row['Unitprice']}</td>
                 </tr>";
        }
    ?>
            </table>
            </div>
     <li>
         จากตารางข้อมูลลูกค้า เรียกดูชื่อผู้ติดต่อ (ContactName), ตำแหน่งผู้ติดต่อ (ContactTitle), ประเทศ (Country)
        โดยเรียกดูเฉพาะลูกค้าที่มีตำแหน่งเป็น Owner และอยู่ในประเทศ Mexico, Spain, France
     </li>
     <div>
            <code>
            SELECT ContactName, ContactTitle, country FROM customers WHERE ContactTitle = 'Owner' AND Country IN ('Mexico', 'spain', 'France' );
            </code>
            <br>
            <table>
                <tr>
                    <th> ContactName </th>
                    <th> ContactTitle </th>
                    <th> country </th>
                </tr>
    <?php
        $sql = 'SELECT ContactName, ContactTitle, country 
        FROM customers WHERE ContactTitle = "Owner"
        AND Country IN ("Mexico", "spain", "France" );';
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr> 
                    <td>{$row['ContactName']}</td>
                    <td>{$row['ContactTitle']}</td>
                    <td>{$row['country']}</td>
                 </tr>";
        }
    ?>
            </table>
            </div>
     <li>
        จากตารางข้อมูลลูกค้า เรียกดูชื่อบริษัท (CompanyName), ตำแหน่งผู้ติดต่อ (ContactTitle), ประเทศ (Country)
        โดยเรียกดูเฉพาะลูกค้าที่มีตำแหน่งเป็น Owner และอยู่ในประเทศ Mexico, Spain, France เรียงลำดับตามชื่อบริษัท
        โดยแสดงข้อมูลแค่ 2 รายการ
     </li>
     <div>
            <code>
            SELECT CompanyName,ContactName,ContactTitle,Country FROM customers WHERE ContactTitle = "Owner" AND Country IN ("Mexico","Spain","France") ORDER BY CompanyName DESC LIMIT 2;
            </code>
            <br>
            <table>
                <tr>
                    <th> CompanyName </th>
                    <th> ContactTitle </th>
                    <th> Country  </th>
                </tr>
    <?php
        $sql = 'SELECT CompanyName,ContactTitle,Country,ContactTitle
        FROM customers WHERE ContactTitle = "Owner"
        AND Country IN ("Mexico", "spain", "France")
        ORDER BY CompanyName DESC LIMIT 2';
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr> 
                    <td>{$row['CompanyName']}</td>
                    <td>{$row['ContactTitle']}</td>
                    <td>{$row['Country']}</td>
                 </tr>";
        }
    ?>
            </table>
            </div>
     <li>
         แสดงชื่อสินค้า ราคาต่อหน่วย และจำนวนสินค้าต่อหน่วย โดยแสดงเฉพาะสินค้าที่มีหน่วยเป็นกล่อง (box) 5
        รายการที่มีราคาต่อหน่วยสูงสุด
        <div>
            <code>
            SELECT ProductName, Unitprice, QuantityPerUnit FROM products WHERE  QuantityPerUnit LIKE  '%Box%' ORDER BY UnitPrice DESC LIMIT 5;
            </code>
            <br>
            <table>
                <tr>
                    <th> ProductName </th>
                    <th> Unitprice </th>
                    <th> QuantityPerUnit </th>
                </tr>
    <?php
        $sql = 'SELECT ProductName, Unitprice, QuantityPerUnit 
                FROM products WHERE  QuantityPerUnit 
                LIKE  "%Box%" ORDER BY UnitPrice DESC LIMIT 5' ;
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr> 
                    <td>{$row['ProductName']}</td>
                    <td>{$row['Unitprice']}</td>
                    <td>{$row['QuantityPerUnit']}</td>
                 </tr>";
        }
    ?>
            </table>
            </div>
     </li>
     <li>
        มีจำนวนลูกค้ากี่คนที่อยู่ในแต่ละประเทศ UK, France หรือ Spain เรียงลำดับตามจำนวนลูกค้า
     </li>
     <div>
            <code>
            SELECT country, COUNT(*) AS member FROM customers WHERE country IN ('UK', 'France', 'Spain' )GROUP BY country;
            </code>
            <br>
            <table>
                <tr>
                    <th> country </th>
                    <th> member </th>
                </tr>
    <?php
        $sql = 'SELECT country, COUNT(*) AS member 
                 FROM customers WHERE country 
                 IN ("UK", "France", "Spain" )
                 GROUP BY country';
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr> 
                    <td>{$row['country']}</td>
                    <td>{$row['member']}</td>
                 </tr>";
        }
    ?>
            </table>
            </div>
     <li>
        จำนวนลูกค้าจากประเทศ UK, France หรือ Spain โดยแสดงเฉพาะประเทศที่มีลูกค้ามากกว่า 5 ราย
        และแสดงผลเรียงลำดับตามจำนวนลูกค้าจากมากไปน้อย
     </li>
     <div>
            <code>
            SELECT country, COUNT(*) AS member FROM customers WHERE country IN ('UK', 'France', 'Spain') GROUP BY country HAVING member > 5 ORDER BY 2 DESC; 
            </code>
            <br>
            <table>
                <tr>
                    <th> country </th>
                    <th> member </th>
                </tr>
    <?php
        $sql = 'SELECT country, COUNT(*) AS member 
                 FROM customers WHERE country 
                 IN ("UK", "France", "Spain" )
                 GROUP BY country
                 HAVING member > 5 ORDER BY 2 DESC';
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr> 
                    <td>{$row['country']}</td>
                    <td>{$row['member']}</td>
                 </tr>";
        }
    ?>
            </table>
            </div>
     <li>
        ราคาเฉลี่ยของสินค้าในแต่ละหมวด (CategoryID)
     </li>
     <div>
            <code>
            SELECT CategoryID, AVG(UnitPrice) avg_price FROM products WHERE UnitsInStock > 0 GROUP BY CategoryID;

            </code>
            <br>
            <table>
                <tr>
                    <th> CategoryID </th>
                    <th> avg_price </th>
                </tr>
    <?php
        $sql = 'SELECT CategoryID, AVG(UnitPrice) avg_price 
                FROM products WHERE UnitsInStock > 0 
                GROUP BY CategoryID';

        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr> 
                    <td>{$row['CategoryID']}</td>
                    <td>{$row['avg_price']}</td>
                 </tr>";
        }
    ?>
            </table>
            </div>
    </ol>
    <?php
    $conn->close();
    ?>
</body>
</html>