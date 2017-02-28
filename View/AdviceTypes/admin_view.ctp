<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Advice Types'), h($adviceType['AdviceType']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Advice Types'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Advice Type'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Advice Type'), array('action' => 'edit', $adviceType['AdviceType']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Advice Type'), array('action' => 'delete', $adviceType['AdviceType']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $adviceType['AdviceType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Advice Types'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Advice Type'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Payment Advices'), array('controller' => 'payment_advices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Payment Advice'), array('controller' => 'payment_advices', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="adviceTypes view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($adviceType['AdviceType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($adviceType['AdviceType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo h($adviceType['AdviceType']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($adviceType['AdviceType']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($adviceType['AdviceType']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
