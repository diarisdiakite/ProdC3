<section class="content-header">
  <h1>
    <?php echo __('Insert'); ?>
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
                                    <?= $insert->has('user') ? $insert->user->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Structure') ?></dt>
                                <dd>
                                    <?= $insert->has('structure') ? $insert->structure->name : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Planification') ?></dt>
                                <dd>
                                    <?= $insert->has('planification') ? $insert->planification->title : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Ministry') ?></dt>
                                <dd>
                                    <?= $insert->has('ministry') ? $insert->ministry->name : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Composant') ?></dt>
                                <dd>
                                    <?= $insert->has('composant') ? $insert->composant->title : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Expected Result') ?></dt>
                                <dd>
                                    <?= $insert->has('expected_result') ? $insert->expected_result->title : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Project Action') ?></dt>
                                <dd>
                                    <?= $insert->has('project_action') ? $insert->project_action->title : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Type') ?></dt>
                                <dd>
                                    <?= $insert->has('type') ? $insert->type->name : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Date Year') ?></dt>
                                <dd>
                                    <?= $insert->has('date_year') ? $insert->date_year->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Quantity') ?></dt>
                                <dd>
                                    <?= $this->Number->format($insert->quantity) ?>
                                </dd>
                                                                                                                <dt><?= __('Unity Price') ?></dt>
                                <dd>
                                    <?= $this->Number->format($insert->unity_price) ?>
                                </dd>
                                                                                                                <dt><?= __('Amount') ?></dt>
                                <dd>
                                    <?= $this->Number->format($insert->amount) ?>
                                </dd>
                                                                                                
                                                                                                                                                                                                
                                                                        <dt><?= __('Approved') ?></dt>
                            <dd>
                            <?= $insert->approved ? __('Yes') : __('No'); ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Realizations']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($insert->realizations)): ?>

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

                            <?php foreach ($insert->realizations as $realizations): ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Activations']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($insert->activations)): ?>

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
                                    Title
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($insert->activations as $activations): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($activations->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($activations->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($activations->title) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Activations', 'action' => 'view', $activations->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Activations', 'action' => 'edit', $activations->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Activations', 'action' => 'delete', $activations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activations->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
