<?php

$first_name = $this->getRequest()->getSession()->read('Auth.first_name'); 
$last_name = $this->getRequest()->getSession()->read('Auth.last_name'); 
$role = $this->getRequest()->getSession()->read('Auth.role'); 

$name = $first_name . ' ' . $last_name;

?>

<ul id="slide-out" class="sidenav sidenav-fixed">
    <li>
        <div class="customer-info">
            <figure class="customer-logo">
                <?= $this->Html->image('yoteletrabajo.svg') ?>
            </figure>
            <div class="customer-name">
                Admin
            </div>
        </div>
    </li>

    <?php foreach ($menuItems as $controller => $item): ?>
    <?php if(isset($item['actions'])): ?>
    <li>
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">
                    <i class="<?= $item['icon'] ?>"></i>
                    <?= $item['label'] ?>
                </a>
                <div class="collapsible-body">
                    <ul>
                        <?php foreach ($item['actions'] as $action => $label): ?>
                        <li><?= $this->Html->link($label, ['controller' => $controller, 'action' => $action]) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    <?php else: ?>
    <li>
        <?= $this->Html->link(
            '<i class="' . $item['icon'] . '"></i>' . $item['label'],
            ['controller' => $controller, "action" => $item['action']],
            ['escape' => false]);
        ?> 
    </li>
    <?php endif; ?>
    <?php endforeach; ?>
</ul>