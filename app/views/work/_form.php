<?php
$status       = isset($data['work']['status']) ? $data['work']['status'] : 1;
$name         = isset($data['work']['name']) ? $data['work']['name'] : null;
$staringDate  = isset($data['work']['staring_date']) ? formatToDMY($data['work']['staring_date']) : date("d/m/Y");
$endingDate   = isset($data['work']['ending_date']) ? formatToDMY($data['work']['ending_date']) : null;
?>

<div class="card-body">
  <input type="hidden" name="status" value="<?php echo $status ?>">
  <div class="form-group">
    <label for="name">Work</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>">
    <?php echo errorMessage('name') ?>
  </div>
  <div class="form-group">
    <label>Staring at</label>
    <input type="text" class="form-control reservation" name="staring_date" value="<?php echo $staringDate ?>">
    <?php echo errorMessage('staring_date') ?>
  </div>
  <div class="form-group">
    <label>Ending at</label>
    <input type="text" class="form-control reservation" name="ending_date" value="<?php echo $endingDate ?>">
    <?php echo errorMessage('ending_date') ?>
  </div>
</div>
<div class="card-footer">
  <input type="submit" class="btn btn-primary float-right" value="Save">
</div>