<div id="branches-options">
    <p class="center-align"><?= __('Choose a branch') ?></p>
    <div class="item-wrap">
        <?php foreach ($branches as $branch) : ?>
        <div class="item">
            <a href="/home/option/<?= $branch->id ?>">
                <div>
                    <?php 
                    $imagePath = str_replace(WWW_ROOT, '', $branch->image_dir) . DS;
                    $imageURL = str_replace('\\', '/', $imagePath);
                    ?>
                    <div class="branch-image"
                        style="background: url('<?= $imageURL . $branch->image ?>') center center; background-size: cover;">
                    </div>

                    <div>
                        <h2 class="center-align white-text">Danalvial Sede <?= $branch->name ?></h2>
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>

</div>
