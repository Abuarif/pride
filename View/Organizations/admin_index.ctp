<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Organizations');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organizations'), array('action' => 'index'));

?>

<div class="organizations index">
	<table class="table table-striped">
	<tr>
		<!-- <th><?php echo $this->Paginator->sort('id'); ?></th> -->
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('contact_person'); ?></th>
		<th><?php echo $this->Paginator->sort('contact_email'); ?></th>
		<th><?php echo $this->Paginator->sort('contact_number'); ?></th>
		<th><?php echo $this->Paginator->sort('files'); ?></th>
		<th><?php echo $this->Paginator->sort('Approval Status'); ?></th>
		<!-- <th><?php echo $this->Paginator->sort('updated'); ?></th> -->
		<!-- <th><?php echo $this->Paginator->sort('updated_by'); ?></th> -->
		<!-- <th><?php echo $this->Paginator->sort('created'); ?></th> -->
		<!-- <th><?php echo $this->Paginator->sort('created_by'); ?></th> -->
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($organizations as $organization): ?>
	<tr>
		<!-- <td><?php echo h($organization['Organization']['id']); ?>&nbsp;</td> -->
		<td><?php echo h($organization['Organization']['name']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['contact_person']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['contact_email']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['contact_number']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['files']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['status']); ?>&nbsp;</td>
		<!-- <td><?php echo h($organization['Organization']['updated']); ?>&nbsp;</td> -->
		<!-- <td><?php echo h($organization['Organization']['updated_by']); ?>&nbsp;</td> -->
		<!-- <td><?php echo h($organization['Organization']['created']); ?>&nbsp;</td> -->
		<!-- <td><?php echo h($organization['Organization']['created_by']); ?>&nbsp;</td> -->
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $organization['Organization']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $organization['Organization']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $organization['Organization']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $organization['Organization']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
