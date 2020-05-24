<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Branch $branch
 */

$this->loadHelper('Form', [
    'templates' => 'MaterializeTheme.materialize_form',
]);

?>

<section class="branches index card">
    <div class="card-header">
        <div class="card-content">
            <span class="card-title"><?=__('Edit branch') ?></span>
            <div class="row">
                <div class="col s12">

                    <?= $this->Form->create($branch, ['class' => 'form']) ?>
                    <?php
                        echo $this->Form->control('name');
                        echo $this->Form->control('image');
                        echo $this->Form->control('address');
                        echo $this->Form->control('contact_number_1');
                        echo $this->Form->control('contact_number_2');
                        echo $this->Form->control('schedule');
                        echo $this->Form->control('location');
                    ?>
                    <div class="form-submit d-flex jc-end">
                        <?= $this->Html->link(__('Cancel'), ['controller' => 'branches', 'action' => 'index'], ['class' => ['btn', 'cancel']]) ?>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn']) ?>
                    </div>

                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
</section>