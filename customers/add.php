<?php include "../shared/header.php";
include "../shared/nav.php";
include "../genral/config.php";
include "../genral/function.php";

if(isset( $_POST['send'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $insert = "INSERT INTO customers VALUES (NULL, '$name', $phone, $password)";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Insert");
    $name="";
    $phone="";
    $password="";
}

$name="";
$phone="";
$up = false;
if(isset($_GET['edit'])){
    $up = true;
    $id = $_GET['edit'];
    $select = "SELECT * FROM customers where id = $id";
    $ss = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    $name = $row['name'];
    $id = $row['id'];
    $phone = $row['phone'];
    if(isset( $_POST['update'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $update = "UPDATE customers SET name = '$name', phone = $phone where id=$id ";
        $u = mysqli_query($conn, $update);
        header("location: /ecommerce/customers/list.php");
    }
}
auth();
?>

<?php if($up):?>
<h1 class="display-1 text-center">Edit Customer Page : <?php echo $id;?></h1>
<?php else:?>
<h1 class="display-1 text-center">Add Customer Page</h1>
<?php endif?>
<div class="container col-md-6 mt-3 text-center">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="">Customer name</label>
                    <input type="text" name="name" value="<?php echo $name?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Customer Phone</label>
                    <input type="text" name="phone" value="<?php echo $phone?>"class="form-control">
                </div>
                <?php if($up):?>
                <?php else:?>
                    <div class="form-group">
                    <label for="">Customer Password</label>
                    <input type="text" name="password" class="form-control">
                </div>
                <?php endif?>
                <?php if($up):?>
                <button name="update" class="btn btn-success">Update Data</button>
                <?php else:?>
                <button name="send" class="btn btn-primary">Send Data</button>
                <?php endif?>
            </form>
        </div>
    </div>
</div>
<?php include "../shared/script.php";?>