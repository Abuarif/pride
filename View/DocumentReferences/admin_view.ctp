<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Document References'), h($documentReference['DocumentReference']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Document References'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Document Reference'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Document Reference'), array('action' => 'edit', $documentReference['DocumentReference']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Document Reference'), array('action' => 'delete', $documentReference['DocumentReference']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $documentReference['DocumentReference']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Document References'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Document Reference'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organization Attachments'), array('controller' => 'organization_attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization Attachment'), array('controller' => 'organization_attachments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="documentReferences view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($documentReference['DocumentReference']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($documentReference['DocumentReference']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Doc Type'); ?></dt>
		<dd>
			<?php echo h($documentReference['DocumentReference']['doc_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo h($documentReference['DocumentReference']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($documentReference['DocumentReference']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($documentReference['DocumentReference']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
