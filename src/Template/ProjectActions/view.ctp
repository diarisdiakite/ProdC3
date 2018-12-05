<section class="content-header">
  <h1>
    <?php echo __('Project Action'); ?>
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
                                    <?= $projectAction->has('user') ? $projectAction->user->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Type') ?></dt>
                                <dd>
                                    <?= $projectAction->has('type') ? $projectAction->type->name : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Expected Result') ?></dt>
                                <dd>
                                    <?= $projectAction->has('expected_result') ? $projectAction->expected_result->title : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Title') ?></dt>
                                        <dd>
                                            <?= h($projectAction->title) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Num') ?></dt>
                                <dd>
                                    <?= $this->Number->format($projectAction->num) ?>
                                </dd>
                                                                                                
                                                                                                                                                                                                
                                                                        <dt><?= __('Approved') ?></dt>
                            <dd>
                            <?= $projectAction->approved ? __('Yes') : __('No'); ?>
                            </dd>
                                                                    
                                                                        <dt><?= __('Description') ?></dt>
                            <dd>
                            <?= $this->Text->autoParagraph(h($projectAction->description)); ?>
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

                <?php if (!empty($projectAction->inserts)): ?>

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

                            <?php foreach ($projectAction->inserts as $inserts): ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Technicals']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($projectAction->technicals)): ?>

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
                                    Project Action Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Quantity
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($projectAction->technicals as $technicals): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($technicals->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($technicals->approved) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($technicals->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($technicals->structure_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($technicals->project_action_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($technicals->quantity) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Technicals', 'action' => 'view', $technicals->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Technicals', 'action' => 'edit', $technicals->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Technicals', 'action' => 'delete', $technicals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $technicals->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

                <?php if (!empty($projectAction->trainings)): ?>

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

                            <?php foreach ($projectAction->trainings as $trainings): ?>
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Departments']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($projectAction->departments)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Ministry Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Title
                                    </th>
                                        
                                                                    
                                    <th>
                                    Mission
                                    </th>
                                        
                                                                    
                                    <th>
                                    Description
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($projectAction->departments as $departments): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($departments->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($departments->ministry_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($departments->title) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($departments->mission) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($departments->description) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Departments', 'action' => 'view', $departments->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Departments', 'action' => 'edit', $departments->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Departments', 'action' => 'delete', $departments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $departments->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
