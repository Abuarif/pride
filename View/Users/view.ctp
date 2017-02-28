<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $user['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Depot'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Depot']['name'], array('controller' => 'depots', 'action' => 'view', $user['Depot']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Role']['title'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($user['User']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activation Key'); ?></dt>
		<dd>
			<?php echo h($user['User']['activation_key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($user['User']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bio'); ?></dt>
		<dd>
			<?php echo h($user['User']['bio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timezone'); ?></dt>
		<dd>
			<?php echo h($user['User']['timezone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($user['User']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($user['User']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($user['User']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($user['User']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Twitter'); ?></dt>
		<dd>
			<?php echo h($user['User']['twitter']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facebook'); ?></dt>
		<dd>
			<?php echo h($user['User']['facebook']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Google Plus'); ?></dt>
		<dd>
			<?php echo h($user['User']['google_plus']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Linkedin'); ?></dt>
		<dd>
			<?php echo h($user['User']['linkedin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Skills'); ?></dt>
		<dd>
			<?php echo h($user['User']['skills']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Generally About'); ?></dt>
		<dd>
			<?php echo h($user['User']['generally_about']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('My Favourite Tags'); ?></dt>
		<dd>
			<?php echo h($user['User']['my_favourite_tags']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kms Writing'); ?></dt>
		<dd>
			<?php echo h($user['User']['kms_writing']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kms Reading'); ?></dt>
		<dd>
			<?php echo h($user['User']['kms_reading']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kms Editing'); ?></dt>
		<dd>
			<?php echo h($user['User']['kms_editing']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kms Traveling'); ?></dt>
		<dd>
			<?php echo h($user['User']['kms_traveling']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kms Others'); ?></dt>
		<dd>
			<?php echo h($user['User']['kms_others']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Allow Contact'); ?></dt>
		<dd>
			<?php echo h($user['User']['allow_contact']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Depots'), array('controller' => 'depots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Depot'), array('controller' => 'depots', 'action' => 'add')); ?> </li>
	</ul>
</div>
