<?php
class HomeController extends Controller
{

  function index()
  {
    $tmp = $this->model('Work');
    echo $tmp->getWork();
  }

  function show($id, $a)
  {
    echo 'Home - Show - ' . $id . ' - ' . $a;
  }
}
