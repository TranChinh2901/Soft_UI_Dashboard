<?php include('includes/header.php'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Social Media Lists
                    <a href="social-media-create.php" class="btn btn-primary float-end">Add Social Media</a>
                </h4>
            </div>
            <div class="card-body">

                <?= alertMessage(); ?>

                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>URL</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                        $socialMedias = getAll('social_medias');
                        if($socialMedias) {

                        if (mysqli_num_rows($socialMedias) > 0) {
                            while ($row = mysqli_fetch_assoc($socialMedias)) {
                        ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['url']; ?></td>
                                    <td>
                                        <?php if ($row['status'] == 1): ?>
                                            <span class="text-danger">Hidden</span>
                                        <?php else: ?>
                                            <span class="text-success">Show</span>
                                        <?php endif; ?>
                                    </td>


                                    <td style="display: flex; gap: 8px;">
                                        <a href="social-media-edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a 
                                        onclick="return confirm('Are you sure you want to delete this user?');"
                                        href="social-media-delete.php?id=<?= $row['id']; ?>" 
                                        class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5" class="text-center">No Data</td>
                            </tr>
                        <?php
                        }
                          } else {
                            ?>
                            <tr>
                                <td colspan="5" class="text-center">Something went wrong</td>
                            </tr>
                        <?php
                          }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>