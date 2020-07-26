<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact[]|\Cake\Collection\CollectionInterface $contacts
 */
$no_check = '<i class="fas fa-minus-square" style="color: gray;"></i>';
$check = '<i class="fas fa-check-square" style="color: green;"></i>';
?>

<section class="contacts index card">
    <div class="card-content">
        <span class="card-title"><?=__('Contacts') ?></span>

        <table class="centered responsive-table">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('telephone') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('course_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('branch_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('viewed') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?= h($contact->first_name) ?></td>
                    <td><?= h($contact->last_name) ?></td>
                    <td><?= h($contact->email) ?></td>
                    <td><?= h($contact->telephone) ?></td>
                    <td><?= $contact->has('course') ? $this->Html->link($contact->course->title, ['controller' => 'Courses', 'action' => 'view', $contact->course->id]) : '' ?></td>
                    <td><?= $contact->has('branch') ? $this->Html->link($contact->branch->name, ['controller' => 'Branches', 'action' => 'view', $contact->branch->id]) : '' ?></td>
                    <td><?= h($contact->created) ?></td>
                    <td>
                    <?php
                    if($contact->viewed=='0') {
                        $view_icon = $no_check;
                    }
                    else {
                        $view_icon  = $check;
                    }
                    ?>
                    <?= $view_icon ?>
                    </td>

                    <td class="actions">
                        <?= $this->Html->link('<i class="fal fa-eye"></i>', ['action' => 'view', $contact->id], ['escape' => false, 'title' => __('View')] ) ?>
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

    </div>
</section>