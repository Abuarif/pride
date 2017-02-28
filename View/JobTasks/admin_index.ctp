<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Job Tasks');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Job Tasks'), array('action' => 'index'));

?>

<div class="jobTasks index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('user_id'); ?></th>
		<th><?php echo $this->Paginator->sort('job_id'); ?></th>
		<th><?php echo $this->Paginator->sort('provision_bus_id'); ?></th>
		<th><?php echo $this->Paginator->sort('job_type_id'); ?></th>
		<th><?php echo $this->Paginator->sort('files'); ?></th>
		<th><?php echo $this->Paginator->sort('files2'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($jobTasks as $jobTask): ?>
	<tr>
		<td><?php echo h($jobTask['JobTask']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($jobTask['User']['name'], array('controller' => 'users', 'action' => 'view', $jobTask['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($jobTask['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $jobTask['Job']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($jobTask['ProvisionBus']['id'], array('controller' => 'provision_buses', 'action' => 'view', $jobTask['ProvisionBus']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($jobTask['JobType']['name'], array('controller' => 'job_types', 'action' => 'view', $jobTask['JobType']['id'])); ?>
		</td>
		<td><?php echo h($jobTask['JobTask']['files']); ?>&nbsp;</td>
		<td><?php echo h($jobTask['JobTask']['files2']); ?>&nbsp;</td>
		<td><?php echo h($jobTask['JobTask']['status']); ?>&nbsp;</td>
		<td><?php echo h($jobTask['JobTask']['updated']); ?>&nbsp;</td>
		<td><?php echo h($jobTask['JobTask']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $jobTask['JobTask']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $jobTask['JobTask']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $jobTask['JobTask']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $jobTask['JobTask']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
