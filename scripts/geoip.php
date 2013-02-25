<?php 
$ref=$_SERVER['HTTP_REFERER'];


//******Detect visitor IP address **********//
$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];


//******Query GeoIP and get location data **********//
$query = "http://geoip.maxmind.com/f?l=qzykqkdDC1w2&i=" . $ip;
$url = parse_url($query);
$host = $url["host"];
$path = $url["path"] . "?" . $url["query"];
$timeout = 1;
$fp = fsockopen ($host, 80, $errno, $errstr, $timeout)
        or die('Can not open connection to server.');
if ($fp) {
  fputs ($fp, "GET $path HTTP/1.0\nHost: " . $host. "\n\n");
  while (!feof($fp)) {
    $buf .= fgets($fp, 128);
  }
  $lines = explode("\n", $buf);
  $data = $lines[count($lines)-1];
  fclose($fp);
} else {
  # enter error handing code here
  echo 'GeoIP didnt work <br /><br />';
}


$location = explode(",",$data);
$inferred_country_code = $location[0];
$inferred_state = $location[1];
$inferred_city = $location[2];
$inferred_company = str_replace('"', "",$location[9]);




if ($inferred_country_code=="AF") {$inferred_country="Afghanistan";}
if ($inferred_country_code=="AL") {$inferred_country="Albania";}
if ($inferred_country_code=="DZ") {$inferred_country="Algeria";}
if ($inferred_country_code=="AS") {$inferred_country="American Samoa";}
if ($inferred_country_code=="AD") {$inferred_country="Andorra";}
if ($inferred_country_code=="AO") {$inferred_country="Angola";}
if ($inferred_country_code=="AI") {$inferred_country="Anguilla";}
if ($inferred_country_code=="AQ") {$inferred_country="Antarctica";}
if ($inferred_country_code=="AG") {$inferred_country="Antigua And Barbuda";}
if ($inferred_country_code=="AR") {$inferred_country="Argentina";}
if ($inferred_country_code=="AM") {$inferred_country="Armenia";}
if ($inferred_country_code=="AW") {$inferred_country="Aruba";}
if ($inferred_country_code=="AU") {$inferred_country="Australia";}
if ($inferred_country_code=="AT") {$inferred_country="Austria";}
if ($inferred_country_code=="AZ") {$inferred_country="Azerbaijan";}
if ($inferred_country_code=="BS") {$inferred_country="Bahamas";}
if ($inferred_country_code=="BH") {$inferred_country="Bahrain";}
if ($inferred_country_code=="BD") {$inferred_country="Bangladesh";}
if ($inferred_country_code=="BB") {$inferred_country="Barbados";}
if ($inferred_country_code=="BY") {$inferred_country="Belarus";}
if ($inferred_country_code=="BE") {$inferred_country="Belgium";}
if ($inferred_country_code=="BZ") {$inferred_country="Belize";}
if ($inferred_country_code=="BJ") {$inferred_country="Benin";}
if ($inferred_country_code=="BM") {$inferred_country="Bermuda";}
if ($inferred_country_code=="BT") {$inferred_country="Bhutan";}
if ($inferred_country_code=="BO") {$inferred_country="Bolivia";}
if ($inferred_country_code=="BA") {$inferred_country="Bosnia And Herzegowina";}
if ($inferred_country_code=="BW") {$inferred_country="Botswana";}
if ($inferred_country_code=="BV") {$inferred_country="Bouvet Island";}
if ($inferred_country_code=="BR") {$inferred_country="Brazil";}
if ($inferred_country_code=="IO") {$inferred_country="British Indian Ocean Territory";}
if ($inferred_country_code=="BN") {$inferred_country="Brunei";}
if ($inferred_country_code=="BG") {$inferred_country="Bulgaria";}
if ($inferred_country_code=="BF") {$inferred_country="Burkina Faso";}
if ($inferred_country_code=="BI") {$inferred_country="Burundi";}
if ($inferred_country_code=="KH") {$inferred_country="Cambodia";}
if ($inferred_country_code=="CM") {$inferred_country="Cameroon";}
if ($inferred_country_code=="CA") {$inferred_country="Canada";}
if ($inferred_country_code=="CV") {$inferred_country="Cape Verde";}
if ($inferred_country_code=="KY") {$inferred_country="Cayman Islands";}
if ($inferred_country_code=="CF") {$inferred_country="Central African Republic";}
if ($inferred_country_code=="TD") {$inferred_country="Chad";}
if ($inferred_country_code=="CL") {$inferred_country="Chile";}
if ($inferred_country_code=="CN") {$inferred_country="China";}
if ($inferred_country_code=="CX") {$inferred_country="Christmas Island";}
if ($inferred_country_code=="CC") {$inferred_country="Cocos (Keeling) Islands";}
if ($inferred_country_code=="CO") {$inferred_country="Colombia";}
if ($inferred_country_code=="KM") {$inferred_country="Comoros";}
if ($inferred_country_code=="CG") {$inferred_country="Congo";}
if ($inferred_country_code=="CD") {$inferred_country="Congo, The Drc";}
if ($inferred_country_code=="CK") {$inferred_country="Cook Islands";}
if ($inferred_country_code=="CR") {$inferred_country="Costa Rica";}
if ($inferred_country_code=="CI") {$inferred_country="Cote D'Ivoire";}
if ($inferred_country_code=="HR") {$inferred_country="Croatia";}
if ($inferred_country_code=="CU") {$inferred_country="Cuba";}
if ($inferred_country_code=="CY") {$inferred_country="Cyprus";}
if ($inferred_country_code=="CZ") {$inferred_country="Czech Republic";}
if ($inferred_country_code=="DK") {$inferred_country="Denmark";}
if ($inferred_country_code=="DJ") {$inferred_country="Djibouti";}
if ($inferred_country_code=="DM") {$inferred_country="Dominica";}
if ($inferred_country_code=="DO") {$inferred_country="Dominican Republic";}
if ($inferred_country_code=="TP") {$inferred_country="East Timor";}
if ($inferred_country_code=="EC") {$inferred_country="Ecuador";}
if ($inferred_country_code=="EG") {$inferred_country="Egypt";}
if ($inferred_country_code=="SV") {$inferred_country="El Salvador";}
if ($inferred_country_code=="GQ") {$inferred_country="Equatorial Guinea";}
if ($inferred_country_code=="ER") {$inferred_country="Eritrea";}
if ($inferred_country_code=="EE") {$inferred_country="Estonia";}
if ($inferred_country_code=="ET") {$inferred_country="Ethiopia";}
if ($inferred_country_code=="FK") {$inferred_country="Falkland Islands";}
if ($inferred_country_code=="FO") {$inferred_country="Faroe Islands";}
if ($inferred_country_code=="FJ") {$inferred_country="Fiji Islands";}
if ($inferred_country_code=="FI") {$inferred_country="Finland";}
if ($inferred_country_code=="FR") {$inferred_country="France";}
if ($inferred_country_code=="FX") {$inferred_country="France, Metropolitan";}
if ($inferred_country_code=="GF") {$inferred_country="French Guiana";}
if ($inferred_country_code=="PF") {$inferred_country="French Polynesia";}
if ($inferred_country_code=="TF") {$inferred_country="French Southern Territories";}
if ($inferred_country_code=="GA") {$inferred_country="Gabon";}
if ($inferred_country_code=="GM") {$inferred_country="Gambia";}
if ($inferred_country_code=="GE") {$inferred_country="Georgia";}
if ($inferred_country_code=="DE") {$inferred_country="Germany";}
if ($inferred_country_code=="GH") {$inferred_country="Ghana";}
if ($inferred_country_code=="GI") {$inferred_country="Gibraltar";}
if ($inferred_country_code=="GR") {$inferred_country="Greece";}
if ($inferred_country_code=="GL") {$inferred_country="Greenland";}
if ($inferred_country_code=="GD") {$inferred_country="Grenada";}
if ($inferred_country_code=="GP") {$inferred_country="Guadeloupe";}
if ($inferred_country_code=="GU") {$inferred_country="Guam";}
if ($inferred_country_code=="GT") {$inferred_country="Guatemala";}
if ($inferred_country_code=="GN") {$inferred_country="Guinea";}
if ($inferred_country_code=="GW") {$inferred_country="Guinea-Bissau";}
if ($inferred_country_code=="GY") {$inferred_country="Guyana";}
if ($inferred_country_code=="HT") {$inferred_country="Haiti";}
if ($inferred_country_code=="HM") {$inferred_country="Heard And Mc Donald Islands";}
if ($inferred_country_code=="VA") {$inferred_country="Holy See (Vatican City State)";}
if ($inferred_country_code=="HN") {$inferred_country="Honduras";}
if ($inferred_country_code=="HK") {$inferred_country="Hong Kong";}
if ($inferred_country_code=="HU") {$inferred_country="Hungary";}
if ($inferred_country_code=="IS") {$inferred_country="Iceland";}
if ($inferred_country_code=="IN") {$inferred_country="India";}
if ($inferred_country_code=="ID") {$inferred_country="Indonesia";}
if ($inferred_country_code=="IR") {$inferred_country="Iran";}
if ($inferred_country_code=="IQ") {$inferred_country="Iraq";}
if ($inferred_country_code=="IE") {$inferred_country="Ireland";}
if ($inferred_country_code=="IL") {$inferred_country="Israel";}
if ($inferred_country_code=="IT") {$inferred_country="Italy";}
if ($inferred_country_code=="JM") {$inferred_country="Jamaica";}
if ($inferred_country_code=="JP") {$inferred_country="Japan";}
if ($inferred_country_code=="JO") {$inferred_country="Jordan";}
if ($inferred_country_code=="KZ") {$inferred_country="Kazakhstan";}
if ($inferred_country_code=="KE") {$inferred_country="Kenya";}
if ($inferred_country_code=="KI") {$inferred_country="Kiribati";}
if ($inferred_country_code=="KP") {$inferred_country="Korea";}
if ($inferred_country_code=="KR") {$inferred_country="Korea, Republic Of";}
if ($inferred_country_code=="KW") {$inferred_country="Kuwait";}
if ($inferred_country_code=="KG") {$inferred_country="Kyrgyzstan";}
if ($inferred_country_code=="LA") {$inferred_country="Laos";}
if ($inferred_country_code=="LV") {$inferred_country="Latvia";}
if ($inferred_country_code=="LB") {$inferred_country="Lebanon";}
if ($inferred_country_code=="LS") {$inferred_country="Lesotho";}
if ($inferred_country_code=="LR") {$inferred_country="Liberia";}
if ($inferred_country_code=="LY") {$inferred_country="Libya";}
if ($inferred_country_code=="LI") {$inferred_country="Liechtenstein";}
if ($inferred_country_code=="LT") {$inferred_country="Lithuania";}
if ($inferred_country_code=="LU") {$inferred_country="Luxembourg";}
if ($inferred_country_code=="MO") {$inferred_country="Macau";}
if ($inferred_country_code=="MK") {$inferred_country="Macedonia";}
if ($inferred_country_code=="MG") {$inferred_country="Madagascar";}
if ($inferred_country_code=="MW") {$inferred_country="Malawi";}
if ($inferred_country_code=="MY") {$inferred_country="Malaysia";}
if ($inferred_country_code=="MV") {$inferred_country="Maldives";}
if ($inferred_country_code=="ML") {$inferred_country="Mali";}
if ($inferred_country_code=="MT") {$inferred_country="Malta";}
if ($inferred_country_code=="MH") {$inferred_country="Marshall Islands";}
if ($inferred_country_code=="MQ") {$inferred_country="Martinique";}
if ($inferred_country_code=="MR") {$inferred_country="Mauritania";}
if ($inferred_country_code=="MU") {$inferred_country="Mauritius";}
if ($inferred_country_code=="YT") {$inferred_country="Mayotte";}
if ($inferred_country_code=="MX") {$inferred_country="Mexico";}
if ($inferred_country_code=="FM") {$inferred_country="Micronesia";}
if ($inferred_country_code=="MD") {$inferred_country="Moldova";}
if ($inferred_country_code=="MC") {$inferred_country="Monaco";}
if ($inferred_country_code=="MN") {$inferred_country="Mongolia";}
if ($inferred_country_code=="MS") {$inferred_country="Montserrat";}
if ($inferred_country_code=="MA") {$inferred_country="Morocco";}
if ($inferred_country_code=="MZ") {$inferred_country="Mozambique";}
if ($inferred_country_code=="MM") {$inferred_country="Myanmar";}
if ($inferred_country_code=="NA") {$inferred_country="Namibia";}
if ($inferred_country_code=="NR") {$inferred_country="Nauru";}
if ($inferred_country_code=="NP") {$inferred_country="Nepal";}
if ($inferred_country_code=="NL") {$inferred_country="Netherlands";}
if ($inferred_country_code=="AN") {$inferred_country="Netherlands Antilles";}
if ($inferred_country_code=="NC") {$inferred_country="New Caledonia";}
if ($inferred_country_code=="NZ") {$inferred_country="New Zealand";}
if ($inferred_country_code=="NI") {$inferred_country="Nicaragua";}
if ($inferred_country_code=="NE") {$inferred_country="Niger";}
if ($inferred_country_code=="NG") {$inferred_country="Nigeria";}
if ($inferred_country_code=="NU") {$inferred_country="Niue";}
if ($inferred_country_code=="NF") {$inferred_country="Norfolk Island";}
if ($inferred_country_code=="MP") {$inferred_country="Northern Mariana Islands";}
if ($inferred_country_code=="NO") {$inferred_country="Norway";}
if ($inferred_country_code=="OM") {$inferred_country="Oman";}
if ($inferred_country_code=="PK") {$inferred_country="Pakistan";}
if ($inferred_country_code=="PW") {$inferred_country="Palau";}
if ($inferred_country_code=="PA") {$inferred_country="Panama";}
if ($inferred_country_code=="PG") {$inferred_country="Papua New Guinea";}
if ($inferred_country_code=="PY") {$inferred_country="Paraguay";}
if ($inferred_country_code=="PE") {$inferred_country="Peru";}
if ($inferred_country_code=="PH") {$inferred_country="Philippines";}
if ($inferred_country_code=="PN") {$inferred_country="Pitcairn Island";}
if ($inferred_country_code=="PL") {$inferred_country="Poland";}
if ($inferred_country_code=="PT") {$inferred_country="Portugal";}
if ($inferred_country_code=="PR") {$inferred_country="Puerto Rico";}
if ($inferred_country_code=="QA") {$inferred_country="Qatar";}
if ($inferred_country_code=="RE") {$inferred_country="Reunion";}
if ($inferred_country_code=="RO") {$inferred_country="Romania";}
if ($inferred_country_code=="RU") {$inferred_country="Russia";}
if ($inferred_country_code=="RW") {$inferred_country="Rwanda";}
if ($inferred_country_code=="SH") {$inferred_country="Saint Helena";}
if ($inferred_country_code=="KN") {$inferred_country="Saint Kitts";}
if ($inferred_country_code=="LC") {$inferred_country="Saint Lucia";}
if ($inferred_country_code=="VC") {$inferred_country="Saint Vincent And The Grenadines";}
if ($inferred_country_code=="WS") {$inferred_country="Samoa";}
if ($inferred_country_code=="SM") {$inferred_country="San Marino";}
if ($inferred_country_code=="ST") {$inferred_country="Sao Tome And Principe";}
if ($inferred_country_code=="SA") {$inferred_country="Saudi Arabia";}
if ($inferred_country_code=="SN") {$inferred_country="Senegal";}
if ($inferred_country_code=="SC") {$inferred_country="Seychelles";}
if ($inferred_country_code=="SL") {$inferred_country="Sierra Leone";}
if ($inferred_country_code=="SG") {$inferred_country="Singapore";}
if ($inferred_country_code=="SK") {$inferred_country="Slovakia";}
if ($inferred_country_code=="SI") {$inferred_country="Slovenia";}
if ($inferred_country_code=="SB") {$inferred_country="Solomon Islands";}
if ($inferred_country_code=="SO") {$inferred_country="Somalia";}
if ($inferred_country_code=="ZA") {$inferred_country="South Africa";}
if ($inferred_country_code=="GS") {$inferred_country="South Georgia And South S.S.";}
if ($inferred_country_code=="ES") {$inferred_country="Spain";}
if ($inferred_country_code=="LK") {$inferred_country="Sri Lanka";}
if ($inferred_country_code=="PM") {$inferred_country="St. Pierre And Miquelon";}
if ($inferred_country_code=="SD") {$inferred_country="Sudan";}
if ($inferred_country_code=="SR") {$inferred_country="Suriname";}
if ($inferred_country_code=="SJ") {$inferred_country="Svalbard And Jan Mayen Islands";}
if ($inferred_country_code=="SZ") {$inferred_country="Swaziland";}
if ($inferred_country_code=="SE") {$inferred_country="Sweden";}
if ($inferred_country_code=="CH") {$inferred_country="Switzerland";}
if ($inferred_country_code=="SY") {$inferred_country="Syria";}
if ($inferred_country_code=="TW") {$inferred_country="Taiwan";}
if ($inferred_country_code=="TJ") {$inferred_country="Tajikistan";}
if ($inferred_country_code=="TZ") {$inferred_country="Tanzania";}
if ($inferred_country_code=="TH") {$inferred_country="Thailand";}
if ($inferred_country_code=="TG") {$inferred_country="Togo";}
if ($inferred_country_code=="TK") {$inferred_country="Tokelau";}
if ($inferred_country_code=="TO") {$inferred_country="Tonga";}
if ($inferred_country_code=="TT") {$inferred_country="Trinidad and Tobago";}
if ($inferred_country_code=="TN") {$inferred_country="Tunisia";}
if ($inferred_country_code=="TR") {$inferred_country="Turkey";}
if ($inferred_country_code=="TM") {$inferred_country="Turkmenistan";}
if ($inferred_country_code=="TC") {$inferred_country="Turks And Caicos Islands";}
if ($inferred_country_code=="TV") {$inferred_country="Tuvalu";}
if ($inferred_country_code=="UG") {$inferred_country="Uganda";}
if ($inferred_country_code=="UA") {$inferred_country="Ukraine";}
if ($inferred_country_code=="AE") {$inferred_country="United Arab Emirates";}
if ($inferred_country_code=="GB") {$inferred_country="United Kingdom";}
if ($inferred_country_code=="US") {$inferred_country="United States";}
if ($inferred_country_code=="UM") {$inferred_country="U.S. Minor Islands";}
if ($inferred_country_code=="UY") {$inferred_country="Uruguay";}
if ($inferred_country_code=="UZ") {$inferred_country="Uzbekistan";}
if ($inferred_country_code=="VU") {$inferred_country="Vanuatu";}
if ($inferred_country_code=="VE") {$inferred_country="Venezuela";}
if ($inferred_country_code=="VN") {$inferred_country="Vietnam";}
if ($inferred_country_code=="VG") {$inferred_country="Virgin Islands";}
if ($inferred_country_code=="VI") {$inferred_country="Virgin Islands (U.S.)";}
if ($inferred_country_code=="WF") {$inferred_country="Wallis And Futuna Islands";}
if ($inferred_country_code=="EH") {$inferred_country="Western Sahara";}
if ($inferred_country_code=="YE") {$inferred_country="Yemen";}
if ($inferred_country_code=="ZM") {$inferred_country="Zambia";}
if ($inferred_country_code=="ZW") {$inferred_country="Zimbabwe";}
?> 
