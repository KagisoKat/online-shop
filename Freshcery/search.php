<?php require "./includes/header.php"; ?>
<?php require "./config/config.php"; ?>
<?php

// most wanted products
$productQuery = "SELECT * FROM products WHERE status = 1";
$mostProducts = $conn->prepare($productQuery);
$mostProducts->execute();

$resultsHidden = "hidden";

if (isset($_POST["search"])) {
    $resultsHidden = "";

    $searchTerm = "%" . $_POST["search"] . "%";

    $productQuery .= " AND title LIKE :title";
    $mostProducts = $conn->prepare($productQuery);
    $mostProducts->execute([":title" => $searchTerm]);
}


$allmostProducts = $mostProducts->fetchAll(PDO::FETCH_OBJ);

?>



<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">
                    Shopping Page
                </h1>
                <p class="lead">
                    Save time and leave the groceries to us.
                </p>
            </div>
        </div>
    </div>


    <form action="search.php" method="POST">
        <div class="mt-3">

            <input type="text" name="search" />
        </div>
        <button type="submit" class="btn mt-3 btn-primary">Search</button>
    </form>

</div>

<section <?php echo $resultsHidden ?> id="most-wanted">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title">Most Wanted</h2>
                <div class="product-carousel owl-carousel">
                    <?php foreach ($allmostProducts as $allmostProduct) : ?>
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
                                            Until <?php echo $allmostProduct->exp_date; ?>
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="<?php echo IMGURLPRODUCT; ?>/<?php echo $allmostProduct->image; ?>" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.php?id=<?php echo $allmostProduct->id ?>"><?php echo $allmostProduct->title; ?></a>
                                    </h4>
                                    <div class="card-price">
                                        <!-- <span class="discount">Rp. 300.000</span> -->
                                        <span class="reguler"><?php echo $allmostProduct->price; ?></span>
                                    </div>
                                    <a href="<?php echo APPURL; ?>/detail-product.php?id=<?php echo $allmostProduct->id; ?>" class="btn btn-block btn-primary ">
                                        Add to Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>






<?php require "./includes/footer.php"; ?>