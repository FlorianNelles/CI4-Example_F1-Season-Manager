<h2><?php echo lang('postcreateedit.edit_title'); ?></h2>

<?php if($isPost) echo service('validation')->listErrors() ?>
<?= form_open('posts/edit/'.$post['id']); ?>



<div class="form-group">
    <label><?php echo lang('postcreateedit.news_title'); ?></label>
    <input type="text" class="form-control" name="title" placeholder="Titel einfügen" value="<?php echo $post['title'];?>">
</div>
<div class="form-group">
    <label><?php echo lang('postcreateedit.news_text'); ?></label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Text schreiben" ><?php echo $post['body'];?></textarea>
</div>


<button type="submit" class="btn btn-success"><svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
    </svg></button>
</form>

