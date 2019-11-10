<script>
  $(document).ready(function() {
    <?php
    if (isset($_SESSION['status_create'])) {
      $message = ($_SESSION['status_create'] === 'success') ? 'New record created successfully' : 'Error creating record';
      ?>
      toastr.<?php echo $_SESSION['status_create'] ?>("<?php echo $message ?>");
    <?php
    }
    ?>


    <?php
    if (isset($_SESSION['status_update'])) {
      $message = ($_SESSION['status_update'] === 'success') ? 'Record updating successfully' : 'Error updating record';
      ?>
      toastr.<?php echo $_SESSION['status_update'] ?>("<?php echo $message ?>");
    <?php
    }
    ?>
  });
</script>