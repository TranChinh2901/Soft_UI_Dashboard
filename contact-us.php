<?php
$pageTitle = "About Us";
include 'includes/header.php';
?>
<div class="py-5 bg-secondary">
    <div class="container">
        <h2 class="text-white text-center">About Us</h2>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                Contact Form 
            </div>
            <div class="col-md-6">
                   <h4>Contact Information</h4>
                <hr>
                <p>
                    Address: <?= webSetting('address') ?? '123 Main St, Anytown, USA'; ?>
                    Email1: <?= webSetting('email1') ?? ''; ?>, Email2: <?= webSetting('email2') ?? ''; ?><br>
                    Phone1: <?= webSetting('phone1') ?? ''; ?>, Phone2: <?= webSetting('phone2') ?? ''; ?><br>
                </p>
            </div>
        </div>
    </div>
</div>
<?php
include 'includes/footer.php';
?>