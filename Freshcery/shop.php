<?php require "./includes/autoloader.php"; ?>
<?php require "./includes/header.php"; ?>
<?php require "./config/config.php"; ?>
<?php

// categories
$categories = $conn->query("SELECT * FROM categories");
$categories->execute();

$allCategories = $categories->fetchAll(PDO::FETCH_OBJ);

// most wanted products
$mostProducts = $conn->query("SELECT * FROM products WHERE status = 1");
$mostProducts->execute();

$allmostProducts = $mostProducts->fetchAll(PDO::FETCH_OBJ);

// veggies
$veggies = $conn->query("SELECT * FROM products WHERE status = 1 AND category_id = 1");
$veggies->execute();

$allveggies = $veggies->fetchAll(PDO::FETCH_OBJ);

// meats
$meats = $conn->query("SELECT * FROM products WHERE status = 1 AND category_id = 2");
$meats->execute();

$allMeats = $meats->fetchAll(PDO::FETCH_OBJ);

// fishes
$fishes = $conn->query("SELECT * FROM products WHERE status = 1 AND category_id = 3");
$fishes->execute();

$allFishes = $fishes->fetchAll(PDO::FETCH_OBJ);

// fishes
$fruits = $conn->query("SELECT * FROM products WHERE status = 1 AND category_id = 4");
$fruits->execute();

$allFruits = $fruits->fetchAll(PDO::FETCH_OBJ);
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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shop-categories owl-carousel mt-5">
                    <?php
                        foreach ($allCategories as $category) :
                            $thisCategory = new ShopClasses\Category;
                            $thisCategory->setName($category->name);
                            $thisCategory->setDescription($category->description);
                            $thisCategory->setIcon($category->icon);
                    ?>
                        <div class="item">
                            <a href="shop.php">
                                <div class="media d-flex align-items-center justify-content-center">
                                    <span class="d-flex mr-2"><i class="sb-<?php echo $thisCategory->getIcon(); ?>"></i></span>
                                    <div class="media-body">
                                        <h5><?php echo $thisCategory->getName(); ?></h5>
                                        <p><?php echo $thisCategory->getDescription(); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>

                    <a href="shop.html">
                        <div class="media d-flex align-items-center justify-content-center">
                            <span class="d-flex mr-2"><i class="sb-"></i></span>
                            <div class="media-body">
                                <h5>Packages</h5>
                                <p>Protein Rich Ingridients From Local Farmers</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="most-wanted">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title">Most Wanted</h2>
                <div class="product-carousel owl-carousel">
                    <?php
                        foreach ($allmostProducts as $allmostProduct) :
                            $thisProduct = new ShopClasses\Product;
                            $thisProduct->setExpDate($allmostProduct->exp_date);
                            $thisProduct->setImage($allmostProduct->image);
                            $thisProduct->setId($allmostProduct->id);
                            $thisProduct->setTitle($allmostProduct->title);
                            $thisProduct->setPrice((int)$allmostProduct->price);
                    ?>
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
                                            Until <?php echo $thisProduct->getExpDate(); ?>
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div>
                                    <img src="<?php echo IMGURLPRODUCT; ?>/<?php echo $thisProduct->getImage(); ?>" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="detail-product.php?id=<?php echo $thisProduct->getId(); ?>"><?php echo $thisProduct->getTitle(); ?></a>
                                    </h4>
                                    <div class="card-price">
                                        <!-- <span class="discount">Rp. 300.000</span> -->
                                        <span class="reguler"><?php echo $thisProduct->getPrice(); ?></span>
                                    </div>
                                    <a href="<?php echo APPURL; ?>/detail-product.php?id=<?php echo $thisProduct->getId(); ?>" class="btn btn-block btn-primary ">
                                        Add to Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="card card-product">
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
                            <img src="<?php echo IMGURLPRODUCT; ?>/fruits.jpg" alt="Card image 2" class="card-img-top">
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
    </div>
