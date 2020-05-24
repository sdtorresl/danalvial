<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */

$this->loadHelper('Form', [
    'templates' => 'MaterializeTheme.materialize_form',
]);

?>

<section class="questions index card">
    <div class="card-content">
        <span class="card-title"><?=__('Add question') ?></span>
        <div class="row">
            <div class="col s12">

                <?= $this->Form->create($question, ['class' => 'form']) ?>
                <?php
                    echo $this->Form->control('test_id', ['options' => $tests]);
                    echo $this->Form->control('question');
                    echo $this->Form->control('category');
                    echo $this->Form->control('answer_description');
                    echo $this->Form->control('title');
                    echo $this->Form->control('image');
?>
                <div class="form-submit d-flex jc-end">
                    <?= $this->Html->link(__('Cancel'), ['controller' => 'questions', 'action' => 'index'], ['class' => ['btn', 'cancel']]) ?>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn']) ?>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>