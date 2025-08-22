<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    User Lists
                    <a href="users-create.php" class="btn btn-primary float-end">Add Users</a>
                </h4>
            </div>
            <div class="card-body">
               <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>johndoe@example.com</td>
                            <td>1234567890</td>
                            <td>Admin</td>
                            <td>
                                <a href="users-edit.php?id=1" class="btn btn-success">Edit</a>
                                <a href="users-delete.php?id=1" class="btn btn-danger">Delete</a>
                            </td>       
                        </tr>

                          <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>johndoe@example.com</td>
                            <td>1234567890</td>
                            <td>Admin</td>
                            <
                            <td>
                                <a href="users-edit.php?id=1" class="btn btn-success">Edit</a>
                                <a href="users-delete.php?id=1" class="btn btn-danger">Delete</a>
                            </td>       
                        </tr>
                          <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>johndoe@example.com</td>
                            <td>1234567890</td>
                            <td>Admin</td>
                            <td>
                                <a href="users-edit.php?id=1" class="btn btn-success">Edit</a>
                                <a href="users-delete.php?id=1" class="btn btn-danger">Delete</a>
                            </td>       
                        </tr>
                    </tbody>

               </table>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
