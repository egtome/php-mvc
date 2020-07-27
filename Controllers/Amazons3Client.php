<?php
/**
 * Description of Amazons3
 * 
 * @author gino
 */

class Amazons3Client{
    //use Aws\S3\S3Client;
    //use Aws\S3\Exception\S3Exception;    
    use Amazons3Utils;
    
    protected $version;
    protected $region;
        
    public function __construct($params = ['version' => 'latest', 'region' => 'us-east-1']){
        $this->version = $params['version'];
        $this->region = $params['region'];
    }
    
    function getBucket() {
        return $this->bucket;
    }

    function getKeyName() {
        return $this->keyName;
    }

    function getFileTimestampName() {
        return $this->fileTimestampName;
    }

    function getFileTmpName() {
        return $this->fileTmpName;
    }

    function setBucket($bucket): void {
        $this->bucket = $bucket;
    }

    function setKeyName($keyName): void {
        $this->keyName = $keyName;
    }

    function setFileTimestampName($fileTimestampName): void {
        $this->fileTimestampName = $fileTimestampName;
    }

    function setFileTmpName($fileTmpName): void {
        $this->fileTmpName = $fileTmpName;
    }    
    
    /*
     * Upload file in amazon S3
     * @return array with success / error info
     */    
    public function upload(): array{
        $result = [];
        try {
            // Upload data.
            $s3 = null;
            $result = $s3->putObject([
                'Bucket' => $this->bucket,
                'Key'    => $this->keyname,
                'Body'   => 'Hello, world!',
                'ACL'    => 'public-read'
            ]);

            // Print the URL to the object.
            $result['upload'] = $result['ObjectURL'];
        } catch (Throwable $t) {
            $result['error'] = $t->getMessage() . PHP_EOL;
        } 
        return $result;
    }
    
}
