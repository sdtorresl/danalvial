<div id="branches-options">
    <h2 class="center-align"><?= __('Choose a branch') ?></h2>
    <div class="container">
        <?php foreach ($branches as $branch) : ?>
        <div class="option-item">
            <?php 
            $imagePath = str_replace(WWW_ROOT, '', $branch->image_dir) . DS;
            echo $this->Html->image($branch->image , [
                "alt" => "logo",
                'url' => ['controller' => 'Home', 'action' => 'index'],
                'pathPrefix' => $imagePath
                ]);
            ?>
        </div>
        <?php endforeach; ?>
    </div>

</div>
