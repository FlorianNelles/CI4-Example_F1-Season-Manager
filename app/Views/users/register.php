
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h1 class="text-center"><?php echo lang('register.create_title'); ?></h1>

        <?php if($isPost) echo service('validation')->listErrors() ?>
        <?= form_open('users/register') ?>

        <div class="form-group">
            <label><?php echo lang('register.create_name'); ?></label>
            <input type="text" class="form-control" name="name" placeholder=<?php echo lang('register.placeholder_name'); ?>>
        </div>
        <div class="form-group">
            <label><?php echo lang('register.create_email'); ?></label>
            <input type="email" class="form-control" name="email" placeholder=<?php echo lang('register.placeholder_email'); ?>>
        </div>
        <div class="form-group">
            <label><?php echo lang('register.create_username'); ?></label>
            <input type="text" class="form-control" name="username" placeholder=<?php echo lang('register.placeholder_username'); ?>>
        </div>
        <div class="form-group">
            <label><?php echo lang('register.create_password'); ?></label>
            <input type="password" class="form-control" name="password" placeholder=<?php echo lang('register.placeholder_password'); ?>>
        </div>
        <div class="form-group">
            <label><?php echo lang('register.password_confirm'); ?></label>
            <input type="password" class="form-control" name="password2" placeholder=<?php echo lang('register.placeholder_confirm_password'); ?>>
        </div>

        <button type="submit" class="btn btn-success btn-block"><?php echo lang('register.submit'); ?></button>

    </div>
</div>