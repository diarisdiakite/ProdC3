<section class="content-header">
  <h1>
    <?php echo __('Expected Result'); ?>
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
                                    <?= $expectedResult->has('user') ? $expectedResult->user->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Composant') ?></dt>
                                <dd>
                                    <?= $expectedResult->has('composant') ? $expectedResult->composant->title : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Title') ?></dt>
                                        <dd>
                                            <?= h($expectedResult->title) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Approved') ?></dt>
                                <dd>
                                    <?= $this->Number->format($expectedResult->approved) ?>
                                </dd>
                                                                                                                <dt><?= __('Num') ?></dt>
                                <dd>
                                    <?= $this->Number->format($expectedResult->num) ?>
                                </dd>
                                                                                                
                                                                                                                                                                                                
                                            
                                                                        <dt><?= __('Description') ?></dt>
                            <dd>
                            <?= $this->Text->autoParagraph(h($expectedResult->description)); ?>
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

                <?php if (!empty($expectedResult->inserts)): ?>

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

                            <?php foreach ($expectedResult->inserts as $inserts): ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Project Actions']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($expectedResult->project_actions)): ?>

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

                            <?php foreach ($expectedResult->project_actions as $projectActions): ?>
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
</section>
