<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Reference Codes'), h($referenceCode['ReferenceCode']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Reference Codes'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Reference Code'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Reference Code'), array('action' => 'edit', $referenceCode['ReferenceCode']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Reference Code'), array('action' => 'delete', $referenceCode['ReferenceCode']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $referenceCode['ReferenceCode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Reference Codes'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Reference Code'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		</ul>
	</div>
</div>

<div class="referenceCodes view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($referenceCode['ReferenceCode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Value'); ?></dt>
		<dd>
			<?php echo h($referenceCode['ReferenceCode']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($referenceCode['ReferenceCode']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($referenceCode['ReferenceCode']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
