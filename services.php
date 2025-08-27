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
    <div class="container g-4">
        <div class="row">
            <?php
                $serviceQuery = "SELECT * FROM services WHERE status='0'";
                $result = mysqli_query($conn, $serviceQuery);

                if($result){
                    if(mysqli_num_rows($result) > 0){
                        foreach($result as $row){
            ?>
                            <div class="col-md-3 mb-3">
                                <div class="card shadow-sm h-100">
                                    <?php if($row['image'] != '') : ?>
                                        <img src="<?= $row['image']; ?>" class="w-100 rounded" alt="Img"
                                            style="min-height:200px;max-height:200px;" />
                                    <?php else: ?>
                                        <img src="assets/images/no-image.png" class="w-100 rounded" alt="Img"
                                            style="min-height:200px;max-height:200px;" />
                                    <?php endif; ?>

                                    <div class="card-body">
                                        <h5><?= $row['name']; ?></h5>
                                        <p><?= $row['small_description']; ?></p>
                                        <a href="service.php?slug=<?= $row['slug']; ?>" class="text-primary">read more</a>
                                    </div>
                                </div>
                            </div>
            <?php
                        }
                    } else {
                        echo "<h5>No Record Found</h5>";
                    }
                } else {
                    echo "<h5>Something Went Wrong!</h5>";
                }
            ?>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
