<section id="" class="content-section row">
    <?php 
    $imagePath = str_replace(WWW_ROOT, '', $contentSection[0]->primary_image_dir) . DS;
    $imageURL = str_replace('\\', '/', $imagePath);
    ?>
    <div id="" class="content-image col s12 m5 l6"
        style="background: url('<?= $imageURL . $contentSection[0]->primary_image ?>') center center; background-size: cover;">
    </div>
    <div id="" class="content col s12 m7 l6">
        <div id="" class="content-text container">
            <h2><?= $contentSection[0]->title ?></h2>
            <p><?= $contentSection[0]->text ?></p>
        </div>
    </div>
</section>