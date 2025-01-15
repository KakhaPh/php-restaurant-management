<?php require "../config/config.php";
require "../libs/App.php";
require "../includes/header.php";

$app = new App;

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";

    $data = [
        'email' => $email,
        'password' => $password
    ];

    $path = baseUrl;

    $app->login($query, $data, $path);
}

?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Login</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Login</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">
    <div class="col-md-12 bg-dark">
        <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Login</h5>
            <h1 class="text-white mb-4">Login for a new user</h1>
            <form class="col-md-12" method="POST" action="login.php">
                <div class="row g-3">
                    <div>
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                            <label for="email">Youer Email</label>
                        </div>
                    </div>
                    <div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-primary w-100 py-3" type="submit" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require "../includes/footer.php" ?>