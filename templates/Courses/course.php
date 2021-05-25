<?php

use nadar\quill\Lexer;

$requirements = new Lexer($course[0]->requirements);
$profile = new Lexer($course[0]->profile);
$curriculumContent = new Lexer($course[0]->curriculum_content);

?>

<section id="course-page">
    <section class="content-section row">
        <?php 
        $imagePath = str_replace(WWW_ROOT, '', $course[0]->image_dir) . DS;
        $imageURL = str_replace('\\', '/', $imagePath);
        ?>
        <div class="content-image col s12 m5 l6"
            style="background: url('<?= DS . $imageURL . $course[0]->image ?>') center center; background-size: cover;">
            <div style="background: url('/img/mask_3.png');
                height: 100%;
                background-repeat: no-repeat;
                background-size: 100% 100%;"></div>
        </div>
        <div class="content col s12 m7 l6">
            <div class="content-text container">
                <h3 class="category"><?= ($course[0]->category) ?></h3>
                <h2><?= ($course[0]->title) ?></h2>
                <p><?= ($course[0]->short_description) ?></p>
                <ul>
                    <li>
                        <i class="fal fa-car"></i>
                        <?= ($course[0]->practical_time) ?> horas de clase práctica.
                    </li>
                    <li>
                        <i class="fal fa-book"></i>
                        <?= ($course[0]->theoretical_time) ?> horas de clase teórica.
                    </li>
                    <li>
                        <i class="fal fa-clock"></i>
                        <?= ($course[0]->workshop_time) ?> horas de talleres.
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="container">
        <div>
            <h3 class="center-align">Requisitos indispensables</h3>
            <div class="ul-default"><?= $requirements->render() ?></div>
        </div>
        <div id="curriculum-content">
            <h3 class="center-align">Plan de estudios</h3>
            <div class="ul-default"><?= $curriculumContent->render() ?></div>
        </div>
        <div id="graduate">
            <h3>Perfil del egresado</h3>
            <div class="ul-default"><?= $profile->render() ?></div>
        </div>
    </section>

    <section class="item-wrap">
        <div class="item">
            <h3>Contenido curricular</h3>
            <p>Conoce el contenido de cada uno de los módulos de nuestro plan de estudio.</p>
            <a class="waves-effect waves-light btn center" href="<?= DS . str_replace(WWW_ROOT, '', $course[0]->curriculum_dir) . DS . $course[0]->curriculum ?>" target="_blank"><?= __('Download content') ?></a>
        </div>
        <div class="item">
            <h3>Test de prueba</h3>
            <p>Si eres uno de nuestros estudiantes puedes tomar tu test de prueba aquí.</p>
            <?= $this->Html->link('Realizar Test', ['controller' => 'users', 'action' => 'login'], ['class' => 'waves-effect waves-light btn center']) ?>
        </div>
    </section>
    
    <section id="course-schedule">
        <h3>Consulta los horarios académicos para agendar tu clase</h3>
        <a class="waves-effect waves-light btn center" href="<?= DS . str_replace(WWW_ROOT, '', $course[0]->schedule_dir) . DS . $course[0]->schedule ?>" target="_blank"><?= 'Ver horarios' ?></a>
    </section>
</section>