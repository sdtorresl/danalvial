<?php
/**
 * @var \App\View\AppView $this
 */
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;

?>

<script src="https://www.google.com/recaptcha/api.js"></script>

<section id="student-login" style="background: url('/img/mask_4.png');  background-repeat: no-repeat;">
    <div class="container">
        <div class="content-section row">
            <div class="col s12 m7 l6">
                <div>
                    <h2>Iniciar Sesión</h2>
                    <p>Si eres uno de nuestros alumnos ingresa tu usuario y contraseña asignados, si no tienes uno aún cómunicate con nosotros.</p>
                </div>
                <?= $this->Form->create() ?>
                <div class="form form-control">
                    <?= $this->Form->control('Correo', ['placeholder' => __('Please input your username')]) ?>
                    <?= $this->Form->control('Contraseña', ['placeholder' => __('Please input your password')]) ?>
                    <div class="form-submit d-flex jc-end">
                        <?= $this->Form->button(__('Submit'), [
                            'class' => 'btn g-recaptcha',
                            'data-sitekey' => Configure::read('reCaptchaKeys.site_key'),
                            'data-callback' => 'onSubmit',
                            'data-action' => 'submit'
                        ]) ?>
                    </div>
                </div>
            </div>
            <?php 
            $imagePath = str_replace(WWW_ROOT, '', $branch[0]->image_dir) . DS;
            $imageURL = str_replace('\\', '/', $imagePath);
            ?>
            <div class="content-image col s12 m5 l6" style="background: url('<?= $imageURL . $branch[0]->image ?>');
                    background-size: 100% auto;
                    background-repeat: no-repeat;
                    background-position: 0 95px;">
            </div>
        </div>
    </div>
</section>

<script>
    function onSubmit(token) {
        document.getElementsByTagName("form")[0].submit();
    }
</script>
