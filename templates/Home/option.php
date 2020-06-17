<div id="branch-options" class="container">

    <?php foreach ($branches as $branch) : ?>
    <div>
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
