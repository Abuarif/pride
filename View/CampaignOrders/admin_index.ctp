<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Campaign Orders');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Campaign Orders'), array('action' => 'index'));

?>

<div class="campaignOrders index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('campaign_id'); ?></th>
		<th><?php echo $this->Paginator->sort('package_id'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('created_by'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($campaignOrders as $campaignOrder): ?>
	<tr>
		<td><?php echo h($campaignOrder['CampaignOrder']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($campaignOrder['Campaign']['name'], array('controller' => 'campaigns', 'action' => 'view', $campaignOrder['Campaign']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($campaignOrder['Package']['name'], array('controller' => 'packages', 'action' => 'view', $campaignOrder['Package']['id'])); ?>
		</td>
		<td><?php echo h($campaignOrder['CampaignOrder']['status']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrder['CampaignOrder']['updated']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrder['CampaignOrder']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrder['CampaignOrder']['created']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrder['CampaignOrder']['created_by']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $campaignOrder['CampaignOrder']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $campaignOrder['CampaignOrder']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $campaignOrder['CampaignOrder']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $campaignOrder['CampaignOrder']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
