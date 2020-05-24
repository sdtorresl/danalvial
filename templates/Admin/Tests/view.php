<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Test $test
 */
?>

<section class="tests view card">
    <div class="card-content">
        <span class="card-title"><?= h($test->name) ?></span>
        <div class="row">
            <div class="col s12">
                <table>
                    <tr>
                        <th><?= __('Branch') ?></th>
                        <td><?= $test->has('branch') ? $this->Html->link($test->branch->name, ['controller' => 'Branches', 'action' => 'view', $test->branch->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Name') ?></th>
                        <td><?= h($test->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Description') ?></th>
                        <td><?= h($test->description) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($test->created) ?></td>
                    </tr>
                </table>

                <div class="related">
                    <h4><?= __('Related Questions') ?></h4>
                    <?php if (!empty($test->questions)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Question') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($test->questions as $questions) : ?>
                            <tr>
                                <td><?= h($questions->question) ?></td>
                                <td><?= h($questions->created) ?></td>
                                <td><?= h($questions->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Questions', 'action' => 'view', $questions->id]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="d-flex jc-end">
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $test->id], ['confirm' => __('Are you sure you want to delete  the test {0}?', $test->name), 'class' => ['btn', 'cancel']]); ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $test->id], ['class' => 'btn']) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'index', $user->id], ['class' => 'btn']) ?>
            </div>
        </div>
    </div>
</section>