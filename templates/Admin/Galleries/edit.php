<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gallery $gallery
 */

$this->loadHelper('Form', [
    'templates' => 'MaterializeTheme.materialize_form',
]);

?>

<section class="galleries index card">
    <div class="card-header">
        <div class="card-content">
            <span class="card-title"><?=__('Edit gallery') ?></span>
            <div class="row">
                <div class="col s12">

                    <?= $this->Form->create($gallery, ['class' => 'form', 'type' => 'file']) ?>
                    <?php
                        echo $this->Form->control('branch_id', ['options' => $branches]);
                        echo $this->Form->control('title');
                        echo $this->Form->control('image', ['type' => 'file', 'label' => false, 'placeholder' => __('Image')]);
                    ?>
                    <div class="form-submit d-flex jc-end">
                        <?= $this->Html->link(__('Cancel'), ['controller' => 'galleries', 'action' => 'index'], ['class' => ['btn', 'cancel']]) ?>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn']) ?>
                    </div>

                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
</section>