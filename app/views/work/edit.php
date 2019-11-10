<div class="col-md-4">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit</h3>
    </div>
    <form method="POST" action="<?php echo ROOT_URL . '/work/update/' . $data['work']['id'] ?>">
    
      <?php include_once '_form.php' ?>

    </form>
  </div>
</div>

