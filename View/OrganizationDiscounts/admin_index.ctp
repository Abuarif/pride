<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Organization Discounts');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organization Discounts'), array('action' => 'index'));

?>

<div class="organizationDiscounts index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('user_id'); ?></th>
		<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('rate'); ?></th>
		<th><?php echo $this->Paginator->sort('validity_start_date'); ?></th>
		<th><?php echo $this->Paginator->sort('validity_end_date'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($organizationDiscounts as $organizationDiscount): ?>
	<tr>
		<td><?php echo h($organizationDiscount['OrganizationDiscount']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($organizationDiscount['User']['name'], array('controller' => 'users', 'action' => 'view', $organizationDiscount['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($organizationDiscount['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationDiscount['Organization']['id'])); ?>
		</td>
		<td><?php echo h($organizationDiscount['OrganizationDiscount']['name']); ?>&nbsp;</td>
		<td><?php echo h($organizationDiscount['OrganizationDiscount']['rate']); ?>&nbsp;</td>
		<td><?php echo h($organizationDiscount['OrganizationDiscount']['validity_start_date']); ?>&nbsp;</td>
		<td><?php echo h($organizationDiscount['OrganizationDiscount']['validity_end_date']); ?>&nbsp;</td>
		<td><?php echo h($organizationDiscount['OrganizationDiscount']['status']); ?>&nbsp;</td>
		<td><?php echo h($organizationDiscount['OrganizationDiscount']['updated']); ?>&nbsp;</td>
		<td><?php echo h($organizationDiscount['OrganizationDiscount']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $organizationDiscount['OrganizationDiscount']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $organizationDiscount['OrganizationDiscount']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $organizationDiscount['OrganizationDiscount']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $organizationDiscount['OrganizationDiscount']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
