<section class="content-header">
  <h1>
    Expert
    <small><?= __('Edit') ?></small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Form') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($expert, array('role' => 'form')) ?>
          <div class="box-body">
          <?php
            echo $this->Form->input('name');
            echo $this->Form->input('adress');
            echo $this->Form->input('tel');
            echo $this->Form->input('position');
            echo $this->Form->input('active');
            echo $this->Form->input('linkedin');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('team_id', ['options' => $teams, 'empty' => true]);
            echo $this->Form->input('assignements._ids', ['options' => $assignements]);
            echo $this->Form->input('meetings._ids', ['options' => $meetings]);
          ?>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save')) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>

