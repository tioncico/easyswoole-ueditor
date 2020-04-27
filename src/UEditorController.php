<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2020/4/27 0027
 * Time: 11:05
 */

namespace EasySwoole\UEditor;


use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\UEditor\Config\CatcherConfig;

abstract class UEditorController extends Controller
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
        $UEditor = new UEditor($this->rootPath);
        $catchImageConfig = new CatcherConfig();
        $field = $catchImageConfig->getCatcherFieldName();
        $remoteList = $this->request()->getRequestParam($field);
        $result = $UEditor->catchImage($catchImageConfig, $remoteList);
        $this->response()->write(json_encode($result));
    }

    protected function uploadImage()
    {
        $UEditor = new UEditor($this->rootPath);
        $result = $UEditor->uploadImage($this->request());
        $this->response()->write(json_encode($result));
    }

    protected function uploadScrawl()
    {
        $UEditor = new UEditor($this->rootPath);
        $result = $UEditor->uploadScrawl($this->request());
        $this->response()->write(json_encode($result));
    }

    protected function uploadVideo()
    {
        $UEditor = new UEditor($this->rootPath);
        $result = $UEditor->uploadVideo($this->request());
        $this->response()->write(json_encode($result));
    }

    protected function uploadFile()
    {
        $UEditor = new UEditor($this->rootPath);
        $result = $UEditor->uploadFile($this->request());
        $this->response()->write(json_encode($result));
    }

    protected function listImage()
    {
        $UEditor = new UEditor($this->rootPath);
        $result = $UEditor->listImage();
        $this->response()->write(json_encode($result));
    }

    protected function listFile()
    {
        $UEditor = new UEditor($this->rootPath);
        $result = $UEditor->listFile();
        $this->response()->write(json_encode($result));
    }

    protected function config()
    {
        $UEditor = new UEditor();
        $this->response()->write(json_encode($UEditor->getConfig()));
    }
}
