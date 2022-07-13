<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"> -->
    <title>Crud Operation</title>
</head>
<body>
<div class="contact-form">
        <h1>DATABASE FORM</h1>
    </div>
    <div class="contact-us">
        <form action="SQLQuery.php" method="post">
            <input type="text" name="srno" class="form-control" pattern="[0-9]{1,}" placeholder="Enter srno" required><br>
            <input type="text" name="firstName" class="form-control"  placeholder="Enter First Name" pattern="[A-Za-z]{3,}" title = "FirstName should have more than two charcters and only alphabets are allowed e.g: Prasad" required><br>
            <input type="text" name="lastName" class="form-control" pattern="[A-Za-z]{3,}"placeholder="EnterLast Name" required><br>
            <input type="text" name="email" class="form-control" placeholder="Enter Email" pattern="^[0-9a-zA-Z+-_.]+@[a-zA-Z]+.[azA-Z]+" title="Email should contain @ and you can use numbers, alphabets and special charcters" required><br>
            <input type="text" name="phonenumber" class="form-control"  placeholder="Enter Mobile Number" pattern="[0-9]{10}" title="Mobile number should contain 10 digits" required><br>
            <input type="text" name="password" class="form-control"  placeholder="Enter Password" pattern="[0-9a-zA-Z!#$%&*()_.@]{8,}" title="Password length should be greater than 7 and use alphabets, numbers and specialcharcters" required><br>
            <input type="text" name="conformpassword" class="form-control" placeholder="Conform Password" pattern="[0-9a-zA-Z!#$%&*()_.@]{8,}" title="Password length should be greater than 7 and use alphabets, numbers and specialcharcters" required><br>
            <input type="submit" class="form-control submit" value="submit" name="submit">
        </form>
    </div>
    <!-- <div class="container">
        <button class = "btn btn-primary my-5"><a href="Index.php" class="text-light">Add</a></button> -->
        <!-- <table class="table">
  <thead>
    <tr>
      <th scope="col" class="column" class="text-light">$srno</th>
      <th scope="col" class="column" class="text-light">firstName</th>
      <th scope="col" class="column" class="text-light">lastName</th>
      <th scope="col" class="column" class="text-light">email</th>
      <th scope="col" class="column" class="text-light">phonenumber</th>
      <th scope="col" class="column" class="text-light">Password</th>
      <th scope="col" class="column" class="text-light">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php include "ConnectToDataBase.php";
        //$conn = mysqli_connect("localhost:3306", "root", "Prasad@321", "ContactData") or die("Connection Failed");
        $sql = "select * from contact_info";
        $result = mysqli_query($conn, $sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
              if($_POST['name'] == $row['firstName']){
                  echo "Contact Already exists";
              }
              else{
                $srno = $row['srno'];
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                $email = $row['email'];
                $phonenumber = $row['phonenumber'];
                $password = $row['password'];
                echo  '<tr>
                <th scope="row">'.$srno.'</th>
                <td>'.$firstName.'</td>
                <td>'.$lastName.'</td>
                <td>'.$email.'</td>
                <td>'.$phonenumber.'</td>
                <td>'.$password.'</td>
                <td>
                <button class = "btn btn-primary"><a href="Edit.php?editid='.$srno.'"  class = "text-light">Edit</a></button>
                <button class = "btn btn-danger"><a href="Delete.php?deleteid='.$srno.'" class = "text-light">Delete</a></button>
                </td>
              </tr>';
              }
          
            }
        }
    ?>
  </tbody>
</table> -->
    </div>
</body>
</html>