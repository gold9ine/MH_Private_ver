function track_delete(id){
  $(document).ready(function(){
    jQuery.ajax({
    type:"POST",
    url:"/main/myProject/track-delete.php?a="+id,
    success:function(){ 
      location.reload();  
    }, error: function(xhr,status,error){
      alert(error);
    }
    }); 
  }); 
}

function comment_delete(id){
   $(document).ready(function(){
    jQuery.ajax({
    type:"POST",
    url:"/main/myProject/comment-delete.php?a="+id,
    success:function(data){
      location.reload();  
    }, error: function(xhr,status,error){
      alert(error);
    }
    }); 
  }); 
}

function check_comment(formEI)
{
	if (formEI.incomment.value.length == 0)
	{
		alert("Insert some comment");
		return false;
	}
	else
	{
		return true;
	}
	
}

function user_info_parents(id){
      var menu_group = parent.$('#menu-btn-group');
      menu_group.removeClass('menu_hcb');
      menu_group.removeClass('menu_atb');
      menu_group.removeClass('menu_mpb');
      menu_group.removeClass('menu_tlb');
      menu_group.addClass('menu_none');
      if(user_id==id){
        // $("#content").load("/main/user/my_info.php");
        // $("#content").load("/main/user/user_info.php?a="+id);
        parent.$("#content").load("/main/user/my_info.php");
      }
      else{
        // $("#content").load("/main/user/user_info.php?a="+id);
        parent.$("#content").load("/main/user/user_info.php?a="+id);
      }
}