<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2020/4/23 0023
 * Time: 17:36
 */

namespace EasySwoole\Ueditor\Config;


class FileManagerConfig
{

    /* 列出指定目录下的文件 */
    protected $fileManagerActionName = 'listfile'; /* 执行文件管理的action名称 */
    protected $fileManagerListPath = '/ueditor/php/upload/file/'; /* 指定要列出文件的目录 */
    protected $fileManagerUrlPrefix = ''; /* 文件访问路径前缀 */
    protected $fileManagerListSize = 20; /* 每次列出文件数量 */
    protected $fileManagerAllowFiles = ['.png', '.jpg', '.jpeg', '.gif', '.bmp', '.flv', '.swf', '.mkv', '.avi', '.rm', '.rmvb', '.mpeg', '.mpg', '.ogg', '.ogv', '.mov', '.wmv', '.mp4', '.webm', '.mp3', '.wav', '.mid', '.rar', '.zip', '.tar', '.gz', '.7z', '.bz2', '.cab', '.iso', '.doc', '.docx', '.xls', '.xlsx', '.ppt', '.pptx', '.pdf', '.txt', '.md', '.xml',
    ];/* 列出的文件类型 */

}
