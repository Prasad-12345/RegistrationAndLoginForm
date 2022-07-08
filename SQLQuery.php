<?php include "ConnectToDataBase.php";
if(isset($_POST['submit'])){
    if($_POST['password'] == $_POST['conformpassword']){
        $srno = $_POST["srno"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $mobileNumber = $_POST["phonenumber"];
        $password = $_POST["password"];
        $conformpassword = $_POST["conformpassword"];
        //$conn = mysqli_connect("localhost:3306", "root", "Prasad@321", "ContactData") or die("Connection Failed");
        $sql = "INSERT INTO contact_info(srno, firstName, lastName, email, phonenumber, password, conformpassword) VALUES ($srno, '{$firstName}','{$lastName}','{$email}','{$mobileNumber}', '$password', '$conformpassword')";
        $result = mysqli_query($conn, $sql) or die("Querry Failed");
        mysqli_close($conn);
        header("location: Index.php");
    }
    else{
        echo "Password doesn't matches";
    }
}

if(isset($_POST['add'])){
    $srno = $_POST['srno'];
    $emp_id = $_POST['emp_id'];
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employee_data(srno, emp_id, address, zipcode, salary) VALUES ($srno, $emp_id, '$address', '$zipcode', '$salary')";
    $result = mysqli_query($conn, $sql) or die("Querry failed");
    header("location: EmployeeForm.php");
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
    if($password == $passworddb){
        echo "login successful";
        header("location: EmployeeForm.php");
    }
    else{
        echo "Please enter correct password";
        header("location: Index.php");
    }
}
?>