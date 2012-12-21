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
$objCompany = new Company();
$objContact = new CompanyContact();
$objCompanyManager = AppMakerFactory::CreateObject("Company");

$response_array = array();
try {

    $objCompany->setCompanyUserId(3); //hard coded
    $objCompany->setCompanyName($_POST["companyName"]);
    $objCompany->setCompanyDescription($_POST["companyDescription"]);
    $objCompany->setCompanyCountryId($_POST["companyCountryId"]);
    $objCompany->setCompanyUrl($_POST["companyUrl"]);
    $objCompany->setCompanyTwiiterUrl($_POST["companyTwitterUrl"]);
    $objCompany->setCompanyFacebooUrl($_POST["companyFacebookurl"]);
    $objCompany->setCompanyFeeRangeId($_POST["companyFee"]);
    $objCompany->setCompanyStatus(1);
    if (isset($_POST["platform_id"])) {
        $objCompany->setCompanyPlatforms($_POST["platform_id"]);
    }
    $objCompany->setCompanyIsSponsored(0);


    $objContact->setCompanyContactName($_POST["inputCPName"]);
    $objContact->setCompanyContactEmail($_POST["inputCPEmail"]);
    if (empty($_POST["companyId"]) && empty($_POST["companyContactId"])) {
        if ($objCompanyManager->AddCompany($objCompany, $objContact)) {
            $response_array['status'] = "success";
            $response_array['message'] = "Company is Successfully Added";
            $response_array['redirect'] = "application.php";
        }
    } else {
        $objCompany->setCompanyId($_POST["companyId"]);
        $objCompany->setCompanyContactId($_POST["companyContactId"]);
        $objContact->setCompanyContactId($_POST["companyContactId"]);
        if ($objCompanyManager->EditCompany($objCompany, $objContact)) {
            $response_array['status'] = "success";
            $response_array['message'] = "Company information updated Successfully";
            $response_array['redirect'] = "application.php";
        }
    }
     $response_array['status'] = "success";
     $response_array['message'] = "Company information updated Successfully";
} catch (Exception $exc) {
    $response_array['status'] = "error";
    $response_array['message'] = " . $exc->getMessage() . ";
}
echo json_encode($response_array);
?>
