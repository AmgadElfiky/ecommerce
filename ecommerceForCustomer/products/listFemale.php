<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../genral/config.php";
include "../genral/function.php";

$select = "SELECT * FROM PRODUCTS where categoryID = 2";
$s = mysqli_query($conn, $select);
?>

<h1 class="display-4 text-center">List Female Product Page</h1>
<div class="container col-md-6 mt-3 text-center">
    <div class="row">
        <?php foreach($s as $data){ ?>
        <div class="col-md-4">
            <div class="card">
                <img src="/ecommerce/products/upload/<?php echo $data['img']?>" class="card-img-top" alt="Product Image" width="100%" height="100%">
                <div class="card-body">
                    <h5>Product Title : <?php echo $data['name']?></h5>
                    <p>Product Descripition : <?php echo $data['descr']?></p>
                </div>
                <a href = "/ecommerce/ecommerceForCustomer/orders/add.php?pID=<?php echo $data['id']?>" class = "btn btn-info"> Make Order</a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php
include '../shared/script.php';
?>