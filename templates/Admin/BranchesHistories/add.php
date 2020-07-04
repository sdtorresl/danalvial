<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BranchesHistory $branchesHistory
 */

$this->loadHelper('Form', [
    'templates' => 'MaterializeTheme.materialize_form',
]);

?>

<section class="branchesHistories index card">
    <div class="card-content">
        <span class="card-title"><?=__('Add branchesHistory') ?></span>
        <div class="row">
            <div class="col s12">

                <?= $this->Form->create($branchesHistory, ['class' => 'form']) ?>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('text');
                    echo $this->Form->control('branch_id', ['options' => $branches]);
                ?>
                <div class="form-submit d-flex jc-end">
                    <?= $this->Html->link(__('Cancel'), ['controller' => 'branchesHistories', 'action' => 'index'], ['class' => ['btn', 'cancel']]) ?>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn']) ?>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>
