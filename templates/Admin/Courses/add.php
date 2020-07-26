<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */

$this->loadHelper('Form', [
    'templates' => 'MaterializeTheme.materialize_form',
]);

?>

<?= $this->Html->script('/node_modules/quill/dist/quill.min.js') ?>
<?= $this->Html->css('/node_modules/quill/dist/quill.snow.css') ?>

<section class="courses index card">
    <div class="card-content">
        <span class="card-title"><?=__('Add course') ?></span>
        <div class="row">
            <div class="col s12">

                <?= $this->Form->create($course, ['class' => 'form', 'type' => 'file']) ?>
                <?php
                    echo $this->Form->control('branch_id', ['options' => $branches]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('short_description');
                    echo $this->Form->control('category');
                    echo $this->Form->control('practical_time');
                    echo $this->Form->control('theoretical_time');
                    echo $this->Form->control('workshop_time');
                    echo $this->Form->hidden('requirements');
                ?>
                <div class="text-editor">
                    <p><?= __('Requirements') ?></p>
                    <div id="editor1"></div>
                </div>
                <?php
                    echo $this->Form->hidden('curriculum_content');
                ?>
                <div class="text-editor">
                    <p>Contenido curricular</p>
                    <div id="editor3"></div>
                </div>
                <?php
                    echo $this->Form->hidden('profile');
                ?>
                <div class="text-editor">
                    <p><?= __('Profile') ?></p>
                    <div id="editor2"></div>
                </div>
                <?php
                    echo $this->Form->control('curriculum', ['type' => 'file', 'label' => false, 'placeholder' => 'Currículo']);
                    echo $this->Form->control('schedule', ['type' => 'file', 'label' => false, 'placeholder' => 'Horario']);
                    echo $this->Form->control('image', ['type' => 'file', 'label' => false, 'placeholder' => __('Image')]);
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

<script>
var toolbarOptions = [
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    ['clean']                                         // remove formatting button
];

var quill1 = new Quill('#editor1', {
    modules: {
        toolbar: toolbarOptions
    },
    theme: 'snow'
});

var quill2 = new Quill('#editor2', {
    modules: {
        toolbar: toolbarOptions
    },
    theme: 'snow'
});

var quill3 = new Quill('#editor3', {
    modules: {
        toolbar: toolbarOptions
    },
    theme: 'snow'
});

var form = document.querySelector('form');
form.onsubmit = function() {
    // Populate hidden form on submit
    var requirements = document.querySelector('input[name=requirements]');
    requirements.value = JSON.stringify(quill1.getContents());

    var profile = document.querySelector('input[name=profile]');
    profile.value = JSON.stringify(quill2.getContents());

    var curriculumContent = document.querySelector('input[name=curriculum_content]');
    curriculumContent.value = JSON.stringify(quill3.getContents());

    return true;
};
</script>
