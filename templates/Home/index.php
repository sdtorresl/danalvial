<?php use nadar\quill\Lexer; ?>

<section>
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
            <div class="advantage_item">
                <i class="<?= $advantage->logo ?>"></i>
                <h3><?= h($advantage->title) ?></h3>
                <?php $description = new Lexer($advantage->description);?>
                <?= $description->render() ?>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="advantages-button">
            <a class="waves-effect waves-light btn center"><?= __('Know mor about the company') ?></a>
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

    <?php 
    $imagePath = str_replace(WWW_ROOT, '', $contentSection5[0]->primary_image_dir) . DS;
    $imageURL = str_replace('\\', '/', $imagePath);
    ?>
    <section id="section-5" class="row">
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
