    <script>
	

		function test(b){
			
		    document.getElementById("name_client").innerHTML =".";
			document.getElementById("city_cl").innerHTML =".";
		    document.getElementById("sec_cl").innerHTML =".";
			document.getElementById("grade").innerHTML =".";
			document.getElementById("adr_cl").innerHTML =".";
			document.getElementById("type_cl").innerHTML =".";
			document.getElementById("type1").innerHTML =".";
			document.getElementById("ref1").innerHTML =".";
			document.getElementById("type2").innerHTML =".";
			document.getElementById("ref2").innerHTML =".";
			document.getElementById("rsocial").innerHTML =".";
			
			;
			document.getElementById('aCliquer').click();
			
	
		var c = b.innerHTML;
		var link = "findbyname.php" ;
		
      /*make an HTTP request using the attribute value as the file name:*/
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
			var k = new Array();
			k = JSON.parse(this.response);
			var ind = k.length;
			
		    document.getElementById("name_client").innerHTML =k[5]+".";
		    document.getElementById("rsocial").innerHTML =k[6]+".";
			document.getElementById("city_cl").innerHTML =k[3]+".";
		    document.getElementById("sec_cl").innerHTML =k[1]+".";
			document.getElementById("grade").innerHTML =k[4]+".";
			document.getElementById("adr_cl").innerHTML =k[0]+".";
			document.getElementById("type_cl").innerHTML =k[2]+".";
			var cl_vitr = k[12];
			if (ind > 13)
			{
			if (k[10]== true)
			{
			cl_vitr ="Local";
			}
			if (k[9]== true)
			{
			cl_vitr ="Silda";
			}	
			
			document.getElementById("type1").innerHTML =cl_vitr;
			document.getElementById("ref1").innerHTML =k[11];
			
		}
			if (ind > 13)
				
			{
				cl_vitr = k[16];
				if (k[14]== true)
			{
			cl_vitr ="Local";
			}
			if (k[13]== true)
			{
			cl_vitr="Silda";
			}	
			document.getElementById("type2").innerHTML =cl_vitr;
			document.getElementById("ref2").innerHTML =k[15];
				
			}	
        }
      }      
      xhttp.open("POST", link, true);
	  
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send("ref="+c);
      
      /*exit the function:*/
      return;
		}
		 
		</script>
	<aside id="sidebar_right" class="nano">
            <div class="sidebar_right_content nano-content">
                <div class="tab-block sidebar-block br-n">
                    <ul class="nav nav-tabs tabs-border nav-justified hidden">
                        <li class="active">
                            <a href="#sidebar-right-tab1" data-toggle="tab">Tab 1</a>
                        </li>
                        <li>
                            <a href="#sidebar-right-tab2" data-toggle="tab">Tab 2</a>
                        </li>
                        <li>
                            <a href="#sidebar-right-tab3" data-toggle="tab">Tab 3</a>
                        </li>
                    </ul>
                    <div class="tab-content br-n">
                        <div id="sidebar-right-tab1" class="tab-pane active">

                             <h3 class="title-divider text-success-dark mb20" id="name_client">   </h3> 
                             <div class="panel-body text-muted p10">
                            	 <div class="col-xs-5 mb10"> <h4 class="text-primary mn">R social:   </h4> </div>
								  <div class="col-xs-7 mb10"> <strong class="text-dark" id="rsocial">D </strong> </div>   
								  
								 <div class="col-xs-5 mb10"> <h4 class="text-primary mn">Catégorie:   </h4> </div>
								  <div class="col-xs-7 mb10"> <strong class="text-dark" id="grade"> </strong> </div> 
                                   <div class="col-xs-5 mb10"> <h4 class="text-primary mn">Ville:  </h4></div>
								    <div class="col-xs-7 mb10"> <strong class="text-dark" id="city_cl"> </strong></div>
                                   <div class="col-xs-5 mb10"> <h4 class="text-primary mn">Secteur:  </h4></div>
								    <div class="col-xs-7 mb10"> <strong class="text-dark" id="sec_cl"> </strong></div>
                                   
                                  


								<div class="col-xs-5 mb10"> <h4 class="text-primary mn">Adresse:   </h4> </div>
								  <div class="col-xs-7 mb10"> <strong class="text-dark" id="adr_cl"> </strong> </div>
                                   <div class="col-xs-5 mb10"> <h4 class="text-primary mn">Typologie:  </h4></div>
								    <div class="col-xs-7 mb10"> <strong class="text-dark" id="type_cl"> </strong></div>
                                   
									
									
                            </div>
                            <h5 class="title-divider text-muted mt30 mb10">Vitrine</h5>
                            <div class="row">
                                
								<blockquote class="blockquote-primary">
		<p id="ref1"></p>
  <small id="type1"></small>
</blockquote>
								
								
								
                           <blockquote class="blockquote-primary">
  <p id="ref2"></p>
  <small id="type2"></small>
</blockquote>
								
                            </div>

                            <h5 class="title-divider text-muted mt40 mb20"> <span class="pull-right text-primary fw600"></span> </h5>
							
                        </div>
                        <div id="sidebar-right-tab2" class="tab-pane"></div>
                        <div id="sidebar-right-tab3" class="tab-pane"></div>
                    </div>
                    <!-- end: .tab-content -->
                </div>
            </div>
        </aside>
        <!-- End: Right Sidebar -->

    
	</div>
    