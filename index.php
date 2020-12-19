<?php
require_once("connect.php");
$sql = "SELECT * FROM student ORDER BY userID DESC";
$result = mysqli_query($conn,$sql);
?>

<html>
<head>
<title>College Student Basic Information</title>
<link rel="stylesheet" type="text/css" href="_css/style.css"/>
</head>

<body>
<h1>College Student Basic Information</h1>
<form name="frmUser" method="post" action="">
<div style="width:877px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="left" style="padding-bottom:1;"><a href="create.php" class="link"><img alt='Add' title='Add' src='_icon/add.png' width='16px' height='16px'/>Add New Student</a></div>
<table border="0" cellpadding="15" cellspacing="1" width="740px" class="tblListForm">

<tr class="listheader">
<td>Student No.</td>
<td>Last Name</td>
<td>First Name</td>
<td>Middle Name</td>
<td>Gender</td>
<td>Home Address</td>
<td>Contact No.</td>
<td>Course</td>
<td>Department</td>
<td>Year</td>
<td>Actions</td>
</tr>

<?php
$i=0;
while($row = mysqli_fetch_array($result)){
if($i%2==0)
$classname="evenRow";
else
$classname="oddRow";
?>

<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><?php echo $row["studentNo"]; ?></td>
<td><?php echo $row["lastname"]; ?></td>
<td><?php echo $row["firstname"]; ?></td>
<td><?php echo $row["middlename"]; ?></td>
<td><?php echo $row["gender"]; ?></td>
<td><?php echo $row["homeAddress"]; ?></td>
<td><?php echo $row["contactNo"]; ?></td>
<td><?php echo $row["course"]; ?></td>
<td><?php echo $row["department"]; ?></td>
<td><?php echo $row["year"]; ?></td>
<td><a href="update.php?userID=<?php echo $row["userID"]; ?>" class="link"><img alt='Update' title='Update' src='_icon/update.png' width='15px' height='15px' hspace='10'/>Update</a>
    <a href="delete.php?userID=<?php echo $row["userID"]; ?>"  class="link"><img alt='Delete' title='Delete' src='_icon/delete.png' width='15px' height='15px'hspace='10'/>Delete</a>
</td>
</tr>

<?php
$i++;
}
?>

</table>
</form>
</div>
</body>
</html>