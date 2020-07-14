<?php use nadar\quill\Lexer; ?>

<section id="home-page">
    <section id="gallery-section">
        <div class="carousel carousel-slider center">
            <div class="carousel-fixed-item center">
                
            </div>
            <?php foreach ($gallery as $gallery): ?>
            <?php 
            $galleryImagePath = str_replace(WWW_ROOT, '', $gallery->image_dir) . DS;
            $galleryImageURL = str_replace('\\', '/', $galleryImagePath);
            ?>
            <div class="carousel-item white-text" style="background: url('<?= $galleryImageURL . $gallery->image ?>') center center; background-size: cover;">
                <div style="background-image: url('/img/mask_1.png');
                    height: 100%;
                    background-repeat: no-repeat;
                    background-position: bottom right;
                    background-size: 40% auto;">
                    <div class="carousel-content left-align container">
                        <div class="row">
                            <h2 class="col m10"><?= $gallery->title ?></h2>
                        </div>
                        <?= $this->Html->link(__('View categories'), ['controller' => 'courses', 'action' => 'index'], ['class' => 'waves-effect waves-light btn center']) ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <ul class="indicators"></ul>
        </div>
    </section>

    <section id="advantages-section">
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

    <section id="video-section">
        <?= $this->Html->media('road-video.mp4', ['pathPrefix' => 'img/', ['autoplay'], 'width' => "100%"]) ?>
        <div id="video-title">
            <div id="video-title-pseudo">
                <h2>¿Quieres aprender<br> a conducir?</h2>
            </div>
        </div>
    </section>

    <section id="query-section">
            <div class="query-item">
                <h2>Consulta datos sobre tu licencia de conducción ante el RUNT</h2>
                <p>Consulta este módulo que te permitirá conocer datos específicos sobre tu licencia de conducción, sus certificaciones y otros documentos relacionados con tu información como conductor ante el RUNT.</p>
                <a class="waves-effect waves-light btn center" href="https://www.runt.com.co/consultaCiudadana/#/consultaPersona" target="_blank"><?= __('Check RUNT') ?></a>
            </div>
            <div class="query-item">
                <h2>Consulta de comparendos, multas e infracciones de tránsito</h2>
                <p>Consulta la información sobre multas por comparendos e infracciones a las normas de tránsito. Esta consulta es requisito para la obtención de tu licencia de conducción.</p>
                <a class="waves-effect waves-light btn center" href="https://consulta2.simit.org.co/Simit/" target="_blank"><?= __('Check comparendo') ?></a>
            </div>
    </section>

    <?= $this->element('courses') ?>

    <?= $this->element('reinforcement') ?>

    <section id="" class="content-section row">
        <?php 
        $imagePath = str_replace(WWW_ROOT, '', $contentHome[0]->primary_image_dir) . DS;
        $imageURL = str_replace('\\', '/', $imagePath);
        ?>
        <div id="" class="content-image col s12 m5 l6" style="background: url('<?= $imageURL . $contentHome[0]->primary_image ?>') center center; background-size: cover;">
            <div class="mask" style="background-image: url('/img/mask_2.png');
                    height: 100%;
                    background-repeat: no-repeat;"></div>
        </div>
        <div id="" class="content col s12 m7 l6">
            <div id="" class="content-text container">
                <h2><?= $contentHome[0]->title ?></h2>
                <p><?= $contentHome[0]->text ?></p>
                <a class="waves-effect waves-light btn center"><?= __('Take a theoretical test') ?></a>
            </div>
        </div>
    </section>
</section>
