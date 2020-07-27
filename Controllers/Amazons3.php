<?php
/**
 * Description of Amazons3
 * 
 * @author gino
 */
class Amazons3 extends Controller{
    use Amazons3Utils;
    
    public function index(){
        $this->view->title = 'Amazon S3 - Example';        
        $this->handleMessages();
        $this->view->render('amazons3/index');        
    }
    
    public function upload(){
        $result = $this->uploadFile();
        if(isset($result['error'])){
            $_SESSION['amz_s3_upload']['error'] = $result['error'];
        }else{
            $_SESSION['amz_s3_upload']['message'] = 'File Uploaded Successfully';
        }
        header('Location: /amazons3');
    }
    
    private function handleMessages(){
        if(isset($_SESSION['amz_s3_upload']['error'])){
            $this->view->error = $_SESSION['amz_s3_upload']['error'];
            unset($_SESSION['amz_s3_upload']['error']);
        }
        if(isset($_SESSION['amz_s3_upload']['message'])){
            $this->view->message = $_SESSION['amz_s3_upload']['message'];
            unset($_SESSION['amz_s3_upload']['message']);
        }        
    }
}
