<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <title>Quản lý bệnh viện</title>
</head>
<body>
<div class="container">
        <h2 style="text-align: center;margin-top : 50px">Quản lý thông tin bệnh nhân</h2>
        <a href="add.php" class="btn btn-success" style="margin-top: 50px;">Thêm bệnh nhân</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ tên bệnh nhân</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Nhóm máu</th>
                    <th scope="col">Ngày lập sổ</th>
                    <th scope="col">Ngày cập nhật</th>
                    <th scope="col">Chi tiết</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = mysqli_connect('localhost','root','','db_patient');
                $resuilt = mysqli_query($conn, "Select * from patient");
                if (mysqli_num_rows($resuilt) > 0) 
                {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($resuilt)) 
                    { ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $row['firstname'].''.$row['lastname'] ?></td>
                            <td><?php echo $row['gender'] ?></td>
                            <td><?php echo $row['mobile'] ?></td>
                            <td><?php echo $row['blood_type'] ?></td>
                            <td><?php echo $row['created_on'] ?></td>
                            <td><?php echo $row['modified_on'] ?></td>
                            <td><a href="#" id="<?php echo $row['patientid'] ?>" class="view"><i class="fas fa-eye"></i></a></td>
                            <td><a href="update.php?patientid=<?php echo $row['patientid'] ?>"><i class="fas fa-edit"></i></a></td>
                            <td><a href="delete.php?patientid=<?php echo $row['patientid'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                <?php
                    $i++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>