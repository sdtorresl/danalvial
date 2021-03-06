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
                <?= $this->Form->control('email', ['label' => 'Correo', 'placeholder' => __('Please input your username')]) ?>
                <?= $this->Form->control('password', ['label' => 'Contraseña', 'placeholder' => __('Please input your password')]) ?>
                <div id="login-btn">
                    <div class="form-submit">
                        <?= $this->Form->button('Iniciar sesión', [
                            'class' => 'btn g-recaptcha',
                            'data-sitekey' => Configure::read('reCaptchaKeys.site_key'),
                            'data-callback' => 'onSubmit',
                            'data-action' => 'submit'
                        ]) ?>
                    </div>
                </div>

                <div id="password-remember" class="center-align">
                    <p><?= $this->Html->link(
                        __('Have you forgotten your password?'), 
                        ['controller' => 'Users', 'action' => 'forgotPassword']) ?>
                    </p>
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
