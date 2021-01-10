<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BranchesHistory $branchesHistory
 */
?>

<section class="branchesHistories view card">
    <div class="card-content">
        <span class="card-title"><?= h($branchesHistory->title) ?></span>
        <div class="row">
            <div class="col s12">
                <table>
                    <tr>
                        <th><?= __('Branch') ?></th>
                        <td><?= $branchesHistory->has('branch') ? $this->Html->link($branchesHistory->branch->name, ['controller' => 'Branches', 'action' => 'view', $branchesHistory->branch->id]) : '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($branchesHistory->text) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($branchesHistory->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($branchesHistory->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="d-flex jc-end">
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $branchesHistory->id], ['confirm' => __('Are you sure you want to delete {0}?', $branchesHistory->title), 'class' => ['btn', 'cancel']]); ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $branchesHistory->id], ['class' => 'btn']) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn']) ?>
            </div>
        </div>
    </div>
</section>