<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Order_product;
use Illuminate\Http\Response;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all()->load('vendor');
        return response()->json(
            [
                'code' => 200,
                'status' => 'success',
                'orders' => $orders
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $json = $request->input('json',null);
        $params = json_decode($json);
        $params_array = json_decode($json,true);
        if(!empty($params_array)){

            $validate = \Validator::make($params_array,[
                'folio' => 'required',
                'date' => 'required',
                'comments' => 'required',
                'total' => 'required'
            ]);
            if($validate->fails()){
                $data = [
                    'code' => 400,
                    'status' => 'error',
                    'massage' => 'No se ha guardado la orden, faltan datos'
                ];
            }else{

                $order = new Order();
                $order->folio = $params->folio;
                $order->date = $params->date;
                $order->vendor_id = $params->vendor_id;
                $order->comments = $params->comments;
                $order->total = $params->total;
                $order->save();

                foreach($params->products as $product){
                    $newProduct = new Order_product();
                    $newProduct->order_id = $order->id;
                    $newProduct->product_id = $product->product_id;
                    $newProduct->quantity = $product->quantity;
                    $newProduct->cost = $product->cost;
                    $newProduct->save();
                }
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'order' => $order,
                ];
            }
            
        }else{
            $data = [
                'code' => 400,
                'status' => 'error',
                'message' => 'Envia los datos correctamente'
            ];
        }
        
        return response()->json($data,$data['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        if(is_object($order)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'order' => $order->load('vendor')->load('orders.product')
            ];
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'massage' => 'El dato no existe'
            ];
        }
        return response()->json($data,$data['code']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $json = $request->input('json',null);
        $params = json_decode($json);
        $params_array = json_decode($json,true);

        $data = array(
            'code' => 400,
            'status' => 'error',
            'message' => 'Datos enviados incorrectamente'
        );

        if(!empty($params_array)){
            $validate = \Validator::make($params_array,[
                'folio' => 'required',
                'date' => 'required',
                'comments' => 'required',
                'total' => 'required'
            ]);

            if($validate->fails()){
                $data['errors'] = $validate->errors();
                return response()->json($data,$data['code']);
            }

            unset($params_array['id']);
            unset($params_array['vendor_id']);
            
            $order = Order::findOrFail($id);
            $order->folio = $params->folio;
            $order->date = $params->date;
            $order->vendor_id = $params->vendor_id;
            $order->comments = $params->comments;
            $order->total = $params->total;
            $order->update();

            $products = Order_product::where('order_id', $id)->delete();

            foreach($params->products as $product){
                $newProduct = new Order_product();
                $newProduct->order_id = $order->id;
                $newProduct->product_id = $product->product_id;
                $newProduct->quantity = $product->quantity;
                $newProduct->cost = $product->cost;
                $newProduct->save();
            }

            if($order){
                $data = array(
                    'code' => 200,
                    'status' => 'success',
                );
            }else{
                $data = array(
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'El post no existe'
                );
            }
            
        }

        return response()->json($data,$data['code']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::where('id',$id)->first();
                
        if(!empty($order)){
            $products = Order_product::where('order_id', $id)->delete();
            $order->delete();
            $data = array(
                'code' => 200,
                'status' => 'success'
            );
        }else{
            $data = array(
                'code' => 404,
                'status' => 'error',
                'message' => 'El registro no existe'
            );
        }

        //Devolver respuesta
        return response()->json($data,$data['code']);
    }
}
