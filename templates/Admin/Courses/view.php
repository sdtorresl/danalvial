<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */
?>

<section class="courses view card">
    <div class="card-content">
        <span class="card-title"><?= h($course->title) ?></span>
        <div class="row">
            <div class="col s12">
                <table>
                    <tr>
                        <th><?= __('Branch') ?></th>
                        <td><?= $course->has('branch') ? $this->Html->link($course->branch->name, ['controller' => 'Branches', 'action' => 'view', $course->branch->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Title') ?></th>
                        <td><?= h($course->title) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Short Description') ?></th>
                        <td><?= h($course->short_description) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Long Description') ?></th>
                        <td><?= h($course->long_description) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Category') ?></th>
                        <td><?= h($course->category) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Type') ?></th>
                        <td><?= h($course->type) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Schedule') ?></th>
                        <td><?= h($course->schedule) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Medical Exam') ?></th>
                        <td><?= h($course->medical_exam) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Requirements') ?></th>
                        <td><?= h($course->requirements) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Price') ?></th>
                        <td><?= $this->Number->format($course->price) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($course->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($course->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="d-flex jc-end">
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete the course {0}?', $course->title), 'class' => ['btn', 'cancel']]); ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $course->id], ['class' => 'btn']) ?>
            </div>
        </div>
    </div>
</section>