<script>
$(function(){
    var menu_group = $('#menu-btn-group');
    menu_group.removeClass('menu_none');
    menu_group.removeClass('menu_atb');
    menu_group.removeClass('menu_mpb');
    menu_group.removeClass('menu_tlb');
    menu_group.addClass('menu_hcb');
});
</script>
<?php
  // $base_dir = "/home/mh/soma/webpage";
  include($_SERVER["DOCUMENT_ROOT"]."/main/harmonyChart/harmonyChart_connect.php");
  include($_SERVER["DOCUMENT_ROOT"]."/main/harmonyChart/harmonyChart-carousel.php");
  include($_SERVER["DOCUMENT_ROOT"]."/main/harmonyChart/harmonyChart-list.php");
?>