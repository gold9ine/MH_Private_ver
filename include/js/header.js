var baseDir = "/mh";
$(function(){                              
  $("img#modeChangeButton").on('click', function(event){
      event.preventDefault();
      var menu_group = $('#menu-btn-group');
      menu_group.removeClass('menu_none');
      menu_group.removeClass('menu_atb');
      menu_group.removeClass('menu_mpb');
      menu_group.removeClass('menu_tlb');
      menu_group.addClass('menu_hcb');
      $("#content").load("/main/harmonyChart/harmonyChart.php");
    });
  $("img#harmonyChartButton").on('click', function(event){
      event.preventDefault();
      $("#content").load("/main/harmonyChart/harmonyChart.php");

      var menu_group = $('#menu-btn-group');
      menu_group.removeClass('menu_none');
      menu_group.removeClass('menu_atb');
      menu_group.removeClass('menu_mpb');
      menu_group.removeClass('menu_tlb');
      menu_group.addClass('menu_hcb');
  });
  $("img#artistRankingButton").on('click', function(event){
      event.preventDefault();
      $("#content").load("/main/artistRanking/artistRanking.php");

      var menu_group = $('#menu-btn-group');
      menu_group.removeClass('menu_none');
      menu_group.removeClass('menu_hcb');
      menu_group.removeClass('menu_mpb');
      menu_group.removeClass('menu_tlb');
      menu_group.addClass('menu_atb');
  });
  $("img#myProjectButton").on('click', function(event){
      event.preventDefault();
      $("#content").load("/main/myProject/myProject.php");

      var menu_group = $('#menu-btn-group');
      menu_group.removeClass('menu_none');
      menu_group.removeClass('menu_hcb');
      menu_group.removeClass('menu_atb');
      menu_group.removeClass('menu_tlb');
      menu_group.addClass('menu_mpb');
  });
  $("img#timelineButton").on('click', function(event){
      event.preventDefault();
      $("#content").load("/main/timeline/timeline.php");

      var menu_group = $('#menu-btn-group');
      menu_group.removeClass('menu_none');
      menu_group.removeClass('menu_hcb');
      menu_group.removeClass('menu_atb');
      menu_group.removeClass('menu_mpb');
      menu_group.addClass('menu_tlb');
  });

  $("a#user-nickname").on('click', function(event){
      event.preventDefault();
      var menu_group = $('#menu-btn-group');
      menu_group.removeClass('menu_hcb');
      menu_group.removeClass('menu_atb');
      menu_group.removeClass('menu_mpb');
      menu_group.removeClass('menu_tlb');
      menu_group.addClass('menu_none');
      $("#content").load("/main/user/my_info.php");
  });
  $("a#user-logout").on('click', function(event){
      event.preventDefault();
      var menu_group = $('#menu-btn-group');
      menu_group.removeClass('menu_hcb');
      menu_group.removeClass('menu_atb');
      menu_group.removeClass('menu_mpb');
      menu_group.removeClass('menu_tlb');
      menu_group.addClass('menu_none');
      location.href="/login/logout.php";
  });
  $("a#user-project-create").on('click', function(event){
      event.preventDefault();
      var menu_group = $('#menu-btn-group');
      menu_group.removeClass('menu_none');
      menu_group.removeClass('menu_hcb');
      menu_group.removeClass('menu_atb');
      menu_group.removeClass('menu_tlb');
      menu_group.addClass('menu_mpb');
      $("#content").load("/main/myProject/create-project.php");
  });
  $("a#home-button").on('click', function(event){
      event.preventDefault();
      var menu_group = $('#menu-btn-group');
      menu_group.removeClass('menu_none');
      menu_group.removeClass('menu_atb');
      menu_group.removeClass('menu_mpb');
      menu_group.removeClass('menu_tlb');
      menu_group.addClass('menu_hcb');
      $("#content").load("/main/harmonyChart/harmonyChart.php");
  });
});
function user_info(id){
      var menu_group = $('#menu-btn-group');
      menu_group.removeClass('menu_hcb');
      menu_group.removeClass('menu_atb');
      menu_group.removeClass('menu_mpb');
      menu_group.removeClass('menu_tlb');
      menu_group.addClass('menu_none');
      if(user_id==id){
        $("#content").load("/main/user/my_info.php");
        // $("#content").load("/main/user/user_info.php?a="+id);
      }
      else{
        $("#content").load("/main/user/user_info.php?a="+id);
      }
}
function searchAction(){
  var search_key = document.getElementById("search-box").value;
  if (search_key=="") {
    alert("Empty search area!!");
    // document.getElementById("content").innerHTML="";
    return;
  } 
  $("#content").load("/main/search/search.php?a="+search_key);
}

