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

                <?= $this->Form->create($question, ['class' => 'form', 'type' => 'file']) ?>
                <?php
                    echo $this->Form->control('test_id', ['options' => $tests, 'value' => $test_id, 'disabled']);
                    echo $this->Form->control('question');
                    echo $this->Form->control('category', ['options' => $categories]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('image', ['type' => 'file', 'label' => false, 'placeholder' => __('Image')]);
                ?>
                <div class="form-submit d-flex jc-end">
                    <?= $this->Html->link(__('Cancel'), ['controller' => 'Tests', 'action' => 'view', $test_id], ['class' => ['btn', 'cancel']]) ?>
                    <?= $this->Form->button(__('Save'), ['class' => 'btn', 'formaction' => $test_id . '?redirect=true']) ?>
                    <?= $this->Form->button(__('Save and Add Answer'), ['class' => 'btn', 'formaction' => $test_id]) ?>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>