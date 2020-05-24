<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */

$this->loadHelper('Form', [
    'templates' => 'MaterializeTheme.materialize_form',
]);

?>

<section class="courses index card">
    <div class="card-content">
        <span class="card-title"><?=__('Add course') ?></span>
        <div class="row">
            <div class="col s12">

                <?= $this->Form->create($course, ['class' => 'form']) ?>
                <?php
                    echo $this->Form->control('branch_id', ['options' => $branches]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('short_description');
                    echo $this->Form->control('long_description');
                    echo $this->Form->control('category');
                    echo $this->Form->control('type');
                    echo $this->Form->control('schedule');
                    echo $this->Form->control('medical_exam');
                    echo $this->Form->control('requirements');
                    echo $this->Form->control('price');
                    echo $this->Form->control('image');
                ?>
                <div class="form-submit d-flex jc-end">
                    <?= $this->Html->link(__('Cancel'), ['controller' => 'courses', 'action' => 'index'], ['class' => ['btn', 'cancel']]) ?>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn']) ?>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>