<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2020/4/23 0023
 * Time: 17:33
 */

namespace EasySwoole\Ueditor\Config;


use EasySwoole\Spl\SplBean;

class SnapScreenConfig extends SplBean
{
    /* 截图工具上传 */
    protected $SnapScreenActionName = 'uploadimage';/* 执行上传截图的action名称 */
    protected $SnapScreenPathFormat = '/ueditor/php/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}'; /* 上传保存路径,可以自定义保存路径和文件名格式 */
    protected $SnapScreenUrlPrefix = ''; /* 图片访问路径前缀 */
    protected $SnapScreenInsertAlign = 'none';

    /**
     * @return string
     */
    public function getSnapScreenActionName(): string
    {
        return $this->SnapScreenActionName;
    }

    /**
     * @param string $SnapScreenActionName
     */
    public function setSnapScreenActionName(string $SnapScreenActionName): void
    {
        $this->SnapScreenActionName = $SnapScreenActionName;
    }

    /**
     * @return string
     */
    public function getSnapScreenPathFormat(): string
    {
        return $this->SnapScreenPathFormat;
    }

    /**
     * @param string $SnapScreenPathFormat
     */
    public function setSnapScreenPathFormat(string $SnapScreenPathFormat): void
    {
        $this->SnapScreenPathFormat = $SnapScreenPathFormat;
    }

    /**
     * @return string
     */
    public function getSnapScreenUrlPrefix(): string
    {
        return $this->SnapScreenUrlPrefix;
    }

    /**
     * @param string $SnapScreenUrlPrefix
     */
    public function setSnapScreenUrlPrefix(string $SnapScreenUrlPrefix): void
    {
        $this->SnapScreenUrlPrefix = $SnapScreenUrlPrefix;
    }

    /**
     * @return string
     */
    public function getSnapScreenInsertAlign(): string
    {
        return $this->SnapScreenInsertAlign;
    }

    /**
     * @param string $SnapScreenInsertAlign
     */
    public function setSnapScreenInsertAlign(string $SnapScreenInsertAlign): void
    {
        $this->SnapScreenInsertAlign = $SnapScreenInsertAlign;
    } /* 插入的图片浮动方式 */

}
