<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */
?>

<section class="contacts view card">
    <div class="card-content">
        <span class="card-title"><?= __('Message # '.h($contact->id)) ?></span>
        <div class="row">
            <div class="col s12">
                <table>
                    <tr>
                        <th><?= __('First Name') ?></th>
                        <td><?= h($contact->first_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Last Name') ?></th>
                        <td><?= h($contact->last_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><?= h($contact->email) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Message') ?></th>
                        <td><?= h($contact->message) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Telephone') ?></th>
                        <td><?= h($contact->telephone) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Course') ?></th>
                        <td><?= $contact->has('course') ? $this->Html->link($contact->course->title, ['controller' => 'Courses', 'action' => 'view', $contact->course->id]) : '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?= __('Branch') ?></th>
                        <td><?= $contact->has('branch') ? $this->Html->link($contact->branch->name, ['controller' => 'Branches', 'action' => 'view', $contact->branch->id]) : '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?= __('Viewed') ?></th>
                        <td><?= $this->Number->format($contact->viewed) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($contact->created) ?></td>
                    </tr>
                </table>

            </div>
        </div>

        <div class="row">
            <div class="d-flex jc-end">
                <?= $this->Html->link(__('Cancel'), ['action' => 'index', $contact->id], ['class' => ['btn', 'cancel']]) ?>
            </div>
        </div>
    </div>
</section>