<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Depots');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Depots'), array('action' => 'index'));

?>

<div class="depots index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('depot_number'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('created_by'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($depots as $depot): ?>
	<tr>
		<td><?php echo h($depot['Depot']['id']); ?>&nbsp;</td>
		<td><?php echo h($depot['Depot']['name']); ?>&nbsp;</td>
		<td><?php echo h($depot['Depot']['depot_number']); ?>&nbsp;</td>
		<td><?php echo h($depot['Depot']['status']); ?>&nbsp;</td>
		<td><?php echo h($depot['Depot']['updated']); ?>&nbsp;</td>
		<td><?php echo h($depot['Depot']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($depot['Depot']['created']); ?>&nbsp;</td>
		<td><?php echo h($depot['Depot']['created_by']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $depot['Depot']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $depot['Depot']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $depot['Depot']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $depot['Depot']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
