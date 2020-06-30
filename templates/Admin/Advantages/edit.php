<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Advantage $advantage
 */

$this->loadHelper('Form', [
    'templates' => 'MaterializeTheme.materialize_form',
]);

?>

<?= $this->Html->script('/node_modules/quill/dist/quill.min.js') ?>
<?= $this->Html->css('/node_modules/quill/dist/quill.snow.css') ?>

<section class="advantages index card">
    <div class="card-header">
        <div class="card-content">
            <span class="card-title"><?=__('Edit advantage') ?></span>
            <div class="row">
                <div class="col s12">

                    <?= $this->Form->create($advantage, ['class' => 'form']) ?>
                    <?php
                        echo $this->Form->control('branch_id', ['options' => $branches]);
                        echo $this->Form->control('title');
                        echo $this->Form->control('logo');
                        echo $this->Form->hidden('description');
                    ?>
                    <div id="editor"></div>
                    <div class="form-submit d-flex jc-end">
                        <?= $this->Html->link(__('Cancel'), ['controller' => 'advantages', 'action' => 'index'], ['class' => ['btn', 'cancel']]) ?>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn']) ?>
                    </div>

                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
var toolbarOptions = [
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    ['bold', 'italic', 'underline', 'strike'], // toggled buttons
    ['clean']                                // remove formatting button
    ];

var quill = new Quill('#editor', {
    modules: {
        toolbar: toolbarOptions
    },
    theme: 'snow'
});
        
quill.setContents(<?= $advantage->description ?>);

var form = document.querySelector('form');
form.onsubmit = function() {
    // Populate hidden form on submit
    var description = document.querySelector('input[name=description]');
    description.value = JSON.stringify(quill.getContents());
    
    console.log("Submitted", $(form).serialize(), $(form).serializeArray());
    
    // No back end to actually submit to!
    alert('Open the console to see the submit data!')
    return false;
};
</script>
