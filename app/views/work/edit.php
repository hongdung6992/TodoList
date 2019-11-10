<div class="col-md-4 form-card">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool btn-close" data-card-widget="collapse"><i class="fas fa-times"></i></button>
      </div>
    </div>
    <form method="POST" action="<?php echo ROOT_URL . '/work/update/' . $data['work']['id'] ?>">
    
      <?php include_once '_form.php' ?>

    </form>
  </div>
</div>

