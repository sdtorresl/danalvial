<?php use nadar\quill\Lexer; ?>

<section>
    <div id="gallery">
        <div class="carousel carousel-slider center">
            <div class="carousel-fixed-item center">
                <a class="btn waves-effect white grey-text darken-text-2">button</a>
            </div>
            <div class="carousel-item red white-text" href="#one!">
                <h2>First Panel</h2>
                <p class="white-text">This is your first panel</p>
            </div>
            <div class="carousel-item amber white-text" href="#two!">
                <h2>Second Panel</h2>
                <p class="white-text">This is your second panel</p>
            </div>
            <div class="carousel-item green white-text" href="#three!">
                <h2>Third Panel</h2>
                <p class="white-text">This is your third panel</p>
            </div>
            <div class="carousel-item blue white-text" href="#four!">
                <h2>Fourth Panel</h2>
                <p class="white-text">This is your fourth panel</p>
            </div>
            <ul class="indicators"></ul>
        </div>
    </div>

    <div id="advantages_section">
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
            <a class="waves-effect waves-light btn center">Saber más de la compañia</a>
        </div>
    </div>

    <?php 
    $imagePath = str_replace(WWW_ROOT, '', $contentSection3[0]->primary_image_dir) . DS . $contentSection3[0]->primary_image;
    $imageURL = str_replace('\\', '/', $imagePath);
    ?>
    <div id="section-3" style="background-image: url('<?= $imageURL ?>');">
        <!--<p><h2 class="center-align"><?= $contentSection3[0]->title ?></h2>-->
        <?php if (is_null($contentSection3[0]->text) == FALSE) : ?>
            <!--<p><?= $contentSection3[0]->text ?></p>-->
        <?php endif; ?>
    </div>

    <div id="courses-section">
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
    </div>
</section>
