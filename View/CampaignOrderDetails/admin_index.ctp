<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Campaign Order Details');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Campaign Order Details'), array('action' => 'index'));

?>

<div class="campaignOrderDetails index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('campaign_id'); ?></th>
		<th><?php echo $this->Paginator->sort('job_id'); ?></th>
		<th><?php echo $this->Paginator->sort('isSubmitted'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('created_by'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($campaignOrderDetails as $campaignOrderDetail): ?>
	<tr>
		<td><?php echo h($campaignOrderDetail['CampaignOrderDetail']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($campaignOrderDetail['Campaign']['name'], array('controller' => 'campaigns', 'action' => 'view', $campaignOrderDetail['Campaign']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($campaignOrderDetail['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $campaignOrderDetail['Job']['id'])); ?>
		</td>
		<td><?php echo h($campaignOrderDetail['CampaignOrderDetail']['isSubmitted']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderDetail['CampaignOrderDetail']['status']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderDetail['CampaignOrderDetail']['updated']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderDetail['CampaignOrderDetail']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderDetail['CampaignOrderDetail']['created']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderDetail['CampaignOrderDetail']['created_by']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $campaignOrderDetail['CampaignOrderDetail']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $campaignOrderDetail['CampaignOrderDetail']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $campaignOrderDetail['CampaignOrderDetail']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $campaignOrderDetail['CampaignOrderDetail']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
