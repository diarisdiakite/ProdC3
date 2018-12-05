<section class="content-header">
  <h1>
    <?php echo __('Expert'); ?>
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
                                                                                                                <dt><?= __('Name') ?></dt>
                                        <dd>
                                            <?= h($expert->name) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Adress') ?></dt>
                                        <dd>
                                            <?= h($expert->adress) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Position') ?></dt>
                                        <dd>
                                            <?= h($expert->position) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Linkedin') ?></dt>
                                        <dd>
                                            <?= h($expert->linkedin) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('User') ?></dt>
                                <dd>
                                    <?= $expert->has('user') ? $expert->user->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Team') ?></dt>
                                <dd>
                                    <?= $expert->has('team') ? $expert->team->name : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Tel') ?></dt>
                                <dd>
                                    <?= $this->Number->format($expert->tel) ?>
                                </dd>
                                                                                                
                                                                                                                                                                                                
                                                                        <dt><?= __('Active') ?></dt>
                            <dd>
                            <?= $expert->active ? __('Yes') : __('No'); ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Assistants']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($expert->assistants)): ?>

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
                                    Expert Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    User Id
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($expert->assistants as $assistants): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($assistants->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($assistants->name) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($assistants->adress) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($assistants->tel) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($assistants->position) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($assistants->expert_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($assistants->user_id) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Assistants', 'action' => 'view', $assistants->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Assistants', 'action' => 'edit', $assistants->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Assistants', 'action' => 'delete', $assistants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assistants->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Focal Points']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($expert->focal_points)): ?>

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
                                    User Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Expert Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Ministry Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Active
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($expert->focal_points as $focalPoints): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($focalPoints->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($focalPoints->name) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($focalPoints->adress) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($focalPoints->tel) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($focalPoints->position) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($focalPoints->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($focalPoints->expert_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($focalPoints->ministry_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($focalPoints->active) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'FocalPoints', 'action' => 'view', $focalPoints->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'FocalPoints', 'action' => 'edit', $focalPoints->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FocalPoints', 'action' => 'delete', $focalPoints->id], ['confirm' => __('Are you sure you want to delete # {0}?', $focalPoints->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

                <?php if (!empty($expert->ministries)): ?>

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

                            <?php foreach ($expert->ministries as $ministries): ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Programmations']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($expert->programmations)): ?>

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
                                    Expert Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Debut
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($expert->programmations as $programmations): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($programmations->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($programmations->title) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($programmations->description) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($programmations->expert_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($programmations->debut) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Programmations', 'action' => 'view', $programmations->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Programmations', 'action' => 'edit', $programmations->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Programmations', 'action' => 'delete', $programmations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $programmations->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Assignements']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($expert->assignements)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Group Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    User Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Post Id
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

                            <?php foreach ($expert->assignements as $assignements): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($assignements->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($assignements->group_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($assignements->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($assignements->post_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($assignements->title) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($assignements->description) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Assignements', 'action' => 'view', $assignements->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Assignements', 'action' => 'edit', $assignements->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Assignements', 'action' => 'delete', $assignements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignements->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

                <?php if (!empty($expert->meetings)): ?>

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

                            <?php foreach ($expert->meetings as $meetings): ?>
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
</section>
