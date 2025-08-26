<?php include('includes/header.php'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Services
                    <a href="services-create.php" class="btn btn-primary float-end">Add Services</a>
                </h4>
            </div>
            <div class="card-body">

                <?= alertMessage(); ?>

                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $services = getAll('services');
                        if($services) {

                        if (mysqli_num_rows($services) > 0) {
                            while ($row = mysqli_fetch_assoc($services)) {
                        ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['status']; ?></td>
                                    <td>
                                        <?php if ($row['is_ban'] == 1): ?>
                                            <span class="badge bg-danger text-white ">banned</span>
                                        <?php else: ?>
                                            <span class="badge bg-success text-white">active</span>
                                        <?php endif; ?>
                                    </td>


                                    <td style="display: flex; gap: 8px;">
                                        <a href="services-edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a 
                                        onclick="return confirm('Are you sure you want to delete this user?');"
                                        href="services-delete.php?id=<?= $row['id']; ?>" 
                                        class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4" class="text-center">No Data</td>
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