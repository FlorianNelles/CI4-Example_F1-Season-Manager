<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h1 class="text-center"><?php echo lang('drivercreate.create_title'); ?></h1>

        <?php if($isPost) echo service('validation')->listErrors() ?>
        <?= form_open_multipart('drivers/create') ?>
        <div class="form-group">
            <label for="inputName"><?php echo lang('drivercreate.drivername_create'); ?></label>
            <input type="text" class="form-control" id="inputName"  name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="inputStartnr"><?php echo lang('drivercreate.drivernumber_create'); ?></label>
            <input type="text" class="form-control" id="inputStartnr" name="startnr" placeholder="99">
        </div>
        <div class="form-group">
            <label for="inputTeam"><?php echo lang('drivercreate.team_create'); ?></label>
            <select class="form-control" id="inputTeam" name="team">
                <option selected value="12"><?php echo lang('drivercreate.choose'); ?></option>
                <?php foreach ($teams as $team) : ?>

                    <option value="<?php echo $team['id'];?>"><?php echo $team['name'];?></option>

                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="inputPoints"><?php echo lang('drivercreate.points_create'); ?></label>
            <input type="text" class="form-control" id="inputPoints" name="points" placeholder="00" value="0">
        </div>

        <div class="form-group">
            <label><?php echo lang('drivercreate.image_upload'); ?></label>
            <input type="file" name="userfile" >
        </div>


        <button type="submit" class="btn btn-success"><?php echo lang('drivercreate.submit'); ?></button>
    </div>
</div>
</form>