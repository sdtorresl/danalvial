<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Advantage $advantage
 */

use nadar\quill\Lexer;

$description = new Lexer($advantage->description);

?>

<?= $this->Html->css('https://fonts.googleapis.com/icon?family=Material+Icons') ?>

<section class="advantages view card">
    <div class="card-content">
        <span class="card-title"><?= h($advantage->title) ?></span>
        <div class="row">
            <div class="col s12">
                <table>
                    <tr>
                        <th><?= __('Branch') ?></th>
                        <td><?= $advantage->has('branch') ? $this->Html->link($advantage->branch->name, ['controller' => 'Branches', 'action' => 'view', $advantage->branch->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Title') ?></th>
                        <td><?= h($advantage->title) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Description') ?></th>
                        <td class="ul-default"><?= $description->render() ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Logo') ?></th>
                        <td><i class="material-icons"><?= $advantage->logo ?></i></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($advantage->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($advantage->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="d-flex jc-end">
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $advantage->id], ['confirm' => __('Are you sure you want to delete {0}?', $advantage->title), 'class' => ['btn', 'cancel']]); ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $advantage->id], ['class' => 'btn']) ?>
                <?= $this->Html->link(__('Cancel'), ['controller' => 'advantages', 'action' => 'index'], ['class' => ['btn']]) ?>
            </div>
        </div>
    </div>
</section>