<div class="referenceCodes view">
<h2><?php echo __('Reference Code'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($referenceCode['ReferenceCode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($referenceCode['ReferenceCode']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($referenceCode['ReferenceCode']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($referenceCode['ReferenceCode']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reference Code'), array('action' => 'edit', $referenceCode['ReferenceCode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reference Code'), array('action' => 'delete', $referenceCode['ReferenceCode']['id']), array(), __('Are you sure you want to delete # %s?', $referenceCode['ReferenceCode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reference Codes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reference Code'), array('action' => 'add')); ?> </li>
	</ul>
</div>
