<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Campaign Design Approvals');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Campaign Design Approvals'), array('action' => 'index'));

?>

<div class="campaignDesignApprovals index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('campaign_design_id'); ?></th>
		<th><?php echo $this->Paginator->sort('user_id'); ?></th>
		<th><?php echo $this->Paginator->sort('process_state_id'); ?></th>
		<th><?php echo $this->Paginator->sort('approval_level_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('comments'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($campaignDesignApprovals as $campaignDesignApproval): ?>
	<tr>
		<td><?php echo h($campaignDesignApproval['CampaignDesignApproval']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($campaignDesignApproval['CampaignDesign']['name'], array('controller' => 'campaign_designs', 'action' => 'view', $campaignDesignApproval['CampaignDesign']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($campaignDesignApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $campaignDesignApproval['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($campaignDesignApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $campaignDesignApproval['ProcessState']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($campaignDesignApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $campaignDesignApproval['ApprovalLevel']['id'])); ?>
		</td>
		<td><?php echo h($campaignDesignApproval['CampaignDesignApproval']['name']); ?>&nbsp;</td>
		<td><?php echo h($campaignDesignApproval['CampaignDesignApproval']['comments']); ?>&nbsp;</td>
		<td><?php echo h($campaignDesignApproval['CampaignDesignApproval']['updated']); ?>&nbsp;</td>
		<td><?php echo h($campaignDesignApproval['CampaignDesignApproval']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $campaignDesignApproval['CampaignDesignApproval']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $campaignDesignApproval['CampaignDesignApproval']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $campaignDesignApproval['CampaignDesignApproval']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $campaignDesignApproval['CampaignDesignApproval']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
