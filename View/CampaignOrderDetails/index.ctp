<div class="campaignOrderDetails index">
	<h2><?php echo __('Campaign Order Details'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('campaign_id'); ?></th>
			<th><?php echo $this->Paginator->sort('item_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($campaignOrderDetails as $campaignOrderDetail): ?>
	<tr>
		<td><?php echo h($campaignOrderDetail['CampaignOrderDetail']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($campaignOrderDetail['Campaign']['name'], array('controller' => 'campaigns', 'action' => 'view', $campaignOrderDetail['Campaign']['id'])); ?>
		</td>
		<td><?php echo h($campaignOrderDetail['CampaignOrderDetail']['item_type_id']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderDetail['CampaignOrderDetail']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderDetail['CampaignOrderDetail']['status']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderDetail['CampaignOrderDetail']['updated']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderDetail['CampaignOrderDetail']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $campaignOrderDetail['CampaignOrderDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $campaignOrderDetail['CampaignOrderDetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $campaignOrderDetail['CampaignOrderDetail']['id']), array(), __('Are you sure you want to delete # %s?', $campaignOrderDetail['CampaignOrderDetail']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Campaign Order Detail'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('controller' => 'campaigns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign'), array('controller' => 'campaigns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
	</ul>
</div>
