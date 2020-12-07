<?php include "main_headers.php";?>
<body style="background-color: #EFEDE3;">
<?php include "main_navs.php";?>



	 <!-- Home Category Images -->
     <div class="container">
	<form class="form-horizontal" method="POST"  autocomplete="off">
	<div class="row">
		<div class="col-md-5">
			<div class="container" >
				<h2 class ="h2_big">My Account</h2>
			</div>
		</div>
		<div class="col-md-7">
		</br>
		<!-- Your Personal Details -->
		<h2 class ="h4">Your Personal Details</h2>
		<hr/>
			 <!-- PHP QUERY -->
		<?php 		
				if(isset($_SESSION['id_usuario'])){
					$ID = $_SESSION['id_usuario'];
					$cnn = OpenCon();
					$query1 = "CALL DETALLES_USUARIO('$ID');";
    				$result1 = $cnn->query($query1);
    				if($result1){
					while ($row = $result1->fetch_array()) {
					  ?>
		<input type="text" class ="input_account" id="ID" name="ID" value = "<?php echo $ID;?>" hidden>
		<p class = "p">First Name</p>
		<input type="text" class ="input_account" id="first_name" name="first_name" value = "<?php echo $row['nombre'];?>">
		<p class = "p">Last Name</p>
		<input type="text" class ="input_account" id="last_name" name="last_name" value = "<?php echo $row['apellidos'];?>">
		<div class="form-group">
		<p class = "p">Email</p>
		<input type="text" class ="input_account" id="email" name="email" value = "<?php echo $row['correo'];?>">
		</br>
		</br>
		<!-- Your Address -->
		<h2 class ="h2">Your Address</h2>
		<hr/>
		<p class = "p">Street Address</p>
		<input type="text" class ="input_account" id="street_adress" name="street_adress" value = "<?php echo $row['calle1'];?>">
		<p class = "p">Street Address 2</p>
		<input type="text" class ="input_account" id="street_adresstwo" name="street_adresstwo" value = "<?php echo $row['calle2'];?>">
		<p class = "p">Zip/Postal Code</p>
		<input type="text" class ="input_account" id="zip_code" name="zip_code" value = "<?php echo $row['codigo_postal'];?>">
		<p class = "p">City</p>
		<input type="text" class ="input_account" id="city" name="city" value = "<?php echo $row['ciudad'];?>">
		<p class = "p">pais</p>
			<select class="form-control-large" id="pais" name="pais" selected="<?php echo $row['pais'];?>">
						<option> pais </option>
						<option value="United States"								<?php echo ($row['pais']=="United States"								) ? 'selected="selected"': ''; ?>>United States</option> 
						<option value="United Kingdom"								<?php echo ($row['pais']=="United Kingdom"								) ? 'selected="selected"': ''; ?>>United Kingdom</option> 
						<option value="Afghanistan"									<?php echo ($row['pais']=="Afghanistan"									) ? 'selected="selected"': ''; ?>>Afghanistan</option> 
						<option value="Albania"										<?php echo ($row['pais']=="Albania"										) ? 'selected="selected"': ''; ?>>Albania</option> 
						<option value="Algeria"										<?php echo ($row['pais']=="Algeria"										) ? 'selected="selected"': ''; ?>>Algeria</option> 
						<option value="American Samoa"								<?php echo ($row['pais']=="American Samoa"								) ? 'selected="selected"': ''; ?>>American Samoa</option> 
						<option value="Andorra"										<?php echo ($row['pais']=="Andorra"										) ? 'selected="selected"': ''; ?>>Andorra</option> 
						<option value="Angola"										<?php echo ($row['pais']=="Angola"										) ? 'selected="selected"': ''; ?>>Angola</option> 
						<option value="Anguilla"									<?php echo ($row['pais']=="Anguilla"									) ? 'selected="selected"': ''; ?>>Anguilla</option> 
						<option value="Antarctica"									<?php echo ($row['pais']=="Antarctica"									) ? 'selected="selected"': ''; ?>>Antarctica</option> 
						<option value="Antigua and Barbuda"							<?php echo ($row['pais']=="Antigua and Barbuda"							) ? 'selected="selected"': ''; ?>>Antigua and Barbuda</option> 
						<option value="Argentina"									<?php echo ($row['pais']=="Argentina"									) ? 'selected="selected"': ''; ?>>Argentina</option> 
						<option value="Armenia"										<?php echo ($row['pais']=="Armenia"										) ? 'selected="selected"': ''; ?>>Armenia</option> 
						<option value="Aruba"										<?php echo ($row['pais']=="Aruba"										) ? 'selected="selected"': ''; ?>>Aruba</option> 
						<option value="Australia"									<?php echo ($row['pais']=="Australia"									) ? 'selected="selected"': ''; ?>>Australia</option> 
						<option value="Austria"										<?php echo ($row['pais']=="Austria"										) ? 'selected="selected"': ''; ?>>Austria</option> 
						<option value="Azerbaijan"									<?php echo ($row['pais']=="Azerbaijan"									) ? 'selected="selected"': ''; ?>>Azerbaijan</option> 
						<option value="Bahamas"										<?php echo ($row['pais']=="Bahamas"										) ? 'selected="selected"': ''; ?>>Bahamas</option> 
						<option value="Bahrain"										<?php echo ($row['pais']=="Bahrain"										) ? 'selected="selected"': ''; ?>>Bahrain</option> 
						<option value="Bangladesh"									<?php echo ($row['pais']=="Bangladesh"									) ? 'selected="selected"': ''; ?>>Bangladesh</option> 
						<option value="Barbados"									<?php echo ($row['pais']=="Barbados"									) ? 'selected="selected"': ''; ?>>Barbados</option> 
						<option value="Belarus"										<?php echo ($row['pais']=="Belarus"										) ? 'selected="selected"': ''; ?>>Belarus</option> 
						<option value="Belgium"										<?php echo ($row['pais']=="Belgium"										) ? 'selected="selected"': ''; ?>>Belgium</option> 
						<option value="Belize"										<?php echo ($row['pais']=="Belize"										) ? 'selected="selected"': ''; ?>>Belize</option> 
						<option value="Benin"										<?php echo ($row['pais']=="Benin"										) ? 'selected="selected"': ''; ?>>Benin</option> 
						<option value="Bermuda"										<?php echo ($row['pais']=="Bermuda"										) ? 'selected="selected"': ''; ?>>Bermuda</option> 
						<option value="Bhutan"										<?php echo ($row['pais']=="Bhutan"										) ? 'selected="selected"': ''; ?>>Bhutan</option> 
						<option value="Bolivia"										<?php echo ($row['pais']=="Bolivia"										) ? 'selected="selected"': ''; ?>>Bolivia</option> 
						<option value="Bosnia and Herzegovina"						<?php echo ($row['pais']=="Bosnia and Herzegovina"						) ? 'selected="selected"': ''; ?>>Bosnia and Herzegovina</option> 
						<option value="Botswana"									<?php echo ($row['pais']=="Botswana"									) ? 'selected="selected"': ''; ?>>Botswana</option> 
						<option value="Bouvet Island"								<?php echo ($row['pais']=="Bouvet Island"								) ? 'selected="selected"': ''; ?>>Bouvet Island</option> 
						<option value="Brazil"										<?php echo ($row['pais']=="Brazil"										) ? 'selected="selected"': ''; ?>>Brazil</option> 
						<option value="British Indian Ocean Territory"				<?php echo ($row['pais']=="British Indian Ocean Territory"				) ? 'selected="selected"': ''; ?>>British Indian Ocean Territory</option> 
						<option value="Brunei Darussalam"							<?php echo ($row['pais']=="Brunei Darussalam"							) ? 'selected="selected"': ''; ?>>Brunei Darussalam</option> 
						<option value="Bulgaria"									<?php echo ($row['pais']=="Bulgaria"									) ? 'selected="selected"': ''; ?>>Bulgaria</option> 
						<option value="Burkina Faso"								<?php echo ($row['pais']=="Burkina Faso"								) ? 'selected="selected"': ''; ?>>Burkina Faso</option> 
						<option value="Burundi"										<?php echo ($row['pais']=="Burundi"										) ? 'selected="selected"': ''; ?>>Burundi</option> 
						<option value="Cambodia"									<?php echo ($row['pais']=="Cambodia"									) ? 'selected="selected"': ''; ?>>Cambodia</option> 
						<option value="Cameroon"									<?php echo ($row['pais']=="Cameroon"									) ? 'selected="selected"': ''; ?>>Cameroon</option> 
						<option value="Canada"										<?php echo ($row['pais']=="Canada"										) ? 'selected="selected"': ''; ?>>Canada</option> 
						<option value="Cape Verde"									<?php echo ($row['pais']=="Cape Verde"									) ? 'selected="selected"': ''; ?>>Cape Verde</option> 
						<option value="Cayman Islands"								<?php echo ($row['pais']=="Cayman Islands"								) ? 'selected="selected"': ''; ?>>Cayman Islands</option> 
						<option value="Central African Republic"					<?php echo ($row['pais']=="Central African Republic"					) ? 'selected="selected"': ''; ?>>Central African Republic</option> 
						<option value="Chad"										<?php echo ($row['pais']=="Chad"										) ? 'selected="selected"': ''; ?>>Chad</option> 
						<option value="Chile"										<?php echo ($row['pais']=="Chile"										) ? 'selected="selected"': ''; ?>>Chile</option> 
						<option value="China"										<?php echo ($row['pais']=="China"										) ? 'selected="selected"': ''; ?>>China</option> 
						<option value="Christmas Island"							<?php echo ($row['pais']=="Christmas Island"							) ? 'selected="selected"': ''; ?>>Christmas Island</option> 
						<option value="Cocos (Keeling) Islands"						<?php echo ($row['pais']=="Cocos (Keeling) Islands"						) ? 'selected="selected"': ''; ?>>Cocos (Keeling) Islands</option> 
						<option value="Colombia"									<?php echo ($row['pais']=="Colombia"									) ? 'selected="selected"': ''; ?>>Colombia</option> 
						<option value="Comoros"										<?php echo ($row['pais']=="Comoros"										) ? 'selected="selected"': ''; ?>>Comoros</option> 
						<option value="Congo"										<?php echo ($row['pais']=="Congo"										) ? 'selected="selected"': ''; ?>>Congo</option> 
						<option value="Congo, The Democratic Republic of The"		<?php echo ($row['pais']=="Congo, The Democratic Republic of The"		) ? 'selected="selected"': ''; ?>>Congo, The Democratic Republic of The</option> 
						<option value="Cook Islands"								<?php echo ($row['pais']=="Cook Islands"								) ? 'selected="selected"': ''; ?>>Cook Islands</option> 
						<option value="Costa Rica"									<?php echo ($row['pais']=="Costa Rica"									) ? 'selected="selected"': ''; ?>>Costa Rica</option> 
						<option value="Cote D'ivoire"								<?php echo ($row['pais']=="Cote D'ivoire"								) ? 'selected="selected"': ''; ?>>Cote D'ivoire</option> 
						<option value="Croatia"										<?php echo ($row['pais']=="Croatia"										) ? 'selected="selected"': ''; ?>>Croatia</option> 
						<option value="Cuba"										<?php echo ($row['pais']=="Cuba"										) ? 'selected="selected"': ''; ?>>Cuba</option> 
						<option value="Cyprus"										<?php echo ($row['pais']=="Cyprus"										) ? 'selected="selected"': ''; ?>>Cyprus</option> 
						<option value="Czech Republic"								<?php echo ($row['pais']=="Czech Republic"								) ? 'selected="selected"': ''; ?>>Czech Republic</option> 
						<option value="Denmark"										<?php echo ($row['pais']=="Denmark"										) ? 'selected="selected"': ''; ?>>Denmark</option> 
						<option value="Djibouti"									<?php echo ($row['pais']=="Djibouti"									) ? 'selected="selected"': ''; ?>>Djibouti</option> 
						<option value="Dominica"									<?php echo ($row['pais']=="Dominica"									) ? 'selected="selected"': ''; ?>>Dominica</option> 
						<option value="Dominican Republic"							<?php echo ($row['pais']=="Dominican Republic"							) ? 'selected="selected"': ''; ?>>Dominican Republic</option> 
						<option value="Ecuador"										<?php echo ($row['pais']=="Ecuador"										) ? 'selected="selected"': ''; ?>>Ecuador</option> 
						<option value="Egypt"										<?php echo ($row['pais']=="Egypt"										) ? 'selected="selected"': ''; ?>>Egypt</option> 
						<option value="El Salvador"									<?php echo ($row['pais']=="El Salvador"									) ? 'selected="selected"': ''; ?>>El Salvador</option> 
						<option value="Equatorial Guinea"							<?php echo ($row['pais']=="Equatorial Guinea"							) ? 'selected="selected"': ''; ?>>Equatorial Guinea</option> 
						<option value="Eritrea"										<?php echo ($row['pais']=="Eritrea"										) ? 'selected="selected"': ''; ?>>Eritrea</option> 
						<option value="Estonia"										<?php echo ($row['pais']=="Estonia"										) ? 'selected="selected"': ''; ?>>Estonia</option> 
						<option value="Ethiopia"									<?php echo ($row['pais']=="Ethiopia"									) ? 'selected="selected"': ''; ?>>Ethiopia</option> 
						<option value="Falkland Islands (Malvinas)"					<?php echo ($row['pais']=="Falkland Islands (Malvinas)"					) ? 'selected="selected"': ''; ?>>Falkland Islands (Malvinas)</option> 
						<option value="Faroe Islands"								<?php echo ($row['pais']=="Faroe Islands"								) ? 'selected="selected"': ''; ?>>Faroe Islands</option> 
						<option value="Fiji"										<?php echo ($row['pais']=="Fiji"										) ? 'selected="selected"': ''; ?>>Fiji</option> 
						<option value="Finland"										<?php echo ($row['pais']=="Finland"										) ? 'selected="selected"': ''; ?>>Finland</option> 
						<option value="France"										<?php echo ($row['pais']=="France"										) ? 'selected="selected"': ''; ?>>France</option> 
						<option value="French Guiana"								<?php echo ($row['pais']=="French Guiana"								) ? 'selected="selected"': ''; ?>>French Guiana</option> 
						<option value="French Polynesia"							<?php echo ($row['pais']=="French Polynesia"							) ? 'selected="selected"': ''; ?>>French Polynesia</option> 
						<option value="French Southern Territories"					<?php echo ($row['pais']=="French Southern Territories"					) ? 'selected="selected"': ''; ?>>French Southern Territories</option> 
						<option value="Gabon"										<?php echo ($row['pais']=="Gabon"										) ? 'selected="selected"': ''; ?>>Gabon</option> 
						<option value="Gambia"										<?php echo ($row['pais']=="Gambia"										) ? 'selected="selected"': ''; ?>>Gambia</option> 
						<option value="Georgia"										<?php echo ($row['pais']=="Georgia"										) ? 'selected="selected"': ''; ?>>Georgia</option> 
						<option value="Germany"										<?php echo ($row['pais']=="Germany"										) ? 'selected="selected"': ''; ?>>Germany</option> 
						<option value="Ghana"										<?php echo ($row['pais']=="Ghana"										) ? 'selected="selected"': ''; ?>>Ghana</option> 
						<option value="Gibraltar"									<?php echo ($row['pais']=="Gibraltar"									) ? 'selected="selected"': ''; ?>>Gibraltar</option> 
						<option value="Greece"										<?php echo ($row['pais']=="Greece"										) ? 'selected="selected"': ''; ?>>Greece</option> 
						<option value="Greenland"									<?php echo ($row['pais']=="Greenland"									) ? 'selected="selected"': ''; ?>>Greenland</option> 
						<option value="Grenada"										<?php echo ($row['pais']=="Grenada"										) ? 'selected="selected"': ''; ?>>Grenada</option> 
						<option value="Guadeloupe"									<?php echo ($row['pais']=="Guadeloupe"									) ? 'selected="selected"': ''; ?>>Guadeloupe</option> 
						<option value="Guam"										<?php echo ($row['pais']=="Guam"										) ? 'selected="selected"': ''; ?>>Guam</option> 
						<option value="Guatemala"									<?php echo ($row['pais']=="Guatemala"									) ? 'selected="selected"': ''; ?>>Guatemala</option> 
						<option value="Guinea"										<?php echo ($row['pais']=="Guinea"										) ? 'selected="selected"': ''; ?>>Guinea</option> 
						<option value="Guinea-bissau"								<?php echo ($row['pais']=="Guinea-bissau"								) ? 'selected="selected"': ''; ?>>Guinea-bissau</option> 
						<option value="Guyana"										<?php echo ($row['pais']=="Guyana"										) ? 'selected="selected"': ''; ?>>Guyana</option> 
						<option value="Haiti"										<?php echo ($row['pais']=="Haiti"										) ? 'selected="selected"': ''; ?>>Haiti</option> 
						<option value="Heard Island and Mcdonald Islands"			<?php echo ($row['pais']=="Heard Island and Mcdonald Islands"			) ? 'selected="selected"': ''; ?>>Heard Island and Mcdonald Islands</option> 
						<option value="Holy See (Vatican City State)"				<?php echo ($row['pais']=="Holy See (Vatican City State)"				) ? 'selected="selected"': ''; ?>>Holy See (Vatican City State)</option> 
						<option value="Honduras"									<?php echo ($row['pais']=="Honduras"									) ? 'selected="selected"': ''; ?>>Honduras</option> 
						<option value="Hong Kong"									<?php echo ($row['pais']=="Hong Kong"									) ? 'selected="selected"': ''; ?>>Hong Kong</option> 
						<option value="Hungary"										<?php echo ($row['pais']=="Hungary"										) ? 'selected="selected"': ''; ?>>Hungary</option> 
						<option value="Iceland"										<?php echo ($row['pais']=="Iceland"										) ? 'selected="selected"': ''; ?>>Iceland</option> 
						<option value="India"										<?php echo ($row['pais']=="India"										) ? 'selected="selected"': ''; ?>>India</option> 
						<option value="Indonesia"									<?php echo ($row['pais']=="Indonesia"									) ? 'selected="selected"': ''; ?>>Indonesia</option> 
						<option value="Iran, Islamic Republic of"					<?php echo ($row['pais']=="Iran, Islamic Republic of"					) ? 'selected="selected"': ''; ?>>Iran, Islamic Republic of</option> 
						<option value="Iraq"										<?php echo ($row['pais']=="Iraq"										) ? 'selected="selected"': ''; ?>>Iraq</option> 
						<option value="Ireland"										<?php echo ($row['pais']=="Ireland"										) ? 'selected="selected"': ''; ?>>Ireland</option> 
						<option value="Israel"										<?php echo ($row['pais']=="Israel"										) ? 'selected="selected"': ''; ?>>Israel</option> 
						<option value="Italy"										<?php echo ($row['pais']=="Italy"										) ? 'selected="selected"': ''; ?>>Italy</option> 
						<option value="Jamaica"										<?php echo ($row['pais']=="Jamaica"										) ? 'selected="selected"': ''; ?>>Jamaica</option> 
						<option value="Japan"										<?php echo ($row['pais']=="Japan"										) ? 'selected="selected"': ''; ?>>Japan</option> 
						<option value="Jordan"										<?php echo ($row['pais']=="Jordan"										) ? 'selected="selected"': ''; ?>>Jordan</option> 
						<option value="Kazakhstan"									<?php echo ($row['pais']=="Kazakhstan"									) ? 'selected="selected"': ''; ?>>Kazakhstan</option> 
						<option value="Kenya"										<?php echo ($row['pais']=="Kenya"										) ? 'selected="selected"': ''; ?>>Kenya</option> 
						<option value="Kiribati"									<?php echo ($row['pais']=="Kiribati"									) ? 'selected="selected"': ''; ?>>Kiribati</option> 
						<option value="Korea, Democratic People's Republic of"		<?php echo ($row['pais']=="Korea, Democratic People's Republic of"		) ? 'selected="selected"': ''; ?>>Korea, Democratic People's Republic of</option> 
						<option value="Korea, Republic of"							<?php echo ($row['pais']=="Korea, Republic of"							) ? 'selected="selected"': ''; ?>>Korea, Republic of</option> 
						<option value="Kuwait"										<?php echo ($row['pais']=="Kuwait"										) ? 'selected="selected"': ''; ?>>Kuwait</option> 
						<option value="Kyrgyzstan"									<?php echo ($row['pais']=="Kyrgyzstan"									) ? 'selected="selected"': ''; ?>>Kyrgyzstan</option> 
						<option value="Lao People's Democratic Republic"			<?php echo ($row['pais']=="Lao People's Democratic Republic"			) ? 'selected="selected"': ''; ?>>Lao People's Democratic Republic</option> 
						<option value="Latvia"										<?php echo ($row['pais']=="Latvia"										) ? 'selected="selected"': ''; ?>>Latvia</option> 
						<option value="Lebanon"										<?php echo ($row['pais']=="Lebanon"										) ? 'selected="selected"': ''; ?>>Lebanon</option> 
						<option value="Lesotho"										<?php echo ($row['pais']=="Lesotho"										) ? 'selected="selected"': ''; ?>>Lesotho</option> 
						<option value="Liberia"										<?php echo ($row['pais']=="Liberia"										) ? 'selected="selected"': ''; ?>>Liberia</option> 
						<option value="Libyan Arab Jamahiriya"						<?php echo ($row['pais']=="Libyan Arab Jamahiriya"						) ? 'selected="selected"': ''; ?>>Libyan Arab Jamahiriya</option> 
						<option value="Liechtenstein"								<?php echo ($row['pais']=="Liechtenstein"								) ? 'selected="selected"': ''; ?>>Liechtenstein</option> 
						<option value="Lithuania"									<?php echo ($row['pais']=="Lithuania"									) ? 'selected="selected"': ''; ?>>Lithuania</option> 
						<option value="Luxembourg"									<?php echo ($row['pais']=="Luxembourg"									) ? 'selected="selected"': ''; ?>>Luxembourg</option> 
						<option value="Macao"										<?php echo ($row['pais']=="Macao"										) ? 'selected="selected"': ''; ?>>Macao</option> 
						<option value="Macedonia, The Former Yugoslav Republic of"	<?php echo ($row['pais']=="Macedonia, The Former Yugoslav Republic of"	) ? 'selected="selected"': ''; ?>>Macedonia, The Former Yugoslav Republic of</option> 
						<option value="Madagascar"									<?php echo ($row['pais']=="Madagascar"									) ? 'selected="selected"': ''; ?>>Madagascar</option> 
						<option value="Malawi"										<?php echo ($row['pais']=="Malawi"										) ? 'selected="selected"': ''; ?>>Malawi</option> 
						<option value="Malaysia"									<?php echo ($row['pais']=="Malaysia"									) ? 'selected="selected"': ''; ?>>Malaysia</option> 
						<option value="Maldives"									<?php echo ($row['pais']=="Maldives"									) ? 'selected="selected"': ''; ?>>Maldives</option> 
						<option value="Mali"										<?php echo ($row['pais']=="Mali"										) ? 'selected="selected"': ''; ?>>Mali</option> 
						<option value="Malta"										<?php echo ($row['pais']=="Malta"										) ? 'selected="selected"': ''; ?>>Malta</option> 
						<option value="Marshall Islands"							<?php echo ($row['pais']=="Marshall Islands"							) ? 'selected="selected"': ''; ?>>Marshall Islands</option> 
						<option value="Martinique"									<?php echo ($row['pais']=="Martinique"									) ? 'selected="selected"': ''; ?>>Martinique</option> 
						<option value="Mauritania"									<?php echo ($row['pais']=="Mauritania"									) ? 'selected="selected"': ''; ?>>Mauritania</option> 
						<option value="Mauritius"									<?php echo ($row['pais']=="Mauritius"									) ? 'selected="selected"': ''; ?>>Mauritius</option> 
						<option value="Mayotte"										<?php echo ($row['pais']=="Mayotte"										) ? 'selected="selected"': ''; ?>>Mayotte</option> 
						<option value="Mexico"										<?php echo ($row['pais']=="Mexico"										) ? 'selected="selected"': ''; ?>>Mexico</option> 
						<option value="Micronesia, Federated States of"				<?php echo ($row['pais']=="Micronesia, Federated States of"				) ? 'selected="selected"': ''; ?>>Micronesia, Federated States of</option> 
						<option value="Moldova, Republic of"						<?php echo ($row['pais']=="Moldova, Republic of"						) ? 'selected="selected"': ''; ?>>Moldova, Republic of</option> 
						<option value="Monaco"										<?php echo ($row['pais']=="Monaco"										) ? 'selected="selected"': ''; ?>>Monaco</option> 
						<option value="Mongolia"									<?php echo ($row['pais']=="Mongolia"									) ? 'selected="selected"': ''; ?>>Mongolia</option> 
						<option value="Montserrat"									<?php echo ($row['pais']=="Montserrat"									) ? 'selected="selected"': ''; ?>>Montserrat</option> 
						<option value="Morocco"										<?php echo ($row['pais']=="Morocco"										) ? 'selected="selected"': ''; ?>>Morocco</option> 
						<option value="Mozambique"									<?php echo ($row['pais']=="Mozambique"									) ? 'selected="selected"': ''; ?>>Mozambique</option> 
						<option value="Myanmar"										<?php echo ($row['pais']=="Myanmar"										) ? 'selected="selected"': ''; ?>>Myanmar</option> 
						<option value="Namibia"										<?php echo ($row['pais']=="Namibia"										) ? 'selected="selected"': ''; ?>>Namibia</option> 
						<option value="Nauru"										<?php echo ($row['pais']=="Nauru"										) ? 'selected="selected"': ''; ?>>Nauru</option> 
						<option value="Nepal"										<?php echo ($row['pais']=="Nepal"										) ? 'selected="selected"': ''; ?>>Nepal</option> 
						<option value="Netherlands"									<?php echo ($row['pais']=="Netherlands"									) ? 'selected="selected"': ''; ?>>Netherlands</option> 
						<option value="Netherlands Antilles"						<?php echo ($row['pais']=="Netherlands Antilles"						) ? 'selected="selected"': ''; ?>>Netherlands Antilles</option> 
						<option value="New Caledonia"								<?php echo ($row['pais']=="New Caledonia"								) ? 'selected="selected"': ''; ?>>New Caledonia</option> 
						<option value="New Zealand"									<?php echo ($row['pais']=="New Zealand"									) ? 'selected="selected"': ''; ?>>New Zealand</option> 
						<option value="Nicaragua"									<?php echo ($row['pais']=="Nicaragua"									) ? 'selected="selected"': ''; ?>>Nicaragua</option> 
						<option value="Niger"										<?php echo ($row['pais']=="Niger"										) ? 'selected="selected"': ''; ?>>Niger</option> 
						<option value="Nigeria"										<?php echo ($row['pais']=="Nigeria"										) ? 'selected="selected"': ''; ?>>Nigeria</option> 
						<option value="Niue"										<?php echo ($row['pais']=="Niue"										) ? 'selected="selected"': ''; ?>>Niue</option> 
						<option value="Norfolk Island"								<?php echo ($row['pais']=="Norfolk Island"								) ? 'selected="selected"': ''; ?>>Norfolk Island</option> 
						<option value="Northern Mariana Islands"					<?php echo ($row['pais']=="Northern Mariana Islands"					) ? 'selected="selected"': ''; ?>>Northern Mariana Islands</option> 
						<option value="Norway"										<?php echo ($row['pais']=="Norway"										) ? 'selected="selected"': ''; ?>>Norway</option> 
						<option value="Oman"										<?php echo ($row['pais']=="Oman"										) ? 'selected="selected"': ''; ?>>Oman</option> 
						<option value="Pakistan"									<?php echo ($row['pais']=="Pakistan"									) ? 'selected="selected"': ''; ?>>Pakistan</option> 
						<option value="Palau"										<?php echo ($row['pais']=="Palau"										) ? 'selected="selected"': ''; ?>>Palau</option> 
						<option value="Palestinian Territory, Occupied"				<?php echo ($row['pais']=="Palestinian Territory, Occupied"				) ? 'selected="selected"': ''; ?>>Palestinian Territory, Occupied</option> 
						<option value="Panama"										<?php echo ($row['pais']=="Panama"										) ? 'selected="selected"': ''; ?>>Panama</option> 
						<option value="Papua New Guinea"							<?php echo ($row['pais']=="Papua New Guinea"							) ? 'selected="selected"': ''; ?>>Papua New Guinea</option> 
						<option value="Paraguay"									<?php echo ($row['pais']=="Paraguay"									) ? 'selected="selected"': ''; ?>>Paraguay</option> 
						<option value="Peru"										<?php echo ($row['pais']=="Peru"										) ? 'selected="selected"': ''; ?>>Peru</option> 
						<option value="Philippines"									<?php echo ($row['pais']=="Philippines"									) ? 'selected="selected"': ''; ?>>Philippines</option> 
						<option value="Pitcairn"									<?php echo ($row['pais']=="Pitcairn"									) ? 'selected="selected"': ''; ?>>Pitcairn</option> 
						<option value="Poland"										<?php echo ($row['pais']=="Poland"										) ? 'selected="selected"': ''; ?>>Poland</option> 
						<option value="Portugal"									<?php echo ($row['pais']=="Portugal"									) ? 'selected="selected"': ''; ?>>Portugal</option> 
						<option value="Puerto Rico"									<?php echo ($row['pais']=="Puerto Rico"									) ? 'selected="selected"': ''; ?>>Puerto Rico</option> 
						<option value="Qatar"										<?php echo ($row['pais']=="Qatar"										) ? 'selected="selected"': ''; ?>>Qatar</option> 
						<option value="Reunion"										<?php echo ($row['pais']=="Reunion"										) ? 'selected="selected"': ''; ?>>Reunion</option> 
						<option value="Romania"										<?php echo ($row['pais']=="Romania"										) ? 'selected="selected"': ''; ?>>Romania</option> 
						<option value="Russian Federation"							<?php echo ($row['pais']=="Russian Federation"							) ? 'selected="selected"': ''; ?>>Russian Federation</option> 
						<option value="Rwanda"										<?php echo ($row['pais']=="Rwanda"										) ? 'selected="selected"': ''; ?>>Rwanda</option> 
						<option value="Saint Helena"								<?php echo ($row['pais']=="Saint Helena"								) ? 'selected="selected"': ''; ?>>Saint Helena</option> 
						<option value="Saint Kitts and Nevis"						<?php echo ($row['pais']=="Saint Kitts and Nevis"						) ? 'selected="selected"': ''; ?>>Saint Kitts and Nevis</option> 
						<option value="Saint Lucia"									<?php echo ($row['pais']=="Saint Lucia"									) ? 'selected="selected"': ''; ?>>Saint Lucia</option> 
						<option value="Saint Pierre and Miquelon"					<?php echo ($row['pais']=="Saint Pierre and Miquelon"					) ? 'selected="selected"': ''; ?>>Saint Pierre and Miquelon</option> 
						<option value="Saint Vincent and The Grenadines"			<?php echo ($row['pais']=="Saint Vincent and The Grenadines"			) ? 'selected="selected"': ''; ?>>Saint Vincent and The Grenadines</option> 
						<option value="Samoa"										<?php echo ($row['pais']=="Samoa"										) ? 'selected="selected"': ''; ?>>Samoa</option> 
						<option value="San Marino"									<?php echo ($row['pais']=="San Marino"									) ? 'selected="selected"': ''; ?>>San Marino</option> 
						<option value="Sao Tome and Principe"						<?php echo ($row['pais']=="Sao Tome and Principe"						) ? 'selected="selected"': ''; ?>>Sao Tome and Principe</option> 
						<option value="Saudi Arabia"								<?php echo ($row['pais']=="Saudi Arabia"								) ? 'selected="selected"': ''; ?>>Saudi Arabia</option> 
						<option value="Senegal"										<?php echo ($row['pais']=="Senegal"										) ? 'selected="selected"': ''; ?>>Senegal</option> 
						<option value="Serbia and Montenegro"						<?php echo ($row['pais']=="Serbia and Montenegro"						) ? 'selected="selected"': ''; ?>>Serbia and Montenegro</option> 
						<option value="Seychelles"									<?php echo ($row['pais']=="Seychelles"									) ? 'selected="selected"': ''; ?>>Seychelles</option> 
						<option value="Sierra Leone"								<?php echo ($row['pais']=="Sierra Leone"								) ? 'selected="selected"': ''; ?>>Sierra Leone</option> 
						<option value="Singapore"									<?php echo ($row['pais']=="Singapore"									) ? 'selected="selected"': ''; ?>>Singapore</option> 
						<option value="Slovakia"									<?php echo ($row['pais']=="Slovakia"									) ? 'selected="selected"': ''; ?>>Slovakia</option> 
						<option value="Slovenia"									<?php echo ($row['pais']=="Slovenia"									) ? 'selected="selected"': ''; ?>>Slovenia</option> 
						<option value="Solomon Islands"								<?php echo ($row['pais']=="Solomon Islands"								) ? 'selected="selected"': ''; ?>>Solomon Islands</option> 
						<option value="Somalia"										<?php echo ($row['pais']=="Somalia"										) ? 'selected="selected"': ''; ?>>Somalia</option> 
						<option value="South Africa"								<?php echo ($row['pais']=="South Africa"								) ? 'selected="selected"': ''; ?>>South Africa</option> 
						<option value="South Georgia and The South Sandwich Islands"<?php echo ($row['pais']=="South Georgia and The South Sandwich Islands") ? 'selected="selected"': ''; ?>>South Georgia and The South Sandwich Islands</option> 
						<option value="Spain"										<?php echo ($row['pais']=="Spain"										) ? 'selected="selected"': ''; ?>>Spain</option> 
						<option value="Sri Lanka"									<?php echo ($row['pais']=="Sri Lanka"									) ? 'selected="selected"': ''; ?>>Sri Lanka</option> 
						<option value="Sudan"										<?php echo ($row['pais']=="Sudan"										) ? 'selected="selected"': ''; ?>>Sudan</option> 
						<option value="Suriname"									<?php echo ($row['pais']=="Suriname"									) ? 'selected="selected"': ''; ?>>Suriname</option> 
						<option value="Svalbard and Jan Mayen"						<?php echo ($row['pais']=="Svalbard and Jan Mayen"						) ? 'selected="selected"': ''; ?>>Svalbard and Jan Mayen</option> 
						<option value="Swaziland"									<?php echo ($row['pais']=="Swaziland"									) ? 'selected="selected"': ''; ?>>Swaziland</option> 
						<option value="Sweden"										<?php echo ($row['pais']=="Sweden"										) ? 'selected="selected"': ''; ?>>Sweden</option> 
						<option value="Switzerland"									<?php echo ($row['pais']=="Switzerland"									) ? 'selected="selected"': ''; ?>>Switzerland</option> 
						<option value="Syrian Arab Republic"						<?php echo ($row['pais']=="Syrian Arab Republic"						) ? 'selected="selected"': ''; ?>>Syrian Arab Republic</option> 
						<option value="Taiwan, Province of China"					<?php echo ($row['pais']=="Taiwan, Province of China"					) ? 'selected="selected"': ''; ?>>Taiwan, Province of China</option> 
						<option value="Tajikistan"									<?php echo ($row['pais']=="Tajikistan"									) ? 'selected="selected"': ''; ?>>Tajikistan</option> 
						<option value="Tanzania, United Republic of"				<?php echo ($row['pais']=="Tanzania, United Republic of"				) ? 'selected="selected"': ''; ?>>Tanzania, United Republic of</option> 
						<option value="Thailand"									<?php echo ($row['pais']=="Thailand"									) ? 'selected="selected"': ''; ?>>Thailand</option> 
						<option value="Timor-leste"									<?php echo ($row['pais']=="Timor-leste"									) ? 'selected="selected"': ''; ?>>Timor-leste</option> 
						<option value="Togo"										<?php echo ($row['pais']=="Togo"										) ? 'selected="selected"': ''; ?>>Togo</option> 
						<option value="Tokelau"										<?php echo ($row['pais']=="Tokelau"										) ? 'selected="selected"': ''; ?>>Tokelau</option> 
						<option value="Tonga"										<?php echo ($row['pais']=="Tonga"										) ? 'selected="selected"': ''; ?>>Tonga</option> 
						<option value="Trinidad and Tobago"							<?php echo ($row['pais']=="Trinidad and Tobago"							) ? 'selected="selected"': ''; ?>>Trinidad and Tobago</option> 
						<option value="Tunisia"										<?php echo ($row['pais']=="Tunisia"										) ? 'selected="selected"': ''; ?>>Tunisia</option> 
						<option value="Turkey"										<?php echo ($row['pais']=="Turkey"										) ? 'selected="selected"': ''; ?>>Turkey</option> 
						<option value="Turkmenistan"								<?php echo ($row['pais']=="Turkmenistan"								) ? 'selected="selected"': ''; ?>>Turkmenistan</option> 
						<option value="Turks and Caicos Islands"					<?php echo ($row['pais']=="Turks and Caicos Islands"					) ? 'selected="selected"': ''; ?>>Turks and Caicos Islands</option> 
						<option value="Tuvalu"										<?php echo ($row['pais']=="Tuvalu"										) ? 'selected="selected"': ''; ?>>Tuvalu</option> 
						<option value="Uganda"										<?php echo ($row['pais']=="Uganda"										) ? 'selected="selected"': ''; ?>>Uganda</option> 
						<option value="Ukraine"										<?php echo ($row['pais']=="Ukraine"										) ? 'selected="selected"': ''; ?>>Ukraine</option> 
						<option value="United Arab Emirates"						<?php echo ($row['pais']=="United Arab Emirates"						) ? 'selected="selected"': ''; ?>>United Arab Emirates</option> 
						<option value="United Kingdom"								<?php echo ($row['pais']=="United Kingdom"								) ? 'selected="selected"': ''; ?>>United Kingdom</option> 
						<option value="United States"								<?php echo ($row['pais']=="United States"								) ? 'selected="selected"': ''; ?>>United States</option> 
						<option value="United States Minor Outlying Islands"		<?php echo ($row['pais']=="United States Minor Outlying Islands"		) ? 'selected="selected"': ''; ?>>United States Minor Outlying Islands</option> 
						<option value="Uruguay"										<?php echo ($row['pais']=="Uruguay"										) ? 'selected="selected"': ''; ?>>Uruguay</option> 
						<option value="Uzbekistan"									<?php echo ($row['pais']=="Uzbekistan"									) ? 'selected="selected"': ''; ?>>Uzbekistan</option> 
						<option value="Vanuatu"										<?php echo ($row['pais']=="Vanuatu"										) ? 'selected="selected"': ''; ?>>Vanuatu</option> 
						<option value="Venezuela"									<?php echo ($row['pais']=="Venezuela"									) ? 'selected="selected"': ''; ?>>Venezuela</option> 
						<option value="Viet Nam"									<?php echo ($row['pais']=="Viet Nam"									) ? 'selected="selected"': ''; ?>>Viet Nam</option> 
						<option value="Virgin Islands, British"						<?php echo ($row['pais']=="Virgin Islands, British"						) ? 'selected="selected"': ''; ?>>Virgin Islands, British</option> 
						<option value="Virgin Islands, U.S."						<?php echo ($row['pais']=="Virgin Islands, U.S."						) ? 'selected="selected"': ''; ?>>Virgin Islands, U.S.</option> 
						<option value="Wallis and Futuna"							<?php echo ($row['pais']=="Wallis and Futuna"							) ? 'selected="selected"': ''; ?>>Wallis and Futuna</option> 
						<option value="Western Sahara"								<?php echo ($row['pais']=="Western Sahara"								) ? 'selected="selected"': ''; ?>>Western Sahara</option> 
						<option value="Yemen"										<?php echo ($row['pais']=="Yemen"										) ? 'selected="selected"': ''; ?>>Yemen</option> 
						<option value="Zambia"										<?php echo ($row['pais']=="Zambia"										) ? 'selected="selected"': ''; ?>>Zambia</option> 
						<option value="Zimbabwe"									<?php echo ($row['pais']=="Zimbabwe"									) ? 'selected="selected"': ''; ?>>Zimbabwe</option>
				</select>
		<p class = "p">State/Province</p>
		<input type="text" class ="input_account" id="state" name="state" value = "<?php echo $row['estado'];?>">
		</br>
		</br>
		
		<?php } 
		$cnn->close();
	}else
	{
		echo $cnn->error;
	}
			}?>
	</div> <!-- col-md-7 -->
	</div> <!-- row -->
	 <!-- BUTTON SAVE -->
	<div class ="col-sm-5">
	</div>
	<div class ="col-sm-7">
	<div class ="text-center">
	</br>
	<button type="submit" onclick="guardarDatos();" id="enviar" class="mybutton-medium" allign="center"> SAVE</button>
	</div>
	</div>
	</form>
	</div> <!-- container -->
					</div>








</body>

<script>
$(document).ready(function(){
	
});

function guardarDatos(){

	var id = $("#ID").val();
	var nombre = $("#first_name").val();
	var apellido = $("#last_name").val();
	var correo = $("#email").val();
	var calleUno = $("#street_adress").val();
	var calleDos = $("#street_adresstwo").val();
	var cp = $("#zip_code").val();
	var ciudad = $("#city").val();
	var pais = $("#pais option:selected").val();
	var estado = $("#state").val();


	var datos ={
		"opcion" : "editar",
		"id" : id,
		"nombre" : nombre,
		"apellido" : apellido,
		"correo" : correo,
		"calleUno" : calleUno,
		"calleDos" : calleDos,
		"codigoPostal": cp,
		"ciudad": ciudad,
		"pais": pais,
		"estado": estado
	}

	console.log(datos);

	var enviar = confirm("Desea actualizar los datos de su cuenta?");


if(enviar == true){
	$.ajax({
		url: 'editar.php',
		type: 'POST',
		data: datos,
		beforesend: function(){

		},
		success: function(e){
			console.log(e);
			alert("Actualización correcta!");
			location.href='profile.php?IDUser=' +id ;
		}
	});
}
else{
	console.log(enviar);
}


	
}


</script>
	
</html>