<?php
  namespace app\home\controller;

  use think\Controller;

  class Login extends controller
  {
    // 登录接口
    public function login($account, $password, $remember_login) 
    {
      $returnObj;
      $result = db('user_user')->where('account', $account)->where('password', md5($password))->find();
      if($result) {
        $resultUpdate = db('user_user')->where('account', $account)
          ->data(['remember_login' => $remember_login, 'is_login' => 'true', 'last_login_at' => date("Y-m-d H:i:s")])->update();
        $returnObj = setReturnObj(200, null, "登陆成功！");
      } else {
        $returnObj = setReturnObj(500, null, "用户名或者密码错误！");
      }
      return $returnObj;
    }

    // 注册接口
    public function register($account, $password, $nickname) 
    {
      $returnObj;
      $result = db('user_user')->where('account', $account)->find();
      if(!$result) {
        $data = [
          'account' => $account, 
          'password' => md5($password), 
          'nickname' => $nickname,  
          'is_login' => 'true', 
          'create_at' => date("Y-m-d H:i:s"),
          'last_login_at' => date("Y-m-d H:i:s")
        ];
        $resultInsert = db('user_user')->data($data)->insert();
        if ($resultInsert) {
          $returnObj = setReturnObj(200, null, "账号注册成功！");
        } else {
          $returnObj = setReturnObj(500, null, "注册功能异常，请稍后再试！");
        }
      } else {
        $returnObj = setReturnObj(500, null, "手机号已存在，请登录！");
      }
      return $returnObj;
    }
  }