<?php include_once 'Connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Title</title>
</head>

<body>
    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form-1">
                <h3>Login Form</h3>
                <form method="POST" action="">
                    <div class="form-group">
                        <input type="text" name="useremail" class="form-control" placeholder="Your Email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="userpass" class="form-control" placeholder="Your Password *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" name="btnlogin" value="Login" />
                    </div>
                </form>
                <?php if (isset($_GET['loginerror'])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal</strong> <?php echo $_GET['loginerror']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-6 login-form-2">
                <h3>Registration Form </h3>
                <form method="POST" action="Query.php">
                    <div class="form-group">
                        <input type="text" class="form-control" name="names" placeholder="Your Name *" value="" required />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Your Email *" value="" required />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="passwords" placeholder="Your Password *" value="" required />
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="rolessystem" required>
                            <option selected disabled>-------Select Role------</option>
                            <?php
                            $rolesfetchQuery = "SELECT * FROM `roles` where Roles != 'Admin'";
                            $result  = mysqli_query($conn, $rolesfetchQuery);
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row['ID'] ?>"><?php echo $row['Roles'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <input type="submit" name="btnregister" class="btnSubmit" value="Registered" />
                </form>
                <?php
                if (isset($_GET['successregistration'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat akun mu telah terdaftar</strong> <?php echo $_GET['successregistration']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } else if (isset($_GET['errormsg'])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal</strong> <?php echo $_GET['errormsg']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>

<?php


if (isset($_REQUEST['btnlogin'])) {

    $useremail = $_REQUEST['useremail'];
    $userpass =  $_REQUEST['userpass'];
    $sqlquerycheckrecord = "SELECT * FROM `registeration` WHERE `Email` = '$useremail' and Passowrd = '$userpass'";
    $result  = mysqli_query($conn, $sqlquerycheckrecord);
    $row = mysqli_fetch_assoc($result);
    if (!empty($row)) {
        if ($row['Role_ID_FK'] == 1) {

            $_SESSION['Name'] = $row['Name'];
            $_SESSION['Email'] = $row['Email'];
            header("location: Admin.php");
        } else if ($row['Role_ID_FK'] == 2) {

            $_SESSION['Name'] = $row['Name'];
            $_SESSION['Email'] = $row['Email'];
            header("location: Ketua.php");
        } else if ($row['Role_ID_FK'] == 3) {

            $_SESSION['Name'] = $row['Name'];
            $_SESSION['Email'] = $row['Email'];
            header("location: Staf.php");
        }
    } else {
        header("location: index.php?loginerror= Please Provide Correct Username And Password");
    }
}

?>