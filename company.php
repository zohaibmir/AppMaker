<?php
ob_start();
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
?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Le styles -->
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <style type="text/css">

            div.fileinputs {
                position: relative;
            }

            div.fakefile {
                position: absolute;
                top: 0px;
                left: 0px;
                z-index: 1;
            }

            input.file {
                position: relative;
                text-align: right;
                -moz-opacity:0 ;
                filter:alpha(opacity: 0);
                opacity: 0;
                z-index: 2;
            }
            .success{  

                border: 2px solid #009400;  
                background: #B3FFB3;  
                color: #555;  
                font-weight: bold;  

            }  

            .error{  

                border: 2px solid #DE001A;  
                background: #FFA8B3;  
                color: #000;  
                font-weight: bold;  
            }  
        </style>
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        
    </head>
    <body>
        <?php
            $oslist = array();
            $objCompany = new Company();
            $objContact = new CompanyContact();
            $objCompanyManager = AppMakerFactory::CreateObject("Company");
            if(!isset($_SESSION["userId"])) {
               $objlist = $objCompanyManager->GetCompanyByUserId(3);
               $objCompany = $objlist["ObjCompany"];
               $objContact = $objlist["ObjCompanyContact"];               
               $oslist = $objCompanyManager->getCompanyoperatingSystem($objCompany->getCompanyId());
            }
        ?>
        <div class="container-fluid">
            <div class="row-fluid">
                 <div id="formResponse"></div> 
                    <h3 style="padding-left:8%;">Add New Company *</h3>                    
                    <form class="form-horizontal" id="companyForm" name="companyForm" method="post">
                       <input type="hidden" name="companyId" id="companyId" value="<?php echo $objCompany->getCompanyId() ?>" />
                        <input type="hidden" name="companyContactId" id="companyContactId" value="<?php echo $objCompany->getCompanyContactId() ?>" />
                        <div class="control-group">
                            <label class="control-label" for="companyName" >Company Name</label>
                            <div class="controls">
                                <input type="text" class="span4" name="companyName" id="companyName" value="<?php echo $objCompany->getCompanyName() ?>" placeholder="Name of the Company"  required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="companyCountryId" >Select Country</label>
                            <div class="controls">                        
                                <select id="countyId" name="companyCountryId" id="companyCountryId" required class="span4">
                            <option value="" <?php if($objCompany->getCompanyCountryId() == "") echo 'selected="true"' ; ?>>(please select a country)</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "1") echo 'selected="true"' ; ?> value="1">Afghanistan</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "2") echo 'selected="true"' ; ?> value="2">ALAND ISLANDS</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "3") echo 'selected="true"' ; ?> value="3">Albania</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "4") echo 'selected="true"' ; ?> value="4">Algeria</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "5") echo 'selected="true"' ; ?> value="5">American Samoa</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "6") echo 'selected="true"' ; ?> value="6">Andorra</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "7") echo 'selected="true"' ; ?> value="7">Angola</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "8") echo 'selected="true"' ; ?> value="8">Anguilla</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "9") echo 'selected="true"' ; ?> value="9">Antarctica</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "10") echo 'selected="true"' ; ?> value="10">Antigua and Barbuda</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "11") echo 'selected="true"' ; ?> value="11">Argentina</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "12") echo 'selected="true"' ; ?> value="12">Armenia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "13") echo 'selected="true"' ; ?> value="13">Aruba</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "14") echo 'selected="true"' ; ?> value="14">Australia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "15") echo 'selected="true"' ; ?> value="15">Austria</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "16") echo 'selected="true"' ; ?> value="16">Azerbaijan</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "17") echo 'selected="true"' ; ?> value="17">Bahamas</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "18") echo 'selected="true"' ; ?> value="18">Bahrain</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "19") echo 'selected="true"' ; ?> value="19">Bangladesh</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "20") echo 'selected="true"' ; ?> value="20">Barbados</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "21") echo 'selected="true"' ; ?> value="21">Belarus</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "22") echo 'selected="true"' ; ?> value="22">Belgium</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "23") echo 'selected="true"' ; ?> value="23">Belize</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "24") echo 'selected="true"' ; ?> value="24">Benin</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "25") echo 'selected="true"' ; ?> value="25">Bermuda</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "26") echo 'selected="true"' ; ?> value="26">Bhutan</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "27") echo 'selected="true"' ; ?> value="27">Bolivia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "28") echo 'selected="true"' ; ?> value="28">BONAIRE, SINT EUSTATIUS</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "29") echo 'selected="true"' ; ?> value="29">Bosnia and Herzegowina</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "30") echo 'selected="true"' ; ?> value="30">Botswana</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "31") echo 'selected="true"' ; ?> value="31">Bouvet Island</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "32") echo 'selected="true"' ; ?> value="32">Brazil</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "33") echo 'selected="true"' ; ?> value="33">British Indian Ocean Territory</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "34") echo 'selected="true"' ; ?> value="34">Brunei Darussalam</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "35") echo 'selected="true"' ; ?> value="35">Bulgaria</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "36") echo 'selected="true"' ; ?> value="36">Burkina Faso</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "37") echo 'selected="true"' ; ?> value="37">Burundi</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "38") echo 'selected="true"' ; ?> value="38">Cambodia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "39") echo 'selected="true"' ; ?> value="39">Cameroon</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "40") echo 'selected="true"' ; ?> value="40">Canada</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "41") echo 'selected="true"' ; ?> value="41">Cape Verde</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "42") echo 'selected="true"' ; ?> value="42">Cayman Islands</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "43") echo 'selected="true"' ; ?> value="43">Central African Republic</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "44") echo 'selected="true"' ; ?> value="44">Chad</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "45") echo 'selected="true"' ; ?> value="45">Chile</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "46") echo 'selected="true"' ; ?> value="46">China</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "47") echo 'selected="true"' ; ?> value="47">Christmas Island</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "48") echo 'selected="true"' ; ?> value="48">Cocos (Keeling) Islands</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "49") echo 'selected="true"' ; ?> value="49">Colombia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "50") echo 'selected="true"' ; ?> value="50">Comoros</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "51") echo 'selected="true"' ; ?> value="51">Congo</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "52") echo 'selected="true"' ; ?> value="52">Congo, the Democratic</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "53") echo 'selected="true"' ; ?> value="53">Cook Islands</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "54") echo 'selected="true"' ; ?> value="54">Costa Rica</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "55") echo 'selected="true"' ; ?> value="55">Cote d'Ivoire</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "56") echo 'selected="true"' ; ?> value="56">Croatia (Hrvatska)</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "57") echo 'selected="true"' ; ?> value="57">Cuba</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "58") echo 'selected="true"' ; ?> value="58">CURACAO</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "59") echo 'selected="true"' ; ?> value="59">Cyprus</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "60") echo 'selected="true"' ; ?> value="60">Czech Republic</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "61") echo 'selected="true"' ; ?> value="61">Denmark</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "62") echo 'selected="true"' ; ?> value="62">Djibouti</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "63") echo 'selected="true"' ; ?> value="63">Dominica</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "64") echo 'selected="true"' ; ?> value="64">Dominican Republic</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "65") echo 'selected="true"' ; ?> value="65">Ecuador</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "66") echo 'selected="true"' ; ?> value="66">Egypt</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "67") echo 'selected="true"' ; ?> value="67">El Salvador</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "68") echo 'selected="true"' ; ?> value="68">Equatorial Guinea</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "69") echo 'selected="true"' ; ?> value="69">Eritrea</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "70") echo 'selected="true"' ; ?> value="70">Estonia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "71") echo 'selected="true"' ; ?> value="71">Ethiopia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "72") echo 'selected="true"' ; ?> value="72">Falkland Islands (Malvinas)</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "73") echo 'selected="true"' ; ?> value="73">Faroe Islands</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "74") echo 'selected="true"' ; ?> value="74">Fiji</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "75") echo 'selected="true"' ; ?> value="75">Finland</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "76") echo 'selected="true"' ; ?> value="76">France</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "77") echo 'selected="true"' ; ?> value="77">French Guiana</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "78") echo 'selected="true"' ; ?> value="78">French Polynesia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "79") echo 'selected="true"' ; ?> value="79">French Southern Territories</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "80") echo 'selected="true"' ; ?> value="80">Gabon</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "81") echo 'selected="true"' ; ?> value="81">Gambia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "82") echo 'selected="true"' ; ?> value="82">Georgia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "83") echo 'selected="true"' ; ?> value="83">Germany</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "84") echo 'selected="true"' ; ?> value="84">Ghana</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "85") echo 'selected="true"' ; ?> value="85">Gibraltar</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "86") echo 'selected="true"' ; ?> value="86">Greece</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "87") echo 'selected="true"' ; ?> value="87">Greenland</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "88") echo 'selected="true"' ; ?> value="88">Grenada</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "89") echo 'selected="true"' ; ?> value="89">Guadeloupe</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "90") echo 'selected="true"' ; ?> value="90">Guam</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "91") echo 'selected="true"' ; ?> value="91">Guatemala</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "92") echo 'selected="true"' ; ?> value="92">GUERNSEY</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "93") echo 'selected="true"' ; ?> value="93">Guinea</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "94") echo 'selected="true"' ; ?> value="94">Guinea-Bissau</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "95") echo 'selected="true"' ; ?> value="95">Guyana</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "96") echo 'selected="true"' ; ?> value="96">Haiti</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "97") echo 'selected="true"' ; ?> value="97">Heard and Mc Donald Islands</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "98") echo 'selected="true"' ; ?> value="98">Holy See (Vatican City State)</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "99") echo 'selected="true"' ; ?> value="99">Honduras</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "100") echo 'selected="true"' ; ?> value="100">Hong Kong</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "101") echo 'selected="true"' ; ?> value="101">Hungary</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "102") echo 'selected="true"' ; ?> value="102">Iceland</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "103") echo 'selected="true"' ; ?> value="103">India</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "104") echo 'selected="true"' ; ?> value="104">Indonesia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "105") echo 'selected="true"' ; ?> value="105">Iran (Islamic Republic of)</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "106") echo 'selected="true"' ; ?> value="106">Iraq</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "107") echo 'selected="true"' ; ?> value="107">Ireland</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "108") echo 'selected="true"' ; ?> value="108">ISLE OF MAN</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "109") echo 'selected="true"' ; ?> value="109">Israel</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "110") echo 'selected="true"' ; ?> value="110">Italy</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "111") echo 'selected="true"' ; ?> value="111">Jamaica</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "112") echo 'selected="true"' ; ?> value="112">Japan</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "113") echo 'selected="true"' ; ?> value="113">JERSEY</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "114") echo 'selected="true"' ; ?> value="114">Jordan</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "115") echo 'selected="true"' ; ?> value="115">Kazakhstan</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "116") echo 'selected="true"' ; ?> value="116">Kenya</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "117") echo 'selected="true"' ; ?> value="117">Kiribati</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "118") echo 'selected="true"' ; ?> value="118">Korea, Democratic</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "119") echo 'selected="true"' ; ?> value="119">Korea, Republic</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "120") echo 'selected="true"' ; ?> value="120">Kuwait</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "121") echo 'selected="true"' ; ?> value="121">Kyrgyzstan</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "122") echo 'selected="true"' ; ?> value="122">Lao People's </option>
                            <option <?php if($objCompany->getCompanyCountryId() == "123") echo 'selected="true"' ; ?> value="123">Latvia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "124") echo 'selected="true"' ; ?> value="124">Lebanon</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "125") echo 'selected="true"' ; ?> value="125">Lesotho</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "126") echo 'selected="true"' ; ?> value="126">Liberia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "127") echo 'selected="true"' ; ?> value="127">Libyan Arab Jamahiriya</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "128") echo 'selected="true"' ; ?> value="128">Liechtenstein</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "129") echo 'selected="true"' ; ?> value="129">Lithuania</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "130") echo 'selected="true"' ; ?> value="130">Luxembourg</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "131") echo 'selected="true"' ; ?> value="131">Macau</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "132") echo 'selected="true"' ; ?> value="132">Macedonia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "133") echo 'selected="true"' ; ?> value="133">Madagascar</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "134") echo 'selected="true"' ; ?> value="134">Malawi</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "135") echo 'selected="true"' ; ?> value="135">Malaysia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "136") echo 'selected="true"' ; ?> value="136">Maldives</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "137") echo 'selected="true"' ; ?> value="137">Mali</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "138") echo 'selected="true"' ; ?> value="138">Malta</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "139") echo 'selected="true"' ; ?> value="139">Marshall Islands</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "140") echo 'selected="true"' ; ?> value="140">Martinique</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "141") echo 'selected="true"' ; ?> value="141">Mauritania</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "142") echo 'selected="true"' ; ?> value="142">Mauritius</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "143") echo 'selected="true"' ; ?> value="143">Mayotte</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "144") echo 'selected="true"' ; ?> value="144">Mexico</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "145") echo 'selected="true"' ; ?> value="145">Micronesia, Federated States of</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "146") echo 'selected="true"' ; ?> value="146">Moldova, Republic of</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "147") echo 'selected="true"' ; ?> value="147">Monaco</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "148") echo 'selected="true"' ; ?> value="148">Mongolia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "149") echo 'selected="true"' ; ?> value="149">MONTENEGRO</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "150") echo 'selected="true"' ; ?> value="150">Montserrat</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "151") echo 'selected="true"' ; ?> value="151">Morocco</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "152") echo 'selected="true"' ; ?> value="152">Mozambique</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "153") echo 'selected="true"' ; ?> value="153">Myanmar</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "154") echo 'selected="true"' ; ?> value="154">Namibia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "155") echo 'selected="true"' ; ?> value="155">Nauru</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "156") echo 'selected="true"' ; ?> value="156">Nepal</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "157") echo 'selected="true"' ; ?> value="157">Netherlands</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "158") echo 'selected="true"' ; ?> value="158">Netherlands Antilles</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "159") echo 'selected="true"' ; ?> value="159">New Zealand</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "160") echo 'selected="true"' ; ?> value="160">Nicaragua</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "161") echo 'selected="true"' ; ?> value="161">Niger</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "162") echo 'selected="true"' ; ?> value="162">Nigeria</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "163") echo 'selected="true"' ; ?> value="163">Niue</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "164") echo 'selected="true"' ; ?> value="164">Norfolk Island</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "165") echo 'selected="true"' ; ?> value="165">Northern Mariana Islands</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "166") echo 'selected="true"' ; ?> value="166">Norway</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "167") echo 'selected="true"' ; ?> value="167">Oman</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "168") echo 'selected="true"' ; ?> value="168">Pakistan</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "169") echo 'selected="true"' ; ?> value="169">Palau</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "170") echo 'selected="true"' ; ?> value="170">PALESTINIAN</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "171") echo 'selected="true"' ; ?> value="171">Panama</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "172") echo 'selected="true"' ; ?> value="172">Papua New Guinea</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "173") echo 'selected="true"' ; ?> value="173">Paraguay</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "174") echo 'selected="true"' ; ?> value="174">Peru</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "175") echo 'selected="true"' ; ?> value="175">Philippines</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "176") echo 'selected="true"' ; ?> value="176">Pitcairn</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "177") echo 'selected="true"' ; ?> value="177">Poland</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "178") echo 'selected="true"' ; ?> value="178">Portugal</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "179") echo 'selected="true"' ; ?> value="179">Puerto Rico</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "180") echo 'selected="true"' ; ?> value="180">Qatar</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "181") echo 'selected="true"' ; ?> value="181">Reunion</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "182") echo 'selected="true"' ; ?> value="182">Romania</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "183") echo 'selected="true"' ; ?> value="183">Russian Federation</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "184") echo 'selected="true"' ; ?> value="184">Rwanda</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "185") echo 'selected="true"' ; ?> value="185">SAINT BARTHELEMY</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "186") echo 'selected="true"' ; ?> value="186">SAINT HELENA</option> 
                            <option <?php if($objCompany->getCompanyCountryId() == "187") echo 'selected="true"' ; ?> value="187">Saint Kitts and Nevis</option> 
                            <option <?php if($objCompany->getCompanyCountryId() == "188") echo 'selected="true"' ; ?> value="188">Saint LUCIA</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "189") echo 'selected="true"' ; ?> value="189">SAINT MARTIN (FRENCH PART)</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "190") echo 'selected="true"' ; ?> value="190">SAINT PIERRE AND MIQUELON</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "191") echo 'selected="true"' ; ?> value="191">Saint Vincent and the Grenadines</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "192") echo 'selected="true"' ; ?> value="192">Samoa</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "193") echo 'selected="true"' ; ?> value="193">San Marino</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "194") echo 'selected="true"' ; ?> value="194">Sao Tome and Principe</option> 
                            <option <?php if($objCompany->getCompanyCountryId() == "195") echo 'selected="true"' ; ?> value="195">Saudi Arabia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "196") echo 'selected="true"' ; ?> value="196">Senegal</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "197") echo 'selected="true"' ; ?> value="197">Seychelles</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "198") echo 'selected="true"' ; ?> value="198">Sierra Leone</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "199") echo 'selected="true"' ; ?> value="199">Singapore</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "200") echo 'selected="true"' ; ?> value="200">Slovakia (Slovak Republic)</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "201") echo 'selected="true"' ; ?> value="201">Slovenia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "202") echo 'selected="true"' ; ?> value="202">Solomon Islands</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "203") echo 'selected="true"' ; ?> value="203">Somalia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "204") echo 'selected="true"' ; ?> value="204">South Africa</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "205") echo 'selected="true"' ; ?> value="205">South Georgia </option>
                            <option <?php if($objCompany->getCompanyCountryId() == "206") echo 'selected="true"' ; ?> value="206">Spain</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "207") echo 'selected="true"' ; ?> value="207">Sri Lanka</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "208") echo 'selected="true"' ; ?> value="208">St. Helena</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "209") echo 'selected="true"' ; ?> value="209">St. Pierre and Miquelon</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "210") echo 'selected="true"' ; ?> value="210">Sudan</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "211") echo 'selected="true"' ; ?> value="211">Suriname</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "212") echo 'selected="true"' ; ?> value="212">Svalbard and Jan Mayen Islands</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "213") echo 'selected="true"' ; ?> value="213">Swaziland</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "214") echo 'selected="true"' ; ?> value="214">Sweden</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "215") echo 'selected="true"' ; ?> value="215">Switzerland</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "216") echo 'selected="true"' ; ?> value="216">Syrian Arab Republic</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "217") echo 'selected="true"' ; ?> value="217">Taiwan, Province of China</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "218") echo 'selected="true"' ; ?> value="218">Tajikistan</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "219") echo 'selected="true"' ; ?> value="219">Tanzania, United Republic of</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "220") echo 'selected="true"' ; ?> value="220">Thailand</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "221") echo 'selected="true"' ; ?> value="221">TIMOR-LESTE</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "222") echo 'selected="true"' ; ?> value="222">Togo</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "223") echo 'selected="true"' ; ?> value="223">Tokelau</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "224") echo 'selected="true"' ; ?> value="224">Tonga</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "225") echo 'selected="true"' ; ?> value="225">Trinidad and Tobago</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "226") echo 'selected="true"' ; ?> value="226">Tunisia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "227") echo 'selected="true"' ; ?> value="227">Turkey</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "228") echo 'selected="true"' ; ?> value="228">Turkmenistan</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "229") echo 'selected="true"' ; ?> value="229">Turks and Caicos Islands</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "230") echo 'selected="true"' ; ?> value="230">Tuvalu</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "231") echo 'selected="true"' ; ?> value="231">Uganda</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "232") echo 'selected="true"' ; ?> value="232">Ukraine</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "233") echo 'selected="true"' ; ?> value="233">United Arab Emirates</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "234") echo 'selected="true"' ; ?> value="234">United Kingdom</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "235") echo 'selected="true"' ; ?> value="235">United States</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "236") echo 'selected="true"' ; ?> value="236">United States Minor Outlying</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "237") echo 'selected="true"' ; ?> value="237">Uruguay</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "238") echo 'selected="true"' ; ?> value="238">Uzbekistan</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "239") echo 'selected="true"' ; ?> value="239">Vanuatu</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "240") echo 'selected="true"' ; ?> value="240">Venezuela</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "241") echo 'selected="true"' ; ?> value="241">Viet Nam</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "242") echo 'selected="true"' ; ?> value="242">Virgin Islands (British)</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "243") echo 'selected="true"' ; ?> value="243">Virgin Islands (U.S.)</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "244") echo 'selected="true"' ; ?> value="244">Wallis and Futuna Islands</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "245") echo 'selected="true"' ; ?> value="245">Western Sahara</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "246") echo 'selected="true"' ; ?> value="246">Yemen</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "247") echo 'selected="true"' ; ?> value="247">Zambia</option>
                            <option <?php if($objCompany->getCompanyCountryId() == "248") echo 'selected="true"' ; ?> value="248">Zimbabwe</option>
                        </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="companyDescription">Description</label>
                            <div class="controls">                        
                               <textarea class="field span4" id="companyDescription" name="companyDescription" required rows="6" placeholder="Enter a short description of the company"><?php echo $objCompany->getCompanyDescription() ?></textarea>
                            </div>
                        </div> 
                        <div class="control-group">
                    <label class="control-label" for="inputIso2">Company URL</label>
                    <div class="controls">
                        <input type="url" class="span4" name="companyUrl" id="companyUrl" value="<?php echo $objCompany->getCompanyUrl() ?>" placeholder="Company's URL, including http://" required>
                    </div>
                </div>                
                <div class="control-group">
                    <label class="control-label" for="companyTwitterUrl">Company Twitter URL</label>
                    <div class="controls">
                        <input type="url" class="span4" name="companyTwitterUrl" id="companyTwitterUrl"value="<?php echo $objCompany->getCompanyTwitterUrl() ?>"  placeholder="Company's Twitter URL">
                    </div>
                </div>                
                <div class="control-group">
                    <label class="control-label" for="companyFacebookurl">Company Facebook URL</label>
                    <div class="controls">
                        <input type="url" class="span4" name="companyFacebookurl" id="companyFacebookurl" value="<?php echo $objCompany->getCompanyFacebookUrl() ?>" placeholder="Company's Twitter URL">
                    </div>
                </div>                
                <div class="control-group">
                    <label class="control-label" for="inputIso2">Your typical fee per App</label>
                    <div class="controls">
                        <select id="companyFee" name="companyFee" required class="span4">
                            
                           <option value="" <?php if($objCompany->getCompanyFeeRangeId() == "") echo 'selected="true"' ; ?>>(please select a Fee)</option>
                           <option value="1" <?php if($objCompany->getCompanyFeeRangeId() == "1") echo 'selected="true"' ; ?> >0 - 5000</option>
                            <option value="2" <?php if($objCompany->getCompanyFeeRangeId() == "2") echo 'selected="true"' ; ?>>5000 - 10000</option>
                            <option value="3" <?php if($objCompany->getCompanyFeeRangeId() == "3") echo 'selected="true"' ; ?>>10000 - 15000</option>
                            <option value="4" <?php if($objCompany->getCompanyFeeRangeId() == "4") echo 'selected="true"' ; ?>>15000 - 2000</option>
                            <option value="5" <?php if($objCompany->getCompanyFeeRangeId() == "5") echo 'selected="true"' ; ?>>20000 - 25000</option>
                            <option value="6" <?php if($objCompany->getCompanyFeeRangeId() == "6") echo 'selected="true"' ; ?>>Above 25000</option>
                        </select>
                    </div>
                </div>                
                <div class="control-group">
                    <label class="checkbox"> Platforms you've mastered </label>   
                    <div class="controls">                                             
                        <input type="checkbox" name="platform_id[]" value="1" <?php if(in_array(1,$oslist)) { echo 'checked="true"'; }?> /> Windows Mobile
                        <input type="checkbox" name="platform_id[]" value="2" <?php if(in_array('2',$oslist)) { echo 'checked="true"'; }?> /> Apple
                        <input type="checkbox" name="platform_id[]" value="3" <?php if(in_array('3',$oslist)) { echo 'checked="true"'; }?> /> Android <br />
                        <input type="checkbox" name="platform_id[]" value="4" <?php if(in_array('4',$oslist)) { echo 'checked="true"'; }?> /> Blackberry
                        <input type="checkbox" name="platform_id[]" value="5" <?php if(in_array('5',$oslist)) { echo 'checked="true"'; }?> /> Palm
                        <input type="checkbox" name="platform_id[]" value="6" <?php if(in_array('6',$oslist)) { echo 'checked="true"'; }?> /> Symbian
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="inputCPName">Contact Person Name</label>
                    <div class="controls">
                        <input type="text" class="span4" name="inputCPName" id="inputCPName" value="<?php echo $objContact->getCompanyContactName() ?>" placeholder="Contact Person Name" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputIso3">Contact Person Email</label>
                    <div class="controls">
                        <input type="email" class="span4" name="inputCPEmail" id="inputCPEmail" value="<?php echo $objContact->getCompanyContactEmail() ?>"  placeholder="Contact Person Email" required>
                    </div>
                </div>
                 <div class="control-group">
                    <label class="control-label" for="inputIso3">Confirm Email</label>
                    <div class="controls">
                        <input type="email" class="span4" name="inputCPCEmail" id="inputCPCEmail" value="<?php echo $objContact->getCompanyContactEmail() ?>" placeholder="Confirm Email" required>
                    </div>
                </div>


                        <div class="control-group">
                            <div class="controls">                     
                                <button type="submit" id="companySubmit" name="companySubmit" class="btn btn-info">Add Company <button>
                            </div>
                        </div>
                    </form>
                
            </div>
        </div>

        <!-- javascript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        
        <script src="js/bootstrap.min.js"></script>
        <script src="js/ajaxCompanySubmit.js"></script>
    </body>
</html>
