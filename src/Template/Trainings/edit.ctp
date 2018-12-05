<section class="content-header">
  <h1>
    Training
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
        <?= $this->Form->create($training, array('role' => 'form')) ?>
          <div class="box-body">
          <?php
            echo $this->Form->input('project_action_id', ['options' => $projectActions]);
            echo $this->Form->input('description');
            echo $this->Form->input('ministry_id');
            echo $this->Form->input('sector_id', ['options' => $sectors]);
            echo $this->Form->input('leash_id', ['options' => $leashes]);
            echo $this->Form->input('job_employment_id', ['options' => $jobEmployments]);
            echo $this->Form->input('type_id', ['options' => $types]);
            echo $this->Form->input('date_year_id', ['options' => $dateYears]);
            echo $this->Form->input('effectif');
            echo $this->Form->input('beginning', ['empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);
            echo $this->Form->input('duration');
            echo $this->Form->input('ministries._ids', ['options' => $ministries]);
            echo $this->Form->input('departments._ids', ['options' => $departments]);
            echo $this->Form->input('structures._ids', ['options' => $structures]);
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

        <?php
$this->Html->css([
    'AdminLTE./plugins/datepicker/datepicker3',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/input-mask/jquery.inputmask',
  'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
  'AdminLTE./plugins/datepicker/bootstrap-datepicker',
  'AdminLTE./plugins/datepicker/locales/bootstrap-datepicker.pt-BR',
],
['block' => 'script']);
?>
<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    //Datemask mm/dd/yyyy
    $(".datepicker")
        .inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"})
        .datepicker({
            language:'en',
            format: 'mm/dd/yyyy'
        });
  });
</script>
<?php $this->end(); ?>
        