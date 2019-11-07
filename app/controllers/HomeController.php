<?php
class HomeController
{

  function index()
  {
    echo 'Home - Index';
  }

  function show($id, $a)
  {
    echo 'Home - Show - ' . $id . ' - ' . $a;
  }
}
