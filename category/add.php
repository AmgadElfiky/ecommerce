<?php include "../shared/header.php";
include "../shared/nav.php";
include "../genral/config.php";
include "../genral/function.php";

if(isset( $_POST['send'])){
    $name = $_POST['name'];
    $insert = "INSERT INTO category VALUES (NULL, '$name')";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Insert");
    $name="";
}

$name="";
$up = false;
if(isset($_GET['edit'])){
    $up = true;
    $id = $_GET['edit'];
    $select = "SELECT * FROM category where id = $id";
    $ss = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    $name = $row['name'];
    $id = $row['id'];
    if(isset( $_POST['update'])){
        $name = $_POST['name'];
        $update = "UPDATE category SET name = '$name' where id=$id ";
        $u = mysqli_query($conn, $update);
        header("location: /ecommerce/category/list.php");
    }
}
auth();
?>

<?php if($up):?>
<h1 class="display-1 text-center">Edit category Page : <?php echo $id;?></h1>
<?php else:?>
<h1 class="display-1 text-center">Add category Page</h1>
<?php endif?>
<div class="container col-md-6 mt-3 text-center">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="">category name</label>
                    <input type="text" name="name" value="<?php echo $name?>" class="form-control">
                </div>
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