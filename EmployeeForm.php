<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
     <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"> -->
    <title>Employee Data</title>
</head>
<body>
<div class="contact-form">
        <h1>Employee FORM</h1>
    </div>
    <div class="contact-us">
        <form action="SQLQuery.php" method="post">
            <input type="text" name="srno" class="form-control" pattern="[0-9]{1,}" placeholder="Enter srno" required><br>
            <input type="text" name="emp_id" class="form-control" pattern="[0-9]{1,}"placeholder="Enter emp id" required><br>
            <input type="text" name="address" class="form-control" pattern="[0-9a-zA-Z]{3,}"placeholder="Enter address" required><br>
            <input type="text" name="zipcode" class="form-control" pattern="[0-9]{6}" placeholder="Enter zipcode" required><br>
            <input type="text" name="salary" class="form-control" pattern="[0-9]{4,}" placeholder="Enter salary" required><br>
            <input type="submit" class="form-control submit" value="add" name="add">
        </form>
    </div>
        <!-- <div class="container">
        <button class = "btn btn-primary my-5"><a href="Index.php" class="text-light">Add</a></button> -->
    <table style= "width:70%" class="center">
    <thead>
    <tr>
      <th scope="col" class="column" class="text-light">srno</th>
      <th scope="col" class="column" class="text-light">emp_id</th>
      <th scope="col" class="column" class="text-light">address</th>
      <th scope="col" class="column" class="text-light">zipcode</th>
      <th scope="col" class="column" class="text-light">salary</th>
      <th scope="col" class="column" class="text-light">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php include "ConnectToDataBase.php";
        //$conn = mysqli_connect("localhost:3306", "root", "Prasad@321", "ContactData") or die("Connection Failed");
        $sql = "select * from employee_data";
        $result = mysqli_query($conn, $sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $srno = $row['srno'];
                $emp_id = $row['emp_id'];
                $address = $row['address'];
                $zipcode = $row['zipcode'];
                $salary = $row['salary'];
                echo  '<tr>
                <th scope="row">'.$srno.'</th>
                <td>'.$emp_id.'</td>
                <td>'.$address.'</td>
                <td>'.$zipcode.'</td>
                <td>'.$salary.'</td>
                <td>
                <button class="editbtn" ><a href="Edit.php?editid='.$srno.'"  class = "text-light">Edit</a></button>
                <button class="deletebtn"><a href="SQLQuery.php?deleteid='.$srno.'" class = "text-light">Delete</a></button>
                </td>
              </tr>';
            }
        }
    ?>
  </tbody>
</table> 
</body>
</html>