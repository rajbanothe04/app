<?php include_once('admin/admin_header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <script src="<?= base_url('ckeditor/ckeditor.js') ?>"></script>
    <script src="<?= base_url('ckeditor/ckfinder.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/jq/jquery.js'); ?>"></script>
</head>

<body>
    <marquee scrollamount="10">
        <i>
            <h4 style="color:blue;">Welcome to MyApp Portal. You can add <sapan style="color:red;">Sub-Menu
                </sapan>from here
        </i></h4>
    </marquee>
    <div class="container mt-4">
        <center>
            <div class="ani">
                <i><b>
                        <h3 style="color:green;"><?= $this->session->flashdata('msg'); ?></h3>
                    </b></i>
            </div>
        </center>
        <div class="log">
            <a href="<?= base_url('user/editor') ?>"><span style="color:green"><i class="fas fa-plus-square fa-lg">
                        Add Menu
                    </i></span>
                <!-- <?php echo form_submit(['name' => 'sumbit', 'value' => 'Add Menu', 'class' => 'btn btn-primary']); ?> -->

            </a>&nbsp;
            <!-- <a href="<?= base_url('user') ?>"><?php echo form_submit(['name' => 'sumbit', 'value' => 'Home', 'class' => 'btn btn-primary']); ?>
            </a> -->
            &nbsp;
            <a href="<?= base_url('user/logout') ?>"><?php echo form_submit(['name' => 'sumbit', 'value' => 'Logout', 'class' => 'btn btn-primary']); ?>
            </a>
        </div>

        <?php echo form_open('user/add_submenu', ['class' => 'form-horizontal']); ?>
        <br>
        <div class="row">
            <div class="row col-lg-4">
                <label for="drop">
                    <h5><b>Select Menu:</b></h5>
                </label>
                <?php echo form_dropdown('menu_id', $data, '', 'class="form-control" id="drop" required=""'); ?>
                <?php echo form_error('menu_id'); ?>
            </div>&nbsp;&nbsp;
            <div class="row col-lg-4">
                <label>
                    <h5><b>Sub-Menu Name:</b></h5>
                </label>
                <!-- <input type="text" name="menu_sname" id="page" size="30"> -->
                <?php echo form_input(['name' => 'menu_sname', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Enter sub-menu']); ?>

                <?php echo form_error('menu_sname'); ?>
            </div>
        </div>

        <hr>
        <textarea name="scontent" id="editor1" rows="10" cols="80">
            Write your content here for sub-menu..
            </textarea>
        <script>
        var editor = CKEDITOR.replace('editor1', {
            filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
        // CKFinder.setupCKEditor(editor); // this code used for image upload
        </script>


        <?php echo form_submit(['name' => 'sumbit', 'value' => 'Publish', 'class' => 'btn btn-primary']); ?>
        </form>
    </div>

</body>
<style>
.log {
    position: relative;
    float: right;
}

/* div select {
    width: 150px;
    height: 28px;
} */
</style>
<script>
$(document).ready(function() {
    setTimeout(function() {
        $(".ani").fadeOut("slow");
    }, 3000);
});
</script>

</html>