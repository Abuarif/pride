
<?php if (!empty($campaignOrder['ProvisionBus'])) { ?>

<?php  
//debug 
//print_r($campaignOrder['ProvisionBus']); 
?>


<?php	foreach($campaignOrder['ProvisionBus'] as $provisionBus) { ?>
	<!--
	<iframe width='100%' src='<?php echo 'http://'.$_SERVER['SERVER_NAME'].Router::url('/').'/pride/provision_buses/view/'.$provisionBus['ProvisionBus']['id'];?>'></iframe>
	
	
	<iframe width='100%' src='http://ams-staging.pride.com.my/ams-dev/pride/provision_buses/view/<?php echo $provisionBus['ProvisionBus']['id'];?>'></iframe>
	
	http://ams-staging.pride.com.my/ams-dev/pride/provision_buses/download/-->
	
<?php	} ?>

<?php } ?>


<iframe width='100%' height='100%' src='http://ams-staging.pride.com.my/ams-dev/pride/provision_buses/view/275'></iframe>
<iframe width='100%' height='100%' src='http://ams-staging.pride.com.my/ams-dev/pride/provision_buses/view/276'></iframe>
<iframe width='100%' height='100%' src='http://ams-staging.pride.com.my/ams-dev/pride/provision_buses/view/277'></iframe>