<section class="content-header">
  <h1>
    Structure
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
        <?= $this->Form->create($structure, array('role' => 'form')) ?>
          <div class="box-body">
          <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('name');
            echo $this->Form->input('responsible');
            echo $this->Form->input('contact');
            echo $this->Form->input('focal_point_id', ['options' => $focalPoints]);
            echo $this->Form->input('ministry_id', ['options' => $ministries]);
            echo $this->Form->input('department_id', ['options' => $departments]);
            echo $this->Form->input('active');
            echo $this->Form->input('activations._ids', ['options' => $activations]);
            echo $this->Form->input('inquiry_databases._ids', ['options' => $inquiryDatabases]);
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

