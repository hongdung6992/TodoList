<div class="container">

  <div class="row">
    <?php
    // echo $data['save_message'];
    if (isset($data['action']) && $data['action'] === 'edit') {
      include_once 'edit.php';
    } else {
      include_once 'create.php';
    }
    ?>
    <div class="list-card col-md-8">
      <div class="card">
        <div class="card-header">
          <form method="POST" action="<?php echo ROOT_URL ?>/work/index">
            <div class="row">

              <div class="form-group col-md-4">
                <input class="daterangepicker-field" name="date" />
              </div>
              <div class="col-md-6">
                <input type="submit" class="btn btn-warning" value="Search">
              </div>
          </form>
          <div class="col-md-2">
            <a href="<?php echo ROOT_URL ?>/work/index" class="btn btn-primary">Create</a>
          </div>
        </div>

      </div>
      <div class="card-body works-table">
        <table id="works-table" class="table table-bordered table-striped" data-url="<?php echo ROOT_URL . '/work/reloadData' ?>">
          <thead>
            <tr>
              <th class="text-center">No.</th>
              <th class="text-center">Works</th>
              <th class="text-center">Starting at</th>
              <th class="text-center">Ending at</th>
              <th class="text-center">Status</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php include_once '_tbody.php' ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>

<?php include_once '_modal_confirm_delete.php' ?>
<?php include_once '_js.php' ?>