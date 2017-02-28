<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Campaign Order Types'), h($campaignOrderType['CampaignOrderType']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Campaign Order Types'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Campaign Order Type'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Campaign Order Type'), array('action' => 'edit', $campaignOrderType['CampaignOrderType']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Campaign Order Type'), array('action' => 'delete', $campaignOrderType['CampaignOrderType']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $campaignOrderType['CampaignOrderType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Campaign Order Types'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Campaign Order Type'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Item Types'), array('controller' => 'item_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Item Type'), array('controller' => 'item_types', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="campaignOrderTypes view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($campaignOrderType['CampaignOrderType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Item Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignOrderType['ItemType']['name'], array('controller' => 'item_types', 'action' => 'view', $campaignOrderType['ItemType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($campaignOrderType['CampaignOrderType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo h($campaignOrderType['CampaignOrderType']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($campaignOrderType['CampaignOrderType']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($campaignOrderType['CampaignOrderType']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
