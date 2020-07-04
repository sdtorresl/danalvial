<?= $this->Html->script('/node_modules/aos/dist/aos.js') ?>
<?= $this->Html->css('/node_modules/aos/dist/aos.css') ?>


<div data-aos="fade-up">
     Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore inventore odit optio tenetur distinctio sapiente voluptatibus asperiores unde vel delectus dolores iusto nulla, molestiae ipsum omnis quisquam modi? Corporis, fugiat!
</div>




<div data-aos="fade-up">
     Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur unde ipsam sint doloremque minus. Eveniet eligendi hic dolorem delectus pariatur expedita aspernatur cumque animi ab quibusdam laboriosam, provident corporis repellat.
</div>



<div data-aos="fade-up">
     Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur voluptas itaque aspernatur ullam. Necessitatibus assumenda doloribus sed modi. Optio accusantium molestiae tenetur provident illum dolorem ratione quibusdam odit distinctio facilis.
</div>



<div data-aos="fade-up">
     Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident minima assumenda veniam odio nulla deleniti soluta suscipit reprehenderit optio atque consectetur obcaecati, ratione tenetur magnam tempora repellendus esse vitae animi.
</div>


<div id="us">
     <section id="story">
     
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
                                   <i class="fal fa-book"></i>
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
