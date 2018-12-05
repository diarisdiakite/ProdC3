<section class="content-header">
  <h1>
    <?php echo __('Realization'); ?>
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
                                                                                                        <dt><?= __('User') ?></dt>
                                <dd>
                                    <?= $realization->has('user') ? $realization->user->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Department') ?></dt>
                                <dd>
                                    <?= $realization->has('department') ? $realization->department->title : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Insert') ?></dt>
                                <dd>
                                    <?= $realization->has('insert') ? $realization->insert->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Quantity') ?></dt>
                                <dd>
                                    <?= $this->Number->format($realization->quantity) ?>
                                </dd>
                                                                                                                <dt><?= __('Price') ?></dt>
                                <dd>
                                    <?= $this->Number->format($realization->price) ?>
                                </dd>
                                                                                                                <dt><?= __('Amount') ?></dt>
                                <dd>
                                    <?= $this->Number->format($realization->amount) ?>
                                </dd>
                                                                                                
                                                                                                                                                                                                
                                            
                                                                        <dt><?= __('Description') ?></dt>
                            <dd>
                            <?= $this->Text->autoParagraph(h($realization->description)); ?>
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
