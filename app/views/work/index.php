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
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">To-do list</h3>
          <span class="float-right">
            <a href="<?php echo ROOT_URL ?>/work/index" class="btn btn-primary">Create</a>
          </span>
        </div>
        <div class="card-body">
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

<?php include_once '_modal_confirm_delete.php'?>
<?php include_once '_js.php' ?>