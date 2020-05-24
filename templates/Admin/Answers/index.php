<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Answer[]|\Cake\Collection\CollectionInterface $answers
 */
?>

<section class="answers index card">
    <div class="card-content">
        <span class="card-title"><?=__('Answers') ?></span>

        <table class="centered responsive-table">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('questions_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('answer') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('result') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($answers as $answer): ?>
                <tr>
                                                                                <td><?= $this->Number->format($answer->id) ?></td>
                                                                            <td><?= $answer->has('question') ? $this->Html->link($answer->question->title, ['controller' => 'Questions', 'action' => 'view', $answer->question->id]) : '' ?></td>
                                                                                                            <td><?= h($answer->answer) ?></td>
                                                                                            <td><?= $this->Number->format($answer->result) ?></td>
                                                                                            <td><?= h($answer->created) ?></td>
                                                                                            <td><?= h($answer->modified) ?></td>
            
                    <td class="actions">
                        <?= $this->Html->link('<i class="fal fa-eye"></i>', ['action' => 'view', $answer->id], ['escape' => false, 'title' => __('View')] ) ?>
                        <?= $this->Html->link('<i class="fal fa-edit"></i>', ['action' => 'edit', $answer->id], ['escape' => false, 'title' => __('Edit')] ) ?>
                        <?= $this->Form->postLink('<i class="fal fa-trash"></i>', ['action' => 'delete', $answer->id], [
                            'confirm' => __('Are you sure you want to delete # {0}?', $answer->id),
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
            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
        </div>

        <div class="row">
            <div class="d-flex jc-end">
                <?= $this->Html->link(__('Add answer'), ['action' => 'add'], ['class' => 'btn']) ?>
            </div>
        </div>
    </div>
</section>