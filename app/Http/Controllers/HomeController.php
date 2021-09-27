<?php

namespace App\Http\Controllers;

use App\MetaData;
use App\MetaDataValue;
use App\tb_order;
use App\tb_product_order;
use Auth;
use Illuminate\Http\Request;


class HomeController extends Controller
{

  public function getorder()
    {
           $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://demo.kreatiwo.com/wp-json/wc/v3/orders', [
            'auth' => ['ck_2a063fe8d3b0a06c4e9cb1ebeec5390839208298', 'cs_97dd844a85355f56dd19a98baf60ca3d8b7b92d7']
        ]);
 dd($array);
        $array = json_decode($res->getBody()->getContents(), true);
            foreach ($array as $orderData) {
            $order = new tb_order;
            $order->order_id = '4223';
            $order->save();}
    }
    public function apitest()
    {

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://demo.kreatiwo.com/wp-json/wc/v3/orders', [
            'auth' => ['ck_2a063fe8d3b0a06c4e9cb1ebeec5390839208298', 'cs_97dd844a85355f56dd19a98baf60ca3d8b7b92d7']
        ]);

        $array = json_decode($res->getBody()->getContents(), true);
      //  dd($array);

        foreach ($array as $orderData) {
            $order = new tb_order;
            $order->order_id = $orderData['id'];
            $order->status = $orderData['status'];
            $order->total = $orderData['total'];
            $order->save();

            //meta_data
            foreach ($orderData['meta_data'] as $meta) {
                $metaData = new MetaData;
                $metaData->tb_order_id = $order->id;
                $metaData->order_id = $orderData['id'];
                $metaData->meta_id = $meta['id'];
                $metaData->meta_key = $meta['key'];
                $metaData->save();

                $metaDataValue = new MetaDataValue;
                $metaDataValue->tb_meta_id = $metaData->id;
                $metaDataValue->meta_value_key = $meta['key'];

                if(is_array($meta['value'])){
                     $metaDataValue->meta_value_value = json_encode($meta['value']);
                     $metaDataValue->save();
                }else if (is_string($meta['value'])) {
                    $metaDataValue->meta_value_value = $meta['value'];
                    $metaDataValue->save();
                } else {
                    foreach ($meta['value'] as $key => $value) {
                        $metaDataValue->meta_value_key = $key;
                        if (is_string($value)) {
                            $metaDataValue->meta_value_value = $value;
                        } else {
                            $metaDataValue->meta_value_value = json_encode($value);
                        }
                        $metaDataValue->save();
                    }
                }
            }

            foreach ($orderData['line_items'] as $orderItem) {
                 $productOrder = new tb_product_order;
                 $productOrder->order_id =   $orderData['id'];
                 $productOrder->product_id= $orderItem['id'];
                 $productOrder->product_name= $orderItem['name'];
                 $productOrder->quantity= $orderItem['quantity'];
                 $productOrder->variation_id= $orderItem['variation_id'];
                 $productOrder->sub_total= $orderItem['subtotal'];
                 $productOrder->total= $orderItem['total'];
                 $productOrder->price= $orderItem['price'];
                 $productOrder->sku= $orderItem['sku'];

                 $productOrder->product_parant= $orderItem['parent_name'];
                 $productOrder->save();

            }




        }
    }
    
    public function webhook(Request $request)
    {
        
          $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://demo.kreatiwo.com/wp-json/wc/v3/webhooks', [
            'auth' => ['ck_2a063fe8d3b0a06c4e9cb1ebeec5390839208298', 'cs_97dd844a85355f56dd19a98baf60ca3d8b7b92d7']
        ]);

            $array = json_decode($res->getBody()->getContents(), true);
              dd($array);
    
         
    //       $payload = @file_get_contents('php://input');
    // $payload = json_decode( $payload, true);
    // \Log::info(json_encode( $payload));
    // return response()->json([ 'data' => $payload, 'status' => \Symfony\Component\HttpFoundation\Response::HTTP_OK]);
    }


    public function test(){

        return view('test');
    }
}


