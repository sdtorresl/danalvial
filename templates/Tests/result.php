<section id="test-results" style="background: url('/img/mask_4.png');  background-repeat: no-repeat;">
    <table class="table-style">
        <caption>
            <div id="result-title">Tus Resultados</div>
        </caption>
        <tr>
            <th class="center">Módulos evaluados</th>
            <th class="center">Resultados</th>
        </tr>
        <?php foreach ($testResults as $key => $testResult): ?>
        <tr>
            <td>Módulo <?= $key ?> : <?= $testResult->category ?></td>
            <td class="center"><?= $testResult->correct ?> / <?= $testResult->total ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</section>
