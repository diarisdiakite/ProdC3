<section class="content-header">
  <h1>
    <?php echo __('Training'); ?>
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
                                                                                                        <dt><?= __('Project Action') ?></dt>
                                <dd>
                                    <?= $training->has('project_action') ? $training->project_action->title : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Sector') ?></dt>
                                <dd>
                                    <?= $training->has('sector') ? $training->sector->title : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Leash') ?></dt>
                                <dd>
                                    <?= $training->has('leash') ? $training->leash->title : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Job Employment') ?></dt>
                                <dd>
                                    <?= $training->has('job_employment') ? $training->job_employment->title : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Type') ?></dt>
                                <dd>
                                    <?= $training->has('type') ? $training->type->name : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Date Year') ?></dt>
                                <dd>
                                    <?= $training->has('date_year') ? $training->date_year->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Ministry Id') ?></dt>
                                <dd>
                                    <?= $this->Number->format($training->ministry_id) ?>
                                </dd>
                                                                                                                <dt><?= __('Effectif') ?></dt>
                                <dd>
                                    <?= $this->Number->format($training->effectif) ?>
                                </dd>
                                                                                                                <dt><?= __('Duration') ?></dt>
                                <dd>
                                    <?= $this->Number->format($training->duration) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Beginning') ?></dt>
                                <dd>
                                    <?= h($training->beginning) ?>
                                </dd>
                                                                                                                                                                                                            
                                            
                                                                        <dt><?= __('Description') ?></dt>
                            <dd>
                            <?= $this->Text->autoParagraph(h($training->description)); ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Ministries']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($training->ministries)): ?>

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
                                    Name
                                    </th>
                                        
                                                                    
                                    <th>
                                    Slug
                                    </th>
                                        
                                                                    
                                    <th>
                                    Decret Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Team Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Expert Id
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($training->ministries as $ministries): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($ministries->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ministries->approved) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ministries->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ministries->name) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ministries->slug) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ministries->decret_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ministries->team_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ministries->expert_id) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Ministries', 'action' => 'view', $ministries->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ministries', 'action' => 'edit', $ministries->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ministries', 'action' => 'delete', $ministries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ministries->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

                <?php if (!empty($training->departments)): ?>

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

                            <?php foreach ($training->departments as $departments): ?>
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Structures']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($training->structures)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    User Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Name
                                    </th>
                                        
                                                                    
                                    <th>
                                    Responsible
                                    </th>
                                        
                                                                    
                                    <th>
                                    Contact
                                    </th>
                                        
                                                                    
                                    <th>
                                    Focal Point Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Ministry Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Department Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Active
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($training->structures as $structures): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($structures->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($structures->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($structures->name) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($structures->responsible) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($structures->contact) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($structures->focal_point_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($structures->ministry_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($structures->department_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($structures->active) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Structures', 'action' => 'view', $structures->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Structures', 'action' => 'edit', $structures->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Structures', 'action' => 'delete', $structures->id], ['confirm' => __('Are you sure you want to delete # {0}?', $structures->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
