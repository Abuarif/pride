<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Job Task Assignments');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Job Task Assignments'), array('action' => 'index'));

?>

<div class="jobTaskAssignments index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('job_id'); ?></th>
		<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($jobTaskAssignments as $jobTaskAssignment): ?>
	<tr>
		<td><?php echo h($jobTaskAssignment['JobTaskAssignment']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($jobTaskAssignment['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $jobTaskAssignment['Job']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($jobTaskAssignment['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $jobTaskAssignment['Organization']['id'])); ?>
		</td>
		<td><?php echo h($jobTaskAssignment['JobTaskAssignment']['status']); ?>&nbsp;</td>
		<td><?php echo h($jobTaskAssignment['JobTaskAssignment']['updated']); ?>&nbsp;</td>
		<td><?php echo h($jobTaskAssignment['JobTaskAssignment']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $jobTaskAssignment['JobTaskAssignment']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $jobTaskAssignment['JobTaskAssignment']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $jobTaskAssignment['JobTaskAssignment']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $jobTaskAssignment['JobTaskAssignment']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
