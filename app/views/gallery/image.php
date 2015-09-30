<div class="row">
    <div class="col-xs-offset-3 col-xs-6">
        <div class="thumbnail">
            <img class="img-responsive" src="<?= URL ?>media/<?= $photo->filename ?>"  alt="<?= $photo->caption ?>">
            <div class="caption">
                <h3><?= $photo->caption ?></h3>
            </div>
        </div>
    </div>
</div>


<?php if(!empty($comments)) : ?>
   <?php  foreach ($comments as $comment) : ?>
<div class="row">
    <div class="col-md-1 col-md-offset-3">
        <img alt="" src="<?= URL ?>images/user_placeholder.jpg" class="img-circle">
    </div>

    <div class="col-md-6">
        <div class="row">
            <div class="col-xs-9">
                <h4><span class="label label-info"><?= $comment->author ?></span>
                    <small class="text-muted">Posted on <?= $comment->posted ?></small>
                </h4>
                <h4><?= $comment->body ?></h4>
            </div>

            <div class="col-xs-3">
                <?php if(isset($_SESSION['username'])) :?>
                    <form action="" method="post">
                        <input type="hidden" name="commentId" value="<?= $comment->commentId ?>" />
                        <button type="submit" name="deleteComment" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Comment Form -->
<div class="row">
    <div class="col-xs-offset-3 col-xs-6">
        <form action="" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="author" class="form-control" placeholder="Your Name" required="true">
            </div>

            <div class="form-group">
                <label>Comment</label>
                <textarea name="body" class="form-control" placeholder="Leave comment..."
                          required="true" resizable="no"></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" name="submit">Comment</button>
            </div>

        </form>
    </div>
</div>

