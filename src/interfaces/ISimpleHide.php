<?php

interface ISimpleHide
{
    public function _bit_shift(&$file_p, $file_name, $secret, $close = true);
    public function _rich_text(&$file_p, $secret, $close = true);
    public function _rename($file_path, $new_name = '');
    public function _hide_all($files);
    public function _compress();
    public function _file_split();
    public function convert_to_binary($text, $debug = false);
    public function convert_from_binary($binary, $debug = false);
    public function convert_to_int($text);
    public function convert_from_int($int);
    public function remove_non_printables($text);
    public function getMagicBytes($filename, $size = 8);
    public function match_file_extension_with_signature($filename, $debug = false);
    public function generate_random_filename();
    public function shift($text, $debug = false);
}                                 