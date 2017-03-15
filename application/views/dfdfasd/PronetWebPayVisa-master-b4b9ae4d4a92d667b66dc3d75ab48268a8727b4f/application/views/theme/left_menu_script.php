<!-- /.navbar-static-side -->
<script type="text/javascript">

objects = <?php echo $this->session->menu;?>;

exist = [];

$( document ).ready(function() {
  construct_menu();
});
</script>
<script>
$(document).ready(function(){
	id = 0;
	active_menu =  new Array();
	cont = 0;
	idParent ="";
	$.each(objects,function(kk,vv){
		if("/" + vv.href == window.location.pathname){
			id = vv.id;
			active_menu[0] = parseInt(id);
			idParent = "#li_" + active_menu[0];
			
		}
	});
	while(cont <10){
		idTemp = $(idParent).parent().parent().attr("id");
		if(typeof idTemp != "undefined" ){
			idParent = "#" + idTemp
			idTemp = idTemp.split("_");
			cont++
			active_menu[cont] = parseInt(idTemp[1]);	
		}
		else{
			break;
		}
	}
	$.each(active_menu,function(key,val){
		$("#li_" + val).addClass("active");
		$("#ul_"+ val ).addClass("in");
		$("#a_" + val).addClass("active");
	});
});
</script>

<script>
function construct_menu(){
  //<first level>
if(objects !== null){
  $.each(objects,function(key,value){
    if(value.parent_id == 0){

      exist.push(value.id);

      var html =
      '<li id="li_' + value.id + '" >'
      + '<a id="a_' + value.id + '" href="<?php echo base_url()?>' + value.href  + '"><i class="' + value.icon + '"></i> '
      + value.label
      + '</a>'
      + '</li>';

      $("#side-menu").append(html);
    }


  });

  //</first level>
  //<others level>

  var  i = exist.length;
  if(i > 0){

    while (i < objects.length) {

      $.each(objects,function(key,value){
        var parent_html = $("#li_" + value.parent_id).html();
        var this_html = $("#li_" + value.id).html();
        if( value.parent_id > 0 && parent_html !== undefined && this_html === undefined ){

          padding_left = $("#a_" + value.parent_id ).css("padding-left");
          padding_left = parseInt(padding_left.replace("px", ""));
          var new_padding_left = padding_left + 20;

          var child_html =
          '<li id="li_' + value.id +'">'
          +'<a id="a_' + value.id + '" href="<?php echo base_url()?>' + value.href + '" style="padding-left:' + new_padding_left + 'px" ><i class="' + value.icon + '"></i> ' + value.label + '</a>'
          +'</li>';

          if($("#ul_" + value.parent_id ).html() == undefined){
            $("#a_" + value.parent_id ).removeAttr("href");
            $("#a_" + value.parent_id ).append('<span class="fa arrow"></span>');
            $("#li_" + value.parent_id).append('<ul id="ul_' + value.parent_id + '" class="nav nav-second-level"></ul>');
          }
          $("#ul_" + value.parent_id ).append(child_html);

          i++;
        }
      });
    }
  }
  //</others levels>
}
}
</script>
