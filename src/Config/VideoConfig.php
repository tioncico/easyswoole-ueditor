<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2020/4/23 0023
 * Time: 17:34
 */

namespace EasySwoole\Ueditor\Config;


use EasySwoole\Spl\SplBean;

class VideoConfig extends SplBean
{
    /* 上传视频配置 */
    protected $videoActionName = 'uploadvideo'; /* 执行上传视频的action名称 */
    protected $videoFieldName = 'upfile'; /* 提交的视频表单名称 */
    protected $videoPathFormat = '/ueditor/php/upload/video/{yyyy}{mm}{dd}/{time}{rand:6}'; /* 上传保存路径,可以自定义保存路径和文件名格式 */
    protected $videoUrlPrefix = ''; /* 视频访问路径前缀 */
    protected $videoMaxSize = 102400000; /* 上传大小限制，单位B，默认100MB */
    protected $videoAllowFiles = ['.flv', '.swf', '.mkv', '.avi', '.rm', '.rmvb', '.mpeg', '.mpg', '.ogg', '.ogv', '.mov', '.wmv', '.mp4', '.webm', '.mp3', '.wav', '.mid',]; /* 上传视频格式显示 */

}
