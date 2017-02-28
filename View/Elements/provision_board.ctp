<script language='Javascript'>
		var boxSizeArray = [2];
</script>

<div id="dhtmlgoodies_dragDropContainer">
	<div id="dhtmlgoodies_listOfItems">
		<div>
			<p>Available Buses</p>
		<ul id="allBuses">
			<?php  foreach($buses as $bus) { ?>
			<li id="<?php echo $bus['bus']['id']; ?>"><?php echo $bus['depot']['name'].':'.$bus['route']['route_number'].'['.$bus['bus']['registration_number'].']'; ?></li>
			<?php } ?>
		</ul>
		</div>
	</div>
	<div id="dhtmlgoodies_listOfItems">
		
		<div>
			<p>Approved Visuals</p>
		<ul id="allVisuals">
			<?php  foreach($visuals as $visual) { ?>
			<li id="<?php echo $visual['campaign_designs']['tag_code']; ?>"><?php echo $visual['campaign_designs']['name']; ?></li>
			<?php } ?>
		</ul>
		</div>
	</div>
	<div id="dhtmlgoodies_mainContainer">
		<!-- ONE <UL> for each "room" -->
		<div>
			<p>Matching Tray</p>
			<ul id="slot-<?php echo $this->request->pass[0]; ?>">
			</ul>
		</div>
	</div>
</div>
<div id="footer">
	<form action="aPage.html" method="post"><input type="button" onclick="saveDragDropNodes()" value="Save"></form>
</div>
<ul id="dragContent"></ul>
<div id="dragDropIndicator"><img src="<?php echo $this->webroot.'theme/FlatTheme/images/insert.gif'; ?>"></div>
<div id="saveContent"><!-- THIS ID IS ONLY NEEDED FOR THE DEMO --></div>


<!--Source URL 

http://www.dhtmlgoodies.com/index.html?whichScript=drag_drop_nodes

-->