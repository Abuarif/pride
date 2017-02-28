<div class="tabbable tabs-top">
		  <div class="tab-content">
						
				<div id="connections" class="tab-pane active">
					<div class="here"></div>	
					
				</div>
				
				
				
				
		  </div>
	</div>
	<script>
		(function(){
			$('.here','#connections').load('<?php echo $this->Html->url('/pride/reports/dashboard')?>');
                        
                        $('.here','#connections').on('submit','.formUserSearch', function(e){
                            e.preventDefault();
                            $('.here','#connections').load(this.action+"?"+$(this).serialize());
                            
                            return false;
                        });
                                                              
			                                

		})();
                
                
	</script>
</div>