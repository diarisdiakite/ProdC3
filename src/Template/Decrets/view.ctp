<section class="content-header">
  <h1>
    <?php echo __('Decret'); ?>
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
                                                                                                                <dt><?= __('Government Of') ?></dt>
                                        <dd>
                                            <?= h($decret->government_of) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Title') ?></dt>
                                        <dd>
                                            <?= h($decret->title) ?>
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

                <?php if (!empty($decret->ministries)): ?>

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

                            <?php foreach ($decret->ministries as $ministries): ?>
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
