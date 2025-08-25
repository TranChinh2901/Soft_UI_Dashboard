<?php
$pageTitle = "Home";
include 'includes/header.php';
?>
<div class="py-5">
    <div class="container mt-2">
        <?= alertMessage(); ?>

        <h2>Welcome to My Website</h2>
        <p>This is a simple website template using Bootstrap.</p>
    </div>
</div>

<?php
include 'includes/footer.php';
?>