<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use GuzzleHttp\Client;
use\App;
use DB;
use App\Http\Resources\Testimonio as TestimonioResource;
use App\Testimonio;
use App\Http\Resources\TestimonioCollection;

class TasaController extends Controller
{
    public function getApi(){
    	DB::table('tasa_compra_cos')->delete();
    	DB::table('tasa_venta_ves')->delete();

	    $client = new Client([
		    'base_uri' => 'https://localbitcoins.com',
		]);

		$response = $client->request('GET', '/buy-bitcoins-online/co/colombia/.json');
		$itemBuyCo = json_decode($response->getBody());
		$buysCo = $itemBuyCo->data->ad_list;
		foreach ($buysCo as $buyCo) {
		  if($buyCo->data->temp_price >= "0" and $buyCo->data->temp_price <= "100000000" ){
			$precioCo =$buyCo->data->temp_price;
			 App\TasaCompraCo::create(array(
	          'compraCo' => $precioCo,
	        ));
			echo "\n".$precioCo."\n";
	       }
		}


	    $response2 = $client->request('GET', '/sell-bitcoins-online/ve/venezuela/.json');
		$itemSellVe = json_decode($response2->getBody());
		$sellsVe = $itemSellVe->data->ad_list;
		foreach ($sellsVe as $sellVe) {
		 		if($sellVe->data->temp_price >= "0" and $sellVe->data->temp_price <= "1000000000" ){

			$precioVe =$sellVe->data->temp_price;
			 App\TasaVentaVe::create(array(
	          'ventaVe' => $precioVe,
	        ));
			echo "\n".$precioVe."\n";
	    }
	}
	}


    public function getAllPrices(){
	    $client = new Client([
		    'base_uri' => 'https://localbitcoins.com',
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
		

		foreach ($buysCo as $buyCo) {
  		  if($buyCo->data->temp_price >= "0" and $buyCo->data->temp_price <= "100000000" ){

			$nombre =$buyCo->data->profile->username;
			$precio =$buyCo->data->temp_price;
			$precioTotalBuyCo =  $precioTotalBuyCo + $precio;
			$numeroBuyCo = $numeroBuyCo + 1;
		  }
		}
		$promedioBuyCo= $precioTotalBuyCo / $numeroBuyCo;

		foreach ($sellsVe as $sellVe) {
		  if($sellVe->data->temp_price >= "0" ){

			$nombre =$sellVe->data->profile->username;
			$precio =$sellVe->data->temp_price;
			$precioTotalSellVe =  $precioTotalSellVe + $precio;
			$numeroSellVe = $numeroSellVe + 1;
		  }
	    }
		$promedioSellVe= $precioTotalSellVe / $numeroSellVe;

		$compraColombia = 100000;

		$cambio = ($compraColombia/$promedioBuyCo)*$promedioSellVe;
		$comision = ($cambio * 12)/100;
		$recepcion = $cambio-$comision;
		$cantidadCambio = $compraColombia/$recepcion;

		$cambio = round($cambio, 3);
		$comision = number_format($comision, 3, ",", ".");
		$recepcion = number_format($recepcion, 3, ",", ".");

		$cantidadCambio = number_format($cantidadCambio, 3, ",", ".");



	    $tasaVentaVe = App\TasaVentaVe::all();
	    $tasaCompraCo = App\TasaCompraCo::all();
	    return ['ventasVe'=>$tasaVentaVe, 'comprasCo'=>$tasaCompraCo, 'cambio'=>$cambio, 'comision'=>$comision, 'recepcion'=>$recepcion , 'cantidadCambio'=>$cantidadCambio];
	    }

	    public function getTasa(){
	    	$tasa = App\tasa::all();
	    	return response()->json($tasa->all());
	    }

	    public function getTasaLocalBitcoin(){
	    	$tasa = App\Beneficio::all();
	    	return response()->json($tasa->all());
	    }
	    public function getTestimonials(){
	    	// return  new TestimonioResource($testimonio);
	    	return new TestimonioCollection(Testimonio::all());
	    }
}
   		
