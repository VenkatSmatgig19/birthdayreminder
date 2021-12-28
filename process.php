<?php 

include 'connection.php';

	$update = false;
	$fullname		        ='';
	$fathername 	        ='';
	$mothername 		    ='';
	$dob 			        ='';
	$kidsname 			    ='';
	$kidsdob 		        ='';
    $doj 		            ='';
	$email					='';
    $highereducation 		='';
    $totalexperience 		='';
    $skills 		        ='';
    $secondaryskills 		='';
	$id						='';


// Insert Employee

if(isset($_POST['register']))
{



	
	// $con = mysqli_connect('localhost','root','');

	// mysqli_select_db($con, 'employees');
	$fullname		        =$_POST['fullname'];
	$fathername 	        =$_POST['fathername'];
	$mothername 		    =$_POST['mothername'];
	$dob 			        =$_POST['dob'];
	$kidsname 			    =$_POST['kidsname'];
	$kidsdob 		        =$_POST['kidsdob'];
    $doj 		            =$_POST['doj'];
	$email 		            =$_POST['email'];
    $highereducation 		=$_POST['highereducation'];
    $totalexperience 		=$_POST['totalexperience'];
    $skills 		        =$_POST['skills'];
    $secondaryskills 		=$_POST['secondaryskills'];





	$s = "SELECT * FROM employees WHERE fullname = '$fullname' ";

	$result = mysqli_query($con, $s);

	$num = mysqli_num_rows($result);

	if($num == 1)
	{
		 echo "<script>alert('Name is alredy Exits!'); window.location.href='employees.php';</script>";	
	}
	else
	{

		$mysqli->query(" INSERT INTO  employees (fullname,fathername,mothername,dob,kidsname,kidsdob,doj,email,highereducation,totalexperience,skills,secondaryskills) 
        VALUES ('$fullname','$fathername' , '$mothername' ,'$dob',  '$kidsname' , '$kidsdob' , '$doj','$email' , '$highereducation' , '$totalexperience' , '$skills', '$secondaryskills')")or die($mysqli->error);
		// $insert = " INSERT INTO  employees (fullname,fathername,mothername,dob,kidsname,kidsdob,doj,email,highereducation,totalexperience,skills,secondaryskills) 
        // VALUES ('$fullname','$fathername' , '$mothername' ,'$dob',  '$kidsname' , '$kidsdob' , '$doj','$email' , '$highereducation' , '$totalexperience' , '$skills', '$secondaryskills')";
		// mysqli_query($con, $insert);

		echo "<script>alert('Record has been saved!'); window.location.href='employeesDetails.php';</script>";	
		
	}

}

//Edit Employee
if (isset($_GET['edit'])) {

	// $mysqli = new mysqli('localhost','root','','employees') or die($mysqli_error($mysqli));
	

	$employeeid =$_GET['edit'];

	$update = true;

	$result =  $mysqli->query("SELECT * FROM employees WHERE id='$employeeid' ") or die($mysqli->error);
	
		$row=$result->fetch_array();
	$fullname		        =$row['fullname'];
	$fathername 	        =$row['fathername'];
	$mothername 		    =$row['mothername'];
	$dob 			        =$row['dob'];
	$kidsname 			    =$row['kidsname'];
	$kidsdob 		        =$row['kidsdob'];
    $doj 		            =$row['doj'];
	$email 		            =$row['email'];
    $highereducation 		=$row['highereducation'];
    $totalexperience 		=$row['totalexperience'];
    $skills 		        =$row['skills'];
    $secondaryskills 		=$row['secondaryskills'];
	$id						=$row['id'];

	
	
}

//Update Employee
if(isset($_POST['update']))
{
	// $mysqli = new mysqli('localhost','root','','employees') or die($mysqli_error($mysqli));
	
	$employeeid				=$_POST['id'];
	$fullname		        =$_POST['fullname'];
	$fathername 	        =$_POST['fathername'];
	$mothername 		    =$_POST['mothername'];
	$dob 			        =$_POST['dob'];
	$kidsname 			    =$_POST['kidsname'];
	$kidsdob 		        =$_POST['kidsdob'];
    $doj 		            =$_POST['doj'];
	$email 		            =$_POST['email'];
    $highereducation 		=$_POST['highereducation'];
    $totalexperience 		=$_POST['totalexperience'];
    $skills 		        =$_POST['skills'];
    $secondaryskills 		=$_POST['secondaryskills'];

	
	
	$mysqli->query("UPDATE employees SET fullname = '$fullname' , fathername='$fathername' , mothername='$mothername' , dob='$dob' ,  kidsname='$kidsname' , kidsdob='$kidsdob' , 
	doj='$doj', email='$email', highereducation='$highereducation',totalexperience = '$totalexperience', skills ='$skills', secondaryskills='$secondaryskills'   WHERE id = '$employeeid' ") or die($mysqli->error);



	echo "<script>alert('Record has been updated!'); window.location.href='employeesDetails.php';</script>";
}




?>