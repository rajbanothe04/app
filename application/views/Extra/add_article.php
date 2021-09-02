<?php include_once('admin_header.php'); ?>

<div class="container">
    <?php echo form_open_multipart('admin/store_article', ['class' => 'form-horizontal']); ?>
    <?php echo form_hidden('user_id', $this->session->userdata('user_id')); ?>
    <?= form_hidden('created_at', date('Y-m-d H:i:s')) ?>
    <fieldset>
        <legend>Add Articles</legend>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label mt-4">Article Title</label>
                    <?php echo form_input(['name' => 'title', 'class' => 'form-control', 'placeholder' => 'Article Title', 'value' => set_value('title')]); ?>
                </div>
            </div>
            <div>
                <?php echo form_error('title'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label mt-4">Article Body</label>
                    <?php echo form_textarea(['name' => 'body', 'class' => 'form-control']); ?>

                </div>
            </div>
            <div><?php echo form_error('body'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label mt-4">Select Image</label>
                    <?php echo form_upload(['name' => 'image', 'class' => 'form-control']); ?>
                </div>
                <!-- 'name'=>'userfile' ------'userfile' this is by default name in codigniter       -->
            </div>
            <div>
                <?php $upload_error ?>
                <?php if (isset($upload_error)) echo $upload_error ?>
            </div>
        </div>
        <br>

        <?php echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-primary']); ?>
        <?php echo form_submit(['name' => 'submit', 'value' => 'Submit', 'class' => 'btn btn-success']); ?>
        <?= anchor("admin/dashboard", 'Cancel', ['class' => 'btn btn-danger']); ?>

    </fieldset>

    </form>

</div>

<?php include_once('admin_footer.php'); ?>