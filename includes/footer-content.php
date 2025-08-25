<div class="py-5 bg-light border-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4 class="footer-heading"> <?= webSetting('title') ?? 'Website'; ?> </h4>
                <hr>
                <p> <?= webSetting('small_description') ?? 'Small description about website'; ?> </p>
            </div>
            <div class="col-md-4 text-center">
                <h4>Follow Us At</h4>
                <hr>
              <ul>
                <li>
                    <?php 
                    $socialMedia = getAll('social_medias');
                    if($socialMedia) {
                        if(mysqli_num_rows($socialMedia) > 0) {
                            foreach($socialMedia as $socialItem) {
                                ?>
                               <li>
                                 <a href="<?= $socialItem['url']; ?>" target="_blank" class="me-2">
                                    <?= $socialItem['name']; ?>
                                </a>
                               </li>
                                <?php
                            }
                        } else {
                            echo "<li>No Social Media Found</li>";
                        }
                    } else {
                        echo "<li>Something Went Wrong</li>";
                    }
                    ?>
                </li>
              </ul>
            </div>

            <div class="col-md-4 text-end">
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