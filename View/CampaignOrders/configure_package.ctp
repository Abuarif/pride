<script language='Javascript'>
		var boxSizeArray = [2,2,2,2,2];
</script>

<div id="dhtmlgoodies_dragDropContainer">
	<div id="dhtmlgoodies_listOfItems">
		<div>
			<p>Available Buses</p>
		<ul id="allBuses">
			<li id="wpj12">Bus A</li>
			<li id="asd123">Bus B</li>
			<li id="das12">Bus C</li>
			<li id="dss11">Bus D</li>
			<li id="aswq1">Bus E</li>
			<li id="asd23">Bus F</li>
			<li id="node7">Bus G</li>
			<li id="node8">Bus H</li>
			<li id="node9">Bus I</li>
			<li id="node10">Bus J</li>
			<li id="node11">Bus K</li>
			<li id="node12">Bus L</li>
			<li id="node13">Bus M</li>
			<li id="node14">Bus N</li>
			<li id="node15">Bus O</li>
		</ul>
		</div>
	</div>
	<div id="dhtmlgoodies_listOfItems">
		
		<div>
			<p>Approved Visuals</p>
		<ul id="allVisuals">
			<li id="v123">Visual A</li>
			<li id="v321">Visual B</li>
			<li id="v221">Visual C</li>
			<li id="v322">Visual D</li>
			<li id="v113">Visual E</li>
			
		</ul>
		</div>
	</div>
	<div id="dhtmlgoodies_mainContainer">
		<!-- ONE <UL> for each "room" -->
		<?php $count = 10; ?>
		<?php for ($loop=1; $loop <= $count; $loop++) { ?>
		
			<div>
				<p>Slot <?php echo $loop; ?></p>
				<ul id="slot<?php echo $loop; ?>">
				</ul>
			</div>
		
		<?php } ?>
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