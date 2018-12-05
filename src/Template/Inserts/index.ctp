<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Inserts
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Inserts</h3>
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
                <th><?= $this->Paginator->sort('approved') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('structure_id') ?></th>
                <th><?= $this->Paginator->sort('planification_id') ?></th>
                <th><?= $this->Paginator->sort('ministry_id') ?></th>
                <th><?= $this->Paginator->sort('composant_id') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($inserts as $insert): ?>
              <tr>
                <td><?= $this->Number->format($insert->id) ?></td>
                <td><?= h($insert->approved) ?></td>
                <td><?= $insert->has('user') ? $this->Html->link($insert->user->id, ['controller' => 'Users', 'action' => 'view', $insert->user->id]) : '' ?></td>
                <td><?= $insert->has('structure') ? $this->Html->link($insert->structure->name, ['controller' => 'Structures', 'action' => 'view', $insert->structure->id]) : '' ?></td>
                <td><?= $insert->has('planification') ? $this->Html->link($insert->planification->title, ['controller' => 'Planifications', 'action' => 'view', $insert->planification->id]) : '' ?></td>
                <td><?= $insert->has('ministry') ? $this->Html->link($insert->ministry->name, ['controller' => 'Ministries', 'action' => 'view', $insert->ministry->id]) : '' ?></td>
                <td><?= $insert->has('composant') ? $this->Html->link($insert->composant->title, ['controller' => 'Composants', 'action' => 'view', $insert->composant->id]) : '' ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $insert->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $insert->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $insert->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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
