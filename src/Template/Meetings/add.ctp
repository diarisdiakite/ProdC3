<section class="content-header">
  <h1>
    Meeting
    <small><?= __('Add') ?></small>
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
        <?= $this->Form->create($meeting, array('role' => 'form')) ?>
          <div class="box-body">
          <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('programmation_id', ['options' => $programmations]);
            echo $this->Form->input('departments._ids', ['options' => $departments]);
            echo $this->Form->input('experts._ids', ['options' => $experts]);
            echo $this->Form->input('ministries._ids', ['options' => $ministries]);
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

