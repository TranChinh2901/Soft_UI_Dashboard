<?php include('includes/header.php'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Settings</h4>
            </div>
            <div class="card-body">
                <form action="code.php" method="POST">
                <input type="hidden" name="settingId" value="insert" >    
                <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">URL / Domain</label>
                        <input type="text" name="slug" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Small Description</label>
                        <input type="text" name="small_description" class="form-control" required>
                    </div>
                    <h4 class="my-3"> SEO Settings</h4>
                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" rows="3" required></textarea>
                    </div>


                    <h4 class="my-3"> Contact Information</h4>
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Email 1</label>
                        <input type="text" name="email1" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Email 2</label>
                        <input type="text" name="email2" class="form-control" required>
                    </div>

                     <div class="col-md-6 mb-3">
                        <label for="">Phone 1</label>
                        <input type="text" name="phone1" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Phone 2</label>
                        <input type="text" name="phone2" class="form-control" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Address</label>
                        <textarea name="address" class="form-control" rows="3" required></textarea>
                    </div>
                    </div>

                    <div class="mb-3 text-end">
                        <button type="submit" name="saveSetting" class="btn btn-primary">Save Settings</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<?php include('includes/footer.php'); ?>