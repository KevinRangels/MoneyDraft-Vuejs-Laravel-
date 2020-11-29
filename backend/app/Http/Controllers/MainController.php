<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use GuzzleHttp\Client;
use Screen\Capture;
use\App;

class MainController extends Controller
{
    public function getApi(){


    $client = new Client([
	    // Base URI is used with relative requests
	    'base_uri' => 'https://localbitcoins.com',
	    // You can set any number of default request options.
	    
	]);

	$response = $client->request('GET', '/buy-bitcoins-online/ve/venezuela/.json');
	$itemBuyVe = json_decode($response->getBody());
	$buysVe = $itemBuyVe->data->ad_list;
	$precioTotalBuyVe = 0;
	$numeroBuyVe = 0;

	$response2 = $client->request('GET', '/buy-bitcoins-online/co/colombia/.json');
	$itemBuyCo = json_decode($response2->getBody());
	$buysCo = $itemBuyCo->data->ad_list;
	$precioTotalBuyCo = 0;
	$numeroBuyCo = 0;

	$response2 = $client->request('GET', '/sell-bitcoins-online/ve/venezuela/.json');
	$itemSellVe = json_decode($response2->getBody());
	$sellsVe = $itemSellVe->data->ad_list;
	$precioTotalSellVe = 0;
	$numeroSellVe = 0;

	$response2 = $client->request('GET', '/sell-bitcoins-online/co/colombia/.json');
	$itemSellCo = json_decode($response2->getBody());
	$sellsCo = $itemSellCo->data->ad_list;
	$precioTotalSellCo = 0;
	$numeroSellCo = 0;
	



	// foreach ($i = 1; $i <= 30; $i++) {
	echo "Compras Colombia"."<br>";
	foreach ($buysCo as $buyCo) {

		// if($buyCo->data->min_amount >= "100000" and $buyCo->data->max_amount <= "200000" ){

		$nombre =$buyCo->data->profile->username;
		$precio =$buyCo->data->temp_price;
		// print "- NOMBRE :".$nombre." Cantidad: ".$precio. "<br>";
		$precioTotalBuyCo =  $precioTotalBuyCo + $precio;
		$numeroBuyCo = $numeroBuyCo + 1;
		// }
}
	$promedioBuyCo= $precioTotalBuyCo / $numeroBuyCo;

		echo "\n"."Cantidad Total: ".number_format($precioTotalBuyCo, 2, ",", ".")."<br>";
		echo "\n"."Cantidad Total entre el rango: ".$numeroBuyCo."<br>";
		echo "Promedio Compras en Colombia: ".number_format($promedioBuyCo, 2, ",", ".")."<br>"."<br>";


echo "Ventas Venezuela"."<br>";
	foreach ($sellsVe as $sellVe) {

		// if($sellVe->data->min_amount >= "1000000" and $sellVe->data->max_amount <= "10000000" ){

		$nombre =$sellVe->data->profile->username;
		$precio =$sellVe->data->temp_price;
		// print "- NOMBRE :".$nombre." Cantidad: ".$precio. "<br>";
		$precioTotalSellVe =  $precioTotalSellVe + $precio;
		$numeroSellVe = $numeroSellVe + 1;
		}
// }	
	$promedioSellVe= $precioTotalSellVe / $numeroSellVe;

		echo "\n"."Cantidad Total: ".number_format($precioTotalSellVe, 2, ",", ".")."<br>";
		echo "\n"."Cantidad Total entre el rango: ".$numeroSellVe."<br>";
		echo "Promedio Ventas en Venezuela: ".number_format($promedioSellVe, 2, ",", ".")."<br>"."<br>";

	$compraColombia = 100000;

	$cambio = ($compraColombia/$promedioBuyCo)*$promedioSellVe;
	$comision = ($cambio * 12)/100;
	$recepcion = $cambio-$comision;


	echo "Cambio Pesos a Bolivares: ".number_format($cambio, 2, ",", ".")."<br>";
	echo "Comision: ".number_format($comision, 2, ",", ".")."<br>";
	echo "Recepcion: ".number_format($recepcion, 2, ",", ".")."<br>";




	//SCRENNSHOT

	 // return response()->download($pathToFile);
 // return response()->download(url('/conversion')); 

	$siteUrl = "https://www.php.net/manual/en/function.imagegrabscreen.php";
	$googlePagespeedData = file_get_contents(("https://www.googleapis.com/pagespeedonline/v4/runPagespeed?url=$siteUrl&screenshot=true"));

	//decode to Json
	$googlePagespeedData = json_decode($googlePagespeedData, true);

	//screenshotsnapshots	
	$screenshot = $googlePagespeedData['screenshot']['data'];

	$screenshot = str_replace(array('_','-'),array('/','+'),$screenshot);
	


    }


}
