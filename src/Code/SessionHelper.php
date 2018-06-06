<?php

namespace Code;


/**
 * [SessionHelper session 辅助类]
 * @Author   W_wang
 * @email    1352255400@qq.com
 * @DateTime 2018-06-06T15:03:34+0800
 * @param    integer                  $code [description]
 * @return   [type]                         [description]
 */
class SessionHelper {

    /**
     * gouw构造方法
     * @return
     */
    public function __construct()
    {
        session_start();
    }
 
    /**
     * 保存
     * @return mixed
     */
    public function set($name = '', $value = '')
    {
        if ($name == '') {
            return false;
        }
        $_SESSION[$name] = $value;
        return true;
    }
 
    /**
     * 获取
     * @return mixed
     */
    public function get($name = '')
    {
        if(isset($_SESSION[$name]))
            return $_SESSION[$name];
        else
            return false;
    }
 
    /**
     * 删除
     * @return mixed
     */
    public function del($name = '')
    {
        if ($name == '') {
            return false;
        }
        unset($_SESSION[$name]);
    }
 
    /**
     * 销毁
     * @return mixed
     */
    public function destroy()
    {
        $_SESSION = array();
        session_destroy();
    }
}