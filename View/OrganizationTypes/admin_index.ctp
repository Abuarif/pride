<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Organization Types');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organization Types'), array('action' => 'index'));

?>

<div class="organizationTypes index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('label'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($organizationTypes as $organizationType): ?>
	<tr>
		<td><?php echo h($organizationType['OrganizationType']['id']); ?>&nbsp;</td>
		<td><?php echo h($organizationType['OrganizationType']['label']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $organizationType['OrganizationType']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $organizationType['OrganizationType']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $organizationType['OrganizationType']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $organizationType['OrganizationType']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
