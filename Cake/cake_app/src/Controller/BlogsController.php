<?php
namespace App\Controller;

class BlogsController extends AppController{

  public function home()
  {
    $this->viewBuilder()->setLayout('ajax');
  }
}
