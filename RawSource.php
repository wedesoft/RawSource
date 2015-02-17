<?php
class RawSource extends PluginAbstract {

    public $name='RawSource';
    public $author='Alexandre Girard';
    public $description='Keep uploaded video file in UPLOAD_PATH/raw/ folder'
    public $version='1.2.0';
    public $url='http://alexgirard.com/';

    static function Load() {
      Plugin::attachEvent('encode.before_flv_encode', array(__CLASS__, 'KeepRawFile'));
    }

    static function Install() {}

    static function Uninstall() {}

    static function KeepRawFile() {
      App::LoadClass ('Video');
      global $video;

      $src_video = UPLOAD_PATH . '/temp/' . $video->filename . '.' . $video->original_extension;
      $raw_video = UPLOAD_PATH . '/raw/' . $video->filename . '.' . $video->original_extension;

      copy($src_video, $raw_video);
    }

    public function settings() {}

    public function getSystemName() {
      return get_class($this)
    }
}
?>
