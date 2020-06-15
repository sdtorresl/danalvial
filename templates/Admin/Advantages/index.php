<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Advantage[]|\Cake\Collection\CollectionInterface $advantages
 */
?>

<section class="advantages index card">
    <div class="card-content">
        <span class="card-title"><?=__('Advantages') ?></span>

        <table class="centered responsive-table">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('logo') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($advantages as $advantage): ?>
                <tr>
                    <td><?= h($advantage->title) ?></td>
                    <td><?= h($advantage->logo) ?></td>
                    <td><?= h($advantage->created) ?></td>
                    <td><?= h($advantage->modified) ?></td>

                    <td class="actions">
                        <?= $this->Html->link('<i class="fal fa-eye"></i>', ['action' => 'view', $advantage->id], ['escape' => false, 'title' => __('View')] ) ?>
                        <?= $this->Html->link('<i class="fal fa-edit"></i>', ['action' => 'edit', $advantage->id], ['escape' => false, 'title' => __('Edit')] ) ?>
                        <?= $this->Form->postLink('<i class="fal fa-trash"></i>', ['action' => 'delete', $advantage->id], [
                            'confirm' => __('Are you sure you want to delete {0}?', $advantage->id),
                            'escape' => false,
                            'class' => 'delete',
                            'title' => __('Delete')]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="paginator center-align">
            <ul class="pagination">
                <?= $this->Paginator->first('<<') ?>
                <?= $this->Paginator->prev('<') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('>') ?>
                <?= $this->Paginator->last('>>') ?>
            </ul>
            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
            </p>
        </div>

        <div class="row">
            <div class="d-flex jc-end">
                <?= $this->Html->link(__('Add advantage'), ['action' => 'add'], ['class' => 'btn']) ?>
            </div>
        </div>
    </div>
</section>