<section id="test-results" style="background: url('/img/mask_4.png');  background-repeat: no-repeat;">
    <table class="table-style">
        <caption>
            <div id="result-title">Tus Resultados</div>
        </caption>
        <tr>
            <th class="center">Módulos evaluados</th>
            <th class="center">Resultados</th>
        </tr>
        <?php foreach ($categoryResults as $key => $categoryResult): ?>
        <tr>
            <td>Módulo <?= $key ?> : <?= $categoryResult->category ?></td>
            <td class="center"><?= $categoryResult->correct ?> / <?= $categoryResult->total ?></td>
        </tr>
        <?php endforeach; ?>
        <tr class="test-total">
            <td class="right test-total">TOTAL</td>
            <?php if (!empty($percentageResult)) : ?>
            <td class="center test-total"><?= $percentageResult ?>%</td>
            <?php endif; ?>
        </tr>
    </table>
</section>
