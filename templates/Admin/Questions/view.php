<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */
?>

<section class="questions view card">
    <div class="card-content">
        <span class="card-title"><?= h($question->title) ?></span>
        <div class="row">
            <div class="col s12">
                <table>
                    <tr>
                        <th><?= __('Test') ?></th>
                        <td><?= $question->has('test') ? $this->Html->link($question->test->name, ['controller' => 'Tests', 'action' => 'view', $question->test->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Question') ?></th>
                        <td><?= h($question->question) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Category') ?></th>
                        <td><?= h($question->category) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Title') ?></th>
                        <td><?= h($question->title) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Image') ?></th>
                        <td><img class="materialboxed" src="<?= str_replace(WWW_ROOT, '', $question->image_dir) . DS . $question->image ?>" alt="Course Image"></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($question->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($question->modified) ?></td>
                    </tr>
                </table>

            </div>
        </div>

        <div class="row">
            <div class="d-flex jc-end">
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete the question {0}?', $question->question), 'class' => ['btn', 'cancel']]); ?>
                <?= $this->Html->link(__('Cancel'), ['controller' => 'Tests', 'action' => 'view', $question->test_id], ['class' => 'btn']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $question->id], ['class' => 'btn']) ?>
                <?= $this->Html->link(__('Add Answer'), ['controller' => 'Answers', 'action' => 'add', $question->id], ['class' => 'btn']) ?>
            </div>
        </div>
    </div>
</section>
