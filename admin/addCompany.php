<?php
if (file_exists('header.php')) {
    include_once 'header.php';
}
?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">

            <div class="well sidebar-nav">

                <ul class="nav nav-list" style="padding-left: 20%">
                    <li class="nav-header"> Companies Menu </li>                    
                    <li><a href="addcountry.php">Add Company</a></li>
                    <li><a href="viewcountry.php">View Companies</a></li>
                    <li><a href="viewcountry.php?countryType=active">Active Companies</a></li>
                    <li><a href="viewcountry.php?countryType=inactive">InActive Companies</a></li>
                    <li><a href="viewcountry.php?countryType=inactive">Sponsored Companies Companies</a></li>

                </ul>

            </div><!--/.well -->

        </div><!--/span-->
        <div class="span9">
            <?php
                    $objCompany = new Company();
                    $objContact = new CompanyContact();
                    $objCompanyManager = AppMakerFactory::CreateObject("Company");
                    $objCompanyManager->GetAllCompanis();
                    $objCompanyManager->getCompanyoperatingSystem(4);
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                try {                   
                    $objCompany->setCompanyName($_POST["companyName"]);
                    $objCompany->setCompanyDescription($_POST["companyDescription"]);
                    $objCompany->setCompanyCountryId($_POST["companyCountryId"]);
                    $objCompany->setCompanyUrl($_POST["companyUrl"]);
                    $objCompany->setCompanyTwiiterUrl($_POST["companyTwitterUrl"]);
                    $objCompany->setCompanyFacebooUrl($_POST["companyFacebookurl"]);                    
                    $objCompany->setCompanyFeeRangeId($_POST["companyFee"]);
                    if (isset($_POST["platform_id"])) {
                    $objCompany->setCompanyPlatforms($_POST["platform_id"]);
                    }
                    if (isset($_POST["companyStatus"])) {
                        $objCompany->setCompanyStatus(1);
                    } else {
                        $objCompany->setCompanyStatus(0);
                    }
                    if (isset($_POST["companySponsored"])) {
                        $objCompany->setCompanyIsSponsored(1);                   
                    }
                    
                    $objContact->setCompanyContactName($_POST["inputCPName"]);
                    $objContact->setCompanyContactEmail($_POST["inputCPEmail"]);                    
                    
                    $objCompanyManager->AddCompany($objCompany, $objContact);
                    //if ($objCManager->AddCountry($objCountry))                    
                    //    echo "<span class='offset1' style='color: #a71010'>Item is successfully Added in the System</span>";
                } catch (Exception $exc) {
                    echo "<span class='offset1' style='color: #a71010'>" . $exc->getMessage() . " </span>";
                }
            }
            ?>
            <h3 style="padding-left:8%;">Add New Company *</h3>
            <form class="form-horizontal" id="addFeatureForm" method="post" action="addCompany.php">
                <div class="control-group">
                    <label class="control-label" for="companyName" >Company Name</label>
                    <div class="controls">
                        <input type="text" class="span4" name="companyName" id="companyName" placeholder="Name of the Company"  required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="companyCountryId" >Select Country</label>
                    <div class="controls">                        
                        <select id="countyId" name="companyCountryId" id="companyCountryId" required class="span4">
                            <option value="" selected>(please select a country)</option>
                            <option value="1">Afghanistan</option>
                            <option value="2">ALAND ISLANDS</option>
                            <option value="3">Albania</option>
                            <option value="4">Algeria</option>
                            <option value="5">American Samoa</option>
                            <option value="6">Andorra</option>
                            <option value="7">Angola</option>
                            <option value="8">Anguilla</option>
                            <option value="9">Antarctica</option>
                            <option value="10">Antigua and Barbuda</option>
                            <option value="11">Argentina</option>
                            <option value="12">Armenia</option>
                            <option value="13">Aruba</option>
                            <option value="14">Australia</option>
                            <option value="15">Austria</option>
                            <option value="16">Azerbaijan</option>
                            <option value="17">Bahamas</option>
                            <option value="18">Bahrain</option>
                            <option value="19">Bangladesh</option>
                            <option value="20">Barbados</option>
                            <option value="21">Belarus</option>
                            <option value="22">Belgium</option>
                            <option value="23">Belize</option>
                            <option value="24">Benin</option>
                            <option value="25">Bermuda</option>
                            <option value="26">Bhutan</option>
                            <option value="27">Bolivia</option>
                            <option value="28">BONAIRE, SINT EUSTATIUS</option>
                            <option value="29">Bosnia and Herzegowina</option>
                            <option value="30">Botswana</option>
                            <option value="31">Bouvet Island</option>
                            <option value="32">Brazil</option>
                            <option value="33">British Indian Ocean Territory</option>
                            <option value="34">Brunei Darussalam</option>
                            <option value="35">Bulgaria</option>
                            <option value="36">Burkina Faso</option>
                            <option value="37">Burundi</option>
                            <option value="38">Cambodia</option>
                            <option value="39">Cameroon</option>
                            <option value="40">Canada</option>
                            <option value="41">Cape Verde</option>
                            <option value="42">Cayman Islands</option>
                            <option value="43">Central African Republic</option>
                            <option value="44">Chad</option>
                            <option value="45">Chile</option>
                            <option value="46">China</option>
                            <option value="47">Christmas Island</option>
                            <option value="48">Cocos (Keeling) Islands</option>
                            <option value="49">Colombia</option>
                            <option value="50">Comoros</option>
                            <option value="51">Congo</option>
                            <option value="52">Congo, the Democratic</option>
                            <option value="53">Cook Islands</option>
                            <option value="54">Costa Rica</option>
                            <option value="55">Cote d'Ivoire</option>
                            <option value="56">Croatia (Hrvatska)</option>
                            <option value="57">Cuba</option>
                            <option value="58">CURACAO</option>
                            <option value="59">Cyprus</option>
                            <option value="60">Czech Republic</option>
                            <option value="61">Denmark</option>
                            <option value="62">Djibouti</option>
                            <option value="63">Dominica</option>
                            <option value="64">Dominican Republic</option>
                            <option value="65">Ecuador</option>
                            <option value="66">Egypt</option>
                            <option value="67">El Salvador</option>
                            <option value="68">Equatorial Guinea</option>
                            <option value="69">Eritrea</option>
                            <option value="70">Estonia</option>
                            <option value="71">Ethiopia</option>
                            <option value="72">Falkland Islands (Malvinas)</option>
                            <option value="73">Faroe Islands</option>
                            <option value="74">Fiji</option>
                            <option value="75">Finland</option>
                            <option value="76">France</option>
                            <option value="77">French Guiana</option>
                            <option value="78">French Polynesia</option>
                            <option value="79">French Southern Territories</option>
                            <option value="80">Gabon</option>
                            <option value="81">Gambia</option>
                            <option value="82">Georgia</option>
                            <option value="83">Germany</option>
                            <option value="84">Ghana</option>
                            <option value="85">Gibraltar</option>
                            <option value="86">Greece</option>
                            <option value="87">Greenland</option>
                            <option value="88">Grenada</option>
                            <option value="89">Guadeloupe</option>
                            <option value="90">Guam</option>
                            <option value="91">Guatemala</option>
                            <option value="92">GUERNSEY</option>
                            <option value="93">Guinea</option>
                            <option value="94">Guinea-Bissau</option>
                            <option value="95">Guyana</option>
                            <option value="96">Haiti</option>
                            <option value="97">Heard and Mc Donald Islands</option>
                            <option value="98">Holy See (Vatican City State)</option>
                            <option value="99">Honduras</option>
                            <option value="100">Hong Kong</option>
                            <option value="101">Hungary</option>
                            <option value="102">Iceland</option>
                            <option value="103">India</option>
                            <option value="104">Indonesia</option>
                            <option value="105">Iran (Islamic Republic of)</option>
                            <option value="106">Iraq</option>
                            <option value="107">Ireland</option>
                            <option value="108">ISLE OF MAN</option>
                            <option value="109">Israel</option>
                            <option value="110">Italy</option>
                            <option value="111">Jamaica</option>
                            <option value="112">Japan</option>
                            <option value="113">JERSEY</option>
                            <option value="114">Jordan</option>
                            <option value="115">Kazakhstan</option>
                            <option value="116">Kenya</option>
                            <option value="117">Kiribati</option>
                            <option value="118">Korea, Democratic</option>
                            <option value="119">Korea, Republic</option>
                            <option value="120">Kuwait</option>
                            <option value="121">Kyrgyzstan</option>
                            <option value="122">Lao People's </option>
                            <option value="123">Latvia</option>
                            <option value="124">Lebanon</option>
                            <option value="125">Lesotho</option>
                            <option value="126">Liberia</option>
                            <option value="127">Libyan Arab Jamahiriya</option>
                            <option value="128">Liechtenstein</option>
                            <option value="129">Lithuania</option>
                            <option value="130">Luxembourg</option>
                            <option value="131">Macau</option>
                            <option value="132">Macedonia</option>
                            <option value="133">Madagascar</option>
                            <option value="134">Malawi</option>
                            <option value="135">Malaysia</option>
                            <option value="136">Maldives</option>
                            <option value="137">Mali</option>
                            <option value="138">Malta</option>
                            <option value="139">Marshall Islands</option>
                            <option value="140">Martinique</option>
                            <option value="141">Mauritania</option>
                            <option value="142">Mauritius</option>
                            <option value="143">Mayotte</option>
                            <option value="144">Mexico</option>
                            <option value="145">Micronesia, Federated States of</option>
                            <option value="146">Moldova, Republic of</option>
                            <option value="147">Monaco</option>
                            <option value="148">Mongolia</option>
                            <option value="149">MONTENEGRO</option>
                            <option value="150">Montserrat</option>
                            <option value="151">Morocco</option>
                            <option value="152">Mozambique</option>
                            <option value="153">Myanmar</option>
                            <option value="154">Namibia</option>
                            <option value="155">Nauru</option>
                            <option value="156">Nepal</option>
                            <option value="157">Netherlands</option>
                            <option value="158">Netherlands Antilles</option>
                            <option value="159">New Zealand</option>
                            <option value="160">Nicaragua</option>
                            <option value="161">Niger</option>
                            <option value="162">Nigeria</option>
                            <option value="163">Niue</option>
                            <option value="164">Norfolk Island</option>
                            <option value="165">Northern Mariana Islands</option>
                            <option value="166">Norway</option>
                            <option value="167">Oman</option>
                            <option value="168">Pakistan</option>
                            <option value="169">Palau</option>
                            <option value="170">PALESTINIAN</option>
                            <option value="171">Panama</option>
                            <option value="172">Papua New Guinea</option>
                            <option value="173">Paraguay</option>
                            <option value="174">Peru</option>
                            <option value="175">Philippines</option>
                            <option value="176">Pitcairn</option>
                            <option value="177">Poland</option>
                            <option value="178">Portugal</option>
                            <option value="179">Puerto Rico</option>
                            <option value="180">Qatar</option>
                            <option value="181">Reunion</option>
                            <option value="182">Romania</option>
                            <option value="183">Russian Federation</option>
                            <option value="184">Rwanda</option>
                            <option value="185">SAINT BARTHELEMY</option>
                            <option value="186">SAINT HELENA</option> 
                            <option value="187">Saint Kitts and Nevis</option> 
                            <option value="188">Saint LUCIA</option>
                            <option value="189">SAINT MARTIN (FRENCH PART)</option>
                            <option value="190">SAINT PIERRE AND MIQUELON</option>
                            <option value="191">Saint Vincent and the Grenadines</option>
                            <option value="192">Samoa</option>
                            <option value="193">San Marino</option>
                            <option value="194">Sao Tome and Principe</option> 
                            <option value="195">Saudi Arabia</option>
                            <option value="196">Senegal</option>
                            <option value="197">Seychelles</option>
                            <option value="198">Sierra Leone</option>
                            <option value="199">Singapore</option>
                            <option value="200">Slovakia (Slovak Republic)</option>
                            <option value="201">Slovenia</option>
                            <option value="202">Solomon Islands</option>
                            <option value="203">Somalia</option>
                            <option value="204">South Africa</option>
                            <option value="205">South Georgia </option>
                            <option value="206">Spain</option>
                            <option value="207">Sri Lanka</option>
                            <option value="208">St. Helena</option>
                            <option value="209">St. Pierre and Miquelon</option>
                            <option value="210">Sudan</option>
                            <option value="211">Suriname</option>
                            <option value="212">Svalbard and Jan Mayen Islands</option>
                            <option value="213">Swaziland</option>
                            <option value="214">Sweden</option>
                            <option value="215">Switzerland</option>
                            <option value="216">Syrian Arab Republic</option>
                            <option value="217">Taiwan, Province of China</option>
                            <option value="218">Tajikistan</option>
                            <option value="219">Tanzania, United Republic of</option>
                            <option value="220">Thailand</option>
                            <option value="221">TIMOR-LESTE</option>
                            <option value="222">Togo</option>
                            <option value="223">Tokelau</option>
                            <option value="224">Tonga</option>
                            <option value="225">Trinidad and Tobago</option>
                            <option value="226">Tunisia</option>
                            <option value="227">Turkey</option>
                            <option value="228">Turkmenistan</option>
                            <option value="229">Turks and Caicos Islands</option>
                            <option value="230">Tuvalu</option>
                            <option value="231">Uganda</option>
                            <option value="232">Ukraine</option>
                            <option value="233">United Arab Emirates</option>
                            <option value="234">United Kingdom</option>
                            <option value="235">United States</option>
                            <option value="236">United States Minor Outlying</option>
                            <option value="237">Uruguay</option>
                            <option value="238">Uzbekistan</option>
                            <option value="239">Vanuatu</option>
                            <option value="240">Venezuela</option>
                            <option value="241">Viet Nam</option>
                            <option value="242">Virgin Islands (British)</option>
                            <option value="243">Virgin Islands (U.S.)</option>
                            <option value="244">Wallis and Futuna Islands</option>
                            <option value="245">Western Sahara</option>
                            <option value="246">Yemen</option>
                            <option value="247">Zambia</option>
                            <option value="248">Zimbabwe</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="companyDescription">Description</label>
                    <div class="controls">                        
                        <textarea class="field span4" id="companyDescription" name="companyDescription" required rows="6" placeholder="Enter a short description of the company"></textarea>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="inputIso2">Company URL</label>
                    <div class="controls">
                        <input type="url" class="span4" name="companyUrl" id="companyUrl" placeholder="Company's URL, including http://" required>
                    </div>
                </div>                
                <div class="control-group">
                    <label class="control-label" for="companyTwitterUrl">Company Twitter URL</label>
                    <div class="controls">
                        <input type="url" class="span4" name="companyTwitterUrl" id="companyTwitterUrl" placeholder="Company's Twitter URL">
                    </div>
                </div>                
                <div class="control-group">
                    <label class="control-label" for="companyFacebookurl">Company Facebook URL</label>
                    <div class="controls">
                        <input type="url" class="span4" name="companyFacebookurl" id="companyFacebookurl" placeholder="Company's Twitter URL">
                    </div>
                </div>                
                <div class="control-group">
                    <label class="control-label" for="inputIso2">Your typical fee per App</label>
                    <div class="controls">
                        <select id="companyFee" name="companyFee" required class="span4">
                           <option value="" selected>(please select a Fee)</option>
                            <option value="1">0 - 5000</option>
                            <option value="2">5000 - 10000</option>
                            <option value="3">10000 - 15000</option>
                            <option value="4">15000 - 2000</option>
                            <option value="5">20000 - 25000</option>
                            <option value="6">Above 25000</option>
                        </select>
                    </div>
                </div>                
                <div class="control-group">
                    <label class="checkbox"> Platforms you've mastered </label>   
                    <div class="controls">                                             
                        <input type="checkbox" name="platform_id[]" value="1" required /> Windows Mobile
                        <input type="checkbox" name="platform_id[]" value="2" /> Apple
                        <input type="checkbox" name="platform_id[]" value="3" /> Android <br />
                        <input type="checkbox" name="platform_id[]" value="4" /> Blackberry
                        <input type="checkbox" name="platform_id[]" value="5" /> Palm
                        <input type="checkbox" name="platform_id[]" value="6" /> Symbian
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="inputCPName">Contact Person Name</label>
                    <div class="controls">
                        <input type="text" class="span4" name="inputCPName" id="inputCPName" placeholder="Contact Person Name" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputIso3">Contact Person Email</label>
                    <div class="controls">
                        <input type="email" class="span4" name="inputCPEmail" id="inputCPEmail" placeholder="Contact Person Email" required>
                    </div>
                </div>
                 <div class="control-group">
                    <label class="control-label" for="inputIso3">Confirm Email</label>
                    <div class="controls">
                        <input type="email" class="span4" name="inputCPCEmail" id="inputCPCEmail" placeholder="Confirm Email" required>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox" name="companySponsored" id="companySponsored" value="1"> Activate MemberShip
                        </label>                        
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox" name="companyStatus" id="countryStatus" value="1"> Active Profile
                        </label>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!--/.fluid-container-->

<?php
if (file_exists('footer.php')) {
    include_once 'footer.php';
}
?>