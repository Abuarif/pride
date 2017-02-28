<div id="connections" class="active">
	<div class="here"></div>	
	
</div>
		 
<script>
	(function(){
		$('.here','#connections').load('<?php echo $this->Html->url('/pride/reports/my_progress')?>');
					
					$('.here','#connections').on('submit','.formUserSearch', function(e){
						e.preventDefault();
						$('.here','#connections').load(this.action+"?"+$(this).serialize());
						
						return false;
					});
														  
										

	})();
			
			
</script>
