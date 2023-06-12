<?php



?>

<div id="loadData">
  
  <!-- JS -->
<script type="text/javascript">

  function loadData() {
    $.get("src/components/ajax/unggahan_loker.php", function(data) {
      $("#loadData").html(data);
    });
  }

  loadData();
  
</script>

</div>