<?php

class Work extends Database
{
  protected $table = 'works';

  // get todo list
  public function getWorks()
  {
    $sql = "SELECT * FROM works ORDER BY id DESC";
    return $this->connection->query($sql);
  }

  public function getWorksByStaringDate($from, $to){
    $sql = "SELECT * FROM works WHERE staring_date BETWEEN $from AND $to ORDER BY id DESC";
    return $this->connection->query($sql);
  }

  // create work
  public function createWork($input)
  {
    $sql = "INSERT INTO " . $this->table . " (name, staring_date, ending_date, status) 
            VALUE (
              '" . $input['name'] . "', 
              " . $input['staring_date'] . ",
              " . $input['ending_date'] . ",
              '" . $input['status'] . "'
            )";
    return $this->connection->query($sql);
  }

  // get work to edit
  public function getWorkEdit($id)
  {
    $sql = "SELECT * FROM " . $this->table . " WHERE id = $id";
    return $this->connection->query($sql);
  }

  // update work
  public function updateWork($id, $input)
  {
    $sql = "UPDATE " . $this->table . " SET 
            name          = '" . $input['name'] . "', 
            staring_date  = " . $input['staring_date'] . ", 
            ending_date   = " . $input['ending_date'] . ", 
            status        = '" . $input['status'] . "'
            WHERE id      = " . $id;
    return $this->connection->query($sql);
  }

  //delete work
  public function deleteWork($id)
  {
    $sql = "DELETE FROM " . $this->table . " WHERE id = " . $id;
    return $this->connection->query($sql);
  }

  // update status
  public function updateStatus($id, $status)
  {
    $sql = "UPDATE " . $this->table . " SET status = $status WHERE id = $id";
    return $this->connection->query($sql);
  }

  // validate form
  public function validation($input)
  {

    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
      if (empty($input['name'])) {
        $errors['name'] =  'Work name is required';
      }
      if (empty($input['staring_date'])) {
        $errors['staring_date'] =  'Staring date is required';
      }
    }
    return $errors;
  }
}
