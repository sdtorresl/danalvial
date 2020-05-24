<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Answer $answer
 */
?>

<section class="answers view card">
    <div class="card-content">
        <span class="card-title"><?= h($answer->id) ?></span>
        <div class="row">
            <div class="col s12">
                <table>
                                                                                                    <tr>
                        <th><?= __('Question') ?></th>
                        <td><?= $answer->has('question') ? $this->Html->link($answer->question->title, ['controller' => 'Questions', 'action' => 'view', $answer->question->id]) : '' ?>
                        </td>
                    </tr>
                                                                                <tr>
                        <th><?= __('Answer') ?></th>
                        <td><?= h($answer->answer) ?></td>
                    </tr>
                                                                                                                                            <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($answer->id) ?></td>
                    </tr>
                                        <tr>
                        <th><?= __('Result') ?></th>
                        <td><?= $this->Number->format($answer->result) ?></td>
                    </tr>
                                                                                                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($answer->created) ?></td>
                    </tr>
                                        <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($answer->modified) ?></td>
                    </tr>
                                                                            </table>
                
                                            </div>
        </div>
        
        <div class="row">
            <div class="d-flex jc-end">
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $answer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $answer->id), 'class' => ['btn', 'cancel']]); ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $answer->id], ['class' => 'btn']) ?>
            </div>
        </div>
    </div>
</section>