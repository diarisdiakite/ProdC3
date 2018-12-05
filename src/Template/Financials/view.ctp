<section class="content-header">
  <h1>
    <?php echo __('Financial'); ?>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Back'), ['action' => 'index'], ['escape' => false])?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-info"></i>
                <h3 class="box-title"><?php echo __('Information'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <dl class="dl-horizontal">
                                                                                                        <dt><?= __('Technical') ?></dt>
                                <dd>
                                    <?= $financial->has('technical') ? $financial->technical->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Finances Responsible') ?></dt>
                                <dd>
                                    <?= $financial->has('finances_responsible') ? $financial->finances_responsible->name : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Budget') ?></dt>
                                <dd>
                                    <?= $this->Number->format($financial->budget) ?>
                                </dd>
                                                                                                
                                                                                                                                                                                                
                                            
                                    </dl>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- ./col -->
</div>
<!-- div -->

</section>
