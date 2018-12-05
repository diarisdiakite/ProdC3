<section class="content-header">
  <h1>
    <?php echo __('Administrator'); ?>
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
                                            <?= h($administrator->name) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Adress') ?></dt>
                                        <dd>
                                            <?= h($administrator->adress) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Position') ?></dt>
                                        <dd>
                                            <?= h($administrator->position) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('User') ?></dt>
                                <dd>
                                    <?= $administrator->has('user') ? $administrator->user->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Tel') ?></dt>
                                <dd>
                                    <?= $this->Number->format($administrator->tel) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Inquiries']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($administrator->inquiries)): ?>

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
                                    Database Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Administrator Id
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($administrator->inquiries as $inquiries): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($inquiries->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inquiries->name) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inquiries->database_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($inquiries->administrator_id) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Inquiries', 'action' => 'view', $inquiries->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Inquiries', 'action' => 'edit', $inquiries->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Inquiries', 'action' => 'delete', $inquiries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inquiries->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
