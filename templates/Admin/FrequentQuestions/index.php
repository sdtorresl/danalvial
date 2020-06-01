<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FrequentQuestion[]|\Cake\Collection\CollectionInterface $frequentQuestions
 */
?>

<section class="frequentQuestions index card">
    <div class="card-content">
        <span class="card-title"><?=__('Frequent Questions') ?></span>

        <table class="centered responsive-table">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('question') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($frequentQuestions as $frequentQuestion): ?>
                <tr>
                    <td><?= h($frequentQuestion->question) ?></td>
                    <td><?= h($frequentQuestion->created) ?></td>
                    <td><?= h($frequentQuestion->modified) ?></td>

                    <td class="actions">
                        <?= $this->Html->link('<i class="fal fa-eye"></i>', ['action' => 'view', $frequentQuestion->id], ['escape' => false, 'title' => __('View')] ) ?>
                        <?= $this->Html->link('<i class="fal fa-edit"></i>', ['action' => 'edit', $frequentQuestion->id], ['escape' => false, 'title' => __('Edit')] ) ?>
                        <?= $this->Form->postLink('<i class="fal fa-trash"></i>', ['action' => 'delete', $frequentQuestion->id], [
                            'confirm' => __('Are you sure you want to delete the question {0}?', $frequentQuestion->question),
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
                <?= $this->Html->link(__('Add frequentQuestion'), ['action' => 'add'], ['class' => 'btn']) ?>
            </div>
        </div>
    </div>
</section>