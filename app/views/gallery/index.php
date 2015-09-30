<!-- Display Photos -->
<div class="row">
    <?php foreach($photos as $photo): ?>
    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <img class="img-responsive" src="<?= URL ?>media/<?= $photo->filename ?>" alt="<?= $photo->caption ?>">
            <div class="caption">
                <h3><?= $photo->caption ?></h3>
                <p>
                    <a href="<?= URL ?>gallery/image/<?= $photo->photographId ?>"
                       class="btn btn-primary btn-sm" role="button">View Image</a>
                    <?php if (isset($_SESSION['username'])) : ?>
                    <a href="<?= URL ?>gallery/delete/<?= $photo->photographId ?>"
                       class="btn btn-danger btn-sm" id="javascript-ajax-button" role="button">Delete Image</a>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>