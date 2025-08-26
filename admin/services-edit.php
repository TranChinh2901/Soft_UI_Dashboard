<?php include('includes/header.php'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Services
                    <a href="services.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <?= alertMessage(); ?>

                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <?php
                    $paramResult = checkParamId('id');
                    if (!is_numeric($paramResult)) {
                        echo "<h5>" . $paramResult . "</h5>";
                        return false;
                    }
                    $service = getById('services', $paramResult);
                    if ($service) {
                        if ($service['status'] == 200) 
                            {
                    ?>

                                <input type="hidden" name="serviceId" value="<?= $service['data']['id'] ?>">
                            <div class="mb-3">
                                <label class="form-label"> Service Name</label>
                                <input type="text" name="name" class="form-control" value="<?= $service['data']['name'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> Small Description</label>
                                <textarea name="small_description" rows="3" class="form-control"><?= $service['data']['small_description'] ?></textarea>
                            </div>wrong
                            <div class="mb-3">
                                <label class="form-label"> Long Description</label>
                                <textarea name="long_description" rows="3" class="form-control"><?= $service['data']['long_description'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> Upload Service Image</label>
                                <input type="file" name="image" class="form-control">
                                <img src="<?= '../' . $service['data']['image'] ?>" style="width: 100px; height: 100px;" alt="">
                            </div>
                            <h5>SEO Tags</h5>
                            <div class="mb-3">
                                <label class="form-label"> Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" value="<?= $service['data']['meta_title'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> Meta Description</label>
                                <textarea name="meta_description" rows="3" class="form-control"><?= $service['data']['meta_description'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> Meta Keyword</label>
                                <textarea name="meta_keyword" rows="3" class="form-control"><?= $service['data']['meta_keyword'] ?></textarea>
                            </div>
                            <!-- <div class="mb-3">
                        <label  class="form-label"> Status</label>
                        <select name="status" class="form-select" required>
                            <option value="">--Select Status--</option>
                            <option value="0">Show</option>
                            <option value="1">Hidden</option>
                        </select>
                    </div> -->
                            <div class="mb-3">
                                <label class="form-label"> Status (Checked=hidden, un-checked=visible)</label>
                                <br>
                                <input type="checkbox" name="status" style="width: 30px; height: 30px;" <?= $service['data']['status'] == 1 ? 'checked' : '' ?>>
                            </div>
                            <div class="mb-3 text-end">
                                <button type="submit" name="updateService" class="btn btn-primary">Update Services</button>
                            </div>

                    <?php
                        }
                        else {
                        echo "<h5>No such data found</h5>";
                    }
                    } else {
                        echo "<h5>Something went wrong</h5>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>