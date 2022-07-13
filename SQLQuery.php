<?php include "ConnectToDataBase.php";
if(isset($_POST['submit'])){
    $sql1 = "select firstName from contact_info";
    $result1 = mysqli_query($conn, $sql1);
    $firstName = $_POST["firstName"];
    $flag = 0;
    while($row=mysqli_fetch_assoc($result1)){
        $prevName = $row['firstName'];
        if($firstName == $prevName){
            echo "Contact Already exists";
            $flag = 1;
        }
    }
    if($flag == 0){
        if($_POST['password'] == $_POST['conformpassword']){
            $srno = $_POST["srno"];    
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $mobileNumber = $_POST["phonenumber"];
            $password = $_POST["password"];
            $hash1 = password_hash($password, PASSWORD_DEFAULT);
            $conformpassword = $_POST["conformpassword"];
            $hash2 = password_hash($conformpassword, PASSWORD_DEFAULT);
            //$conn = mysqli_connect("localhost:3306", "root", "Prasad@321", "ContactData") or die("Connection Failed");
            $sql = "INSERT INTO contact_info(srno, firstName, lastName, email, phonenumber, password, conformpassword) VALUES ($srno, '{$firstName}','{$lastName}','{$email}','{$mobileNumber}', '$hash1', '$hash2')";
            $result = mysqli_query($conn, $sql) or die("Querry Failed");
            mysqli_close($conn);
            header("location: Index.php");
        }
        else{
            echo "Password doesn't matches";
        }
    }
    else{
        echo "Contact Already exists";
        header("location: Index.php");
    }
}

if(isset($_POST['add'])){
    $sql = "select * from employee_data";
    $result = mysqli_query($conn, $sql);
    $flag = 0;
    while($row=mysqli_fetch_assoc($result)){
        if($_POST['name'] == $row['name']){
            echo "Contact Already exists";
            $flag = 1;
        }
    }
    if($flag == 0){
        $srno = $_POST['srno'];
        $emp_id = $_POST['emp_id'];
        $name = $_POST['name'];
        $city = $_POST['city'];
        $zipcode = $_POST['zipcode'];
        $salary = $_POST['salary'];
    
        $sql = "INSERT INTO employee_data(srno, emp_id, name, city, zipcode, salary) VALUES ($srno, $emp_id, '$name', '$city', '$zipcode', '$salary')";
        $result = mysqli_query($conn, $sql) or die("Querry failed");
        header("location: EmployeeForm.php");
    }
    else{
        echo "Contact Already exists";
        header("location: EmployeeForm.php");
    }

}
  
if(isset($_GET['deleteid'])){
    //$conn = mysqli_connect("localhost:3306", "root", "Prasad@321", "ContactData") or die("Connection Failed");
    $srno = $_GET['deleteid'];
    $sql = "delete from contact_info where srno = $srno";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("location: EmployeeForm.php");
    }
    else{
        die(mysqli_error($conn));
    }
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "select password from contact_info where email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $passworddb = $row['password'];
    $verify = password_verify($password, $passworddb);
    if($verify){
        echo "login successful";
        header("location: EmployeeForm.php");
    }
    else{
        echo "Please enter correct password";
        header("location: Index.php");
    }
}

?>