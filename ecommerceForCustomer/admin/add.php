<?php include "../shared/header.php";
include "../shared/nav.php";
include "../genral/config.php";
include "../genral/function.php";

if($_SESSION['role'] == 0){

if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $insert = "INSERT INTO admins VALUES (null, '$name', '$password', $role)";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Insert Admin");
}
?>

<h1 class="display-4 text-center">Add Admin Page</h1>
<div class="container col-md-6 mt-3 text-center">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="">Admin Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Admin Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Admin Role</label>
                    <select type="text" name="role" class="form-control">
                        <option value = '0'>All Access</option>
                        <option value = '1'>Semi Access</option>
                    </select>
                </div>
                <button class="btn btn-info" name="signup">SignUp</button>
            </form>
        </div>
    </div>
</div>
<?php }else{?>
<img src="./not-authorized-.jpg"
    style=" display: block; max-width: 80%; height: auto; margin-left: auto; margin-right: auto;">
<?php } include "../shared/script.php";?>