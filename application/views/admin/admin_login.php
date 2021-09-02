<?php include_once('public_header.php'); ?>
<div class="container">
    <?php if ($feedback = $this->session->flashdata('feedback')) : ?>
    <div class="col-lg-4">
        <div class="alert alert-dismissible alert-success">
            <?= $feedback ?>
        </div>
    </div>
    <?php endif; ?>
    <?php echo form_open('login/admin_login', ['class' => 'form-horizontal']); ?>
    <fieldset>
        <legend>Login</legend>
        <?php if ($error = $this->session->flashdata('login_failed')) : ?>
        <div class="col-lg-4">
            <div class="alert alert-dismissible alert-danger">
                <?= $error ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label mt-4">Username:</label>
                    <?php echo form_input(['name' => 'username', 'class' => 'form-control', 'placeholder' => 'Username', 'value' => set_value('username')]); ?>
                    <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter Username"> -->

                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small> -->
                </div>
            </div>
            <!-- <div style="color: red"> -->
            <!-- <?php echo form_error('username', '<p class="text-danger">', '</p>'); ?> -->

            <div>
                <?php echo form_error('username'); ?></div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label mt-4">Password:</label>
                    <?php echo form_password(['name' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'value' => set_value('password')]); ?>
                    <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password"> -->
                </div>
            </div>
            <div><?php echo form_error('password'); ?>
            </div>
        </div>
        <br>
        <!-- <button type="reset" class="btn btn-default">Cancel</button> -->
        <?php echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-primary']); ?>
        <?php echo form_submit(['name' => 'sumbit', 'value' => 'Login', 'class' => 'btn btn-primary']); ?>
        <!-- <button type="submit" class="btn btn-primary">Login</button> -->
    </fieldset>
    <!-- <?php echo validation_errors(); ?> -->
    </form>
</div>
<?php include_once('public_footer.php'); ?>