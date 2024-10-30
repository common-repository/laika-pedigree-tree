
jQuery(document).ready(function( $ ) {
	


$('#input_fields_wrap').sortable({
        update: function(e, ui) {
          var order = $('#input_fields_wrap').sortable('serialize');
           order = order.replace(/&/g, "@tag@");
           order =  order.concat('@tag@');
          $("#orderlaikaf").val(order);
          var numtimesand = order.split("[]").length-1;
          $("#orderlaikafb").val(numtimesand);
        }
      });

$('#input_fields_wrap').disableSelection();



	
    var max_fields      = 40; //maximum input boxes allowed
    var wrapper         = $("#input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    //lets dettect the number of inputs alrady loaded. 	
var x = 0;

var stopidl = false;
while (!stopidl){
if (document.getElementById("laikafieldsorder-"+x)) {
    x++;
    console.log(x);
}
else {
	
	 stopidl = true;
	
	 console.log('stop');
}}
     //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            
            $(wrapper).append('<div id= "laikafieldsorder-'+x+'" class="laikafsortable">'+object_name.laikaftag+'<input type="text" name="laikafdrag'+x+'"/> '+object_name.laikaftagma+'<input type="text" name="laikafdragtag'+x+'"/><a href="#" class="remove_field">X</a></div>'); //add input box
            x++; //text box increment
            var order = $('#input_fields_wrap').sortable('serialize');
             order = order.replace(/&/g, "@tag@");
             order =  order.concat('@tag@');
          $("#orderlaikaf").val(order);
          var numtimesand = order.split("[]").length-1;
          $("#orderlaikafb").val(numtimesand);
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); 
        var order = $('#input_fields_wrap').sortable('serialize');
         order = order.replace(/&/g, "@tag@");
         order =  order.concat('@tag@');
          $("#orderlaikaf").val(order);
          var numtimesand = order.split("[]").length-1;
          $("#orderlaikafb").val(numtimesand);
        x--;
    })
});
