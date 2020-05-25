<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<section class="users view card">
    <div class="card-content">
        <span class="card-title"><?= h($user->first_name)?> <?= h($user->last_name)?></span>
        <div class="row">
            <div class="col s12">
                <table>
                    <tr>
                        <th><?= __('First Name') ?></th>
                        <td><?= h($user->first_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Last Name') ?></th>
                        <td><?= h($user->last_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><?= h($user->email) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Rol') ?></th>
                        <td><?= $roles[$user->rol] ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($user->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($user->modified) ?></td>
                    </tr>
                </table>

            </div>
        </div>

        <div class="row">
            <div class="d-flex jc-end">
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete the user {0}?', $user->first_name . " " . $user->last_name), 'class' => ['btn', 'cancel']]); ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn']) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'index', $user->id], ['class' => 'btn']) ?>
            </div>
        </div>
    </div>
</section>