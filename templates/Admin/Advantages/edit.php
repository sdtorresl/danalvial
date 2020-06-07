<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Advantage $advantage
 */

$this->loadHelper('Form', [
    'templates' => 'MaterializeTheme.materialize_form',
]);

?>

<section class="advantages index card">
    <div class="card-header">
        <div class="card-content">
            <span class="card-title"><?=__('Edit advantage') ?></span>
            <div class="row">
                <div class="col s12">

                    <?= $this->Form->create($advantage, ['class' => 'form']) ?>
                    <?php
                        echo $this->Form->control('title');
                        echo $this->Form->control('description');
                        echo $this->Form->control('logo');
                    ?>
                    <div class="form-submit d-flex jc-end">
                        <?= $this->Html->link(__('Cancel'), ['controller' => 'advantages', 'action' => 'index'], ['class' => ['btn', 'cancel']]) ?>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn']) ?>
                    </div>

                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
</section>