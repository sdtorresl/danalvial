<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Social $social
 */
?>

<section class="socials view card">
    <div class="card-content">
        <span class="card-title"><?= h($social->name) ?></span>
        <div class="row">
            <div class="col s12">
                <table>
                    <tr>
                        <th><?= __('Link') ?></th>
                        <td><?= h($social->link) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($social->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($social->modified) ?></td>
                    </tr>
                </table>

            </div>
        </div>

        <div class="row">
            <div class="d-flex jc-end">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $social->id], ['class' => 'btn']) ?>
            </div>
        </div>
    </div>
</section>