<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/2
 * Time: 13:51
 */

namespace app\webadmin\controller;

use app\webadmin\model\Common as CommonModel;
use app\webadmin\model\Menu;
use app\webadmin\model\Umenu;
use think\Db;

class Xyk extends Common
{
    public  function index(){ return view();}

    public  function menu()
    {
        $where = ['is_del' => 1];
        $menu = Db::name('menu')->where($where)->select();
        $menu = tree($menu);
        return view('', ['menu' => $menu]);
    }

    public  function addmenu()
    {

        echo 434;exit;

        $param = request()->param();
        wl_debug($param);
        if (request()->isAjax()) {
            $menuModel = new Menu;
            $data = [
            'title' => trim($param['title'])
            ,'url' => trim($param['url'])
            ,'sort' => intval($param['sort'])
            ,'pid' => intval($param['pid'])
            ];

            $r = CommonModel::dataExecute($menuModel, $data, $param);
            if (!empty($r))
                exit(CommonModel::json(200, '已提交'));
            exit(CommonModel::json(400, '提交失败'));
        }

        $dataOne = null;;
        if (!empty($param['id'])) {
            $dataOne = Db::name('menu')->where('id', intval($param['id']))->find();
        }

        $where = ['is_del' => 1, 'status' => 1];
        $menu = Db::name('menu')->where($where)->select();
        $menu = tree($menu);
        return view('', ['menu' => $menu, 'dataOne' => $dataOne]);

    }

    //前台菜单
    public  function umenu()
    {
        $umenu = Db::name('umenu')->select();
        $umenu = tree($umenu);
        return view('', ['umenu' => $umenu]);
    }

    public  function addumenu()
    {
        $param = request()->param();
        if (request()->isAjax()) {
            $umenuModel = new Umenu;

            $data = [
                'title' => trim($param['title'])
                ,'url' => trim($param['url'])
                ,'icon' => !empty($param['Mobile_icon']) ? trim($param['Mobile_icon']) : null
                ,'pid' => intval($param['pid'])
                ,'is_m' => intval($param['is_m'])
                ,'sort' => intval($param['sort'])
            ];

            $r = CommonModel::dataExecute($umenuModel, $data, $param);
            if (!empty($r))
                exit(CommonModel::json(200, '已提交'));
            exit(CommonModel::json(400, '提交失败'));

        }

        $dataOne = null;;
        if (!empty($param['id'])) {
            $dataOne = Db::name('umenu')->where('id', intval($param['id']))->find();
        }

        $where = ['status' => 1];
        $umenu = Db::name('umenu')->where($where)->select();
        $umenu = tree($umenu);
        return view('', ['umenu' => $umenu, 'dataOne' => $dataOne]);

    }

    public  function app(){ return view();}
    public  function form(){ return view();}
    public  function grid(){ return view();}
    public  function button(){ return view();}
    public  function nav(){ return view();}
    public  function tab(){ return view();}
    public  function progress(){ return view();}
    public  function panel(){ return view();}
    public  function badge(){ return view();}
    public  function timeline(){ return view();}
    public  function anim(){ return view();}
    public  function auxiliar(){ return view();}
    public  function layer(){ return view();}
    public  function table(){ return view();}
    public  function laydate(){ return view();}
    public  function laypage(){ return view();}
    public  function carousel(){ return view();}
    public  function laytpl(){ return view();}
    public  function flow(){ return view();}
    public  function util(){ return view();}
    public  function code(){ return view();}
    public  function select(){ return view();}
    public  function profile(){ echo 2222;exit; return view();}


    public  function  cdnUploads()
    {
        $img = $_FILES['file'];
        $fileError = $img['error'];
        $fileType = $img['type'];

        if ($fileError == 0) {
            $file_type = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($fileType, $file_type)) {
                $arr   = [
                    'code' => 400,
                    'message'=>'文件上传失败',
                ];
                exit(json_encode($arr));
            }

            Upload::image($img);

        }

    }

}