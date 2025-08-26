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
       <div class="row g-4">
    <?php
    $services = getAll('services');
    if (mysqli_num_rows($services) > 0) {
        while ($row = mysqli_fetch_assoc($services)) {
            $image = !empty($row['image']) ? $row['image'] : 'assets/images/no-image.png';
    ?>
        <div class="col-md-3 d-flex">
            <div class="card shadow-sm w-100">
                <img src="<?php echo $image; ?>" class="card-img-top" alt="Service Image" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                    <p class="card-text flex-grow-1"><?php echo $row['small_description']; ?></p>
                    <a href="service.php?slug=<?php echo $row['slug']; ?>" class="text-primary mt-auto">Read More</a>
                </div>
            </div>
        </div>
    <?php
        }
    } else {
    ?>
        <div class="col-12 text-center">
            <p>No Services Available</p>
        </div>
    <?php
    }
    ?>
</div>

    </div>

</div>
<?php
include 'includes/footer.php';
?>