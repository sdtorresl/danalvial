<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Social $social
 */

$this->loadHelper('Form', [
    'templates' => 'MaterializeTheme.materialize_form',
]);

?>

<section class="socials index card">
    <div class="card-header">
        <div class="card-content">
            <span class="card-title"><?=__('Edit social') ?></span>
            <div class="row">
                <div class="col s12">

                    <?= $this->Form->create($social, ['class' => 'form']) ?>
                    <?php
                        echo $this->Form->control('name', ['disabled']);
                        echo $this->Form->control('link');
                    ?>
                    <div class="form-submit d-flex jc-end">
                        <?= $this->Html->link(__('Cancel'), ['controller' => 'socials', 'action' => 'index'], ['class' => ['btn', 'cancel']]) ?>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn']) ?>
                    </div>

                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
</section>