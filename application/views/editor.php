<?php include_once('admin/admin_header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>A Simple Page with CKEditor 4</title>
    <!-- Make sure the path to CKEditor is correct. -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <script src="<?= base_url('ckeditor/ckeditor.js') ?>"></script>
    <script src="<?= base_url('ckeditor/ckfinder.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/jq/jquery.js'); ?>"></script>
</head>

<body>
    <marquee scrollamount="10">
        <i>
            <h4 style="color:blue;">Welcome to MyApp Portal. You can add <sapan style="color:red;">Menu</sapan>
                dynamically from here
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
            <a href="<?= base_url('user/load_submenu') ?>"><span style="color:green"><i
                        class="fas fa-plus-square fa-lg">
                        Add Sub-menu
                    </i></span></a>&nbsp;
            <!-- <?php echo form_submit(['name' => 'sumbit', 'value' => 'Add Sub-menu', 'class' => 'btn btn-primary']); ?> -->
            &nbsp;
            <a href="<?= base_url('user/logout') ?>"><?php echo form_submit(['name' => 'sumbit', 'value' => 'Logout', 'class' => 'btn btn-primary']); ?>
            </a>
        </div>

        <?php echo form_open('user/save_data', ['class' => 'form-horizontal']); ?>
        <div>
            <label>
                <h3><b>Menu Name</b></h3>
            </label><br>
            <input type="text" name="menu_name" id="page" size="50">
            <?php echo form_error('menu_name'); ?>
        </div>
        <hr>
        <textarea name="content" id="editor1" rows="10" cols="80">
            Write your content here....
        </textarea>
        <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
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
</style>
<script>
$(document).ready(function() {
    setTimeout(function() {
        $(".ani").fadeOut("slow");
    }, 3000);
});
</script>

</html>
<?php include_once('admin/admin_footer.php'); ?>