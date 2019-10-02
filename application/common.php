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
function wl_debug( $value )
{
    echo '<pre>';
    print_r( $value );
    echo '<pre>';
    exit;
}
/**
 * @return string
 */
function get_ip() {
    //strcasecmp 比较两个字符，不区分大小写。返回0，>0，<0。
    if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
        $ip = getenv('HTTP_CLIENT_IP');
    } elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    } elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
        $ip = getenv('REMOTE_ADDR');
    } elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    $res =  preg_match ( '/[\d\.]{7,15}/', $ip, $matches ) ? $matches [0] : '';
    return  $res;
}



function timeTran($time)
{
    $t = time() - $time;
    $f = array(
        '31536000' => '年',
        '2592000' => '个月',
        '604800' => '星期',
        '86400' => '天',
        '3600' => '小时',
        '60' => '分钟',
        '1' => '秒'
    );
    foreach ($f as $k => $v) {
        if (0 != $c = floor($t / (int)$k)) {
            return $c . $v  .'前';
        }
    }
}

function utf8_sub_str( $text, $statr = 0, $end = 10 )
{
    if (empty($text) ) return false;

    return mb_substr($text, $statr, $end, 'utf-8');

}

function jsondebug( $array )
{
    if (is_array($array)) {
        exit(json_encode(['json' => $array]));
    }

    exit( json_encode(['str' => $array]) );
}



function iJson( $url = null, $status = true, $msg = '提交成功' )
{
    $data = [
        'url' => $url,
        'status' =>  $status,
        'msg' => $msg,
    ];
    return  json_encode($data);

}

function  wl_debug_log( $files  , $key  = '' )
{
    $files = [$key ? $key : date('Y-m-d H : s', time()) => $files];
    $i = date('YmdHs', time());
    $error_file = $i.'error.txt';

    if (!is_dir('../runtime/errordir/'))
        mkdir('../runtime/errordir/');
    $dir = fopen("../runtime/errordir/".$error_file, "w") or die("Unable to open file!");

    fwrite($dir,  print_r($files, true));

    fclose($dir);

}



function tree($data, $pid = 0, $deep = 0 )
{
    static $arr = [];
    foreach ($data as $val) {

        if ($val['pid'] == $pid ) {
            $val['deep'] = $deep;
            $val['html'] = str_repeat('<span>&nbsp;|__</span>',$deep);
            $arr[] = $val;
            $arr = tree($data, $val['id'], $deep+1 );
        }

    }
    return $arr;

}

function _reSort($data, $parent_id = 0) {
    $return = [];//不能用static
    foreach($data as $v) {
        if($v['pid'] == $parent_id) {
            foreach($data as $subv) {
                if($subv['pid'] == $v['id']) {
                    $v['children'] = _reSort($data, $v['id']);
                    break;
                }
            }
            $return[] = $v;
        }
    }
    return $return;
}