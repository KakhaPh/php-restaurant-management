<?php
require "../config/config.php";
require "../libs/App.php";
require "../includes/header.php";


$query = "SELECT * FROM cart WHERE user_id = '$_SESSION[user_id]'";
$app = new App;

$cart_items = $app->selectAll($query);
$cart_price = $app->selectOne("SELECT SUM(price) AS total FROM cart WHERE user_id = '$_SESSION[user_id]'");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM cart WHERE item_id = '$id' AND user_id = '$_SESSION[user_id]'";
    $path = "cart.php";
    $app->delete($query, $path);
}


if (isset($_POST['submit'])) {
    $_SESSION['total_price'] = $cart_price['total'];
    echo "<script>window.location.href ='". baseUrl ."pages/checkout.php'</script>";
}


?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Cart</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <h2 class="text-center">Shopping Cart</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_items as $cart_item) : ?>
                        <tr>
                            <td>
                                <img src="<?php echo baseUrl . "img/" . $cart_item['image']; ?>" alt="Product Image" class="img-fluid" width="30">
                            </td>
                            <td><?php echo $cart_item['name']; ?></td>
                            <td>$ <?php echo $cart_item['price']; ?></td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="<?php echo baseUrl . "pages/cart.php?id=" . $cart_item['item_id'] ?>"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Total:</strong> $<?php echo $cart_price['total']; ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="position-relative mx-auto w-10 float-end">
                <form action="cart.php" method="POST">
                    <button class="btn btn-primary py-2 top-0 end-0" type="submit" name="submit">Checkout</button>
                </form>
            </div>
        </div>
    </div>

</div>

<?php require "../includes/footer.php" ?>