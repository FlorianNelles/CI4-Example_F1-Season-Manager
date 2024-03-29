<?php $session = \Config\Services::session();?>

<h2><?php echo lang('teamlist.teamlist_title'); ?></h2>

<?php if($session->get('user_id') == 1):?>
<p><a class="btn btn-success" href="<?php echo site_url('/teams/create');?>"><?php echo lang('teamlist.team_create'); ?></a></p>
<?php endif;?>

<table class="table">
    <thead>
    <tr>
        <th scope="col"><?php echo lang('teamlist.pos'); ?></th>
        <th scope="col"><?php echo lang('teamlist.teamname'); ?></th>
        <th scope="col"><?php echo lang('teamlist.principal'); ?></th>
        <th scope="col"><?php echo lang('teamlist.engine'); ?></th>
        <th scope="col"><?php echo lang('teamlist.place'); ?></th>
        <th scope="col"><?php echo lang('teamlist.profile'); ?></th>

    </tr>
    </thead>
    <tbody>


    <?php foreach($teams as $team) : ?>
        <tr>

            <td><?php echo $team['id']; ?></td>
            <td><?php echo $team['name']; ?></td>
            <td><?php echo $team['teamchef']; ?></td>
            <td><?php echo $team['motor']; ?></td>
            <td><?php echo $team['sitz']; ?></td>
            <td><a class="btn btn-secondary" href="<?php echo site_url('/teams/'.$team['id']);?>">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                        <circle cx="8" cy="4.5" r="1"/>
                    </svg></a></td>

        </tr>
    <?php endforeach; ?>

    </tbody>
</table>
<br>
