<div class="itemTypes view">
<h2><?php echo __('Item Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($itemType['ItemType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($itemType['ItemType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($itemType['ItemType']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($itemType['ItemType']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($itemType['ItemType']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($itemType['ItemType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($itemType['ItemType']['created_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Item Type'), array('action' => 'edit', $itemType['ItemType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Item Type'), array('action' => 'delete', $itemType['ItemType']['id']), array(), __('Are you sure you want to delete # %s?', $itemType['ItemType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Item Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages'), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package'), array('controller' => 'packages', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Packages'); ?></h3>
	<?php if (!empty($itemType['Package'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Item Type Id'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($itemType['Package'] as $package): ?>
		<tr>
			<td><?php echo $package['id']; ?></td>
			<td><?php echo $package['name']; ?></td>
			<td><?php echo $package['quantity']; ?></td>
			<td><?php echo $package['item_type_id']; ?></td>
			<td><?php echo $package['image']; ?></td>
			<td><?php echo $package['status']; ?></td>
			<td><?php echo $package['updated']; ?></td>
			<td><?php echo $package['updated_by']; ?></td>
			<td><?php echo $package['created']; ?></td>
			<td><?php echo $package['created_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'packages', 'action' => 'view', $package['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'packages', 'action' => 'edit', $package['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'packages', 'action' => 'delete', $package['id']), array(), __('Are you sure you want to delete # %s?', $package['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Package'), array('controller' => 'packages', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
