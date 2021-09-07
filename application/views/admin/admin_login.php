<?php include_once('admin_header.php'); ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/jq/jquery.js'); ?>"></script>
</head>

<div class="container mt-5">
    <?php echo form_open('user/admin_login', ['class' => 'form-horizontal']); ?>
    <div class="row">

        <div class="col-lg-4">
        </div>
        <div class="row col-lg-4 border shadow mb-6 bg-black">

            <div class="d-flex justify-content-center mt-2">
                <marquee width="60%" direction="left" height="50px" scrollamount="7">
                    <h3><b>Admin-Login</b></h3>
                </marquee>
            </div>

            <?php if ($error = $this->session->flashdata('msg')) : ?>
            <!-- <div class="alert alert-dismissible alert-danger">
                <?= $error ?>
            </div> -->
            <center>
                <div class="ani">
                    <i>
                        <h4 style="color:red;"><?= $this->session->flashdata('msg'); ?></h4>
                    </i>
                </div>
            </center>
            <?php endif; ?>

            <!-- <?php echo $this->session->flashdata('msg'); ?> -->
            <div class=" form-group">
                <label for="username" class="form-label mt-4">Username:</label>
                <?php echo form_input(['name' => 'username', 'class' => 'form-control', 'placeholder' => 'Username', 'value' => set_value('username')]); ?>
                <?php echo form_error('username'); ?>

                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label mt-4">Password:</label>
                    <?php echo form_password(['name' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'value' => set_value('password')]); ?>
                    <?php echo form_error('password'); ?>
                </div><br>
                <div class="d-flex justify-content-center">
                    <?php echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-primary']); ?>
                    &nbsp;&nbsp;
                    <?php echo form_submit(['name' => 'sumbit', 'value' => 'Login', 'class' => 'btn btn-primary']); ?>
                </div>
                <hr style="border: 1px solid white">
            </div><br>
        </div>
        <br>

    </div>
    <div class="col-lg-4">
    </div>
    <!-- <?php echo validation_errors(); ?> -->
    </form>
</div>
</div>

</html>
<script>
$(document).ready(function() {
    setTimeout(function() {
        $(".ani").fadeOut("slow");
    }, 5000);
});
</script>
<?php include_once('admin_footer.php'); ?>