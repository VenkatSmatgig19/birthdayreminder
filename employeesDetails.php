<?php 

session_start();
$email = $_SESSION['email'];
if(!$email){
     header('location: index.php');
}
include 'connection.php';
require_once('process.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Details</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet" />
</head>

<body>

    <div class="mt-5 mb-4">
        <h2 class="text-center text-primary h2">Employee Details</h2>

    </div>


    <?php
// $con = mysqli_connect('localhost','root','');

// 	mysqli_select_db($con, 'employees');

  


//   $s = "SELECT * FROM employees ";

//   $result = mysqli_query($con, $s);
   $result =$mysqli->query("SELECT * FROM employees") or die($mysqli->error);
  $employees = mysqli_fetch_all($result, MYSQLI_ASSOC);

 
?>

    <div class="container">

        <a class="btn btn-primary mb-4" style="background-color: #3b5998;" href="employees.php" role="button">Add
            Employee</a>
        <a class="btn btn-primary " style="background-color: #D32F2F;padding: 15px; float: right" href="logout.php"
            role="button">logout</a>
        <table class=" table table-bordered table-hover table-striped table-light">
            <thead>
                <th>Full Name</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Date of Jioning</th>
                <th>Education</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php foreach($employees as $employee): ?>
                <tr>
                    <td><?php echo  $employee['fullname'];?></td>
                    <td><?php echo $employee['email'];?></td>

                    <td><?php echo date('d-m-Y', strtotime($employee['dob']))?> </td>

                    <td><?php echo date('d-m-Y', strtotime($employee['doj']))?></td>
                    <td><?php echo $employee['highereducation'];?></td>
                    <td>
                        <a href="employees.php?edit=<?php echo $employee['id']; ?>" class="btn btn-info">Edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>



    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>

</body>

</html>