<div class="py-5 bg-light border-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 class="footer-heading"> <?= webSetting('title') ?? 'Website'; ?> </h4>
                <hr>
                <p> <?= webSetting('small_description') ?? 'Small description about website'; ?> </p>
            </div>
            <div class="col-md-6 text-end">
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