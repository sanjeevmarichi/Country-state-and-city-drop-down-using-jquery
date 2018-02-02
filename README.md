# Country-state-and-city-drop-down-using-jquery

<html>
  <head>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
 
  $('#country').change(function(){ 
    loadState($(this).find(':selected').val())
  })
  $('#state').change(function(){
    loadCity($(this).find(':selected').val())
  })


});

function loadCountry(){
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: "get=country"
            }).done(function( result ) { 
                $(result).each(function(){
                    $("#country").append($(result));
                })
            });
}
function loadState(countryId){ 
        $("#state").children().remove()
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: "get=state&countryId=" + countryId
            }).done(function( result ) { 
                
                    $("#state").append($(result));
                
            });
}
function loadCity(stateId){
        $("#city").children().remove()
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: "get=city&stateId=" + stateId
            }).done(function( result ) {
                
                    $("#city").append($(result));
                
            });
}

// init the countries
loadCountry();
</script>
</head>

<body>
  
  <div class="row">
	
	  <div class="col-md-6 col-sm-6">
        <label for="country">Country</label>
        <select type="text" name="country" id="country" >
		<option>Select Country</option></select>
      </div>
	  
      <div class="col-md-6 col-sm-6">
        <label for="state">State</label>
        <select type="text" id="state" name="state"></select>
      </div>
      
    
    
      
	  <div class="col-md-6 col-sm-6">
        <label for="city">City</label>
        <select name="city" id="city"></select>
      </div>
  </div>
  </body>
  </html>
