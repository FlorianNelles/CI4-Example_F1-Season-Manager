
<h2><?php echo lang('testpage.test_title'); ?></h2>

<h5><?php echo lang('testpage.encrypt_test_title'); ?></h5>



<?= form_open('tests/index') ?>

<div class="input-group mb-3">
    <input type="text" name="message" class="form-control" placeholder=<?php echo lang('testpage.placeholder_message'); ?> >
    <div class="input-group-append">
        <button type="submit" class="btn btn-success"><?php echo lang('testpage.encrypt_button'); ?></button>
    </div>
</div>

<?php echo form_close(); ?>

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <?php echo lang('testpage.encrypt_title'); ?>
                </div>
                <div class="card-body">
                    <p class="card-text"><?= $encrypt_message ?></p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <?php echo lang('testpage.decrypt_title'); ?>
                </div>
                <div class="card-body">
                    <p class="card-text"><?= $decrypt_message ?></p>
                </div>
            </div>
        </div>
    </div>
<br>

<h5>Userlist</h5>
<?php echo $table; ?>

