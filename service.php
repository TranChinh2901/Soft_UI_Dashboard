<?php
$pageTitle = "Services";
include 'includes/header.php';

// Kiểm tra slug hợp lệ
if (!isset($_GET['slug']) || empty(trim($_GET['slug']))) {
    redirect("services.php", 'error', 'Invalid request');
}

$slug = mysqli_real_escape_string($conn, $_GET['slug']);

$query = "SELECT * FROM services WHERE status='0' AND slug='$slug' LIMIT 1";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    redirect("services.php", 'error', 'Service not found');
}

$rowData = mysqli_fetch_assoc($result);
?>


<div class="py-5 bg-secondary">
    <div class="container"> 
        <h2 class="text-white text-center">
       <?= htmlspecialchars(limitWords($rowData['name'], 100)); ?>

        </h2>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-8">
                <h4><?= htmlspecialchars($rowData['name']); ?></h4>
                <div class="underline mb-3"></div>
                <p><?= htmlspecialchars($rowData['small_description']); ?></p>
                <div class="mb-3">
                    <img src="<?= !empty($rowData['image']) ? htmlspecialchars($rowData['image']) : 'assets/images/no-image.png'; ?>" 
                        class="w-100 rounded" alt="Img" style="height:200px;object-fit:cover;">
                </div>
                <p><?= nl2br(htmlspecialchars($rowData['long_description'])); ?></p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
