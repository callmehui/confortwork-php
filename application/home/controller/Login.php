<?php
  namespace app\home\controller;

  use think\Controller;

  class Login extends controller
  {
    public function login($account, $password, $remember_login) 
    {
      $result = db('user_user')->where('account', $account)->where('password', md5($password))->find();
      $returnObj;
      if($result) {
        $returnObj = setReturnObj(200, $result);
      } else {
        $returnObj = setReturnObj(200, null, "用户名或者密码错误！");
      }
      return $returnObj;
    }
  }