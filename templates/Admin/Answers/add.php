<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Answer $answer
 */

$this->loadHelper('Form', [
    'templates' => 'MaterializeTheme.materialize_form',
]);

?>

<section class="answers index card">
    <div class="card-content">
        <span class="card-title"><?=__('Add answer') ?></span>
        <div class="row">
            <div class="col s12">

                <?= $this->Form->create($answer, ['class' => 'form']) ?>
                <?php
                    echo $this->Form->control('question_id', ['options' => $questions, 'value' => $question_id, 'disabled']);
                    echo $this->Form->control('answer');
                    echo $this->Form->control('result', ['type' => 'checkbox']);
                ?>

                <div class="form-submit d-flex jc-end">
                    <?= $this->Html->link(__('Cancel'), ['controller' => 'Questions', 'action' => 'view', $question_id], ['class' => ['btn', 'cancel']]) ?>
                    <?= $this->Form->button(__('Save'), ['class' => 'btn']) ?>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>
