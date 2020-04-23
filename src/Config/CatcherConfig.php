<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2020/4/23 0023
 * Time: 17:34
 */

namespace EasySwoole\Ueditor\Config;


use EasySwoole\Spl\SplBean;

class CatcherConfig extends SplBean
{
    /* 抓取远程图片配置 */
    protected $catcherLocalDomain = ['127.0.0.1', 'localhost', 'img.baidu.com',];
    protected $catcherActionName = 'catchimage'; /* 执行抓取远程图片的action名称 */
    protected $catcherFieldName = 'source'; /* 提交的图片列表表单名称 */
    protected $catcherPathFormat = '/ueditor/php/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}'; /* 上传保存路径,可以自定义保存路径和文件名格式 */
    protected $catcherUrlPrefix = ''; /* 图片访问路径前缀 */
    protected $catcherMaxSize = 2048000; /* 上传大小限制，单位B */
    protected $catcherAllowFiles = ['.png', '.jpg', '.jpeg', '.gif', '.bmp',];

    /**
     * @return array
     */
    public function getCatcherLocalDomain(): array
    {
        return $this->catcherLocalDomain;
    }

    /**
     * @param array $catcherLocalDomain
     */
    public function setCatcherLocalDomain(array $catcherLocalDomain): void
    {
        $this->catcherLocalDomain = $catcherLocalDomain;
    }

    /**
     * @return string
     */
    public function getCatcherActionName(): string
    {
        return $this->catcherActionName;
    }

    /**
     * @param string $catcherActionName
     */
    public function setCatcherActionName(string $catcherActionName): void
    {
        $this->catcherActionName = $catcherActionName;
    }

    /**
     * @return string
     */
    public function getCatcherFieldName(): string
    {
        return $this->catcherFieldName;
    }

    /**
     * @param string $catcherFieldName
     */
    public function setCatcherFieldName(string $catcherFieldName): void
    {
        $this->catcherFieldName = $catcherFieldName;
    }

    /**
     * @return string
     */
    public function getCatcherPathFormat(): string
    {
        return $this->catcherPathFormat;
    }

    /**
     * @param string $catcherPathFormat
     */
    public function setCatcherPathFormat(string $catcherPathFormat): void
    {
        $this->catcherPathFormat = $catcherPathFormat;
    }

    /**
     * @return string
     */
    public function getCatcherUrlPrefix(): string
    {
        return $this->catcherUrlPrefix;
    }

    /**
     * @param string $catcherUrlPrefix
     */
    public function setCatcherUrlPrefix(string $catcherUrlPrefix): void
    {
        $this->catcherUrlPrefix = $catcherUrlPrefix;
    }

    /**
     * @return int
     */
    public function getCatcherMaxSize(): int
    {
        return $this->catcherMaxSize;
    }

    /**
     * @param int $catcherMaxSize
     */
    public function setCatcherMaxSize(int $catcherMaxSize): void
    {
        $this->catcherMaxSize = $catcherMaxSize;
    }

    /**
     * @return array
     */
    public function getCatcherAllowFiles(): array
    {
        return $this->catcherAllowFiles;
    }

    /**
     * @param array $catcherAllowFiles
     */
    public function setCatcherAllowFiles(array $catcherAllowFiles): void
    {
        $this->catcherAllowFiles = $catcherAllowFiles;
    } /* 抓取图片格式显示 */


}
