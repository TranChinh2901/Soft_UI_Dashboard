<?php
$pageTitle = "Login";
include 'includes/header.php';
if(isset($_SESSION['auth'])) {
    redirect('index.php', 'You are already logged in');
}
?>
<div class="py-4 text-center">
    <h1 >Welcome back!</h1>
</div>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
               <div class="card shadow-sm">
                <div class="card-header">
                    <h4 >Login</h4>
                </div>
                <div class="card-body">

                    <?= alertMessage(); ?>
                    <form action="login-code.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="loginBtn" class="btn btn-primary w-100">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'includes/footer.php';
?>
