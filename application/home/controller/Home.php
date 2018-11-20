<?php
  namespace app\home\controller;

  use think\Controller;

  class Home extends Controller 
  {
    public function index() {
      echo md5('123456');
      return "/home/home/index";
    }
  }