<?php
if ($data['works']->num_rows > 0) {;
  $index = 1;
  while ($work = $data['works']->fetch_assoc()) {
    if ($work['status'] == 1) {
      $status = 'Planing';
      $color = 'warning';
    } else if ($work['status'] == 2) {
      $status = 'Doing';
      $color = 'success';
    } else {
      $status = 'Complete';
      $color = 'danger';
    }
    ?>
    <tr>
      <td class="text-center"><?php echo $index ?></td>
      <td><?php echo $work['name'] ?></td>
      <td class="text-center"><?php echo formatToDMY($work['staring_date']) ?></td>
      <td class="text-center"><?php echo formatToDMY($work['ending_date']) ?></td>
      <td class="text-center">
        <div class="dropdown">
          <button class="btn btn-<?php echo $color ?> dropdown-toggle" data-id=<?php echo $work['id'] ?> role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $status ?>
          </button>
          <div class="dropdown-menu" data-url="<?php echo ROOT_URL . '/work/status/' , $work['id'] ?>">
            <button class="dropdown-item work-status" data-status="1">Planing</button>
            <button class="dropdown-item work-status" data-status="2">Doing</button>
            <button class="dropdown-item work-status" data-status="3">Complete</button>
          </div>
        </div>
      </td>
      <td class="text-center">
        <a class="btn bg-primary btn-sm" href="<?php echo ROOT_URL . '/work/edit/' . $work['id'] ?>">
          <i class="fas fa-edit"></i>
        </a>
        <button 
          class="btn bg-danger btn-sm" 
          data-url="<?php echo ROOT_URL . '/work/delete/' . $work['id'] ?>"
          data-id=<?php echo $work['id'] ?>
          data-toggle="modal" 
          data-target="#modal-confirm-delete"
        ><i class="fas fa-trash"></i>
        </button>
      </td>
    </tr>

<?php
    $index++;
  }
} else {
  echo '<tr><th colspan="6">Không có dữ liệu!</th></tr>';
}
?>