<section id="courses-section">
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