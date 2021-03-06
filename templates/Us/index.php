<?= $this->Html->script('/node_modules/aos/dist/aos.js') ?>
<?= $this->Html->css('/node_modules/aos/dist/aos.css') ?>

<div id="us">
     <section id="history">
          <div class="container">
               <?php foreach ($histories as $history): ?>
               <div class="history_box z-depth-2" data-aos="zoom-in-up" >
                    <h3><?= $history->title ?></h3>
                    <p><?= $history->text ?></p>
               </div>
               <?php endforeach; ?>
          </div>
          <div id='welcome-banner'></div>
     </section>

     <section id="branches">
          <h2 class="center-align white-text"><?= __('Our branches') ?></h2>
          <div class="item-wrap">
               <?php foreach ($branches as $branch): ?>
               <div class="item">
                    <h3>Sede <?= $branch->location ?></h3>
                    <p>Danalvial Escuela de Conducción Automovilistica </p>
                    <div>
                         <ul>
                              <li>
                                   <i class="fal fa-motorcycle"></i>
                                   <?= $branch->address ?>
                              </li>
                              <li>
                                   <i class="fal fa-phone"></i>
                                   <?= $branch->contact_number_1 ?>
                              </li>
                              <li>
                                   <i class="fal fa-clock"></i>
                                   <?= $branch->schedule ?>
                              </li>
                         </ul>
                    </div>
               </div>
               <?php endforeach; ?>
          </div>
     </section>
</div>


<script type="text/javascript">
     AOS.init();
</script>
