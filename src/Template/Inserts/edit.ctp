<section class="content-header">
  <h1>
    Insert
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
        <?= $this->Form->create($insert, array('role' => 'form')) ?>
          <div class="box-body">
          <?php
            echo $this->Form->input('approved');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('structure_id', ['options' => $structures]);
            echo $this->Form->input('planification_id', ['options' => $planifications]);
            echo $this->Form->input('ministry_id', ['options' => $ministries]);
            echo $this->Form->input('composant_id', ['options' => $composants]);
            echo $this->Form->input('expected_result_id', ['options' => $expectedResults]);
            echo $this->Form->input('project_action_id', ['options' => $projectActions]);
            echo $this->Form->input('quantity');
            echo $this->Form->input('unity_price');
            echo $this->Form->input('type_id', ['options' => $types]);
            echo $this->Form->input('date_year_id', ['options' => $dateYears]);
            echo $this->Form->input('amount');
            echo $this->Form->input('activations._ids', ['options' => $activations]);
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

