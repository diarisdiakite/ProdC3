<section class="content-header">
  <h1>
    Department
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
        <?= $this->Form->create($department, array('role' => 'form')) ?>
          <div class="box-body">
          <?php
            echo $this->Form->input('ministry_id', ['options' => $ministries]);
            echo $this->Form->input('title');
            echo $this->Form->input('mission');
            echo $this->Form->input('description');
            echo $this->Form->input('inquiry_databases._ids', ['options' => $inquiryDatabases]);
            echo $this->Form->input('meetings._ids', ['options' => $meetings]);
            echo $this->Form->input('project_actions._ids', ['options' => $projectActions]);
            echo $this->Form->input('trainings._ids', ['options' => $trainings]);
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

