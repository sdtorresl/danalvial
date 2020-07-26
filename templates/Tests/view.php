<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Test $test
 */

$this->loadHelper('Form', [
    'templates' => 'MaterializeTheme.materialize_form',
]);
?>

<section id="test" style="background: url('/img/mask_4.png');  background-repeat: no-repeat;">
    <div class="container">
        <div class="test-item z-depth-3">
            <div class="test-title"><?= $test->name ?></div>
            <p><?= $test->description ?></p>
        </div>
        <form action="/tests/result/<?= $test->id ?>" method="post">
            <div style="display:none;">
                <input type="hidden" name="_csrfToken" autocomplete="off" value="<?= $token ?>">
            </div>
            <?php if (!empty($test->questions)) : ?>
            <?php foreach ($test->questions as $questions) : ?>
                <?php if (!empty($questions->answers)) : ?>
                <div class="test-item z-depth-3">
                    <div>
                        <div class="question">
                            <?= h($questions->question) ?>
                        </div>
                        <div>
                            <?php if (!empty($questions->image)) : ?>
                            <img class="materialboxed"
                                src="<?= str_replace(WWW_ROOT, '', $questions->image_dir) . DS . $questions->image ?>"
                                alt="Image">
                            <?php endif; ?>
                        </div>
                    </div>
                <div>
                    <?php foreach ($questions->answers as $answers) : ?>
                        <p>
                            <label>
                                <input name="<?= $questions->id ?>" type="radio" value="<?= $questions->id ?>_<?= $answers->id ?>" required/>
                                <span><?= $answers->answer ?></span>
                            </label>
                        </p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php endif; ?>
            <div class="test-button">
                <button class="btn" type="submit">Enviar respuestas</button>
            </div>
       </form>
    </div>
</section>



<script>


</script>
