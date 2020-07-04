<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 */

$this->loadHelper('Form', [
    'templates' => 'MaterializeTheme.materialize_form',
]);

?>

<section class="contents index card">
    <div class="card-content">
        <span class="card-title"><?=__('Add content') ?></span>
        <div class="row">
            <div class="col s12">

                <?= $this->Form->create($content, ['class' => 'form', 'type' => 'file']) ?>
                <?php
                    echo $this->Form->control('branch_id', ['options' => $branches]);
                    echo $this->Form->control('identifier', ['options' => $identifiers]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('text');
                    echo $this->Form->control('primary_image', ['type' => 'file', 'label' => false, 'placeholder' => __('Image 1')]);
                    echo $this->Form->control('secondary_image', ['type' => 'file', 'label' => false, 'placeholder' => __('Image 2')]);
                ?>
                <div class="form-submit d-flex jc-end">
                    <?= $this->Html->link(__('Cancel'), ['controller' => 'contents', 'action' => 'index'], ['class' => ['btn', 'cancel']]) ?>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn']) ?>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>