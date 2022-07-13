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
            <input type="text" name="name" class="form-control" placeholder="Enter name" pattern="[A-Za-z]{3,}" title = "Name should have more than two charcters and use only alphabetse.g: Prasad" required><br>
            <input type="text" name="city" class="form-control" pattern="[a-zA-Z]{3,}"placeholder="Enter city" pattern="[A-Za-z]{3,}" title = "City should have more than two charcters and only alphabets are allowed e.g: Pune"required><br>
            <input type="text" name="zipcode" class="form-control"  placeholder="Enter zipcode" pattern="[0-9]{6}" title = "Zipcode should be of 6 charcters"required><br>
            <input type="text" name="salary" class="form-control" pattern="[0-9]{4,}" title = "Use numbers only" placeholder="Enter salary" required><br>
            <input type="submit" class="form-control submit" value="add" name="add">
        </form>  
    </div>
  
    <form action="SearchAndSort.php" method="POST">
        <!-- <button class="btn" value="display" type="submit" name="display">display</button> -->

        <!-- <select name="searchby" class="searchbtn">
            <option>search by</option>
            <option value="name" >name</option>
            <option value="city">city</option>
            <option value="emp_id">emp_id</option>
        </select> -->
        <input type="submit" name="searchdata" class="searchdatabtn" value="searchdata">
        <!-- <button class="searchbtn" type="submit" value="searchdata">searchdata</button> -->
    </form>

    <form action="" method="post">
       <!-- <button class="displaybtn" value="display" type="submit" name="display">display</button>  -->
        <select name="getValue" class="btn">
          <option>sort by</option>
          <option value="name" >name</option>
          <option value="salary">salary</option>
          <option value="emp_id">emp_id</option>
        </select>
        <input type="submit" class="sortbtn" name="sort" value="sort">
    </form>
 
    <table style= "width:70%" class="center">
    <thead>
    <tr>
      <th scope="col" class="column" class="text-light">srno</th>
      <th scope="col" class="column" class="text-light">emp_id</th>
      <th scope="col" class="column" class="text-light">name</th>
      <th scope="col" class="column" class="text-light">city</th>
      <th scope="col" class="column" class="text-light">zipcode</th>
      <th scope="col" class="column" class="text-light">salary</th>
      <th scope="col" class="column" class="text-light">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php include "ConnectToDataBase.php";
      //if(isset($_POST['display'])){
        $sql = "select * from employee_data";
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
        ?>
  </tbody>
      
    <table style= "width:70%" class="center">
    <thead>
    <tr>
      <th scope="col" class="column" class="text-light">srno</th>
      <th scope="col" class="column" class="text-light">emp_id</th>
      <th scope="col" class="column" class="text-light">name</th>
      <th scope="col" class="column" class="text-light">city</th>
      <th scope="col" class="column" class="text-light">zipcode</th>
      <th scope="col" class="column" class="text-light">salary</th>
      <th scope="col" class="column" class="text-light">Action</th>
    </tr>
  </thead>
      <tbody>
    <?php include "ConnectToDataBase.php";
      if(isset($_POST['sort'])){
        $value = $_POST['getValue'];
        $sql = "select * from employee_data order by $value";
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
    ?>
  </tbody>
</table>  
</body>
</html>