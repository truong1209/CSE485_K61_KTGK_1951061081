<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bệnh viện</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-
    oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 style="text-align: center;margin-top : 50px">Sửa thông tin người nhận máu</h2>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'db_patient');
        $patientid = $_GET['patientid'];
        $slt = mysqli_query($conn, "Select * from patient where patientid = '$patientid'");
        if (mysqli_num_rows($slt) > 0) {
            $row = mysqli_fetch_assoc($slt);
        } else {
            header('index.php');
        }
        ?>
          <?php
        if (isset($_POST['btn_update'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $dateofbirth = $_POST['dateofbirth'];
            $gender = $_POST['gender'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $height = $_POST['height'];
            $weight = $_POST['weight'];
            $blood_type = $_POST['blood_type'];
            $created_on = $_POST['created_on'];
            $modified_on = $_POST['modified_on'];
            $diff_date = (strtotime($modified_on) - strtotime($created_on)) / (60 * 60 * 24);
            // echo $diff_date;
            if ($diff_date > 0) {
                $update = mysqli_query($conn, "update patient set firstname = '$firstname',
            lastname = '$lastname',mobile = '$mobile', gender='$gender', 
            mobile='$mobile',email = '$email',height = '$height',weight='$weight', blood_type = '$blood_type',
            created_on = '$created_on',modified_on = '$modified_on' where patientid = '$patientid'");
                if ($update == TRUE) {
                    header('location:index.php');
                } else {
                    header('location:index.php');
                }
            } else {
                echo "<script>alert('Vui lòng nhập lại , ngày cập nhật phải lớn hơn ngày lập ')</script>";
            }
        }

        ?>
        <form action="" method="Post" style="margin-top: 50px;">
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Tên đệm</label>
                <input name="firstname" value="<?php echo $row['firstname'] ?>" type="text" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Tên </label>
                <input name="lastname" value="<?php echo $row['lastname'] ?>" type="text" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Ngày sinh</label>
                <input type="date" name="dateofbirth" value="<?php echo $row['dateofbirth'] ?>" class="form-control" id="exampleInput">
            </div>

            <div class="mb-3">
                <label for="exampleInput" class="form-label">Giới tính</label>
                <!-- <div class="form-control"> -->
                  <input <?php if ($row['gender'] == "Nam") {
                                echo "checked";
                            } ?> type="radio" name="gender" value="Nam">
                  <label>Nam</label>
                  <input <?php if ($row['gender'] == "Nữ") {
                                echo "checked";
                            } ?> type="radio" name="gender" value="Nữ">
                  <label>Nữ</label>
                  <input <?php if ($row['gender'] == "Khác") {
                                echo "checked";
                            } ?> type="radio" name="gender" value="Khác">
                  <label>Khác</label>
                <!-- </div> -->
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Điện thoại</label>
                <input name="mobile" value="<?php echo $row['mobile'] ?>" type="text" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Email</label>
                <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Chiều cao</label>
                <input name="height" value="<?php echo $row['height'] ?>" type="text" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Cân nặng</label>
                <input name="weight" value="<?php echo $row['weight'] ?>" type="text" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Nhóm máu</label>
                <input name="blood_type" value="<?php echo $row['blood_type'] ?>" type="text" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Ngày lập sổ</label>
                <input name="created_on" value="<?php echo $row['created_on'] ?>" type="date" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Ngày cập nhật</label>
                <input name="modified_on" value="<?php echo $row['modified_on'] ?>" type="date" class="form-control" id="exampleInput">
            </div>

            <button type="submit" name="btn_update" class="btn btn-primary">Sửa thông tin</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>