function searchAction1(){
  var search_key = document.getElementById("search-box").value;

  $(document).ready(function(){
    jQuery.ajax({
    type:"GET",
    url:"./search/search-query.php?a="+search_key,
    success:function(msg){
      console.log("search keyword = "+search_key); 
      var menu_group = $('#menu-btn-group');
      menu_group.removeClass('menu_hcb');
      menu_group.removeClass('menu_atb');
      menu_group.removeClass('menu_mpb');
      menu_group.removeClass('menu_tlb');
      menu_group.addClass('menu_none');
      // $("#content").load("/main/search/search-result2.php");
      $("#content").load("/main/search/search-result2.php?a="+search_key);
    }, error: function(xhr,status,error){
      alert(error);
    }
    }); 
  });
  // $("#content").load("/main/search/search-result.php");
    // tid=setTimeout(re,100); //1초후re함수실행
}

function searchAction2() {
  var search_key = document.getElementById("search-box").value;
  var str=search_key;
  if (str=="") {
    document.getElementById("content").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","./search/search-query.php?a="+str,true);
  // xmlhttp.open("GET","./search/search-result2.php?a="+str,true);
  xmlhttp.send();
  // $("#content").load("/main/search/search-result.php");
}


/////////////////////////////////////////////////////////////////////////

function getAlbumInfo(id) {
  var menu_group = $('#menu-btn-group');
  menu_group.removeClass('menu_hcb');
  menu_group.removeClass('menu_atb');
  menu_group.removeClass('menu_mpb');
  menu_group.removeClass('menu_tlb');
  menu_group.addClass('menu_none');
  var project_id=id;
  // console.log(project_id);
  $("#content").load("/main/myProject/projectInfo.php?a="+project_id);
}

function callEditProject(id) {
  var menu_group = $('#menu-btn-group');
  menu_group.removeClass('menu_hcb');
  menu_group.removeClass('menu_atb');
  menu_group.removeClass('menu_mpb');
  menu_group.removeClass('menu_tlb');
  menu_group.addClass('menu_none');
  var project_id=id;
  //fullSize();
  // $("#content").load("/edit/edit.php?project_id="+project_id);
  
  location.replace("/edit/edit.php?project_id="+project_id);

  // var str= "<iframe src='/edit/edit.php?project_id=";
  // str+=project_id;
  // str+="' width='100%' height='1000px' scrolling=yes frameBorder='0'></iframe>";
  // document.getElementById("content").innerHTML = str;
  //normalSize();
} 

function like_project(id) {
    $(document).ready(function(){
    jQuery.ajax({
    type:"POST",
    url:"/main/goodCheck.php?a="+id,
    success:function(data){
      // console.log(data);
      if(data>=1){
        alert("You have already added this project."); 
      }
      else{
            $(document).ready(function(){
              jQuery.ajax({
              type:"POST",
              url:"/main/goodFunction.php?a="+id,
              success:function(){
                alert("Complete for add to my favorite list."); 
                $("#list-group-item").load("/main/my-favorite-list.php");
              }, error: function(xhr,status,error){
                alert(error);
              }
              }); 
            });
      }
    }, error: function(xhr,status,error){
      alert(error);
    }
    }); 
  }); 
}

function favorite_delete(pro_id){
    $(document).ready(function(){
    jQuery.ajax({
    type:"POST",
    url:"/main/favorite_delete.php?a="+pro_id,
    success:function(){
      $("#list-group-item").load("/main/my-favorite-list.php");
    }, error: function(xhr,status,error){
      alert(error);
    }
    }); 
  }); 
}

function like_project1(id) {
    // createXMLHttpRequest();
  if (id=="") {
    document.getElementById("content").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","/include/config/goodCheck.php?a="+id,true);
  // xmlhttp.open("GET","./search/search-result2.php?a="+str,true);
  xmlhttp.send();
  // $("#content").load("/main/search/search-result.php");
}

function like_project2(id){
    $(document).ready(function(){
    jQuery.ajax({
    type:"GET",
    url:"/include/config/goodCheck.php?a="+id,
    success:function(){
      console.log("project_id = "+id); 
      // $("#content").load("/main/search/search-result2.php");
      // $("#content").load("/main/search/search-result2.php?a="+search_key);
    }, error: function(xhr,status,error){
      alert(error);
    }
    }); 
  });
}

function like_project3(id) {

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
  }
   // createXMLHttpRequest();
    xmlhttp.onreadystatechange = handleStateChange;
 xmlhttp.open('GET','send_coord_post.php?a='+id,true);
    xmlhttp.send();
}

////////////////////////////////////////////////

function setIFrameHeight(obj)
{
  if(obj.contentDocument)
  {
    obj.height = obj.contentDocument.body.scrollHeight + 100;
  } 
  else 
  {
    obj.height = obj.contentWindow.document.body.scrollHeight;
  }
}

function callJoin(id)
{

  $(document).ready(function(){
    jQuery.ajax({
    type:"POST",
    url:"/main/myProject/projectJoinCheck.php?a="+id,
    success:function(data){
      console.log(data);
      if(data>=1){
        alert("You have already added this project."); 
      }
      else{
            $(document).ready(function(){
              jQuery.ajax({
              type:"POST",
              url:"/main/myProject/projectJoinFunction.php?a="+id,
              success:function(){
                alert("Join the Project !!"); 
              }, error: function(xhr,status,error){
                alert(error);
              }
              }); 
            });
      }
    }, error: function(xhr,status,error){
      alert(error);
    }
    }); 
  }); 
}

function down_music(id)
{
console.log(baseDir);
  // $(document).ready(function(){
  //   jQuery.ajax({
  //   type:"POST",url:baseDir + "/main/myProject/addComment.php?a=" + id + "&b=2",
  //   success:function()
  //   {
  //       // alert("thank you!!");
  //   }, 
  //   error: function(xhr,status,error)
  //   {
  //     // alert("/mh/main/myProject/addComment.php?a="+id+"&b=2");
  //       alert(error);
  //   }
  //   }); 
  // });
}

function project_edit_mode(id){
  // alert(id);
  // $("#project_info_area").load("/main/myProject/myProject_edit.php?a="+id);
  var str= "<iframe src='/main/myProject/myProject_edit.php?a=";
  str+=id;
  str+="' width='705px' height='310px' scrolling=no frameBorder='0'></iframe>";
  document.getElementById("project_info_area").innerHTML = str;
  //normalSize();
}

// function normalSize(){
//   var contentArea = $('#content');
//   contentArea.removeClass('middlefullArea');
//   //contentArea.addClass('middleArea');
// }

// function fullSize(){
//   var contentArea = $('#content');
//   //contentArea.removeClass('middleArea');
//   contentArea.addClass('middleFullArea');
// }
/////////////////////////////////////info-audio

// $(function(){
//   $('#audio-player').mediaelementplayer({
//     alwaysShowControls: true,
//     features: ['playpause','progress','volume'],
//     audioVolume: 'horizontal',
//     audioWidth: 450,
//     audioHeight: 70,
//     iPadUseNativeControls: true,
//     iPhoneUseNativeControls: true,
//     AndroidUseNativeControls: true
//   });
// });

// function file_err()
// {
//   windows.alert("file error");
//   // window.location="/main/user/my_info_area.php";
// }