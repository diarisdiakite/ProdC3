<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Structures
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Structures</h3>
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
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('responsible') ?></th>
                <th><?= $this->Paginator->sort('contact') ?></th>
                <th><?= $this->Paginator->sort('focal_point_id') ?></th>
                <th><?= $this->Paginator->sort('ministry_id') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($structures as $structure): ?>
              <tr>
                <td><?= $this->Number->format($structure->id) ?></td>
                <td><?= $structure->has('user') ? $this->Html->link($structure->user->id, ['controller' => 'Users', 'action' => 'view', $structure->user->id]) : '' ?></td>
                <td><?= h($structure->name) ?></td>
                <td><?= h($structure->responsible) ?></td>
                <td><?= $this->Number->format($structure->contact) ?></td>
                <td><?= $structure->has('focal_point') ? $this->Html->link($structure->focal_point->name, ['controller' => 'FocalPoints', 'action' => 'view', $structure->focal_point->id]) : '' ?></td>
                <td><?= $structure->has('ministry') ? $this->Html->link($structure->ministry->name, ['controller' => 'Ministries', 'action' => 'view', $structure->ministry->id]) : '' ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $structure->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $structure->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $structure->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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
