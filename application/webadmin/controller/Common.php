<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/2
 * Time: 13:51
 */

namespace app\webadmin\controller;

use app\webadmin\model\system\SystemAdmin;
use think\Controller;
use think\Db;

class Common extends Controller
{
    protected static $adminInfo;

    public  function  _initialize()
    {

//        parent::_initialize();
//        self::$adminInfo  =  SystemAdmin::activeAdminInfoOrFail();
//        if(!is_dir('./tmp/'))mkdir ('./tmp/', 0700);
//        session_save_path('./tmp/');
//        if(!SystemAdmin::hasActiveAdmin()) return $this->redirect(url());
        $where = ['status' => 1, 'is_del' => 1];
        $menu = Db::name('menu')->where($where)->select();
        $menu = _reSort($menu);
        $this->assign('menu', $menu);

    }





}