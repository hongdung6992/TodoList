<?php
class WorkController extends Controller
{

  protected $works;

  function __construct()
  {
    $this->works = $this->model('Work');
  }

  public function index()
  {
    $this->view('layouts/master', [
      'page' => 'work/index',
      'works' => $this->works->getWorks()
    ]);

    $this->destroySession();
  }

  public function save()
  {
    $input = $this->getInput($_POST);

    if (count($_SESSION['errors']) <= 0) {
      if ($this->works->createWork($input)) {
        $_SESSION['status_create'] = 'success';
      } else {
        $_SESSION['status_create'] = 'error';
      }
    }
    header("location: index");
    exit;
  }

  public function edit($id)
  {
    $this->view('layouts/master', [
      'page'    => 'work/index',
      'action'  => 'edit',
      'work'    => $this->works->getWorkEdit($id)->fetch_assoc(),
      'works'   => $this->works->getWorks()
    ]);

    $this->destroySession();
  }

  public function update($id)
  {
    $input = $this->getInput($_POST);

    if (count($_SESSION['errors']) <= 0) {
      if ($this->works->updateWork($id, $input)) {
        $_SESSION['status_update'] = 'success';
        header("location: ../index");
        exit;
      } else {
        $_SESSION['status_update'] = 'error';
      }
    } else {
      header("location: ../edit/" . $id);
      exit;
    }
  }

  public function delete($id)
  {
    if ($this->works->deleteWork($id)) {
      echo json_encode([
        'status'  => 'success',
        'message' =>  'Record deleted successfully!',
      ]);
    } else {
      echo json_encode([
        'status'  => 'fails',
        'message' =>  'Error deleting record!'
      ]);
    }
  }

  public function status($id)
  {
    if ($this->works->updateStatus($id, $_POST['status'])) {
      echo json_encode([
        'status'  => 'success',
        'message' =>  'Status updating successfully!',
      ]);
    } else {
      echo json_encode([
        'status'  => 'fails',
        'message' =>  'Error updating status!'
      ]);
    }
  }

  // reload data table works after ajax called
  public function reloadData()
  {
    $this->view('work/_tbody', [
      'works' => $this->works->getWorks()
    ]);
  }

  private function getInput($input)
  {
    $_SESSION['errors'] =  $this->works->validation($input);
    return [
      'name'          => $input['name'],
      'staring_date'  => formatToYMD($input['staring_date']),
      'ending_date'   => formatToYMD($input['ending_date']),
      'status'        => $input['status']
    ];
  }

  private function destroySession()
  {
    if (isset($_SESSION['status_create']) || isset($_SESSION['status_update'])) {
      unset($_SESSION['status_create'], $_SESSION['status_update']);
    }
  }
}
