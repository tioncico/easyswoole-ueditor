<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2020/4/23 0023
 * Time: 17:36
 */

namespace EasySwoole\Ueditor\Config;


class ImageManagerConfig
{


    /* 列出指定目录下的图片 */
    protected $imageManagerActionName = 'listimage'; /* 执行图片管理的action名称 */
    protected $imageManagerListPath = '/ueditor/php/upload/image/'; /* 指定要列出图片的目录 */
    protected $imageManagerListSize = 20; /* 每次列出文件数量 */
    protected $imageManagerUrlPrefix = ''; /* 图片访问路径前缀 */
    protected $imageManagerInsertAlign = 'none'; /* 插入的图片浮动方式 */
    protected $imageManagerAllowFiles = ['.png', '.jpg', '.jpeg', '.gif', '.bmp',
    ]; /* 列出的文件类型 */

}
