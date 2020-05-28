<?php
	header("access-control-allow-origin: https://pagseguro.uol.com.br");
	require_once("PagSeguro.class.php");

	if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){
		$PagSeguro = new PagSeguro();
		$response = $PagSeguro->executeNotification($_POST);
		if( $response->status==3 || $response->status==4 ){
        	//PAGAMENTO CONFIRMADO
			//ATUALIZAR O STATUS NO BANCO DE DADOS
			include_once './../script/conecta.php';
			$conn = new conecta();
			
			$rs_pedido = $conn->consultarPedido($reference);
			
			if ($rs_pedido){
				$conn->atualizaPedido($reference, $status);
			}
			
		}else{
			//PAGAMENTO PENDENTE
			echo $PagSeguro->getStatusText($PagSeguro->status);
		}
	}
?>