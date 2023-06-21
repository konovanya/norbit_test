<?
$_SERVER["DOCUMENT_ROOT"] = '/home/n/n92023en/n92023en.beget.tech/public_html';
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
define("NO_KEEP_STATISTIC", true);

Bitrix\Main\Loader::includeModule("sale"); 

$orderIds = getRemindOrders();
sendOrdersToAdmin($orderIds);



function getRemindOrders(){
	$statusNew = 'N';
	$statusCanceled = 'N';

	$orders = \Bitrix\Sale\Order::getList([
		'select' => ['ID'],
		'filter' => [ 
			"<=DATE_INSERT" => \Bitrix\Main\Type\DateTime::createFromTimestamp(strtotime("-2 days")),
			"STATUS_ID" => $statusNew,
			"CANCELED" => $statusCanceled,
			],
		'order' => ['ID' => 'DESC']
	]);

	$orderIds = [];
	while ($order = $orders->fetch()){
	    $orderIds[] = $order["ID"];
	}
	return $orderIds;
}


function sendOrdersToAdmin($orderIds){
	if(!empty($orderIds)){
		Bitrix\Main\Mail\Event::send(array(
		    "EVENT_NAME" => "REMIND_ORDERS",	//добавила почтовое событие
		    "LID" => \Bitrix\Main\Application::getInstance()->getContext()->getSite(),
		    "C_FIELDS" => array(
		        "EMAIL" => Bitrix\Main\Config\Option::get("main", "email_from"),
		        "ORDER_IDS" => implode($orderIds, "\n"), 	//поле в почтовом шаблоне
		    ), 
		));
	}
}

