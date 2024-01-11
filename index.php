<?php
		$DBHost = "sysmysql8.auburn.edu";
		$DBUser = "szm0227";
		$DBPass = "lolhack99@";
		$DBName = "szm0227db";
		$conn = mysqli_connect($DBHost, $DBUser, $DBPass, $DBName);
		
		if (mysqli_connect_errno()) {
			print "Failed to connect to database. Try Again " ;
			die;
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset = "UTF-8">
  <title>Bookstore System - Sajith Muralidhar</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    h1 {
      color: green;
      background-color: yellow;
      border: 1px solid black; 
    }
    h3 {
      color: darkblue;
      background-color: orange;
      font-family: times new roman;
      font-weight: bold;
      font-size: 25px;
      border: 1px solid black;
    }
    </style>
  </head>
<body>
    <br>
        <center>
            <a href="index.php"><h1>Online Bookstore System <u>
            </u>
            </h1> </a>
        </center>
  <div>
	<center><form method="get">
			<div>
				<label for="input"><b>Enter A Input Query: </b></label>
                                <br>
				<textarea rows="5" cols="50" name="input"></textarea>
			</div>
		<button type="submit" class="btn btn-primary" name = "submit">Submit</button>
	</form></center>
    <?php 
        $sql_query = $_GET["input"];
        $sql_query = stripslashes($sql_query);
        $check_for_drop = strtoLower($sql_query);
        $check_for_update=strtoLower($sql_query);
        $update="update";
        $drop = "drop";
        if (strpos($check_for_drop, $drop) !== false) { ?>
        <br>
        <h6 style="color:red;">No DROP statements are allowed</h6>
        <h6 style="color:black;">Try another query</h6>
        <?php 
        }
        elseif(empty($sql_query) and isset($_GET["submit"]) ) {     ?>
        <br> 
	<h6 style="color:red;">Empty form </h6>
        <h6 style="color:red;"> Try another query</h6>
        <?php   
        }
        else {
        $sol = $conn->query($sql_query);
        if (mysqli_error($conn)) { ?>
        <br>
        <h6 style="color:red;"><?php print mysqli_error($conn)?></h6> 
        <?php
        }
        else {
         if (strpos($check_for_update, $update) !== false) {
             print "Updated";
        }
        $count_rows = mysqli_num_rows($sol);
        $info = mysqli_fetch_fields($sol);
    ?>
    <table  class = "table table-hover table-bordered table-striped">
	       <thead>
		      <tr>
                  <?php 
                    $count = 0;
                  foreach($info as $val) { 
                  ?>
	          <th scope="col"><?php print $val->name ?></th>
                  <?php 
                    $count++;
                    } 
                  ?>
		      </tr>
	       </thead>
	       <?php while ($row = mysqli_fetch_row($sol)) { ?> 
            <tr>  
                <?php for ($i = 0; $i < $count; $i++) { ?>
                <td><?php print $row[$i];?></td>
                <?php } ?>
            </tr>
            <?php } ?>
    </table>
 
    <?php
            if (isset($count_rows)) {
     ?>
            <h6 style="color:teal;"><?php print "Number of rows displayed: ". $count_rows?></h6>
    <?php
            }
      }
    }
    ?>
</div>
<div>
    <center><h3>Database Table Name </h3></center>
    <p><b>Note: Table names are case sensitive</b><p>
  <ul >
      <li>Book </li>
      <li>Customer</li>
      <li>Employee</li>
      <li>Orders</li>
      <li>OrderDetail</li>
      <li>Shipper</li>
      <li>Supplier</li>
      <li>Subject</li>
  </ul>
  </div>
  <div>
  <center> <h3> Books </h3> </center>
  <table class = "table table-hover table-bordered table-striped">
    <thead>
    <tr style = "background-color: teal;
      color: black;
      font-family: times new roman;
      font-weight: bold;
      font-size: 25px;">
      <th>Book ID</th>
      <th>Title </th>
      <th> Unit Price </th>
      <th> Author </th>
      <th> Quantity </th>
      <th> Suppiler ID </th>
      <th> Subject ID </th>
  </tr>
  </thead>
  <tbody>
  <?php
$query = "SELECT * from Book "; 
$result = $conn ->query($query);
while($row = $result->fetch_assoc()){ 
  ?> 
<tr>
<td><?php echo $row['BookID'];?></td>
<td><?php echo $row['Title'];?></td>
<td><?php echo $row['UnitPrice'];?></td>
<td><?php echo $row['Author'];?></td>
<td><?php echo $row['Quantity'];?></td>
<td><?php echo $row['SupplierID'];?></td>
<td><?php echo $row['SubjectID'];?></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
<div>
<center> <h3> Customer </h3> </center>
  <table class = "table table-hover table-bordered table-striped">
    <thead>
    <tr style = "background-color: teal;
      color: black;
      font-family: times new roman;
      font-weight: bold;
      font-size: 25px;">
      <th>Customer ID</th>
      <th>LastName</th>
      <th> FirstName </th>
      <th> Phone no </th>
  </tr>
  </thead>
  <tbody>
  <?php
$query = "SELECT * from Customer "; 
$result = $conn ->query($query);
while($row = $result->fetch_assoc()){ 
  ?> 
<tr>
<td><?php echo $row['CustomerID'];?></td>
<td><?php echo $row['LastName'];?></td>
<td><?php echo $row['FirstName'];?></td>
<td><?php echo $row['Phone'];?></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
<div>
<center> <h3> Employee </h3> </center>
  <table class = "table table-hover table-bordered table-striped">
    <thead>
    <tr style = "background-color: teal;
      color: black;
      font-family: times new roman;
      font-weight: bold;
      font-size: 25px;">
      <th>Employee ID</th>
      <th>LastName</th>
      <th> FirstName </th>
  </tr>
  </thead>
  <tbody>
  <?php
$query = "SELECT * from Employee "; 
$result = $conn ->query($query);
while($row = $result->fetch_assoc()){ 
  ?> 
<tr>
<td><?php echo $row['EmployeeID'];?></td>
<td><?php echo $row['LastName'];?></td>
<td><?php echo $row['FirstName'];?></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
<div>
  <center> <h3> Orders </h3> </center>
  <table class = "table table-hover table-bordered table-striped">
    <thead>
    <tr style = "background-color: teal;
      color: black;
      font-family: times new roman;
      font-weight: bold;
      font-size: 25px;">
      <th>OrderID</th>
      <th>CustomerID </th>
      <th> EmployeeID </th>
      <th> OrderDate </th>
      <th> ShippedDate </th>
      <th> ShipperID </th>
  </tr>
  </thead>
  <tbody>
  <?php
$query = "SELECT * from Orders "; 
$result = $conn ->query($query);
while($row = $result->fetch_assoc()){ 
  ?> 
<tr>
<td><?php echo $row['OrderID'];?></td>
<td><?php echo $row['CustomerID'];?></td>
<td><?php echo $row['EmployeeID'];?></td>
<td><?php echo $row['OrderDate'];?></td>
<td><?php echo $row['ShippedDate'];?></td>
<td><?php echo $row['ShipperID'];?></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
<div>
<center> <h3> Shipper </h3> </center>
  <table class = "table table-hover table-bordered table-striped">
    <thead>
    <tr style = "background-color: teal;
      color: black;
      font-family: times new roman;
      font-weight: bold;
      font-size: 25px;">
      <th>Shipper ID</th>
      <th>Shipper Name</th>
  </tr>
  </thead>
  <tbody>
  <?php
$query = "SELECT * from Shipper "; 
$result = $conn ->query($query);
while($row = $result->fetch_assoc()){ 
  ?> 
<tr>
<td><?php echo $row['ShipperID'];?></td>
<td><?php echo $row['ShipperName'];?></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
<div>
<center> <h3> Supplier </h3> </center>
  <table class = "table table-hover table-bordered table-striped">
    <thead>
    <tr style = "background-color: teal;
      color: black;
      font-family: times new roman;
      font-weight: bold;
      font-size: 25px;">
      <th>Supplier ID</th>
      <th>CompanyName</th>
      <th>Contact LastName</th>
      <th>Contact FirstName </th>
      <th>Phone</th>
  </tr>
  </thead>
  <tbody>
  <?php
$query = "SELECT * from Supplier "; 
$result = $conn ->query($query);
while($row = $result->fetch_assoc()){ 
  ?> 
<tr>
<td><?php echo $row['SupplierID'];?></td>
<td><?php echo $row['CompanyName'];?></td>
<td><?php echo $row['ContactLastName'];?></td>
<td><?php echo $row['ContactFirstName'];?></td>
<td><?php echo $row['Phone'];?></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
<div>
<center> <h3> Subject </h3> </center>
  <table class = "table table-hover table-bordered table-striped">
    <thead>
    <tr style = "background-color: teal;
      color: black;
      font-family: times new roman;
      font-weight: bold;
      font-size: 25px;">
      <th>Subject ID</th>
      <th>Category Name</th>
  </tr>
  </thead>
  <tbody>
  <?php
$query = "SELECT * from Subject "; 
$result = $conn ->query($query);
while($row = $result->fetch_assoc()){ 
  ?> 
<tr>
<td><?php echo $row['SubjectID'];?></td>
<td><?php echo $row['CategoryName'];?></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
</body>
</html>