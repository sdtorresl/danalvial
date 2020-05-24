<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Branch $branch
 */
?>

<section class="branches view card">
    <div class="card-content">
        <span class="card-title"><?= h($branch->name) ?></span>
        <div class="row">
            <div class="col s12">
                <table>
                    <tr>
                        <th><?= __('Name') ?></th>
                        <td><?= h($branch->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Image') ?></th>
                        <td><?= h($branch->image) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Address') ?></th>
                        <td><?= h($branch->address) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Contact Number 1') ?></th>
                        <td><?= h($branch->contact_number_1) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Contact Number 2') ?></th>
                        <td><?= h($branch->contact_number_2) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Schedule') ?></th>
                        <td><?= h($branch->schedule) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Location') ?></th>
                        <td><?= h($branch->location) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($branch->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($branch->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="d-flex jc-end">
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $branch->id], ['confirm' => __('Are you sure you want to delete the branche {0}?', $branch->name), 'class' => ['btn', 'cancel']]); ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $branch->id], ['class' => 'btn']) ?>
            </div>
        </div>
    </div>
</section>