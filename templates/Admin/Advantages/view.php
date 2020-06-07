<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Advantage $advantage
 */
?>

<section class="advantages view card">
    <div class="card-content">
        <span class="card-title"><?= h($advantage->title) ?></span>
        <div class="row">
            <div class="col s12">
                <table>
                    <tr>
                        <th><?= __('Title') ?></th>
                        <td><?= h($advantage->title) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Description') ?></th>
                        <td><?= $this->h($advantage->description) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Logo') ?></th>
                        <td><?= h($advantage->logo) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($advantage->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($advantage->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="d-flex jc-end">
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $advantage->id], ['confirm' => __('Are you sure you want to delete {0}?', $advantage->id), 'class' => ['btn', 'cancel']]); ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $advantage->id], ['class' => 'btn']) ?>
            </div>
        </div>
    </div>
</section>