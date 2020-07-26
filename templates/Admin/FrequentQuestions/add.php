<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FrequentQuestion $frequentQuestion
 */

$this->loadHelper('Form', [
    'templates' => 'MaterializeTheme.materialize_form',
]);

?>

<section class="frequentQuestions index card">
    <div class="card-content">
        <span class="card-title"><?=__('Add frequentQuestion') ?></span>
        <div class="row">
            <div class="col s12">

                <?= $this->Form->create($frequentQuestion, ['class' => 'form']) ?>
                <?php
                    echo $this->Form->control('question');
                    echo $this->Form->control('answer');
                ?>
                <div class="form-submit d-flex jc-end">
                    <?= $this->Html->link(__('Cancel'), ['controller' => 'frequentQuestions', 'action' => 'index'], ['class' => ['btn', 'cancel']]) ?>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn']) ?>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>