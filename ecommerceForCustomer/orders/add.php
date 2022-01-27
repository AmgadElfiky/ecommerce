<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../genral/config.php";
include "../genral/function.php";

$select = "SELECT * FROM PRODUCTS where categoryID = 2";
$s = mysqli_query($conn, $select);

if(isset($_GET['pID'])){
    $pID = $_GET['pID'];
}
if(isset($_SESSION['id'])){
    $cID = $_SESSION['id'];
}
if(isset($_POST['send'])){
    $productID = $_POST['productID'];
    $customerID = $_POST['customerID'];
    $insert = "INSERT INTO ORDERS values (null, $customerID, $productID)";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Order");
}
?>

<h1 class="display-4 text-center">orders Page</h1>
<div class="container col-md-6 mt-3 text-center">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <input type="text" name="productID" class="form-control" value="<?php echo $pID ?>">
                </div>
                <div class="form-group">
                    <input type="text" name="customerID" class="form-control" value="<?php echo $cID ?>">
                </div>
                <button name = "send" class="btn btn-info"> Make Order</button>
            </form>
        </div>
        
    </div>
</div>

<?php
include '../shared/script.php';
?>