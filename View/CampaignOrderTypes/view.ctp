<div class="campaignOrderTypes view">
<h2><?php echo __('Campaign Order Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($campaignOrderType['CampaignOrderType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignOrderType['ItemType']['name'], array('controller' => 'item_types', 'action' => 'view', $campaignOrderType['ItemType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($campaignOrderType['CampaignOrderType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($campaignOrderType['CampaignOrderType']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($campaignOrderType['CampaignOrderType']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($campaignOrderType['CampaignOrderType']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Campaign Order Type'), array('action' => 'edit', $campaignOrderType['CampaignOrderType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Campaign Order Type'), array('action' => 'delete', $campaignOrderType['CampaignOrderType']['id']), array(), __('Are you sure you want to delete # %s?', $campaignOrderType['CampaignOrderType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaign Order Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Order Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Item Types'), array('controller' => 'item_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item Type'), array('controller' => 'item_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
