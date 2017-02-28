<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Campaign Designs');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Campaign Designs'), array('action' => 'index'));

?>

<div class="campaignDesigns index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('campaign_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('files'); ?></th>
		<th><?php echo $this->Paginator->sort('tag_code'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('comments'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('created_by'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($campaignDesigns as $campaignDesign): ?>
	<tr>
		<td><?php echo h($campaignDesign['CampaignDesign']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($campaignDesign['Campaign']['name'], array('controller' => 'campaigns', 'action' => 'view', $campaignDesign['Campaign']['id'])); ?>
		</td>
		<td><?php echo h($campaignDesign['CampaignDesign']['name']); ?>&nbsp;</td>
		<td><?php echo h($campaignDesign['CampaignDesign']['files']); ?>&nbsp;</td>
		<td><?php echo h($campaignDesign['CampaignDesign']['tag_code']); ?>&nbsp;</td>
		<td><?php echo h($campaignDesign['CampaignDesign']['status']); ?>&nbsp;</td>
		<td><?php echo h($campaignDesign['CampaignDesign']['comments']); ?>&nbsp;</td>
		<td><?php echo h($campaignDesign['CampaignDesign']['updated']); ?>&nbsp;</td>
		<td><?php echo h($campaignDesign['CampaignDesign']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($campaignDesign['CampaignDesign']['created']); ?>&nbsp;</td>
		<td><?php echo h($campaignDesign['CampaignDesign']['created_by']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $campaignDesign['CampaignDesign']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $campaignDesign['CampaignDesign']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $campaignDesign['CampaignDesign']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $campaignDesign['CampaignDesign']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
