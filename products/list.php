<?php include "../shared/header.php";?>
<?php include "../shared/nav.php";
include "../genral/config.php";
include "../genral/function.php";

$select = "SELECT products.id, products.name product, products.descr, products.img, category.name cat  FROM `products` JOIN category
ON products.categoryID = category.id;";
$s = mysqli_query($conn, $select);

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = "DELETE FROM products WHERE id = $id";
    mysqli_query($conn, $delete);
    header("location: /ecommerce/products/list.php");
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
                    <th>Descripition</th>
                    <th>CategoryID</th>
                    <th>Image</th>
                    <th colspan=2>Action</th>
                </tr>
                <?php  foreach ($s as $data){?>
                <tr>
                    <td><?php echo $data['id']?></td>
                    <td><?php echo $data['product']?></td>
                    <td><?php echo $data['descr']?></td>
                    <td><?php echo $data['cat']?></td>
                    <td><img src="/ecommerce/products/upload/<?php echo $data['img']?>" alt="Product Image" width="100%" height="100%">
                    </td>
                    <td> <a href="/ecommerce/products/add.php?edit=<?php echo $data['id']?>"
                            class="btn btn-primary">edit</a></td>
                    <td> <a onclick="return confirm('Are You Sure?')"
                            href="/ecommerce/products/list.php?delete=<?php echo $data['id']?>"
                            class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>
<?php include "../shared/script.php";?>