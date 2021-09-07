<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add pages</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="row col-lg-4">
                <div class="col-lg-4">
                    <?php if ($success = $this->session->flashdata('msg')) : ?>
                    <div class="alert alert-dismissible alert-success col-lg-4">
                        <?= $success ?>
                        <?php endif; ?>
                    </div>
                    <!-- <?php echo $this->session->flashdata('msg'); ?> -->
                    <h3>Add Pages</h3>
                    <div>
                        <a href="<?= base_url('user/editor') ?>"><?php echo form_submit(['name' => 'sumbit', 'value' => 'Add Pages', 'class' => 'btn btn-primary']); ?>
                        </a>
                        &nbsp;
                        <a href="<?= base_url('user/logout') ?>"><?php echo form_submit(['name' => 'sumbit', 'value' => 'Logout', 'class' => 'btn btn-primary']); ?>
                        </a>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">
            </div>
        </div>
    </div>
    <hr>
</body>

</html>