<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Campaign Order Details'), h($campaignOrderDetail['CampaignOrderDetail']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Campaign Order Details'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Campaign Order Detail'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Campaign Order Detail'), array('action' => 'edit', $campaignOrderDetail['CampaignOrderDetail']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Campaign Order Detail'), array('action' => 'delete', $campaignOrderDetail['CampaignOrderDetail']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $campaignOrderDetail['CampaignOrderDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Campaign Order Details'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Campaign Order Detail'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Campaigns'), array('controller' => 'campaigns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Campaign'), array('controller' => 'campaigns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="campaignOrderDetails view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($campaignOrderDetail['CampaignOrderDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Campaign'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignOrderDetail['Campaign']['name'], array('controller' => 'campaigns', 'action' => 'view', $campaignOrderDetail['Campaign']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Job'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignOrderDetail['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $campaignOrderDetail['Job']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'IsSubmitted'); ?></dt>
		<dd>
			<?php echo h($campaignOrderDetail['CampaignOrderDetail']['isSubmitted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo h($campaignOrderDetail['CampaignOrderDetail']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($campaignOrderDetail['CampaignOrderDetail']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated By'); ?></dt>
		<dd>
			<?php echo h($campaignOrderDetail['CampaignOrderDetail']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($campaignOrderDetail['CampaignOrderDetail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created By'); ?></dt>
		<dd>
			<?php echo h($campaignOrderDetail['CampaignOrderDetail']['created_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
