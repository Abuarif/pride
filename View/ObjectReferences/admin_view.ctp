<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Object References'), h($objectReference['ObjectReference']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Object References'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Object Reference'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Object Reference'), array('action' => 'edit', $objectReference['ObjectReference']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Object Reference'), array('action' => 'delete', $objectReference['ObjectReference']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $objectReference['ObjectReference']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Object References'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Object Reference'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Approvals'), array('controller' => 'approvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Approval'), array('controller' => 'approvals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="objectReferences view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($objectReference['ObjectReference']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($objectReference['ObjectReference']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Id Column Name'); ?></dt>
		<dd>
			<?php echo h($objectReference['ObjectReference']['Id_column_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($objectReference['ObjectReference']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($objectReference['ObjectReference']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
