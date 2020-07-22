<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Danalvial';
$menuCell = $this->cell('HomeMenu');
$socialCell = $this->cell('SocialMedia');
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->script('/node_modules/materialize-css/dist/js/materialize.min.js') ?>
    <?= $this->Html->css('main.min.css') ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <?= $menuCell ?>
    <main class="main">
        <?= $socialCell ?>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>

    <footer>
        <div id="info-footer" class="row">
            <div class="col s12 m12 l4">
                <h1>Danalvial</h1>
            </div>
            <div class="col s12 m6 l4 col-pseudo">
                <p>Danalvial escuela de conducción automovilística</p>
                <p>Dirección: <?= $branch[0]->address ?></p>
                <p>Horario: <?= $branch[0]->schedule ?></p>
            </div>
            <div class="col s12 m6 l4">
                <p><?= $branch[0]->location ?></p>
                <p>© Danalvial. Todos los derechos reservados.2020</p>
            </div>
        </div>
        <div id="logos-footer">
            <p><?= __('WHATCHED BY') ?></p>
            <div id="logos">
                <?= $this->Html->image('min-transporte.png') ?>
                <?= $this->Html->image('vigilado-st.png') ?>
                <?= $this->Html->image('runt.png') ?>
                <?= $this->Html->image('icc.png') ?>
                <?= $this->Html->image('aulapp.png') ?>
                <?= $this->Html->image('min-educacion.png') ?>
            </div>
        </div>
    </footer>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
            var elems = document.querySelectorAll('.carousel');
            var instances = M.Carousel.init(elems, {
                fullWidth: true,
                indicators: true
            });

            autoplay(instances);
        });

        function autoplay(instances) {
            for (let index = 0; index < instances.length; index++) {
                const instance = instances[index];
                instance.next();
            }
            setTimeout(autoplay, 6000, instances);
        }
    </script>

</body>
</html>
