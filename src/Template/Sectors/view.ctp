<section class="content-header">
  <h1>
    <?php echo __('Sector'); ?>
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
                                                                                                                <dt><?= __('Title') ?></dt>
                                        <dd>
                                            <?= h($sector->title) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                            
                                                                                                                                                                                                
                                                                        <dt><?= __('Approved') ?></dt>
                            <dd>
                            <?= $sector->approved ? __('Yes') : __('No'); ?>
                            </dd>
                                                                    
                                                                        <dt><?= __('Description') ?></dt>
                            <dd>
                            <?= $this->Text->autoParagraph(h($sector->description)); ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Leashes']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($sector->leashes)): ?>

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
                                    Sector Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Title
                                    </th>
                                        
                                                                    
                                    <th>
                                    Description
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($sector->leashes as $leashes): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($leashes->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($leashes->approved) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($leashes->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($leashes->sector_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($leashes->title) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($leashes->description) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Leashes', 'action' => 'view', $leashes->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Leashes', 'action' => 'edit', $leashes->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Leashes', 'action' => 'delete', $leashes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leashes->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

                <?php if (!empty($sector->trainings)): ?>

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

                            <?php foreach ($sector->trainings as $trainings): ?>
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
