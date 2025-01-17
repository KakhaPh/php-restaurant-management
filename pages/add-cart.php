<?php 
    require "../config/config.php";
    require "../libs/App.php";
    require "../includes/header.php";


    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM foods WHERE id = '$id'";
        $app = new App;

        $one = $app->selectOne($query);
    }

?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo $one['name']; ?></h1>
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
        <div class="row g-5 align-items-center">
            <div class="col-md-6">
                <div class="row g-3">
                    <div class="col-12 text-start">
                        <img src="<?php echo baseUrl . "img/" .$one['image']?>" alt="foodImg" data-wow-delay="0.1s" class="img-fluid rounded w-100 wow-zoomIn">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h1 class="mb-4"><?php echo $one['name']; ?></h1>
                <p class="mb-4"><?php echo $one['description']; ?></p>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class=" border-start border-5 border-primary px-3">
                            <h6>Price: $ <?php echo $one['price']; ?></h5>
                        </div>
                    </div>
                </div>
                <form method="POST" action="add-cart.php?id=<?php echo $id; ?>">
                    <input type="text" value="<?php echo $one['id']; ?>">
                    <input type="text" value="<?php echo $one['name']; ?>">
                    <input type="text" value="<?php echo $one['image']; ?>">
                    <input type="text" value="<?php echo $one['price']; ?>">
                    <a href="" class="btn btn-primary py-3 px-5 mt-2">Add Cart</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "../includes/footer.php" ?>

