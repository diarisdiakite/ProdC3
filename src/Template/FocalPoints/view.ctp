<section class="content-header">
  <h1>
    <?php echo __('Focal Point'); ?>
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
                                            <?= h($focalPoint->name) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Adress') ?></dt>
                                        <dd>
                                            <?= h($focalPoint->adress) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Position') ?></dt>
                                        <dd>
                                            <?= h($focalPoint->position) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('User') ?></dt>
                                <dd>
                                    <?= $focalPoint->has('user') ? $focalPoint->user->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Expert') ?></dt>
                                <dd>
                                    <?= $focalPoint->has('expert') ? $focalPoint->expert->name : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Ministry') ?></dt>
                                <dd>
                                    <?= $focalPoint->has('ministry') ? $focalPoint->ministry->name : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Tel') ?></dt>
                                <dd>
                                    <?= $this->Number->format($focalPoint->tel) ?>
                                </dd>
                                                                                                
                                                                                                                                                                                                
                                                                        <dt><?= __('Active') ?></dt>
                            <dd>
                            <?= $focalPoint->active ? __('Yes') : __('No'); ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Finances Responsibles']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($focalPoint->finances_responsibles)): ?>

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
                                    Focal Point Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    User Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Active
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($focalPoint->finances_responsibles as $financesResponsibles): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($financesResponsibles->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($financesResponsibles->name) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($financesResponsibles->adress) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($financesResponsibles->tel) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($financesResponsibles->position) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($financesResponsibles->focal_point_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($financesResponsibles->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($financesResponsibles->active) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'FinancesResponsibles', 'action' => 'view', $financesResponsibles->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'FinancesResponsibles', 'action' => 'edit', $financesResponsibles->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FinancesResponsibles', 'action' => 'delete', $financesResponsibles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $financesResponsibles->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

                <?php if (!empty($focalPoint->structures)): ?>

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

                            <?php foreach ($focalPoint->structures as $structures): ?>
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
