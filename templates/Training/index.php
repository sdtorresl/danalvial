<section id="training-page">
    <section id="" class="content-section row">
        <?php 
        $imagePath = str_replace(WWW_ROOT, '', $contentSection[0]->primary_image_dir) . DS;
        $imageURL = str_replace('\\', '/', $imagePath);
        ?>
        <div id="" class="content-image col s12 m5 l6"
            style="background: url('<?= $imageURL . $contentSection[0]->primary_image ?>') center center; background-size: cover;">
        </div>
        <div id="" class="content col s12 m7 l6">
            <div id="" class="content-text container">
                <h2><?= $contentSection[0]->title ?></h2>
                <p><?= $contentSection[0]->text ?></p>
            </div>
        </div>
    </section>
    
    <section id="step-by-step-section" class="container">
        <p class="center-align">Paso a paso para obtener tu licencia de conducción</p>
        <div class="row">
            <div class="step-item col s12 m6 l3">
                <i class="far fa-list"></i>
                <h3>Cumple los requisitos</h3>
                <p>Para empezar debes cumplir con los requisitos enuciados anteriormente.</p>
            </div>
            <div class="step-item col s12 m6 l3">
                <i class="far fa-clipboard-check"></i>
                <h3>Matrículate</h3>
                <p>Realiza la inscripción de tu matrícula en el centro de enseñanza automovilística. *A partir de la fecha de matrícula el curso tendrá una vigencia de 90 días. </p>
            </div>
            <div class="step-item col s12 m6 l3">
                <i class="far fa-calendar-check"></i>
                <h3>Programa tus clases</h3>
                <p>Programa tus clases con nuestras coordinadoras académicas</p>
            </div>
            <div class="step-item col s12 m6 l3">
                <i class="far fa-print"></i>
                <h3>Imprime tu licencia</h3>
                <p>Imprime tu licencia de conducción en la entidad de tránsito correspondiente.</p>
            </div>
        </div>
    </section>
</section>  