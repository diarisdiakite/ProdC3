<section class="content-header">
  <h1>
    <?php echo __('Date Year'); ?>
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
                                            
                                            
                                                                                                                                                            <dt><?= __('Year') ?></dt>
                                <dd>
                                    <?= $this->Number->format($dateYear->year) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Inserts']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($dateYear->inserts)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Approved
                                    </th>
                                        
                                                                    
                                    <th>
                                    User Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Structure Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Planification Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Ministry Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Composant Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Expected Result Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Project Action Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Quantity
                                    </th>
                                        
                                                                    
                                    <th>
                                    Unity Price
                                    </th>
                                        
                                                                    
                                    <th>
                                    Type Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Date Year Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Amount
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($dateYear->inserts as $inserts): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($inserts->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inserts->approved) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inserts->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inserts->structure_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inserts->planification_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inserts->ministry_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inserts->composant_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inserts->expected_result_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inserts->project_action_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inserts->quantity) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inserts->unity_price) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inserts->type_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inserts->date_year_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inserts->amount) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Inserts', 'action' => 'view', $inserts->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Inserts', 'action' => 'edit', $inserts->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Inserts', 'action' => 'delete', $inserts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inserts->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Trainings']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($dateYear->trainings)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Project Action Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Description
                                    </th>
                                        
                                                                    
                                    <th>
                                    Ministry Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Sector Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Leash Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Job Employment Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Type Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Date Year Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Effectif
                                    </th>
                                        
                                                                    
                                    <th>
                                    Beginning
                                    </th>
                                        
                                                                    
                                    <th>
                                    Duration
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($dateYear->trainings as $trainings): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($trainings->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($trainings->project_action_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($trainings->description) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($trainings->ministry_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($trainings->sector_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($trainings->leash_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($trainings->job_employment_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($trainings->type_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($trainings->date_year_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($trainings->effectif) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($trainings->beginning) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($trainings->duration) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Trainings', 'action' => 'view', $trainings->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Trainings', 'action' => 'edit', $trainings->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trainings', 'action' => 'delete', $trainings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainings->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
