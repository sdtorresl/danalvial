<?php $this->loadHelper('Authentication.Identity'); ?>

<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <?= $this->Html->link('Danalvial', ['controller' => 'home', 'action' => 'index'], ['class' => 'brand-logo black-text']) ?>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><?= $this->Html->link('Formación de conductores', ['controller' => 'courses', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('De dónde vengo yo', ['controller' => 'us', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Preguntas frecuentes', ['controller' => 'us', 'action' => 'frequentQuestions']) ?></li>
                <li><?= $this->Html->link('Contacto', ['controller' => 'contacts', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Cambiar Sede', ['controller' => 'home', 'action' => 'option']) ?></li>
                <?php if($this->Identity->isLoggedIn()) : ?>
                <li>
                    <?= $this->Html->link('<i class="fal fa-sign-out"></i>', [
                        'controller' => 'Users',
                        'action' => 'logout'
                    ], ['escape' => false]) ?>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <ul class="sidenav" id="mobile-demo">
            <li><?= $this->Html->link('Inicio', ['controller' => 'home', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link('Formación de conductores', ['controller' => 'courses', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link('De dónde vengo yo', ['controller' => 'us', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link('Preguntas frecuentes', ['controller' => 'us', 'action' => 'frequentQuestions']) ?></li>
            <li><?= $this->Html->link('Contacto', ['controller' => 'contacts', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link('Cambiar Sede', ['controller' => 'home', 'action' => 'option']) ?></li>
            <?php if($this->Identity->isLoggedIn()) : ?>
                <li>
                    <?= $this->Html->link(__('Logout') . '<i class="fal fa-sign-out"></i>', [
                        'controller' => 'Users',
                        'action' => 'logout'
                    ], ['escape' => false]) ?>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
