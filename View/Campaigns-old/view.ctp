<div class="campaigns view">
<h2><?php echo __('Campaign'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaign['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $campaign['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['created_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Campaign'), array('action' => 'edit', $campaign['Campaign']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Campaign'), array('action' => 'delete', $campaign['Campaign']['id']), array(), __('Are you sure you want to delete # %s?', $campaign['Campaign']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaign Designs'), array('controller' => 'campaign_designs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Design'), array('controller' => 'campaign_designs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaign Orders'), array('controller' => 'campaign_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Order'), array('controller' => 'campaign_orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Campaign Designs'); ?></h3>
	<?php if (!empty($campaign['CampaignDesign'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Campaign Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Tag Code'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($campaign['CampaignDesign'] as $campaignDesign): ?>
		<tr>
			<td><?php echo $campaignDesign['id']; ?></td>
			<td><?php echo $campaignDesign['campaign_id']; ?></td>
			<td><?php echo $campaignDesign['name']; ?></td>
			<td><?php echo $campaignDesign['image']; ?></td>
			<td><?php echo $campaignDesign['tag_code']; ?></td>
			<td><?php echo $campaignDesign['status']; ?></td>
			<td><?php echo $campaignDesign['comments']; ?></td>
			<td><?php echo $campaignDesign['updated']; ?></td>
			<td><?php echo $campaignDesign['updated_by']; ?></td>
			<td><?php echo $campaignDesign['created']; ?></td>
			<td><?php echo $campaignDesign['created_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'campaign_designs', 'action' => 'view', $campaignDesign['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'campaign_designs', 'action' => 'edit', $campaignDesign['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'campaign_designs', 'action' => 'delete', $campaignDesign['id']), array(), __('Are you sure you want to delete # %s?', $campaignDesign['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Campaign Design'), array('controller' => 'campaign_designs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Campaign Orders'); ?></h3>
	<?php if (!empty($campaign['CampaignOrder'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Campaign Id'); ?></th>
		<th><?php echo __('Package Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($campaign['CampaignOrder'] as $campaignOrder): ?>
		<tr>
			<td><?php echo $campaignOrder['id']; ?></td>
			<td><?php echo $campaignOrder['campaign_id']; ?></td>
			<td><?php echo $campaignOrder['package_id']; ?></td>
			<td><?php echo $campaignOrder['status']; ?></td>
			<td><?php echo $campaignOrder['updated']; ?></td>
			<td><?php echo $campaignOrder['updated_by']; ?></td>
			<td><?php echo $campaignOrder['created']; ?></td>
			<td><?php echo $campaignOrder['created_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'campaign_orders', 'action' => 'view', $campaignOrder['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'campaign_orders', 'action' => 'edit', $campaignOrder['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'campaign_orders', 'action' => 'delete', $campaignOrder['id']), array(), __('Are you sure you want to delete # %s?', $campaignOrder['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Campaign Order'), array('controller' => 'campaign_orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
