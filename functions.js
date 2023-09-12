
/*************************************************************************
                           Acces User
**************************************************************************/			
function accesuser() {
   var email=$("#email_acces"), pass=$("#pass_acces");
	
		if(pass.val()==undefined || pass.val()=="") {
		  alert("Veuillez saisir le mot de passe ");
		  pass.focus();
		  return false;
		}
		
		$.ajax({
		
	type: "POST",
			data: "email_user="+encodeURIComponent(email.val())+"&pass_user="+encodeURIComponent(pass.val()),
			url: "acces.php",
			beforeSend: function(){
				
				//document.getElementById('btnaddservice').src='../images/ajax-loader.gif';
			},
			success: function(data){
				//alert(data);
	
				if(data==1) {
				  window.location.href='/home.php';
				}
				else if(data==2) {
				  alert("Erreur d'authentification");
				}
				else if(data==3) {
				  alert("Erreur d'authentification");
				}
			}
		});
  }
  
