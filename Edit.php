<?php include "ConnectToDataBase.php";
    $emp_id = $_GET['editid'];
    $sql1 = "select * from employee_data where emp_id = $emp_id";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);
    $srno = $row['srno'];
    $emp_id = $row['emp_id'];
    $address = $row['address'];
    $zipcode = $row['zipcode'];
    $salary = $row['salary'];
        if(isset($_POST['update'])){
            // $srno = $_POST['srno'];
            // $emp_id = $_POST['emp_id'];
            $address = $_POST['address'];
            $zipcode = $_POST['zipcode'];
            $salary = $_POST['salary'];
            $sql = "update employee_data set address = '$address', zipcode = '$zipcode', salary = '$salary' where emp_id = $emp_id";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("location: EmployeeForm.php");
            }
            else{
                die(mysqli_error($conn));
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style.css"> 
</head>
<body>
    <div class="contact-form">
        <h1>Employee FORM</h1>
    </div>
    <div class="contact-us">
        <form action="" method="post">
            <input type="text" name="address" class="form-control" placeholder="Enter Address" value=<?php echo $address ?>><br>
            <input type="text" name="zipcode" class="form-control" placeholder="Enter zipcode" value=<?php echo $zipcode ?>>><br>
            <input type="text" name="salary" class="form-control" placeholder="Enter salary" value=<?php echo $salary ?>>><br>
            <input type="submit" class="form-control submit" name="update" value="update">
        </form>
    </div>
</body>
</html>