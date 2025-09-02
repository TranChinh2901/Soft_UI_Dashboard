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

            <?= ($rowData['name']); ?>
        </h2>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-8">
                <div class="card card-body shadow-sm" style="border-top: 3px solid grey;">
                    <h4><?= htmlspecialchars($rowData['name']); ?></h4>
                <div class="underline mb-3"></div>
                <p><?= htmlspecialchars($rowData['small_description']); ?></p>
                <div class="mb-3">
                    <img src="<?= !empty($rowData['image']) ? htmlspecialchars($rowData['image']) : 'assets/images/no-image.png'; ?>" 
                        class="w-100 rounded" alt="Img" style="height:100%; max-height: 600px; object-fit:cover;">
                </div>
                <p><?= nl2br(htmlspecialchars($rowData['long_description'])); ?></p>
                </div>
            </div>
            <div class="col-md-4 sticky-top" style="top:120px;">
                <div class="card">
                    <div class="card-header">
                        <h4>Enquire Now</h4>
                    </div>
                    <div class="card-body">
                        <form action="functions/enquirycode.php" method="POST">
                            <!-- <input type="hidden" name="service_name" value="<?= htmlspecialchars($rowData['name']); ?>"> -->
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone" required class="form-control">
                            </div>
                                 <div class="mb-3">
                                <label for="">Service</label>
                                <input type="text" name="service" value="<?=($rowData['name']); ?>" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Message/Comment</label>
                                <textarea name="message" rows="3" required class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="enquireBtn" class="btn btn-primary">Send Enquiry</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

<?php include 'includes/footer.php'; ?>
