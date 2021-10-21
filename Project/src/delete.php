<?php 
$conn = mysqli_connect('localhost','root','','db_patient');
    $patientid = $_GET['patientid'];
    $delete = mysqli_query($conn,"Delete from patient where patientid = '$patientid'");
    if($delete) {   
        header('location:index.php');
    }
    else {
        header('location:index.php');
    }
?>