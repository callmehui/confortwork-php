<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 接口返回结果处理方法
 */
function setReturnObj($errcode, $result=null, $message=''){
  if ($errcode === 200 && !is_null($result)) {
    $data = new StdClass();
    $data->errcode = $errcode;
    $data->result = $result;
    return $data;
  } else if ($errcode === 200 && is_null($result) && $message !=='') {
    $data = new StdClass();
    $data->errcode = $errcode;
    $data->message = $message;
    return $data;
  } else if ($errcode !== 200 && $message !=='') {
    $data = new StdClass();
    $data->errcode = $errcode;
    $data->message = $message;
    return $data;
  }
}