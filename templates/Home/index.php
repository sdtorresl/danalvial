<?php use nadar\quill\Lexer; ?>

<section id="home-page">
    <section id="section-1">
        <div class="carousel carousel-slider center">
            <div class="carousel-fixed-item center">
                <a class="waves-effect waves-light btn center"><?= __('View categories') ?></a>
            </div>
            <div class="carousel-item white-text" href="#one!">
                <div class="carousel-content left-align container">
                    <div class="row">
                        <h2 class="col m10"> Expertos en personas nerviosas</h2>
                        <p class="col m9 white-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                    </div>
                    <a class="waves-effect waves-light btn center"><?= __('View categories') ?></a>
                </div>
            </div>
            <div class="carousel-item white-text" href="#two!">
                <h2>Expertos en personas nerviosas</h2>
                <p class="white-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
            </div>
            <div class="carousel-item white-text" href="#three!">
                <h2>Expertos en personas nerviosas</h2>
                <p class="white-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.l</p>
            </div>
            <div class="carousel-item white-text" href="#four!">
                <h2>Expertos en personas nerviosas</h2>
                <p class="white-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
            </div>
            <ul class="indicators"></ul>
        </div>
    </section>

    <section id="section-2">
        <h2 class="center-align"><?= __('Why choose us?') ?></h2>
        <div id="advantages">
            <?php foreach ($advantages as $advantage): ?>
            <div class="advantage_item white-text">
                <div class="icon">
                    <i class="<?= $advantage->logo ?>"></i>
                </div>
                <div class="advantage-content">
                    <h3><?= h($advantage->title) ?></h3>
                    <?php $description = new Lexer($advantage->description);?>
                    <?= $description->render() ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <?php 
    //$imagePath = str_replace(WWW_ROOT, '', $contentSection3[0]->primary_image_dir) . DS . $contentSection3[0]->primary_image;
    //$imageURL = str_replace('\\', '/', $imagePath);
    ?>
    <section id="section-3" style="background-image: url('<?= $imageURL ?>');">
        <!--<p><h2 class="center-align"><?= $contentSection3[0]->title ?></h2>-->
        <!--<?php if (is_null($contentSection3[0]->text) == FALSE) : ?>-->
            <!--<p><?= $contentSection3[0]->text ?></p>-->
        <!--<?php endif; ?>-->
    </section>

    <section id="section-4">
            <div class="query-item">
                <h2>Consulta datos sobre tu licencia de conducción ante el RUNT</h2>
                <p>Consulta este módulo que te permitirá conocer datos específicos sobre tu licencia de conducción, sus certificaciones y otros documentos relacionados con tu información como conductor ante el RUNT.</p>
                <a class="waves-effect waves-light btn center"><?= __('Check RUNT') ?></a>
            </div>
            <div class="query-item">
                <h2>Consulta de comparendos, multas e infracciones de tránsito</h2>
                <p>Consulta la información sobre multas por comparendos e infracciones a las normas de tránsito. Esta consulta es requisito para la obtención de tu licencia de conducción.</p>
                <a class="waves-effect waves-light btn center"><?= __('Check comparendo') ?></a>
            </div>
    </section>

    <section id="section-5">
        <h3 id="course-header" class="center-align"><?=__('Discover the category you need')?></h3>
        <div id="courses">
            <?php foreach ($courses as $course) :?>
            <div class="course_item">
                <div class="course_content">
                    <h3 class="category center-align"><?= ($course->category) ?></h3>
                    <h2><?= ($course->title) ?></h2>
                    <p><?= ($course->short_description) ?></p>
                    <ul>
                        <li>
                            <i class="fal fa-car"></i>
                            <?= ($course->practical_time) ?> horas de clase práctica.
                        </li>
                        <li>
                            <i class="fal fa-book"></i>
                            <?= ($course->theoretical_time) ?> horas de clase teórica.
                        </li>
                        <li>
                            <i class="fal fa-clock"></i>
                            <?= ($course->workshop_time) ?> horas de talleres.
                        </li>
                    </ul>
                </div>
                <div class="course-button">
                    <a class="waves-effect waves-light btn center">Ver más información</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="section-6" class="container">
        <div id="reinforcement">
            <div id="reinforcement-time">
                <i class="fal fa-clock"></i>
                <p>2h - 4h - 6h - 8h - 10h</p>
            </div>
            <div id="reinforcement-info">
                <h2>Clases de refuerzo</h2>
                <p>En Danalvial pensamos en tu seguridad, contamos con diferentes paquetes de horas para que refuerces tus habilidades y conocimientos asociados a la conducción.</p>
                <ul class="browser-default">
                    <li>Horas en vías de la ciudad y en la pista. Rutas adaptadas para cumplir con el propósito diseñado.</li>
                    <li>Directamente con carros del centro de enseñanza. Garantía de aprendizaje.</li>
                    <li>Tú eliges que temas ver de acuerdo con tus dificultades.</li>
                </ul>
            </div>
        </div>
    </section>

    <section id="section-7" class="row">
        <?php 
        $imagePath = str_replace(WWW_ROOT, '', $contentSection5[0]->primary_image_dir) . DS;
        $imageURL = str_replace('\\', '/', $imagePath);
        ?>
        <div id="image" class="col s12 m5 l6" style="background: url('<?= $imageURL . $contentSection5[0]->primary_image ?>') center center; background-size: cover;">
        </div>
        <div id="content" class="col s12 m7 l6">
            <div id="content-text" class="container">
                <h2><?= $contentSection5[0]->title ?></h2>
                <p><?= $contentSection5[0]->text ?></p>
                <a class="waves-effect waves-light btn center"><?= __('Take a theoretical test') ?></a>
            </div>
        </div>
    </section>
</section>
