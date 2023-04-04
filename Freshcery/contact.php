<?php
    require "./includes/header.php";

    $statusHidden = "hidden";

    if (isset($_POST['sendMessage'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $text = $_POST['text'];
        $statusHidden = "";

        $sendQuery = "INSERT INTO message(name, email, text) VALUES (:name, :email, :text)";
        $mostProducts = $conn->prepare($sendQuery);
        $mostProducts->execute([":name" => $name, ":email" => $email, ":text" => $text]);
        echo "<script>alert('Message sent!');</script>";
    }
?>

      
    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Contact
                    </h1>
                    <p class="lead">
                        Don't Hesitate to Contact Us.
                    </p>
                </div>
            </div>
        </div>

        <section class="pb-0">
            <div class="contact1 mb-5">
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-lg-7">
                            <div class="contact-wrapper">
                                <h3 class="title font-weight-normal mt-0 text-left">Send Us a Message</h3>
                                <form data-aos="fade-left" data-aos-duration="1200" action="contact.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Full Name" name="name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input class="form-control" type="email" placeholder="Email" name = "email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3" placeholder="Message" name="text"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-right">
                                            <button type="submit" class="btn btn-lg btn-primary mb-5" name="sendMessage">Send</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="detail-wrapper p-5 bg-primary">
                                <h3 class="font-weight-normal mb-3 text-light">
                                    Freshcery Headquarter
                                </h3>

                                <p class="text-light">
                                    12 Goldman street<br>
                                    Munpen building<br>
                                    Roodeport 1725<br>
                                </p>

                                <p class="text-light">
                                    <i class="fas fa-phone"></i> 0733259674<br>
                                    <i class="fas fa-envelope"></i> kagisokatherine@gmail.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57281.5280840268!2d27.886917951453537!3d-26.19357131853059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e95a06f8a1a5723%3A0x160fac77ec56f9fa!2sPick%20n%20Pay%20Family%20Goldman%20Street!5e0!3m2!1sen!2sza!4v1680364590646!5m2!1sen!2sza" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
    </div>
    
        <?php require "./includes/footer.php"; ?>
    
