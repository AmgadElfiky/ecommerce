<?php include "../shared/header.php";?>
<?php include "../shared/nav.php";
include "../genral/config.php";
include "../genral/function.php";

$select = "SELECT * FROM category";
$s = mysqli_query($conn, $select);

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = "DELETE FROM category WHERE id = $id";
    mysqli_query($conn, $delete);
    header("location: /ecommerce/category/list.php");
    testMessage($delete, "Delete");
}
auth();
?>

<h1 class="text-center text-info">List Page</h1>
<div class="container col-md-6 mt-3">
    <div class="card">
        <div class="card-body">
            <table class="table table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan=2>Action</th>
                </tr>
                <?php  foreach ($s as $data){?>
                <tr>
                    <td><?php echo $data['id']?></td>
                    <td><?php echo $data['name']?></td>
                    <td> <a href="/ecommerce/category/add.php?edit=<?php echo $data['id']?>"
                            class="btn btn-primary">edit</a></td>
                    <td> <a onclick="return confirm('Are You Sure?')"
                            href="/ecommerce/category/list.php?delete=<?php echo $data['id']?>"
                            class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>
<?php include "../shared/script.php";?>