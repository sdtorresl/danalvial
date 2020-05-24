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
    <div class="card-header">
        <div class="card-content">
        <span class="card-title"><?=__('Edit content') ?></span>
        <div class="row">
            <div class="col s12">
                
<?= $this->Form->create($content, ['class' => 'form']) ?>
<?php
    echo $this->Form->control('key');
    echo $this->Form->control('title');
    echo $this->Form->control('text');
    echo $this->Form->control('primary_image');
    echo $this->Form->control('secondary_image');
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