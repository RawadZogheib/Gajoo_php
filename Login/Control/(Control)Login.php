<?php
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;
$option = array('cost'=>11);


$locError7 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error7.php';

if(!empty($data->email) && !empty($data->password)){

	$email = htmlspecialchars($data->email);
	$password = htmlspecialchars($data->password);

	$locConfig = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Model/(Model)config.inc.php';
	$locTokenCreate = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)tokenCreate.php';
	$locPasswordUpdate = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Registration/Model/(Model)passwordUpdate.inc.php';
	$locModelLogin = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Login/Model/(Model)login.inc.php';
	$locSuccess = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)success.php';
	$locGetGlobals = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Login/Control/(Control)getGlobals.php';
	$locError4 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error4.php';
	$locError8 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error8.php';
	$locSuccess = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)success.php';

	require $locConfig;
	$con=con($server);
	//require '(Control)encryptiGet.php';
    //require '(Model)passwordGet.inc.php';
	require $locModelLogin;
	$account_Id = $res["account_Id"];
	if($res["nbr"]==1){ //check if email exist
	
		/////////Verify Password(login)/////////

		if(password_verify($password, $res["hashedPassword"])){ //verify inserted password with thye increpted password
			if(password_needs_rehash($password, PASSWORD_BCRYPT, $option)){ //check if there is a new option
				$newHash = password_hash($password, PASSWORD_BCRYPT, $option); //rehash password
				require $locPasswordUpdate;

				if($yy){
					// set password success
					require $locTokenCreate; //return $token & $tokenHashed
					if($yy2){
							require $locGetGlobals;
							if($ress["isRegistered"] == "0"){
								require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Registration/Control/(Control)phpMailer.php';
							}
					}else{
						require $locError4; //4 Cannot connect to the dataBase.
					} 
					
					
				}else require $locError4; //4 Cannot connect to the dataBase.

			}else{ 
				require $locTokenCreate; //return $token & $tokenHashed
				if($yy2){
						require $locGetGlobals;
						if($ress["isRegistered"] == "0"){
							require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Registration/Control/(Control)phpMailer.php';
						}
				}else{
					require $locError4; //4 Cannot connect to the dataBase.
				}
			}

		}else require $locError8;
	}else require $locError8;

	mysqli_close($con);

	//var_dump($res["nbr"]);		
}else require $locError7;




// (Control)encryptGet.php
// <?php
// if(!empty($password)){
//     $option = array('cost'=>11);
//     //$password = $_GET["pass"];
//     //require '(Model)passwordGet.inc.php';
//     require '(Model)login.inc.php';
//     /////////Verify Password(login)/////////
//     if(password_verify($password, $res["hashedPassword"])){
//         $newHash = password_hash($password, PASSWORD_BCRYPT, $option);
//         require '(Model)passwordUpdate.inc.php';
//     if($yy){
//         // set password success
            
//         if($res["nbr"]==1){
            
//             require '(View)success.php';
        
//         }else require '(View)error8.php';

//     }else require '(View)Error4.php'; //4 Cannot connect to the dataBase.
//     }

// }


?>
