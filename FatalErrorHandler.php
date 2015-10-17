<?php
/**
 * Created by Notepad.
 * User: vasilij
 * Date: 23.09.15
 * Time: 21:40
 */

function fatalHandler() {
    $lastError = error_get_last();
    if (!is_null($lastError)) {
        echo $lastError['message'] . ' in "' . $lastError['file'] . '" line ' . $lastError['line'];
    }
}

register_shutdown_function('fatalHandler');