<?php
	echo "test";
    require_once 'include/DB_Functions.php';
    $db = new DB_Functions();
	$companyList = $db->getCompanyID();
	$tlist = array();
	for($k=0 ; $k<sizeof($companyList); $k++){
		$companyChoose = $db->getCompanyChoose($companyList[$k]);
		$userChooseByCompany = $db->getUserRankByCompany($companyList[$k]);
		
		$listOne = array();
		$listTwo = array();
		$listThree = array();
		for ($i = 0; $i < sizeof($userChooseByCompany["user"]); $i++){
			$key = array_search($userChooseByCompany["user"][$i],$companyChoose);
			if($key != false){
				$companyChoose[$key] = -1;
				array_push($listOne, (int)$userChooseByCompany["user"][$i]);
			} else {
				array_push($listThree,(int)$userChooseByCompany["user"][$i]);
			}
			
		}
		
		for($j = 0; $j < sizeof($companyChoose); $j++){
			//echo "count";
			if($companyChoose[$j] != -1){
				//echo $companyChoose[$j];
				array_push($listTwo, (int)$companyChoose[$j]);
			}
		}
		
		$tlist[$k] = $listOne+$listTwo+$listThree;
		$count = sizeof($tlist[$k]);
		$tlist[$k]["company"] = $companyList[$k];
		$tlist[$k]["count"] = $count;
		var_dump($tlist[$k]);
		echo "<p></p>";
	}
		

?>