<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","root","albumtest");
if(count($_POST)>0) {
$roll_no=$_POST[search];
$result = mysqli_query($conn,"SELECT * FROM user where username='$roll_no' ");
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Retrive data</title>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<table>
<tr>
<td>first name</td>
<td>last name</td>
<td>user name</td>
<td>password</td>

</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["firstname"]; ?></td>
<td><?php echo $row["lastname"]; ?></td>
<td><?php echo $row["username"]; ?></td>
<td><?php echo $row["userpassword"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
</body>
</html>