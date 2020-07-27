<?php
/**
 * Description of Amazons3Model
 *
 * @author gino
 */
class Amazons3Logs extends Model{ 
    private $tableName = 'amazon_s3_logs';
    public $logTime;
    public $logMessage;
    
    public function storeLog(){
        $sql = "INSERT INTO {$this->tableName} (log_time,log_message) VALUES ('{$this->logTime}','{$this->logMessage}');";
        $this->query($sql);
    }
    
    function getLogTime() {
        return $this->logTime;
    }

    function getLogMessage() {
        return $this->logMessage;
    }

    function setLogTime($logTime): void {
        $this->logTime = $logTime;
    }

    function setLogMessage($logMessage): void {
        $this->logMessage = $logMessage;
    }    
}
