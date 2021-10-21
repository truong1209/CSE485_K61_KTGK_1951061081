<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <title>Quản lý bệnh viện</title>
</head>
<body>
<div class="container">
        <h2 style="text-align: center;margin-top : 50px">Thêm thông tin bệnh nhân</h2>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'db_patient');
        ?>
        <form action="" method="Post" style="margin-top: 50px;">
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Tên đệm</label>
                <input name="firstname" type="text" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Tên</label>
                <input name="lastname" type="text" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Ngày sinh</label>
                <input name="dateofbirth" type="date" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Giới tính</label>
                <!-- <div class="form-control"> -->
                  <input type="radio" name="gender" value="Nam">
                  <label>Nam</label>
                  <input type="radio" name="gender" value="Nữ">
                  <label>Nữ</label>
                  <input type="radio" name="gender" value="Khác">
                  <label>Khác</label>
                <!-- </div> -->
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Số điện thoại</label>
                <input name="mobile" type="text" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Email</label>
                <input required name="email" type="email" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Chiều cao (cm)</label>
                <input name="height" type="text" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Cân nặng (kg)</label>
                <input name="weight" type="text" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Nhóm máu</label>
                <input name="blood_type" type="text" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Ngày lập sổ</label>
                <input name="created_on" type="date" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Ngày cập nhật</label>
                <input name="modified_on" type="date" class="form-control" id="exampleInput">
            </div>
            <button type="submit" name="btn_add" class="btn btn-primary">Thêm thông tin bệnh nhân</button>
        </form>
        <?php
        if (isset($_POST['btn_add'])) {

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
            //khoảng cách giữa ngày cập nhập và ngày lập phải lớn hơn 0
            $diff_date = (strtotime($modified_on) - strtotime($created_on)) / (60 * 60 * 24);
            echo $diff_date;
            if ($diff_date > 0) {
                $insert = "Insert into patient(firstname ,lastname ,dateofbirth ,gender,mobile ,email ,height,weight,blood_type,created_on,modified_on)
             values ('$firstname','$lastname','$dateofbirth','$gender','$mobile','$email','$height','$weight','$blood_type','$created_on','$modified_on')";
                $res = mysqli_query($conn, $insert);
                if ($res == true) {
                    // header('location:index.php');
                } else {
                    // header('location:index.php');
                }
            }
            else {
                echo "<script>alert('Vui lòng nhập lại , ngày cập nhật phải lớn hơn ngày lập ')</script>";
            }
        }

        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>