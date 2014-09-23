<?php
class RawSource {

    static function Load() {
        Plugin::Attach ( 'encode.before_flv_encode' , array( __CLASS__ , 'KeepRawFile' ) );
    }

    static function Info() {
        return array (
            'name'    => 'RawSource',
            'author'  => 'Alexandre Girard',
            'version' => '1.0.0',
            'site'    => 'http://alexgirard.com/',
            'notes'   => 'Keep uploaded video file in UPLOAD_PATH/raw/ folder'
        );
    }

    static function Install() {
    }

    static function Uninstall() {
    }

    static function KeepRawFile() {
      App::LoadClass ('Video');
      global $video;

      $src_video = UPLOAD_PATH . '/temp/' . $video->filename . '.' . $video->original_extension;
      $raw_video = UPLOAD_PATH . '/raw/' . $video->filename . '.' . $video->original_extension;

      Filesystem::Copy($src_video, $raw_video);
    }
}
?>
