<?php

class respuesta
{
    public static function json($success, $message, $data = [])
    {
        echo json_encode(compact('success', 'message', 'data'));
        exit;
    }
}

?>