</section>


<section id="vegetables" class="gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title">Vegetables</h2>
                <div class="product-carousel owl-carousel">
                    <?php
                        foreach ($allveggies as $veggie) :
                            $thisVeggie = new ShopClasses\Product;      
                            $thisVeggie->setExpDate($veggie->exp_date);
                            $thisVeggie->setImage($veggie->image);
                            $thisVeggie->setTitle($veggie->title);
                            $thisVeggie->setPrice((int)$veggie->price);
                            $thisVeggie->setId($veggie->id);
                    ?>

                        <div class="card card-product">
                            <div class="card-ribbon">
                                <div class="card-ribbon-container right">
                                    <span class="ribbon ribbon-primary">SPECIAL</span>
                                </div>
                            </div>
                            <div class="card-badge">
                                <div class="card-badge-container left">
                                    <span class="badge badge-default">
                                        Until <?php echo $thisVeggie->getExpDate(); ?>
                                    </span>
                                    <span class="badge badge-primary">
                                        20% OFF
                                    </span>
                                </div>
                                <img src="<?php echo IMGURLPRODUCT; ?>/<?php echo $thisVeggie->getImage(); ?>" alt="Card image 2" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="detail-product.php"><?php echo $thisVeggie->getTitle(); ?></a>
                                </h4>
                                <div class="card-price">
                                    <!-- <span class="discount">Rp. 300.000</span> -->
                                    <span class="reguler"><?php echo $thisVeggie->getPrice(); ?></span>
                                </div>
                                <a href="<?php echo APPURL; ?>/detail-product.php?id=<?php echo $thisVeggie->getId(); ?>" class="btn btn-block btn-primary">
                                    Add to Cart
                                </a>

                            </div>
                        </div>
                </div>
            <?php endforeach; ?>
            <section id="fishes" class="gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title">Fishes</h2>
                            <div class="product-carousel owl-carousel">
                                <?php
                                    foreach ($allFishes as $fish) :
                                        $thisFish = new ShopClasses\Product;
                                        $thisFish->setExpDate($fish->exp_date);
                                        $thisFish->setImage($fish->image);
                                        $thisFish->setTitle($fish->title);
                                        $thisFish->setPrice((int)$fish->price);
                                        $thisFish->setId($fish->id);
                                ?>

                                    <div class="card card-product">
                                        <div class="card-ribbon">
                                            <div class="card-ribbon-container right">
                                                <span class="ribbon ribbon-primary">SPECIAL</span>
                                            </div>
                                        </div>
                                        <div class="card-badge">
                                            <div class="card-badge-container left">
                                                <span class="badge badge-default">
                                                    Until <?php echo $thisFish->getExpDate(); ?>
                                                </span>
                                                <span class="badge badge-primary">
                                                    20% OFF
                                                </span>
                                            </div>
                                            <img src="<?php echo IMGURLPRODUCT; ?>/<?php echo $thisFish->getImage(); ?>" alt="Card image 2" class="card-img-top">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="detail-product.php"><?php echo $thisFish->getTitle(); ?></a>
                                            </h4>
                                            <div class="card-price">
                                                <!-- <span class="discount">Rp. 300.000</span> -->
                                                <span class="reguler"><?php echo $thisFish->getPrice(); ?></span>
                                            </div>
                                            <a href="<?php echo APPURL; ?>/detail-product.php?id=<?php echo $thisFish->getId(); ?>" class="btn btn-block btn-primary">
                                                Add to Cart
                                            </a>

                                        </div>
                                    </div>
                            </div>
                        <?php endforeach; ?>



                        <section id="meats" class="gray-bg">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="title">Meats</h2>
                                        <div class="product-carousel owl-carousel">
                                            <?php
                                                foreach ($allMeats as $meat) :
                                                    $thisMeat = new ShopClasses\Product;
                                                    $thisMeat->setExpDate($meat->exp_date);
                                                    $thisMeat->setImage($meat->image);
                                                    $thisMeat->setTitle($meat->title);
                                                    $thisMeat->setPrice((int)$meat->price);
                                                    $thisMeat->setId($meat->id);
                                            ?>

                                                <div class="card card-product">
                                                    <div class="card-ribbon">
                                                        <div class="card-ribbon-container right">
                                                            <span class="ribbon ribbon-primary">SPECIAL</span>
                                                        </div>
                                                    </div>
                                                    <div class="card-badge">
                                                        <div class="card-badge-container left">
                                                            <span class="badge badge-default">
                                                                Until <?php echo $thisMeat->getExpDate(); ?>
                                                            </span>
                                                            <span class="badge badge-primary">
                                                                20% OFF
                                                            </span>
                                                        </div>
                                                        <img src="<?php echo IMGURLPRODUCT; ?>/<?php echo $thisMeat->getImage(); ?>" alt="Card image 2" class="card-img-top">
                                                    </div>
                                                    <div class="card-body">
                                                        <h4 class="card-title">
                                                            <a href="detail-product.php"><?php echo $thisMeat->getTitle(); ?></a>
                                                        </h4>
                                                        <div class="card-price">
                                                            <!-- <span class="discount">Rp. 300.000</span> -->
                                                            <span class="reguler"><?php echo $thisMeat->getPrice(); ?></span>
                                                        </div>
                                                        <a href="<?php echo APPURL; ?>/detail-product.php?id=<?php echo $thisMeat->getId(); ?>" class="btn btn-block btn-primary">
                                                            Add to Cart
                                                        </a>

                                                    </div>
                                                </div>
                                        </div>
                                    <?php endforeach; ?>

                                    <section id="fruits" class="gray-bg">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h2 class="title">Fruits</h2>
                                                    <div class="product-carousel owl-carousel">
                                                        <?php
                                                            foreach ($allFruits as $fruit) :
                                                    $thisFruit = new ShopClasses\Product;
                                                    $thisFruit->setExpDate($fruit->exp_date);
                                                    $thisFruit->setImage($fruit->image);
                                                    $thisFruit->setTitle($fruit->title);
                                                    $thisFruit->setPrice((int)$fruit->price);
                                                    $thisFruit->setId($fruit->id);

                                                        ?>

                                                            <div class="card card-product">
                                                                <div class="card-ribbon">
                                                                    <div class="card-ribbon-container right">
                                                                        <span class="ribbon ribbon-primary">SPECIAL</span>
                                                                    </div>
                                                                </div>
                                                                <div class="card-badge">
                                                                    <div class="card-badge-container left">
                                                                        <span class="badge badge-default">
                                                                            Until <?php echo $thisFruit->getExpDate(); ?>
                                                                        </span>
                                                                        <span class="badge badge-primary">
                                                                            20% OFF
                                                                        </span>
                                                                    </div>
                                                                    <img src="<?php echo IMGURLPRODUCT; ?>/<?php echo $thisFruit->getImage(); ?>" alt="Card image 2" class="card-img-top">
                                                                </div>
                                                                <div class="card-body">
                                                                    <h4 class="card-title">
                                                                        <a href="detail-product.php"><?php echo $thisFruit->getTitle(); ?></a>
                                                                    </h4>
                                                                    <div class="card-price">
                                                                        <!-- <span class="discount">Rp. 300.000</span> -->
                                                                        <span class="reguler"><?php echo $thisFruit->getPrice(); ?></span>
                                                                    </div>
                                                                    <a href="<?php echo APPURL; ?>/detail-product.php?id=<?php echo $thisFruit->getId(); ?>" class="btn btn-block btn-primary">
                                                                        Add to Cart
                                                                    </a>

                                                                </div>
                                                            </div>
                                                    </div>
                                                <?php endforeach; ?>
                                                <?php require "./includes/footer.php"; ?>