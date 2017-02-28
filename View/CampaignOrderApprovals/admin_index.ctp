<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Campaign Order Approvals');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Campaign Order Approvals'), array('action' => 'index'));

?>

<div class="campaignOrderApprovals index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('campaign_order_id'); ?></th>
		<th><?php echo $this->Paginator->sort('user_id'); ?></th>
		<th><?php echo $this->Paginator->sort('process_state_id'); ?></th>
		<th><?php echo $this->Paginator->sort('approval_level_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('comments'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($campaignOrderApprovals as $campaignOrderApproval): ?>
	<tr>
		<td><?php echo h($campaignOrderApproval['CampaignOrderApproval']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($campaignOrderApproval['CampaignOrder']['id'], array('controller' => 'campaign_orders', 'action' => 'view', $campaignOrderApproval['CampaignOrder']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($campaignOrderApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $campaignOrderApproval['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($campaignOrderApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $campaignOrderApproval['ProcessState']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($campaignOrderApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $campaignOrderApproval['ApprovalLevel']['id'])); ?>
		</td>
		<td><?php echo h($campaignOrderApproval['CampaignOrderApproval']['name']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderApproval['CampaignOrderApproval']['comments']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderApproval['CampaignOrderApproval']['updated']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderApproval['CampaignOrderApproval']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $campaignOrderApproval['CampaignOrderApproval']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $campaignOrderApproval['CampaignOrderApproval']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $campaignOrderApproval['CampaignOrderApproval']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $campaignOrderApproval['CampaignOrderApproval']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
