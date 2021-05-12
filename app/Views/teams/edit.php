<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h1 class="text-center"><?php echo lang('teamedit.edit_title'); ?></h1>

        <?php if($isPost) echo service('validation')->listErrors() ?>
        <?= form_open('teams/edit/'.$team['id']) ?>

        <input type="hidden" name="id" value="<?php echo $team['id']; ?>">

            <div class="form-group">
                <label for="inputName"><?php echo lang('teamedit.edit_name'); ?></label>
                <input type="text" class="form-control" id="inputName"  name="name" placeholder="Name" value="<?php echo $team['name'];?>">
            </div>
            <div class="form-group">
                <label for="inputTeamchef"><?php echo lang('teamedit.edit_principal'); ?></label>
                <input type="text" class="form-control" id="inputTeamchef" name="teamchef" placeholder="Cheff" value="<?php echo $team['teamchef'];?>">
            </div>
            <div class="form-group">
                <label for="inputMotor"><?php echo lang('teamedit.edit_engine'); ?></label>
                <input type="text" class="form-control" id="inputMotor" name="motor" placeholder="Motor" value="<?php echo $team['motor'];?>">
            </div>
            <div class="form-group">
                <label for="inputSitz"><?php echo lang('teamedit.edit_place'); ?></label>
                <input type="text" class="form-control" id="inputSitz" name="sitz" placeholder="Stadt/Land" value="<?php echo $team['sitz'];?>">
            </div>

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
            </button>


            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo lang('teamedit.delete_title'); ?><?php echo $team['name'];?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php echo lang('teamedit.delete_message1'); ?><?php echo $team['name'];?><?php echo lang('teamedit.delete_message2'); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo lang('teamedit.cancel'); ?></button>
                            <a class="btn btn-danger" href="<?php echo site_url('teams/delete/'.$team['id']);?>"><?php echo lang('teamedit.delete'); ?></a>
                        </div>
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-success"><svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                </svg></button>
        </div>
    </div>
</div>
</form>
