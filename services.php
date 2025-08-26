<?php
$pageTitle = "Services";
include 'includes/header.php';
?>

<div class="py-5 bg-secondary">
    <div class="container">
        <h2 class="text-white text-center">Our Services</h2>
    </div>
</div>
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm">
                    <img src="assets/images/no-image.png" class="w-100 rounded " alt="Img">
                    <div class="card-body">
                        <h5>Service Name</h5>
                        <p>
                            Service small description
                        </p>
                        <h4>small content</h4>
                        <a href="service.php?slug=" class="text-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
include 'includes/footer.php';
?>