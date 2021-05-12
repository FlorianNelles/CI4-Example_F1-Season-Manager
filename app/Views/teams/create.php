<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h1 class="text-center"><?php echo lang('teamcreate.create_title'); ?></h1>

        <?php if($isPost) echo service('validation')->listErrors() ?>
        <?= form_open('teams/create') ?>

        <div class="form-group">
            <label for="inputName"><?php echo lang('teamcreate.create_name'); ?></label>
            <input type="text" class="form-control" id="inputName"  name="name" placeholder=<?php echo lang('teamcreate.placeholder_name'); ?>>
        </div>
        <div class="form-group">
            <label for="inputTeamchef"><?php echo lang('teamcreate.create_principal'); ?></label>
            <input type="text" class="form-control" id="inputTeamchef" name="teamchef" placeholder=<?php echo lang('teamcreate.placeholder_principal'); ?>>

            <div class="form-group">
                <label for="inputMotor"><?php echo lang('teamcreate.create_engine'); ?></label>
                <input type="text" class="form-control" id="inputMotor" name="motor" placeholder=<?php echo lang('teamcreate.placeholder_engine'); ?>>
            </div>
            <div class="form-group">
                <label for="inputSitz"><?php echo lang('teamcreate.create_place'); ?></label>
                <input type="text" class="form-control" id="inputSitz" name="sitz" placeholder=<?php echo lang('teamcreate.placeholder_place'); ?>>
            </div>
            <button type="submit" class="btn btn-success"><?php echo lang('teamcreate.submit'); ?></button>
        </div>
    </div>
</div>
</form>
