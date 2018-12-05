<section class="content-header">
  <h1>
    <?php echo __('Department'); ?>
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
                                                                                                        <dt><?= __('Ministry') ?></dt>
                                <dd>
                                    <?= $department->has('ministry') ? $department->ministry->name : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Title') ?></dt>
                                        <dd>
                                            <?= h($department->title) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                            
                                                                                                                                                                                                
                                            
                                                                        <dt><?= __('Mission') ?></dt>
                            <dd>
                            <?= $this->Text->autoParagraph(h($department->mission)); ?>
                            </dd>
                                                    <dt><?= __('Description') ?></dt>
                            <dd>
                            <?= $this->Text->autoParagraph(h($department->description)); ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Planifications']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($department->planifications)): ?>

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
                                    Ministry Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Department Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Date Year
                                    </th>
                                        
                                                                    
                                    <th>
                                    Title
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($department->planifications as $planifications): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($planifications->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($planifications->approved) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($planifications->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($planifications->ministry_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($planifications->department_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($planifications->date_year) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($planifications->title) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Planifications', 'action' => 'view', $planifications->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Planifications', 'action' => 'edit', $planifications->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Planifications', 'action' => 'delete', $planifications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $planifications->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Realizations']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($department->realizations)): ?>

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
                                    Department Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Insert Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Description
                                    </th>
                                        
                                                                    
                                    <th>
                                    Quantity
                                    </th>
                                        
                                                                    
                                    <th>
                                    Price
                                    </th>
                                        
                                                                    
                                    <th>
                                    Amount
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($department->realizations as $realizations): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($realizations->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($realizations->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($realizations->department_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($realizations->insert_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($realizations->description) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($realizations->quantity) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($realizations->price) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($realizations->amount) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Realizations', 'action' => 'view', $realizations->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Realizations', 'action' => 'edit', $realizations->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Realizations', 'action' => 'delete', $realizations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $realizations->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

                <?php if (!empty($department->structures)): ?>

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

                            <?php foreach ($department->structures as $structures): ?>
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Inquiry Databases']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($department->inquiry_databases)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Name
                                    </th>
                                        
                                                                    
                                    <th>
                                    Total
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($department->inquiry_databases as $inquiryDatabases): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($inquiryDatabases->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inquiryDatabases->name) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inquiryDatabases->total) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'InquiryDatabases', 'action' => 'view', $inquiryDatabases->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'InquiryDatabases', 'action' => 'edit', $inquiryDatabases->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'InquiryDatabases', 'action' => 'delete', $inquiryDatabases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inquiryDatabases->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Meetings']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($department->meetings)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Title
                                    </th>
                                        
                                                                    
                                    <th>
                                    Description
                                    </th>
                                        
                                                                    
                                    <th>
                                    Programmation Id
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($department->meetings as $meetings): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($meetings->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($meetings->title) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($meetings->description) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($meetings->programmation_id) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Meetings', 'action' => 'view', $meetings->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Meetings', 'action' => 'edit', $meetings->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Meetings', 'action' => 'delete', $meetings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetings->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Project Actions']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($department->project_actions)): ?>

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
                                    Num
                                    </th>
                                        
                                                                    
                                    <th>
                                    Type Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Expected Result Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Title
                                    </th>
                                        
                                                                    
                                    <th>
                                    Description
                                    </th>
                                        
                                                                    
                                    <th>
                                    Approved
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($department->project_actions as $projectActions): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($projectActions->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($projectActions->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($projectActions->num) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($projectActions->type_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($projectActions->expected_result_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($projectActions->title) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($projectActions->description) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($projectActions->approved) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'ProjectActions', 'action' => 'view', $projectActions->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProjectActions', 'action' => 'edit', $projectActions->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProjectActions', 'action' => 'delete', $projectActions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectActions->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

                <?php if (!empty($department->trainings)): ?>

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

                            <?php foreach ($department->trainings as $trainings): ?>
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
