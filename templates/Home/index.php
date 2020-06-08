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

    <div id="advantages_section" class="container">
        <h2 class="center-align"><?= __('Why choose us?') ?></h2>
        <div id="advantage_items">
        <?php foreach ($advantages as $advantage): ?>
            <div class="advantage_item">
                <i class="<?= $advantage->logo ?>"></i>
                <h3><?= h($advantage->title) ?></h3>
                <p><?php $description = new Lexer($advantage->description);?>
                <?= $description->render() ?>
                </p>
            </div>
        <?php endforeach; ?>
        </div>
        <a class="waves-effect waves-light btn center-align">Saber más de la compañia</a>
    </div>

</section>
