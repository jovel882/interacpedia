<?php

if (! function_exists('getUploadMax')) {
    /**
     * Obtiene el peso maximo para carga de archivos.
     *
     * @return string
     */
    function getUploadMax(){
        return min((int)(ini_get('upload_max_filesize')), (int)(ini_get('post_max_size')), (int)(ini_get('memory_limit')));
    }
}
if (! function_exists('getUploadMaxValue')) {
    /**
     * Obtiene el valor del peso maximo para carga de archivos en kilobytes.
     *
     * @return string
     */
    function getUploadMaxValue(){
        return str_replace('M', '', getUploadMax()) * 1024;
    }
}