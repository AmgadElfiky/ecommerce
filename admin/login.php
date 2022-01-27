<?php include "../shared/header.php";
include "../shared/nav.php";
include "../genral/config.php";
include "../genral/function.php";

if(isset($_POST['login'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $select = "SELECT * FROM admins where name = '$name' and password = '$password'";
    $s = mysqli_query($conn, $select);
    $numRow = mysqli_num_rows($s);
    $row = mysqli_fetch_assoc($s);
    if($numRow > 0){
        $_SESSION['admin'] = $name;
        $_SESSION['role'] = $row['role'];
        header("location: /ecommerce/index.php");
    }else{
        echo"<div class='alert alert-danger text-center mx-auto w-50'>
            <h5>You Are Not Admin</h5>
            </div>";
    }
}
print_r($_SESSION);
?>

<h1 class="display-4 text-center">Login Page</h1>
<div class="container col-md-6 mt-3 text-center">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="">Admin Name</label>
                    <input type="text" name = "name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Admin Password</label>
                    <input type="text" name = "password" class="form-control">
                </div>
                <button class = "btn btn-info" name = "login">Login</button>
            </form>
        </div>
    </div>
</div>
<?php include "../shared/script.php";?>