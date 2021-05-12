<h2><?php echo lang('postcreateedit.create_title'); ?></h2>

<?php if($isPost) echo service('validation')->listErrors() ?>
<?= form_open('posts/create') ?>

<div class="form-group">
    <label><?php echo lang('postcreateedit.news_title'); ?></label>
    <input type="text" class="form-control" name="title" placeholder=<?php echo lang('postcreateedit.placeholder_title'); ?>>
</div>
<div class="form-group">
    <label><?php echo lang('postcreateedit.news_text'); ?></label>
    <textarea id="editor1" class="form-control" name="body" placeholder=<?php echo lang('postcreateedit.placeholder_text'); ?>></textarea>
</div>


<button type="submit" class="btn btn-success"><?php echo lang('postcreateedit.submit_create'); ?></button>
</form>