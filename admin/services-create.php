<?php include('includes/header.php'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                   Add Services
                    <a href="services.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <?= alertMessage(); ?>

                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label  class="form-label"> Service Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                     <div class="mb-3">
                        <label class="form-label"> Small Description</label>
                        <textarea name="small_description" rows="3" class="form-control" ></textarea>
                    </div>
                      <div class="mb-3">
                        <label class="form-label"> Long Description</label>
                        <textarea name="long_description" rows="3" class="form-control" ></textarea>
                    </div>
                     <div class="mb-3">
                        <label  class="form-label"> Upload Service Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <h5>SEO Tags</h5> 
                     <div class="mb-3">
                        <label  class="form-label"> Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" >
                    </div>
                     <div class="mb-3">
                        <label  class="form-label"> Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control" ></textarea>
                    </div>
                      <div class="mb-3">
                        <label  class="form-label"> Meta Keyword</label>
                        <textarea name="meta_keyword" rows="3" class="form-control" ></textarea>
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
                        <label  class="form-label"> Status (Checked=hidden, un-checked=visible)</label>
                        <br>
                        <input type="checkbox" name="status" style="width: 30px; height: 30px;" >
                    </div>
                    <div class="mb-3 text-end">
                        <button type="submit" name="saveService" class="btn btn-primary">Save Services</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>