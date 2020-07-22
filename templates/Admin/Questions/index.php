<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question[]|\Cake\Collection\CollectionInterface $questions
 */
?>

<section class="questions index card">
    <div class="card-content">
        <span class="card-title"><?=__('Questions') ?></span>

        <table class="centered responsive-table">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('test_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('question') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($questions as $question): ?>
                <tr>
                    <td><?= $question->has('test') ? $this->Html->link($question->test->name, ['controller' => 'Tests', 'action' => 'view', $question->test->id]) : '' ?></td>
                    <td><?= h($question->question) ?></td>
                    <td><?= h($question->category) ?></td>
                    <td><?= h($question->created) ?></td>
                    <td><?= h($question->modified) ?></td>

                    <td class="actions">
                        <?= $this->Html->link('<i class="fal fa-eye"></i>', ['action' => 'view', $question->id], ['escape' => false, 'title' => __('View')] ) ?>
                        <?= $this->Html->link('<i class="fal fa-edit"></i>', ['action' => 'edit', $question->id], ['escape' => false, 'title' => __('Edit')] ) ?>
                        <?= $this->Form->postLink('<i class="fal fa-trash"></i>', ['action' => 'delete', $question->id], [
                            'confirm' => __('Are you sure you want to delete the question {0}?', $question->question),
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
                <?= $this->Html->link(__('Add question'), ['action' => 'add'], ['class' => 'btn']) ?>
            </div>
        </div>
    </div>
</section>