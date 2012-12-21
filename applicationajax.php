<?php
spl_autoload_register(function ($className) {
            $possibilities = array(
                'Bo' . DIRECTORY_SEPARATOR . $className . '.php',
                'Cls' . DIRECTORY_SEPARATOR . $className . '.php',
                'Cls/Config' . DIRECTORY_SEPARATOR . $className . '.php',
                'Cls/DBConnection' . DIRECTORY_SEPARATOR . $className . '.php',
                'Types' . DIRECTORY_SEPARATOR . $className . '.php',
                'Models' . DIRECTORY_SEPARATOR . $className . '.php',
                $className . '.php'
            );
            foreach ($possibilities as $file) {
                if (file_exists($file)) {
                    include_once($file);
                    return true;
                }
            }
            throw new Exception($file . "   Not Found");
        });
        
        
$response_array = array();

$objApplication = new Application();
$objfileUpload = new UploadFile();
$objAppManager = AppMakerFactory::CreateObject("Application");

try {
    
        
   
    $response_array['status'] = 'success';
     $response_array['message'] = 'A is Successfully Updated' . $_FILES['applicationImg'];
    
} catch (Exception $exc) {
    $response_array['status'] = 'error';  
    $response_array['message'] = $exc->getMessage();
}

echo json_encode($response_array);

?>