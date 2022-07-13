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
        <h1>Search</h1>
    </div>
    <div class="contact-us">
        <form action="" method="POST">
          <input type="text" name="value" class="form-control" placeholder="Enter value" required><br>
          <input  class="searchbtn" type="submit" value="search" name="search">
        </form>
    </div>

    <table style= "width:70%" class="center">
    <thead>
    <tr>
      <th >srno</th>
      <th >emp_id</th>
      <th >name</th>
      <th >city</th>
      <th >zipcode</th>
      <th >salary</th>
      <th >Action</th>
    </tr>
  </thead>
  <tbody>
  <?php include "ConnectToDataBase.php";
     // $parameter;
      // if(isset($_POST['searchdata'])){
      //   $parameter =  $_POST['searchby'];
        
      // }
      if(isset($_POST['search'])){
         // $parameter = $_POST['searchby'];
          $value = $_POST['value'];
          $sql = "select * from employee_data where name = '$value' or city = '$value' or emp_id = '$value'";   
          $result = mysqli_query($conn, $sql);
          if($result){
              while($row=mysqli_fetch_assoc($result)){
                  $srno = $row['srno'];
                  $emp_id = $row['emp_id'];
                  $name = $row['name'];
                  $city = $row['city'];
                  $zipcode = $row['zipcode'];
                  $salary = $row['salary'];
                  echo  '<tr>
                  <th scope="row">'.$srno.'</th>
                  <td>'.$emp_id.'</td>
                  <td>'.$name.'</td>
                  <td>'.$city.'</td>
                  <td>'.$zipcode.'</td>
                  <td>'.$salary.'</td>
                  <td>
                  <button class="editbtn" ><a href="Edit.php?editid='.$srno.'"  class = "text-light">Edit</a></button>
                  <button class="deletebtn"><a href="SQLQuery.php?deleteid='.$srno.'" class = "text-light">Delete</a></button>
                  </td>
                </tr>';
              }
          }
       }
   //}

    ?>
  </tbody>
</table> 
</body>
</html>