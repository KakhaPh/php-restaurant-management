<?php
require "../config/config.php";
require "../libs/App.php";
require "../includes/header.php";


$app = new App;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $town = $_POST['town'];
    $country = $_POST['country'];
    $zipcode = $_POST['zipcode'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $total_price = $_SESSION['total_price'];
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO orders (name, email, town, country, zipcode, phone, address, total_price, user_id) VALUES (:name, :email, :town, :country, :zipcode, :phone, :address, :total_price, :user_id)";

    $arr = [
        ':name' => $name,
        ':email' => $email,
        ':town' => $town,
        ':country' => $country,
        ':zipcode' => $zipcode,
        ':phone' => $phone,
        ':address' => $address,
        ':total_price' => $total_price,
        ':user_id' => $user_id
    ];

    $path = "pay.php";

    $app->insert($query, $arr, $path);
}

?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Checkout</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Checkout</a></li>
            </ol>
        </nav>
    </div>
</div>

    <div class="container">
        <div class="col-md-12 bg-dark">
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">Checkout</h5>
                <h1 class="text-white mb-4">Checkout</h1>
                <form class="col-md-12" method="POST" action="checkout.php">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="town" id="town" placeholder="Your town">
                                <label for="town">Your Town</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="country" id="country" placeholder="Your country">
                                <label for="country">Your Country</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Your zipcode">
                                <label for="zipcode">Your Zipcode</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Your phone">
                                <label for="phone">Your Phone number</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea name="address" name="address" id="address" class="form-control" placeholder="Address"></textarea>
                                <label for="Address">Your Address</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary w-100 py-3">Checkout</button>
                        </div>
        
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require "../includes/footer.php" ?>