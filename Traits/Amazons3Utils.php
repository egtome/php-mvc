<?php
/**
 * Description of AmazonUtils
 *
 * @author gino
 */
trait Amazons3Utils {
    /*
     * Upload file
     * @return array result
     */
    public function uploadFile(): array{
        $return = [];
        $fileName = !empty($_FILES['filename']['name']) ? $_FILES['filename']['name'] : null;
        //Validations
        if($fileName === null){
            $return['error'] = 'No file uploaded';
        }else{
            if(!$this->validateFileExtension($_FILES['filename']['name'])){
                $allowedExtensions = $this->getAllowedExtensionsString();
                $return['error'] = "No file extension supported. Please upload $allowedExtensions ";
                $this->log(['message' => $return['error']]);
            }else{
                $fileTimestampName = $this->getFileNameBytimestamp($fileName);
                $fileTmpName = $this->getFileNameBytimestamp($fileName);

                $client = new Amazons3Client();
                $client->setFileTmpName($fileTmpName);
                $client->setFileTimestampName($fileTimestampName);
                $result = $client->upload();  
                if(isset($result['error'])){
                    $return['error'] = $result['error'];
                    $this->log(['message' => $result['error']]);
                }else{
                    $return['success'] = 'File uploaded successfully';
                    $this->log(['message' => $return['success']]);
                }            
            }
        }
        return $return;
    }    
    
    /*
     * Log in Amazons3Log
     * @param array $data data to log
     * @return bool log result
     */
    public function log(array $data): bool{
        $amzModel = new Amazons3Logs();
        $amzModel->setLogTime(date('Y-m-d H:i:s'));
        $amzModel->setLogMessage($data['message']);
        return (bool) $amzModel->storeLog();
    }
    
    /*
     * Get file extension
     * @param string $fileName the file name
     * @return string extension
     */
    public function getFileExtension(string $fileName): ? string{
        $arr = explode('.',$fileName);
        $extension = isset($arr[1]) ? strtolower($arr[1]) : '';
        return $extension;
    }
    
    /*
     * Validate filename extension against S3_ALLOWED_EXTENSIONS
     * @param string $fileName the file name
     * @return bool true = valid false = invalid
     */
    public function validateFileExtension(string $fileName): ? bool{
        return in_array($this->getFileExtension($fileName), S3_ALLOWED_EXTENSIONS);
    }
    
    /*
     * Get allowed extensions string from S3_ALLOWED_EXTENSIONS
     * @return string extensions allowed
     */
    public function getAllowedExtensionsString(): string{
        return implode(', ', S3_ALLOWED_EXTENSIONS);
    }
    
    /*
     * Get filename by timestamp
     * @param string $fileName the file name
     * @return string filename
     */
    public function getFileNameBytimestamp(string $filename): string{
        $extension = $this->getFileExtension($filename);
        return time() . '.' . $extension;
    }
}
