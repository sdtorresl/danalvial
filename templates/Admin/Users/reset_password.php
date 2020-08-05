<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;

?>

<script src="https://www.google.com/recaptcha/api.js"></script>

<div class="users login">
    <div class="card-panel">
        <figure class="logo-container">
            <?= $this->Html->image('logo-danalvial.png', ['alt' => 'Logo Danalvial', 'id' => 'logo']); ?>
        </figure>

        <?= $this->Flash->render() ?>

        <div class="form">
            <?= $this->Form->create() ?>
            <div class="form form-control">
                <?= $this->Form->control('password', ['label' => 'Contraseña', 'placeholder' => 'Por favor ingrese su contraseña']) ?>
                <?= $this->Form->control('passwordConfirmation', ['label' => 'Confirmación de contraseña', 'type' => 'password', 'placeholder' => 'Por favor ingrese su contraseña']) ?>
                <div id="login-btn">
                    <div class="form-submit d-flex jc-end">
                        <?= $this->Form->button('Enviar', [
                            'class' => 'btn g-recaptcha',
                            'data-sitekey' => Configure::read('reCaptchaKeys.site_key'),
                            'data-callback' => 'onSubmit',
                            'data-action' => 'submit'
                        ]) ?>
                    </div>
                </div>

                <div id="password-remember" class="center-align">
                   
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
    function onSubmit(token) {
        document.getElementsByTagName("form")[0].submit();
    }
</script>
