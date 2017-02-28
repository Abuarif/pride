<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Users'), h($user['User']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Users'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'User'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit User'), array('action' => 'edit', $user['User']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete User'), array('action' => 'delete', $user['User']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Users'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New User'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Depots'), array('controller' => 'depots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Depot'), array('controller' => 'depots', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="users view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $user['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Depot'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Depot']['name'], array('controller' => 'depots', 'action' => 'view', $user['Depot']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Role'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Role']['title'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Website'); ?></dt>
		<dd>
			<?php echo h($user['User']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Activation Key'); ?></dt>
		<dd>
			<?php echo h($user['User']['activation_key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Image'); ?></dt>
		<dd>
			<?php echo h($user['User']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bio'); ?></dt>
		<dd>
			<?php echo h($user['User']['bio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Timezone'); ?></dt>
		<dd>
			<?php echo h($user['User']['timezone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo h($user['User']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($user['User']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated By'); ?></dt>
		<dd>
			<?php echo h($user['User']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created By'); ?></dt>
		<dd>
			<?php echo h($user['User']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Twitter'); ?></dt>
		<dd>
			<?php echo h($user['User']['twitter']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Facebook'); ?></dt>
		<dd>
			<?php echo h($user['User']['facebook']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Google Plus'); ?></dt>
		<dd>
			<?php echo h($user['User']['google_plus']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Linkedin'); ?></dt>
		<dd>
			<?php echo h($user['User']['linkedin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Skills'); ?></dt>
		<dd>
			<?php echo h($user['User']['skills']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Generally About'); ?></dt>
		<dd>
			<?php echo h($user['User']['generally_about']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'My Favourite Tags'); ?></dt>
		<dd>
			<?php echo h($user['User']['my_favourite_tags']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Kms Writing'); ?></dt>
		<dd>
			<?php echo h($user['User']['kms_writing']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Kms Reading'); ?></dt>
		<dd>
			<?php echo h($user['User']['kms_reading']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Kms Editing'); ?></dt>
		<dd>
			<?php echo h($user['User']['kms_editing']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Kms Traveling'); ?></dt>
		<dd>
			<?php echo h($user['User']['kms_traveling']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Kms Others'); ?></dt>
		<dd>
			<?php echo h($user['User']['kms_others']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Allow Contact'); ?></dt>
		<dd>
			<?php echo h($user['User']['allow_contact']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
