<section class="content-header">
  <h1>
    <?php echo __('Assignement'); ?>
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
                                                                                                        <dt><?= __('Group') ?></dt>
                                <dd>
                                    <?= $assignement->has('group') ? $assignement->group->name : '' ?>
                                </dd>
                                                                                                                <dt><?= __('User') ?></dt>
                                <dd>
                                    <?= $assignement->has('user') ? $assignement->user->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Post') ?></dt>
                                <dd>
                                    <?= $assignement->has('post') ? $assignement->post->title : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Title') ?></dt>
                                        <dd>
                                            <?= h($assignement->title) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                            
                                                                                                                                                                                                
                                            
                                                                        <dt><?= __('Description') ?></dt>
                            <dd>
                            <?= $this->Text->autoParagraph(h($assignement->description)); ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Operations']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($assignement->operations)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Assignement Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    User Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Name
                                    </th>
                                        
                                                                    
                                    <th>
                                    Description
                                    </th>
                                        
                                                                    
                                    <th>
                                    Duration
                                    </th>
                                        
                                                                    
                                    <th>
                                    Scale
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($assignement->operations as $operations): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($operations->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($operations->assignement_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($operations->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($operations->name) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($operations->description) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($operations->duration) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($operations->scale) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Operations', 'action' => 'view', $operations->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Operations', 'action' => 'edit', $operations->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Operations', 'action' => 'delete', $operations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operations->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

                <?php if (!empty($assignement->experts)): ?>

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

                            <?php foreach ($assignement->experts as $experts): ?>
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
</section>
