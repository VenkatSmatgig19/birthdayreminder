<?php
session_start();
$loginemail = $_SESSION['email'];
if(!$loginemail){
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
    <title>Add Employee</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>


</head>
<style>
.btn {
    width: 130px;
    height: 50px
}

.right {
    margin-right: 50px;
    float: right;
}

.date {
    float: right;
    margin-top: -35px;
    margin-right: 17.5px
}

.error_form {
    top: 12px;
    color: rgb(216, 15, 15);
    font-size: 15px;
    font-family: Helvetica;
}
</style>

<body>

    <h2 class="h2 text-center mt-4" style="color: #00695C">Add Employee</h2>

    <div class="container mt-4">

        <a class="btn btn-primary" style="background-color: #ffac44;" href="employeesDetails.php" role="button">Employee
            Details</a>
        <a class="btn btn-primary " style="background-color: #D32F2F;padding: 15px;float: right" href="logout.php"
            role="button">logout</a>


        <form action="process.php" method="post" id="form">
            <div class="row">

                <div class="col-lg-6">
                    <label class="form-label mt-3" for="fullname">Full Name*</label>
                    <div class="form-outline">
                        <input type="text" id="fullname" name="fullname" class="form-control form-control-lg"
                            value="<?php echo $fullname; ?>" required />

                    </div>
                    <p class="error_form" id="fullname_error_message"></p>


                    <label class="form-label mt-3" for="fathername">Father Name*</label>
                    <div class="form-outline">
                        <input type="text" id="fathername" name="fathername" class="form-control form-control-lg"
                            value="<?php echo $fathername; ?>" required />

                    </div>
                    <p class="error_form" id="fathername_error_message"></p>


                    <label class="form-label mt-3" for="mothername">Mother Name*</label>
                    <div class="form-outline">
                        <input type="text" id="mothername" name="mothername" class="form-control form-control-lg"
                            value="<?php echo $mothername; ?>" required />

                    </div>
                    <p class="error_form" id="mothername_error_message"></p>


                    <label class="form-label mt-3" for="dob">Date of Birth*</label>
                    <div class="form-outline">
                        <input type="date" id="dob" name="dob" class="form-control form-control-lg"
                            value="<?php echo $dob; ?>" required />

                        <span class="date"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <label class="form-label mt-3" for="kidsname">Kids Name</label>
                    <div class="form-outline">
                        <input type="text" id="kidsname" name="kidsname" class="form-control form-control-lg"
                            value="<?php echo $kidsname; ?>" />

                    </div>
                    <label class="form-label mt-3" for="kidsdob">Kids Date of Birth</label>
                    <div class="form-outline">
                        <input type="text" id="kidsdob" name="kidsdob" class="form-control form-control-lg"
                            value="<?php echo $kidsdob; ?>" />

                    </div>



                </div>
                <div class="col-lg-6">
                    <label class="form-label mt-3" for="doj">Date of Jioning*</label>
                    <div class="form-outline">

                        <input type="date" id="doj" name="doj" class="form-control form-control-lg" required
                            value="<?php echo $doj; ?>" />
                        <!-- <label class="form-label" for="doj">Date of Jioning</label> -->
                        <span class="date"><i class="fas fa-calendar-alt"></i></span>
                    </div>

                    <label class="form-label mt-3" for="email">Email*</label>
                    <div class="form-outline">
                        <input type="email" id="email" name="email" class="form-control form-control-lg" required
                            value="<?php echo $email; ?>" />
                    </div>
                    <p class="error_form" id="email_error_message"></p>


                    <label class="form-label mt-3" for="highereducation">Higher Education*</label>
                    <div class="form-outline">
                        <input type="text" id="highereducation" name="highereducation"
                            class="form-control form-control-lg" required value="<?php echo $highereducation; ?>" />

                    </div>

                    <label class="form-label mt-3" for="totalexperience">Total Experience*</label>
                    <div class="form-outline">
                        <input type="text" id="totalexperience" name="totalexperience"
                            class="form-control form-control-lg" required value="<?php echo $totalexperience; ?>" />

                    </div>

                    <label class="form-label mt-3" for="skills">Skills*</label>
                    <div class="form-outline">
                        <input type="text" id="skills" name="skills" class="form-control form-control-lg"
                            value="<?php echo $skills; ?>" required />

                    </div>

                    <label class="form-label mt-3" for="secondaryskills">Secondary Skills</label>
                    <div class="form-outline">
                        <input type="text" id="secondaryskills" name="secondaryskills"
                            class="form-control form-control-lg" value="<?php echo $secondaryskills; ?>" required />

                    </div>

                    <input type="text" hidden name="id" value="<?php echo $id; ?>">



                </div>
                <div class="mt-4">
                    <?php if($update == true):?>
                    <button type="submit" name="update" class="btn btn-warning btn-rounded">Update</button>
                    <?php else: ?>
                    <button type="submit" name="register" class="btn btn-primary btn-rounded">Submit</button>
                    <?php endif; ?>
                </div>

            </div>
        </form>
    </div>




    <script type="text/javascript">
    $(function() {

        $("#fullname_error_message").hide();
        $("#fathername_error_message").hide();
        $("#mothername_error_message").hide();
        $("#email_error_message").hide();


        var error_fullname = false;
        var error_fathername = false;
        var error_mothername = false;
        var error_email = false;


        $("#fullname").focusout(function() {
            check_fullname();
        });
        $("#fathername").focusout(function() {
            check_fathername();
        });
        $("#mothername").focusout(function() {
            check_mothername();
        });
        $("#email").focusout(function() {
            check_email();
        });


        function check_fullname() {
            var pattern = /^[a-z A-Z]*$/;
            var fullname = $("#fullname").val();
            if (pattern.test(fullname) && fullname !== '') {
                $("#fullname_error_message").hide();
                $("#fullname").css("border-bottom", "2px solid #34F458");
            } else {
                $("#fullname_error_message").html("Should contain only Characters");
                $("#fullname_error_message").show();
                $("#fullname").css("border-bottom", "2px solid #F90A0A");
                error_fullname = true;
            }
        }

        function check_fathername() {
            var pattern = /^[a-z A-Z]*$/;
            var sname = $("#fathername").val()
            if (pattern.test(sname) && sname !== '') {
                $("#fathername_error_message").hide();
                $("#fathername").css("border-bottom", "2px solid #34F458");
            } else {
                $("#fathername_error_message").html("Should contain only Characters");
                $("#fathername_error_message").show();
                $("#fathername").css("border-bottom", "2px solid #F90A0A");
                error_fname = true;
            }
        }

        function check_mothername() {
            var pattern = /^[a-z A-Z]*$/;
            var sname = $("#mothername").val()
            if (pattern.test(sname) && sname !== '') {
                $("#mothername_error_message").hide();
                $("#mothername").css("border-bottom", "2px solid #34F458");
            } else {
                $("#mothername_error_message").html("Should contain only Characters");
                $("#mothername_error_message").show();
                $("#mothername").css("border-bottom", "2px solid #F90A0A");
                error_fname = true;
            }
        }


        function check_email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $("#email").val();
            if (pattern.test(email) && email !== '') {
                $("#email_error_message").hide();
                $("#email").css("border-bottom", "2px solid #34F458");
            } else {
                $("#email_error_message").html("Invalid Email Address");
                $("#email_error_message").show();
                $("#email").css("border-bottom", "2px solid #F90A0A");
                error_email = true;
            }
        }


    });
    </script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>
</body>

</html>