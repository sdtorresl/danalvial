<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FrequentQuestion $frequentQuestion
 */
?>

<section class="frequentQuestions view card">
    <div class="card-content">
        <span class="card-title"><?= h($frequentQuestion->question) ?></span>
        <div class="row">
            <div class="col s12">
                <table>
                    <tr>
                        <th><?= __('Answer') ?></th>
                        <td><?= h($frequentQuestion->answer) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($frequentQuestion->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($frequentQuestion->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="d-flex jc-end">
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $frequentQuestion->id], ['confirm' => __('Are you sure you want to delete the question {0}?', $frequentQuestion->question), 'class' => ['btn', 'cancel']]); ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $frequentQuestion->id], ['class' => 'btn']) ?>
            </div>
        </div>
    </div>
</section>