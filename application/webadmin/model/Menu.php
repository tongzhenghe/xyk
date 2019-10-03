<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/16
 * Time: 10:46
 */


namespace app\webadmin\model;

use app\webadmin\model\system\SystemAdmin;

class Menu extends SystemAdmin
{
    protected $autoWriteTimestamp = true;
    protected $insert = ['is_del' => 1, 'status' => 1];

    protected function setIpAttr()
    {
        return request()->ip();
    }

}