<section id="frequent-questions" style="background: url('/img/mask_4.png');  background-repeat: no-repeat;">
    <div class="container">
        <div class="content-section row">
            <div class="col s12 m7 l6">
                <div>
                    <h2><?= $contentFrequentQuestions[0]->title ?></h2>
                    <p><?= $contentFrequentQuestions[0]->text ?></p>
                </div>
                <ul class="collapsible">
                    <?php foreach ($questions as $question): ?>
                    <li>
                    <div class="collapsible-header"><?= $question->question ?></div>
                    <div class="collapsible-body"><span><?= $question->answer ?></span></div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php 
            $imagePath = str_replace(WWW_ROOT, '', $contentFrequentQuestions[0]->primary_image_dir) . DS;
            $imageURL = str_replace('\\', '/', $imagePath);
            ?>
            <div id="" class="content-image col s12 m5 l6" style="background: url('<?= $imageURL . $contentFrequentQuestions[0]->primary_image ?>');
            background-size: 100% auto;
            background-repeat: no-repeat;
            background-position: 0 95px;">
            </div>
        </div>
    </div>
</section>
