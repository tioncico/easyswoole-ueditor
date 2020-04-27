<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2020/4/26 0026
 * Time: 9:48
 */

namespace EasySwoole\Ueditor;


use EasySwoole\Http\Request;
use EasySwoole\Spl\SplBean;
use EasySwoole\Ueditor\Config\CatcherConfig;
use EasySwoole\Ueditor\Config\ImageManagerConfig;
use EasySwoole\Ueditor\Config\SnapScreenConfig;
use EasySwoole\Ueditor\Config\UploadConfig;
use EasySwoole\Ueditor\Config\FileConfig;
use EasySwoole\Ueditor\Config\FileManagerConfig;
use EasySwoole\Ueditor\Config\ImageConfig;
use EasySwoole\Ueditor\Config\ScrawlConfig;
use EasySwoole\Ueditor\Config\VideoConfig;

class Ueditor
{
    protected $rootPath;

    public function __construct($rootPath = EASYSWOOLE_ROOT)
    {
        $this->rootPath = $rootPath;
    }

    function getConfig(array $configList = [])
    {
        $list = [];
        //默认config
        $defaultConfigList = [
            new CatcherConfig(),
            new FileConfig(),
            new FileManagerConfig(),
            new ImageConfig(),
            new ImageManagerConfig(),
            new ScrawlConfig(),
            new SnapScreenConfig(),
            new VideoConfig(),
        ];
        /**
         * @var $config SplBean
         */
        foreach ($defaultConfigList as $config) {
            $list = array_merge($list, $config->toArray());
        }

        /**
         * @var $config SplBean
         */
        foreach ($configList as $config) {
            $list = array_merge($list, $config->toArray());
        }

        return $list;
    }

    /**
     * 上传图片
     * uploadImage
     * @param Request      $request
     * @param ImageConfig  $imageConfig
     * @param UploadConfig $uploadConfig
     * @return UploadResponse
     * @author Tioncico
     * Time: 10:04
     */
    function uploadImage($request, ?ImageConfig $imageConfig = null, ?UploadConfig $uploadConfig = null): UploadResponse
    {
        $uploadConfig = $uploadConfig ?? new UploadConfig(['rootPath' => $this->rootPath]);
        $imageConfig = $imageConfig ?? new ImageConfig();
        $uploadConfig->setPathFormat($imageConfig->getImagePathFormat());
        $uploadConfig->setMaxSize($imageConfig->getImageMaxSize());
        $uploadConfig->setAllowFiles($imageConfig->getImageAllowFiles());
        $uploader = new Uploader($uploadConfig, $imageConfig->getImageFieldName(), $request, Uploader::UPLOAD_TYPE_UPLOAD);
        return $uploader->getFileInfo();
    }

    /**
     * 上传涂鸦
     * uploadScrawl
     * @param Request      $request
     * @param ScrawlConfig $scrawlConfig
     * @param UploadConfig $uploadConfig
     * @return UploadResponse
     * @author Tioncico
     * Time: 10:04
     */
    function uploadScrawl($request, ?ScrawlConfig $scrawlConfig=null, ?UploadConfig $uploadConfig = null): UploadResponse
    {
        $uploadConfig = $uploadConfig ?? new UploadConfig(['rootPath' => $this->rootPath]);
        $scrawlConfig = $scrawlConfig ?? new ScrawlConfig();
        $uploadConfig->setPathFormat($scrawlConfig->getScrawlPathFormat());
        $uploadConfig->setMaxSize($scrawlConfig->getScrawlMaxSize());
        $uploadConfig->setAllowFiles($scrawlConfig->getScrawlAllowFiles());
        $uploadConfig->setOriName('scrawl.png');
        $uploader = new Uploader($uploadConfig, $scrawlConfig->getScrawlFieldName(), $request, Uploader::UPLOAD_TYPE_BASE64);
        return $uploader->getFileInfo();
    }

    function uploadVideo($request, ?VideoConfig $videoConfig = null, ?UploadConfig $uploadConfig = null): UploadResponse
    {
        $uploadConfig = $uploadConfig ?? new UploadConfig(['rootPath' => $this->rootPath]);
        $videoConfig = $videoConfig ?? new VideoConfig();;
        $uploadConfig->setPathFormat($videoConfig->getVideoPathFormat());
        $uploadConfig->setMaxSize($videoConfig->getVideoMaxSize());
        $uploadConfig->setAllowFiles($videoConfig->getVideoAllowFiles());
        $uploader = new Uploader($uploadConfig, $videoConfig->getVideoFieldName(), $request, Uploader::UPLOAD_TYPE_UPLOAD);
        return $uploader->getFileInfo();

    }

    function uploadFile($request, ?FileConfig $fileConfig = null, ?UploadConfig $uploadConfig = null): UploadResponse
    {
        $uploadConfig = $uploadConfig ?? new UploadConfig(['rootPath' => $this->rootPath]);
        $fileConfig = $fileConfig ?? new FileConfig();
        $uploadConfig->setPathFormat($fileConfig->getFilePathFormat());
        $uploadConfig->setMaxSize($fileConfig->getFileMaxSize());
        $uploadConfig->setAllowFiles($fileConfig->getFileAllowFiles());
        $uploader = new Uploader($uploadConfig, $fileConfig->getFileFieldName(), $request, Uploader::UPLOAD_TYPE_UPLOAD);
        return $uploader->getFileInfo();
    }

    function listImage(?ImageManagerConfig $imageManagerConfig = null, $page = 1, $pageSize = 20): FileListResponse
    {
        $imageManagerConfig = $imageManagerConfig ?? new ImageManagerConfig();
        $fileManager = new FileManager($this->rootPath, $imageManagerConfig->getImageManagerListPath(), $imageManagerConfig->getImageManagerAllowFiles());
        return $fileManager->getFileList(($page - 1) * $pageSize, $pageSize);
    }

    function listFile(?FileManagerConfig $fileManagerConfig = null, $page = 1, $pageSize = 20)
    {
        $fileManagerConfig = $fileManagerConfig ?? new FileManagerConfig();
        $fileManager = new FileManager($this->rootPath, $fileManagerConfig->getFileManagerListPath(), $fileManagerConfig->getFileManagerAllowFiles());
        return $fileManager->getFileList(($page - 1) * $pageSize, $pageSize);
    }

    function catchImage(CatcherConfig $catcherConfig, $remoteList = [], ?UploadConfig $uploadConfig = null)
    {
        $catcherConfig = $catcherConfig ?? new CatcherConfig();
        $uploadConfig = $uploadConfig ?? new UploadConfig(['rootPath' => $this->rootPath]);
        $uploadConfig->setPathFormat($catcherConfig->getCatcherPathFormat());
        $uploadConfig->setMaxSize($catcherConfig->getCatcherMaxSize());
        $uploadConfig->setAllowFiles($catcherConfig->getCatcherAllowFiles());
        $uploadConfig->setOriName('remote.png');

        $list = [];
        foreach ($remoteList as $imgUrl) {
            $item = new Uploader($uploadConfig, $imgUrl, null, Uploader::UPLOAD_TYPE_REMOTE);
            $info = $item->getFileInfo();
            array_push($list, $info);
        }

        /* 返回抓取数据 */
        return [
            'state' => count($list) ? 'SUCCESS' : 'ERROR',
            'list'  => $list
        ];
    }
}
