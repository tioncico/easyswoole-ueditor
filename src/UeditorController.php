<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2020/4/27 0027
 * Time: 11:05
 */

namespace EasySwoole\Ueditor;


use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Ueditor\Config\CatcherConfig;

abstract class UeditorController extends Controller
{
    protected $rootPath = EASYSWOOLE_ROOT . '/Static';

    function index()
    {
        $action = $this->request()->getRequestParam('action');
        $this->runAction($action);
    }


    protected function runAction($actionName)
    {
        switch ($actionName) {
            case "config":
                $this->config();
                break;
            case "uploadImage":
                $this->uploadImage();
                break;
            case "uploadScrawl":
                $this->uploadScrawl();
                break;
            case "catchImage":
                $this->catchImage();
                break;
            case "uploadVideo":
                $this->uploadVideo();
                break;
            case "uploadFile":
                $this->uploadFile();
                break;
            case "listImage":
                $this->listImage();
                break;
            case "listFile":
                $this->listFile();
                break;

        }

    }

    protected function catchImage()
    {
        $ueditor = new Ueditor($this->rootPath);
        $catchImageConfig = new CatcherConfig();
        $field = $catchImageConfig->getCatcherFieldName();
        $remoteList = $this->request()->getRequestParam($field);
        $result = $ueditor->catchImage($catchImageConfig, $remoteList);
        $this->response()->write(json_encode($result));
    }

    protected function uploadImage()
    {
        $ueditor = new Ueditor($this->rootPath);
        $result = $ueditor->uploadImage($this->request());
        $this->response()->write(json_encode($result));
    }

    protected function uploadScrawl()
    {
        $ueditor = new Ueditor($this->rootPath);
        $result = $ueditor->uploadScrawl($this->request());
        $this->response()->write(json_encode($result));
    }

    protected function uploadVideo()
    {
        $ueditor = new Ueditor($this->rootPath);
        $result = $ueditor->uploadVideo($this->request());
        $this->response()->write(json_encode($result));
    }

    protected function uploadFile()
    {
        $ueditor = new Ueditor($this->rootPath);
        $result = $ueditor->uploadFile($this->request());
        $this->response()->write(json_encode($result));
    }

    protected function listImage()
    {
        $ueditor = new Ueditor($this->rootPath);
        $result = $ueditor->listImage();
        $this->response()->write(json_encode($result));
    }

    protected function listFile()
    {
        $ueditor = new Ueditor($this->rootPath);
        $result = $ueditor->listFile();
        $this->response()->write(json_encode($result));
    }

    protected function config()
    {
        $ueditor = new Ueditor();
        $this->response()->write(json_encode($ueditor->getConfig()));
    }
}
