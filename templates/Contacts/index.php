<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */

$this->loadHelper('Form', [
    'templates' => 'MaterializeTheme.materialize_form',
]);

use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;

?>

<script src="https://www.google.com/recaptcha/api.js"></script>

<section id="contact-us" style="background: url('/img/mask_4.png');  background-repeat: no-repeat;">
    <div class="container">
        <div class="content-section row">
            <div class="col s12 m7 l6">
                <div>
                    <h2><?= $contentContactUs[0]->title ?></h2>
                    <p><?= $contentContactUs[0]->text ?></p>
                </div>
                <?= $this->Form->create($contact, ['class' => 'form', 'id' => 'contacts-form']) ?>
                <?php
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('message');
                    echo $this->Form->control('telephone');
                    echo $this->Form->control('course_id', ['options' => $courses]);
                    echo $this->Form->hidden('branch_id', ['value' => $branchId]);
                ?>
                <div class="form-submit d-flex jc-end">
                    <?= $this->Form->button(__('Submit'), [
                        'class' => 'btn g-recaptcha',
                        'data-sitekey' => Configure::read('reCaptchaKeys.site_key'),
                        'data-callback' => 'onSubmit',
                        'data-action' => 'submit'
                    ]) ?>
                </div>
            </div>
            <?php 
            $imagePath = str_replace(WWW_ROOT, '', $contentContactUs[0]->primary_image_dir) . DS;
            $imageURL = str_replace('\\', '/', $imagePath);
            ?>
            <div class="content-image col s12 m5 l6" style="background: url('<?= $imageURL . $contentContactUs[0]->primary_image ?>');
            background-size: 100% auto;
            background-repeat: no-repeat;
            background-position: 0 95px;">

            </div>
        </div>
    </div>
</section>

<script>
    function onSubmit(token) {
        document.getElementById("contacts-form").submit();
    }
</script>
