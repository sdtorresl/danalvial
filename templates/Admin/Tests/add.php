<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Test $test
 */

$this->loadHelper('Form', [
    'templates' => 'MaterializeTheme.materialize_form',
]);

?>

<section class="tests index card">    
    <div class="card-content">
        <span class="card-title"><?=__('Add test') ?></span>
        <div class="row">
            <div class="col s12">
                
<?= $this->Form->create($test, ['class' => 'form']) ?>
<?php
    echo $this->Form->control('branch_id', ['options' => $branches]);
    echo $this->Form->control('name');
    echo $this->Form->control('description');
?>
<div class="form-submit d-flex jc-end">
    <?= $this->Html->link(__('Cancel'), ['controller' => 'tests', 'action' => 'index'], ['class' => ['btn', 'cancel']]) ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn']) ?>
</div>

<?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>
