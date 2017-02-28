<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Advice Types');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Advice Types'), array('action' => 'index'));

?>

<div class="adviceTypes index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($adviceTypes as $adviceType): ?>
	<tr>
		<td><?php echo h($adviceType['AdviceType']['id']); ?>&nbsp;</td>
		<td><?php echo h($adviceType['AdviceType']['name']); ?>&nbsp;</td>
		<td><?php echo h($adviceType['AdviceType']['status']); ?>&nbsp;</td>
		<td><?php echo h($adviceType['AdviceType']['updated']); ?>&nbsp;</td>
		<td><?php echo h($adviceType['AdviceType']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $adviceType['AdviceType']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $adviceType['AdviceType']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $adviceType['AdviceType']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $adviceType['AdviceType']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
