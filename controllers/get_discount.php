<?php
	include '../config.php';
	
	
	
	$coupon_code = $_POST['coupon'];
	$price = $_POST['price'];
	
	$db = config::getConnexion();
	
	$sql = "SELECT * FROM `coupon` WHERE `coupon_code` = '$coupon_code' && `status` = 'Valid'";
	$query = $db->prepare($sql);
	$query->execute();
	$check= $query->fetch();
	$count = $query->rowCount();
	$array = array();
	if($count > 0){
		$discount = $check['discount'] / 100;
		$total = $discount * $price;
		$array['discount'] = $check['discount'];
		$array['price'] = $price - $total;
		
		echo json_encode($array);
	
		
		
		
	}else{
		echo "error";
	}

	function updateCoupon($id)
    {

		
        try {
			$db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE coupon SET 
                    status = "Not valid"            
                WHERE coupon_id = :coupon_id'
            );
            $query->execute([
                'coupon_id' => $id 
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

?>