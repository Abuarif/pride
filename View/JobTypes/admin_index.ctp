<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Job Types');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Job Types'), array('action' => 'index'));

?>

<div class="jobTypes index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('level'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($jobTypes as $jobType): ?>
	<tr>
		<td><?php echo h($jobType['JobType']['id']); ?>&nbsp;</td>
		<td><?php echo h($jobType['JobType']['level']); ?>&nbsp;</td>
		<td><?php echo h($jobType['JobType']['name']); ?>&nbsp;</td>
		<td><?php echo h($jobType['JobType']['status']); ?>&nbsp;</td>
		<td><?php echo h($jobType['JobType']['updated']); ?>&nbsp;</td>
		<td><?php echo h($jobType['JobType']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $jobType['JobType']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $jobType['JobType']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $jobType['JobType']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $jobType['JobType']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
