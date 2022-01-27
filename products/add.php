<?php include "../shared/header.php";
include "../shared/nav.php";
include "../genral/config.php";
include "../genral/function.php";

if(isset( $_POST['send'])){
    $name = $_POST['name'];
    $descr = $_POST['descr'];
    $categoryID = $_POST['categoryID'];
    //img 2nd array is const
    $image_type = $_FILES['image']['type'];
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = './upload/';
    move_uploaded_file($image_tmp, $location . $image_name);

    $insert = "INSERT INTO products VALUES (NULL, '$name', '$descr', '$image_name', $categoryID)";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Insert");
    $name="";
    $descr="";
    $categoryID="";
}

$name="";
$descr="";
$up = false;
if(isset($_GET['edit'])){
    $up = true;
    $id = $_GET['edit'];

    $select = "SELECT * FROM products where id = $id";

    $ss = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);

    $name = $row['name'];
    $id = $row['id'];
    $descr = $row['descr'];
    $categoryID = $row['categoryID'];
    $image_name = $row['img'];
    if(isset( $_POST['update'])){
        $name = $_POST['name'];
        $descr = $_POST['descr'];
        $categoryID = $_POST['categoryID'];
        $image_type = $_FILES['image']['type'];
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $location = './upload/';
        move_uploaded_file($image_tmp, $location . $image_name);
        $update = "UPDATE products SET name = '$name', descr = '$descr', img = '$image_name', categoryID = $categoryID where id=$id ";
        $u = mysqli_query($conn, $update);

        header("location: /ecommerce/products/list.php");
    }
}
auth();
?>

<?php if($up):?>
<h1 class="display-1 text-center">Edit products Page : <?php echo $id;?></h1>
<?php else:?>
<h1 class="display-1 text-center">Add products Page</h1>
<?php endif?>
<div class="container col-md-6 mt-3 text-center">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">product name</label>
                    <input type="text" name="name" value="<?php echo $name?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">product descripition</label>
                    <input type="text" name="descr" value="<?php echo $descr?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">product Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">product CategoryID</label>
                    <?php
                            $select = "SELECT * FROM category";
                            $c = mysqli_query($conn, $select);
                    ?>
                    <select name="categoryID" class="form-control">
                        <?php foreach($c as $data){?>
                        <option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
                        <?php } ?>
                    </select>
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