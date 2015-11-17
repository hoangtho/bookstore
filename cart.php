<?php
	@session_start();
	
	if(isset($_SESSION['login'])){
	
	if(isset($_GET['themgiohang'])){
	
		$id = $_GET['themgiohang'];
		
		if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])){
		//neu da co gio hang roi thi lam gi, va luu session gio hang vao mot cai mang
			$count = count($_SESSION['giohang']);
			$flag = false;
			for($i=0; $i < $count; $i++){
				if($_SESSION['giohang'][$i]["id"] == $id){
				//session thu i co id = id;
				$_SESSION['giohang'][0]["soluong"] +=1;
				
				$flag = true; //neu co gio hang trung
				break;
				}
			}
			if($flag == false){
				//tao gio hang
				$_SESSION['giohang'][$count]["id"] = $id; //chen gio hang vao cuoi
				$_SESSION['giohang'][$count]["soluong"] = 1;
			}
		}else{ 
		//neu khong thi lam gi
		// tao moi session gio hang nay
		$_SESSION['giohang'] = array();
		
		//them du lieu
		// day la gio hang dau tien
		$_SESSION['giohang'][0]["id"] = $id;
		
		$_SESSION['giohang'][0]["soluong"] = 1;
		}
			
		header('Location:index.php');
	}
	}else{
		header('Location:login.php');
	}
?>