<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 */
?>

<section class="contents view card">
    <div class="card-content">
        <span class="card-title"><?= h($content->title) ?></span>
        <div class="row">
            <div class="col s12">
                <table>
                    <tr>
                        <th><?= __('Branch') ?></th>
                        <td><?= $content->has('branch') ? $this->Html->link($content->branch->name, ['controller' => 'Branches', 'action' => 'view', $content->branch->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Identifier') ?></th>
                        <td><?= h($identifiers[$content->identifier]) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Title') ?></th>
                        <td><?= h($content->title) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Text') ?></th>
                        <td><?= h($content->text) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Primary Image') ?></th>
                        <td><img class="materialboxed" src="<?= str_replace(WWW_ROOT, '', $content->primary_image_dir) . DS . $content->primary_image ?>" alt="Image_1"></td>
                    </tr>
                    <tr>
                        <th><?= __('Secondary Image') ?></th>
                        <td><img class="materialboxed" src="<?= str_replace(WWW_ROOT, '', $content->secondary_image_dir) . DS . $content->secondary_image ?>" alt="Image_2"></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($content->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($content->modified) ?></td>
                    </tr>
                </table>

            </div>
        </div>

        <div class="row">
            <div class="d-flex jc-end">
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $content->id], ['confirm' => __('Are you sure you want to delete # {0}?', $content->id), 'class' => ['btn', 'cancel']]); ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $content->id], ['class' => 'btn']) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn']) ?>
            </div>
        </div>
    </div>
</section>