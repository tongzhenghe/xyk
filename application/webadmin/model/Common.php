<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/16
 * Time: 11:26
 */

namespace app\webadmin\model;


use app\webadmin\model\system\SystemAdmin;

class Common extends  SystemAdmin
{
    public static function dataExecute($model, $data, $param = null)
    {

        if (!empty($param['id'])) {
            return $model->save($data, ['id' => intval($param['id'])]);
        } else {
            return $model->save($data);
        }

    }

    public static function json($code, $msg = '', $url = '')
    {
        $result = [
            'code' => $code,
            'msg' => $msg,
            'url' => $url
        ];

        return json_encode($result);

    }


}