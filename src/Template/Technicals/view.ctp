<section class="content-header">
  <h1>
    <?php echo __('Technical'); ?>
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
                                    <?= $technical->has('user') ? $technical->user->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Structure') ?></dt>
                                <dd>
                                    <?= $technical->has('structure') ? $technical->structure->name : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Project Action') ?></dt>
                                <dd>
                                    <?= $technical->has('project_action') ? $technical->project_action->title : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Quantity') ?></dt>
                                <dd>
                                    <?= $this->Number->format($technical->quantity) ?>
                                </dd>
                                                                                                
                                                                                                                                                                                                
                                                                        <dt><?= __('Approved') ?></dt>
                            <dd>
                            <?= $technical->approved ? __('Yes') : __('No'); ?>
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

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Financials']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($technical->financials)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                                                        
                                    <th>
                                    Technical Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Budget
                                    </th>
                                        
                                                                    
                                    <th>
                                    Finances Responsible Id
                                    </th>
                                        
                                                                                                        
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($technical->financials as $financials): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($financials->id) ?>
                                    </td>
                                                                                                            
                                    <td>
                                    <?= h($financials->technical_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($financials->budget) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($financials->finances_responsible_id) ?>
                                    </td>
                                                                        
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Financials', 'action' => 'view', $financials->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Financials', 'action' => 'edit', $financials->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Financials', 'action' => 'delete', $financials->id], ['confirm' => __('Are you sure you want to delete # {0}?', $financials->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
