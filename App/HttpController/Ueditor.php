<?php


namespace App\HttpController;


use EasySwoole\Http\AbstractInterface\Controller;

class Ueditor extends Controller
{

    public function index()
    {
        $ueditor = new \EasySwoole\Ueditor\Ueditor();

        $this->writeJson(200,$ueditor->getConfig(),'ok');
    }
}
