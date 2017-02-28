<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Campaign Order Types');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Campaign Order Types'), array('action' => 'index'));

?>

<div class="campaignOrderTypes index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('item_type_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($campaignOrderTypes as $campaignOrderType): ?>
	<tr>
		<td><?php echo h($campaignOrderType['CampaignOrderType']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($campaignOrderType['ItemType']['name'], array('controller' => 'item_types', 'action' => 'view', $campaignOrderType['ItemType']['id'])); ?>
		</td>
		<td><?php echo h($campaignOrderType['CampaignOrderType']['name']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderType['CampaignOrderType']['status']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderType['CampaignOrderType']['updated']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderType['CampaignOrderType']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $campaignOrderType['CampaignOrderType']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $campaignOrderType['CampaignOrderType']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $campaignOrderType['CampaignOrderType']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $campaignOrderType['CampaignOrderType']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
