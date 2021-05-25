<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gallery $gallery
 */
?>

<section class="galleries view card">
    <div class="card-content">
        <span class="card-title"><?= h($gallery->title) ?></span>
        <div class="row">
            <div class="col s12">
                <table>
                    <tr>
                        <th><?= __('Branch') ?></th>
                        <td><?= $gallery->has('branch') ? $this->Html->link($gallery->branch->name, ['controller' => 'Branches', 'action' => 'view', $gallery->branch->id]) : '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?= __('Image') ?></th>
                        <td><img class="materialboxed" src="<?= DS . str_replace(WWW_ROOT, '', $gallery->image_dir) . DS . $gallery->image ?>" alt="Image"></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($gallery->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($gallery->modified) ?></td>
                    </tr>
                </table>

            </div>
        </div>

        <div class="row">
            <div class="d-flex jc-end">
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gallery->id), 'class' => ['btn', 'cancel']]); ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gallery->id], ['class' => 'btn']) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn']) ?>
            </div>
        </div>
    </div>
</section>