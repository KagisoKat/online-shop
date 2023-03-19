<?php require "./includes/header.php"; ?>
<?php require "./config/config.php"; ?>
<?php
 
if(isset($_POST['submit'])) {
    
}



if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $select = $conn->query("SELECT * FROM products WHERE status = 1 AND id='$id'");
    $select->execute();

    $product = $select->fetch(PDO::FETCH_OBJ);

    // related products

    $relatedProducts = $conn->query("SELECT * FROM products WHERE status = 1 AND category_id = '$product->category_id' AND id != '$id'");


    $relatedProducts->execute();

    $allRelatedProducts = $relatedProducts->fetchAll(PDO::FETCH_OBJ);

    // var_dump($allRelatedProducts);

} else {
}

?>

<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo APPURL; ?>/assets/img/<?php echo $product->image; ?>');">
            <div class="container">
                <h1 class="pt-5">
                    <?php echo $product->title; ?>
                </h1>
                <p class="lead">
                    Save time and leave the groceries to us.
                </p>
            </div>
        </div>
    </div>
    <div class="product-detail">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="slider-zoom">
                        <a href="<?php echo APPURL; ?>/assets/img/<?php echo $product->image; ?>" class="cloud-zoom" rel="transparentImage: 'data:image/gif;base64,R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==', useWrapper: false, showTitle: false, zoomWidth:'500', zoomHeight:'500', adjustY:0, adjustX:10" id="cloudZoom">
                            <img alt="Detail Zoom thumbs image" src="<?php echo APPURL; ?>/assets/img/<?php echo $product->image; ?>" style="width: 100%;">
                        </a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <p>
                        <strong>Overview</strong><br>
                        <?php echo $product->description; ?>
                    </p>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <strong>Price</strong> (/Pack)<br>
                                <span class="price"><?php echo $product->price; ?></span>
                                <!-- <span class="old-price">Rp 150.000</span> -->
                            </p>
                        </div>

                    </div>
                    <p class="mb-1">
                        <strong><?php echo $product->quantity; ?></strong>
                    </p>
                    <form method="POST" id="form-data">
                        <div class="row">
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="pro_title" value="<?php echo $product->title; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="pro_id" value="<?php echo $product->id; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="pro_image" value="<?php echo $product->image; ?>">
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="pro_qty" value="<?php echo $product->quantity; ?>">
                            </div>
                        </div>
                        <div class="col-sm-5">
                                <input class="form-control" type="text" name="pro_title" value="<?php echo $product->title; ?>">
                            </div>
                        <button class="mt-3  btn btn-primary btn-lg" name="submit" type="submit">
                            <i class="fa fa-shopping-basket"></i> Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section id="related-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Related Products</h2>
                    <div class="product-carousel owl-carousel">
                        <?php foreach ($allRelatedProducts as $products) : ?>
                            <div class="item">
                                <div class="card card-product">
                                    <div class="card-ribbon">
                                        <div class="card-ribbon-container right">
                                            <span class="ribbon ribbon-primary">SPECIAL</span>
                                        </div>
                                    </div>
                                    <div class="card-badge">
                                        <div class="card-badge-container left">
                                            <span class="badge badge-default">
                                                Until <?php echo $products->exp_date; ?>
                                            </span>
                                            <span class="badge badge-primary">
                                                20% OFF
                                            </span>
                                        </div>
                                        <img src="assets/img/<?php echo $products->image; ?>" alt="Card image 2" class="card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.php"><?php echo $products->title; ?></a>
                                        </h4>
                                        <div class="card-price">
                                            <!-- <span class="discount">Rp. 300.000</span> -->
                                            <span class="reguler"><?php echo $products->price; ?></span>
                                        </div>
                                        <a href="<?php echo APPURL; ?>/detail-product.php?id=<?php echo $products->id; ?>" class="btn btn-block btn-primary">
                                            Add to Cart
                                        </a>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <!-- <div class="card card-product">
                                    <div class="card-ribbon">
                                        <div class="card-ribbon-container right">
                                            <span class="ribbon ribbon-primary">SPECIAL</span>
                                        </div>
                                    </div>
                                    <div class="card-badge">
                                        <div class="card-badge-container left">
                                            <span class="badge badge-default">
                                                Until 2018
                                            </span>
                                            <span class="badge badge-primary">
                                                20% OFF
                                            </span>
                                        </div>
                                        <img src="assets/img/fruits.jpg" alt="Card image 2" class="card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.php">Product Title</a>
                                        </h4>
                                        <div class="card-price">
                                            <span class="discount">Rp. 300.000</span>
                                            <span class="reguler">Rp. 200.000</span>
                                        </div>
                                        <a href="detail-product.php" class="btn btn-block btn-primary">
                                            Add to Cart
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
    </section>
</div>

<?php require "./includes/footer.php"; ?>

<script>
    $(document).ready(function() {
        $(".form-control").keyup(function() {
            var value = $(this).val();
            value = value.replace(/^(0*)/, "");
            $(this).val(1);
        });

    })
</script>