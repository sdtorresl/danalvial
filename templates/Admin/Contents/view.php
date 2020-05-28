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
                        <th><?= __('Identifier') ?></th>
                        <td><?= h($content->identifier) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Title') ?></th>
                        <td><?= h($content->title) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Primary Image') ?></th>
                        <td><?= h($content->primary_image) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Secondary Image') ?></th>
                        <td><?= h($content->secondary_image) ?></td>
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
                <div class="text">
                    <strong><?= __('Text') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($content->text)); ?>
                    </blockquote>
                </div>

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