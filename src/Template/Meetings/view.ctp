<section class="content-header">
  <h1>
    <?php echo __('Meeting'); ?>
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
                                            <?= h($meeting->title) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('Programmation') ?></dt>
                                <dd>
                                    <?= $meeting->has('programmation') ? $meeting->programmation->title : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                            
                                                                                                                                                                                                
                                            
                                                                        <dt><?= __('Description') ?></dt>
                            <dd>
                            <?= $this->Text->autoParagraph(h($meeting->description)); ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Meeting Subjects']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($meeting->meeting_subjects)): ?>

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
                                    Meeting Id
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($meeting->meeting_subjects as $meetingSubjects): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($meetingSubjects->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($meetingSubjects->title) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($meetingSubjects->description) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($meetingSubjects->meeting_id) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'MeetingSubjects', 'action' => 'view', $meetingSubjects->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'MeetingSubjects', 'action' => 'edit', $meetingSubjects->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MeetingSubjects', 'action' => 'delete', $meetingSubjects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meetingSubjects->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

                <?php if (!empty($meeting->departments)): ?>

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

                            <?php foreach ($meeting->departments as $departments): ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Experts']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($meeting->experts)): ?>

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
                                    Adress
                                    </th>
                                        
                                                                    
                                    <th>
                                    Tel
                                    </th>
                                        
                                                                    
                                    <th>
                                    Position
                                    </th>
                                        
                                                                    
                                    <th>
                                    Active
                                    </th>
                                        
                                                                    
                                    <th>
                                    Linkedin
                                    </th>
                                        
                                                                    
                                    <th>
                                    User Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Team Id
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($meeting->experts as $experts): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($experts->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($experts->name) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($experts->adress) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($experts->tel) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($experts->position) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($experts->active) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($experts->linkedin) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($experts->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($experts->team_id) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Experts', 'action' => 'view', $experts->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Experts', 'action' => 'edit', $experts->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Experts', 'action' => 'delete', $experts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $experts->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Ministries']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($meeting->ministries)): ?>

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

                            <?php foreach ($meeting->ministries as $ministries): ?>
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
</section>
