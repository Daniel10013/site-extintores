<?php

namespace App\Lib\Logger;

use Exception;

class Logger{

    public static string $PATH_TO_SAVE_LOG = BASE_DIR . "/Logs";

    public static function saveLog(string $logText): void{
        $timeStamp = date("d-m-Y") . ": " . date("h:i:sa");
        $messageToSave = $timeStamp . ": {$logText}\n";
        
        $logFile = self::getLogFile();
        fwrite($logFile, $messageToSave);
    }

    private static function getLogFile(){
        $todayDate = date("d-m-Y");
        $fileName = $todayDate . ".log";

        $pathToSaveFile = self::$PATH_TO_SAVE_LOG . "\\" . $fileName;
        if(file_exists(self::$PATH_TO_SAVE_LOG . "\\" . $fileName) == true){
            $file =  fopen($pathToSaveFile, "a") or self::fileError();
            return $file;
        }

        $file = fopen($pathToSaveFile, "w") or self::fileError();
        return $file;
    }

    private static function fileError(){
        throw new Exception("Erro ao salvar log - Não foi possível abrir/criar o arquivo");
    }
}