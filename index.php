<?php

session_start();

include 'connection.php';

if(isset($_POST['login'])){
// $con = mysqli_connect('localhost','root','');

// mysqli_select_db($con, 'employees');


$email 		=$_POST['email'];
$password   =$_POST['password'];



$s = " SELECT * FROM login WHERE email = '$email' && password = '$password' ";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1)
	{
		$row = mysqli_fetch_assoc($result);
		if ($row['email'] === $email && $row['password'] === $password) {
		$_SESSION['email'] = $row['email'];
		}

		header('location: employees.php');
	}else{

        

     echo "<script>alert('Invalid Email or Password'); window.location.href='index.php';</script>";

	} 


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet" />
</head>
<style>
.card {
    width: 500px;
    height: 400px;
    margin-top: 200px;
    margin-left: 400px;
}

.form {
    padding: 30px;
}
</style>

<body>

    <div class="container text-center">
        <div class="card shadow-5">
            <h5 class="text-info h2 text-center bold mt-4">Login</h5>
            <form action="index.php" method="post">
                <div class="form">
                    <div class="form-outline mb-3 mt-5">
                        <input type="email" id="login" name="email" class="form-control form-control-lg" required />
                        <label class="form-label" for="login">Email</label>
                    </div>
                    <div class="form-outline mb-3 mt-5">
                        <input type="password" id="password" name="password" class="form-control form-control-lg"
                            required />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <div class="mt-5 mb-3 text-center">
                        <button type="submit" name="login" class="btn btn-outline-primary" data-mdb-ripple-color="dark">
                            Login
                        </button>
                    </div>

                    <div>
                    </div>
            </form>
        </div>
    </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>
</body>

</html>