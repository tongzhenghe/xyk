<?php



namespace app\extra;

// 引入七牛鉴权类

use Qiniu\Auth;

// 引入七牛上传类

use Qiniu\Storage\UploadManager;



class Upload

{
    public static function image( $file, $or_conf = null)
    {
        if(empty($file['tmp_name']))
            exit(iJson(null , false, '文件读取失败'));

        $tmp_name = $file['tmp_name'];

        $ext = strtolower(strrchr($file['name'],'.'));
        $ext_arr = ['.jpg', '.png', '.gif'];

        if (!in_array($ext, $ext_arr))
            exit(iJson(null , false, '文件类型错误！'));

        $conf = ( !empty( $or_conf )) ? $or_conf : config('Qiniu_CONFIG');

        //鉴权对象
        $auth = new Auth($conf['accessKey'],$conf['secretKey']);

        // 生成token
        $token = $auth->uploadToken($conf['bucket']);

        //文件名
        $filename = date('Y').'/'.date('m').'/'.substr(md5($tmp_name),8,5).date('Ymd').rand(0,9999).$ext;

        // 初始化UploadManager类
        $uploadMgr = new UploadManager();

        list( $res, $err ) = $uploadMgr->putFile( $token, $filename, $tmp_name );

        if($err !== null) {

            exit(false);

        }else{

            $arr   = [
                'code' => 0,
                'message'=>'',
                'data' => [
                    'src' => $conf['domain'].$filename
                ],
            ];
            exit(json_encode($arr));

        }

    }



    /**

     * 删除图片

     * @param $delFileName:要删除的图片文件，与七牛云空间存在的文件名称相同

     * @return bool

     */

    public static function delimage( $delFileName )

    {

        // 判断是否是图片;

        $isImage = preg_match('/.*(\.png|\.jpg|\.jpeg|\.gif)$/', $delFileName);



        if( empty($isImage) ){

            return false;

        }



        $conf = config('Qiniu_CONFIG');



        //鉴权对象

        $auth = new Auth($conf['accessKey'],$conf['secretKey']);



        // 配置

        $config = new \Qiniu\Config();



        // 管理资源

        $bucketManager = new \Qiniu\Storage\BucketManager($auth, $config);



        // 删除文件操作

        $res = $bucketManager->delete($conf['bucket'], $delFileName);



        if ( is_null($res) ) {

            // 为null成功

            return true;

        }



        return false;



    }



}

