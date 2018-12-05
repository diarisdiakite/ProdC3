<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Trainings
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Trainings</h3>
          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm"  style="width: 180px;">
                <input type="text" name="search" class="form-control" placeholder="<?= __('Fill in to start search') ?>">
                <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="submit"><?= __('Filter') ?></button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('project_action_id') ?></th>
                <th><?= $this->Paginator->sort('ministry_id') ?></th>
                <th><?= $this->Paginator->sort('sector_id') ?></th>
                <th><?= $this->Paginator->sort('leash_id') ?></th>
                <th><?= $this->Paginator->sort('job_employment_id') ?></th>
                <th><?= $this->Paginator->sort('type_id') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($trainings as $training): ?>
              <tr>
                <td><?= $this->Number->format($training->id) ?></td>
                <td><?= $training->has('project_action') ? $this->Html->link($training->project_action->title, ['controller' => 'ProjectActions', 'action' => 'view', $training->project_action->id]) : '' ?></td>
                <td><?= $this->Number->format($training->ministry_id) ?></td>
                <td><?= $training->has('sector') ? $this->Html->link($training->sector->title, ['controller' => 'Sectors', 'action' => 'view', $training->sector->id]) : '' ?></td>
                <td><?= $training->has('leash') ? $this->Html->link($training->leash->title, ['controller' => 'Leashes', 'action' => 'view', $training->leash->id]) : '' ?></td>
                <td><?= $training->has('job_employment') ? $this->Html->link($training->job_employment->title, ['controller' => 'JobEmployments', 'action' => 'view', $training->job_employment->id]) : '' ?></td>
                <td><?= $training->has('type') ? $this->Html->link($training->type->name, ['controller' => 'Types', 'action' => 'view', $training->type->id]) : '' ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $training->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $training->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $training->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            <?php echo $this->Paginator->numbers(); ?>
          </ul>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<!-- /.content -->
