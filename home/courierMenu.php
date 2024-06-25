<?php
session_start();
if (isset($_SESSION['uid'])) {
    echo "";
} else {
    header('location: ../index.php');
}

?>
<?php
include('header.php');
$email = $_SESSION['emm'];
$uid = $_SESSION['uid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <style>
        body {
            background-image: url('../images/cbg3.jpg');
            display: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <form action="courierMenu.php" method="POST" enctype="multipart/form-data">
        <div style="overflow-x:auto;">
            <table border="0px solid" style="margin: auto; font-weight:bold;border-spacing: 5px 15px;">
                <th colspan="4" style="text-align: center;background-color:#4dc3ff;border-radius: 30px ; width: 140px; height: 50px;"><b>Fill The Details Of Sender & Receiver</b></th>
                <tr>
                    <td colspan="4" style="text-align: center;">
                        <hr>
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <th colspan="2">SENDER</th>
                    <th colspan="2">RECEIVER</th>
                </tr>
                <tr>
                    <td colspan="4">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <th colspan="5"></th>
                    <th colspan="2"></th>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="sname" placeholder="Sender FullName" required></td>

                    <td>Name:</td>
                    <td><input type="text" name="rname" placeholder="Sender FullName" required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="semail" value="<?php echo $email; ?>" readonly></td>

                    <td>Email:</td>
                    <td><input type="text" name="remail" placeholder="Receiver EmailId" required></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="number" name="sphone" placeholder="sender number" required></td>

                    <td>Phone Number:</td>
                    <td><input type="number" name="rphone" placeholder="receiver number" required></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="textfield" name="saddress" placeholder="sender address" required></td>

                    <td>Address:</td>
                    <td><input type="textfield" name="raddress" placeholder="receiver address" required></td>
                </tr>
                <tr>
                    
                <tr>
                    <td>Weight:</td>
                    <td><input type="number" name="wgt" placeholder="weights in kg" required></td>

                    <td>Payment Id:</td>
                    <td><input type="number" name="billno" placeholder="enter transition num" required></td>
                </tr>
                <tr>
                
                    <td>Date:</td>
                    <td><input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly /></td>
                    <td>Items Image:</td>
                    <td><input type="file" name="simg" ></td>
                </tr>
                <tr>
                    <td colspan="4" align="center"><input type="submit" name="submit" value="Place Order" style="background-color: orange; border-radius: 15px; width: 150px; height: 50px;cursor:pointer;"></td>
                </tr>
            </table>
        </div>
    </form>
    </body>
</html>
<?php

if (isset($_POST['submit'])) {                                                             

    include('../dbconnection.php');

    $sname = $_POST['sname'];
    $rname = $_POST['rname'];
    $semail = $_POST['semail'];
    $remail = $_POST['remail'];
    $sphone = $_POST['sphone'];
    $rphone = $_POST['rphone'];
    $sadd = $_POST['saddress'];
    $radd = $_POST['raddress'];
    $wgt = $_POST['wgt'];
    $billn = $_POST['billno'];
    $originalDate = $_POST['date'];
    $newDate = date("Y-m-d", strtotime($originalDate));
    $imagenam = $_FILES['simg']['name'];
    $tempnam = $_FILES['simg']['tmp_name'];

    move_uploaded_file($tempnam, "../dbimages/$imagenam");

    $qry = "INSERT INTO `courier` (`sname`, `rname`, `semail`, `remail`, `sphone`, `rphone`, `saddress`, `raddress`, `weight`, `billno`, `image`,`date`,`u_id`) VALUES ('$sname', '$rname', '$semail', '$remail', '$sphone', '$rphone', '$sadd', '$radd', '$wgt', '$billn', '$imagenam', '$newDate','$uid');";
    $run = mysqli_query($dbcon, $qry);

    

    if ($run == true) {

    ?> <script>
            alert('Order Placed Successfully :)');
            window.open('courierMenu.php', '_self');
        </script>
    <?php
    }
}

?>