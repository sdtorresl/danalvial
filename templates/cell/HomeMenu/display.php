<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">Danalvial</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><?= $this->Html->link('Inicio', ['controller' => 'home', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link('Formación de conductores', ['controller' => 'courses', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link('De dónde vengo yo', ['controller' => 'us', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link('Preguntas frecuentes', ['controller' => 'us', 'action' => 'frequentQuestions']) ?></li>
            <li><?= $this->Html->link('Contacto', ['controller' => 'contacts', 'action' => 'index']) ?></li>
        </ul>
    </div>
    <ul class="sidenav" id="mobile-demo">
        <li><?= $this->Html->link('Inicio', ['controller' => 'home', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Formación de conductores', ['controller' => 'courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('De dónde vengo yo', ['controller' => 'us', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Preguntas frecuentes', ['controller' => 'us', 'action' => 'frequentQuestions']) ?></li>
        <li><?= $this->Html->link('Contacto', ['controller' => 'contacts', 'action' => 'index']) ?></li>
    </ul>
</nav>
