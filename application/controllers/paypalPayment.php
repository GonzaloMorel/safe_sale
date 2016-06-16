<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paypalPayment
 *
 * @author gmorel
 */
class PaypalPayment extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('string');

        
        
    }
    
    
    public function realizar_pago() {
        
        $config['business']             = 'gonmore.mm@gmail.com';
        $config['cpp_header_image']     = ''; //Image header url [750 pixels wide by 90 pixels high]
        $config['return']               = 'http://localhost/safe_sale/paypalPayment/modificar_pago';
        $config['cancel_return']        = 'http://localhost/safe_sale/paypalPayment/cancelar_pago';
        $config['notify_url']           = 'process_payment.php'; //IPN Post
        $config['production']           = FALSE; //Its false by default and will use sandbox
//        $config['discount_rate_cart']   = 20; //This means 20% discount
        $config["invoice"]              = $this->session->userdata('id');//random_string("numeric", 8); //The invoice id
        $config["first_name"] 		= $this->session->userdata('nombres');
        $config["last_name"] 		= $this->session->userdata('apPat')." ".$this->session->userdata('apMat');
        $config["address1"] 		= '';
        $config["address2"] 		= '';
        $config["city"] 		= '';
        $config["state"] 		= '';
        $config["zip"] 			= '';
        $config["email"] 		= '';
        $config["night_phone_a"] 	= '';
        $config["night_phone_b"] 	= '';
        $config["night_phone_c"] 	= '';
        
        $this->load->library("paypal_pago", $config);
        #$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);
        foreach ($this->cart->contents() as $item):
            $nombre = $item['name'];
            $cantidad = $item['qty'];
            $precio = $item['price'];
            $id = $item['id'];
//        echo "name:".$item['name']."; precio: ".$item['price']."; cantidad: ".$item['qty']."; Id: ".$item['id'];
            $this->paypal_pago->add("$nombre","$precio","$cantidad","$id");
            
        endforeach;
//        $this->pagopal->add('T-shirt',2.99,6); //First item
//        $this->pagopal->add('Pants',40); 	  //Second item
//        $this->pagopal->add('Blowse',10,10,'B-199-26'); //Third item with code

        $this->paypal_pago->pay(); //Proccess the payment
    }
    
    
    /**
     *Este es el arreglo que trae devuelta
     *[mc_gross] => 265.00                          //subtotal pago
     *[invoice] => 10392896                         //codigo invoice
     *[protection_eligibility] => Ineligible
     *[address_status] => confirmed                 //confirmacion de direccion
    [item_number1] => 1                             //id de producto
    [item_number2] => 17
    [payer_id] => U77LASAX7YQ56                     //id del pagador
    [tax] => 0.00                                   //impuesto
    [address_street] => 1 Main St                   //direccion de envio
    [payment_date] => 09:34:02 Nov 25, 2015 PST     //fecha de pago
    [payment_status] => Pending                     //
    [charset] => windows-1252
    [address_zip] => 95131
    [mc_shipping] => 0.00
    [mc_handling] => 0.00
    [first_name] => test
    [address_country_code] => US
    [address_name] => test buyer
    [notify_version] => 3.8
    [custom] => 
    [payer_status] => verified                      //status de pago
    [business] => gonmore.mm@gmail.com
    [address_country] => United States
    [num_cart_items] => 2                           //cantidad de elementos del carrito
    [mc_handling1] => 0.00                          //pago de manejo de articulo
    [mc_handling2] => 0.00
    [address_city] => San Jose                      //direccion de envio
    [payer_email] => gonmore.mm-buyer@gmail.com     //correo pagador
    [verify_sign] => AFcWxV21C7fd0v3bYYYRCpSSRl31A1YYQYYYP1c2doEEiRCwqtsCBoOp
    [mc_shipping1] => 0.00
    [mc_shipping2] => 0.00
    [tax1] => 0.00                                  //impuesto articulo
    [tax2] => 0.00                                  //impuesto articulo
    [txn_id] => 8VW62603W60954153                   //id de transaccion
    [payment_type] => instant                       //tipo de pago
    [last_name] => buyer                            
    [item_name1] => producto 1                      //nombre de producto
    [address_state] => CA                           // region despacho
    [receiver_email] => gonmore.mm@gmail.com        
    [item_name2] => producto 17
    [quantity1] => 10                               //cantidad de producto
    [pending_reason] => unilateral
    [quantity2] => 3
    [txn_type] => cart                              //tipo de transaccion
    [mc_currency] => USD                            //moneda de pago
    [mc_gross_1] => 100.00                          //subtotal primer articulo
    [mc_gross_2] => 165.00                          //subtotal segundo articulo
    [residence_country] => US                       //pais despacho
    [test_ipn] => 1
    [transaction_subject] => 
    [payment_gross] => 265.00                       //pago total
    [auth] => A4paAxVYU3UQynBd4DawAg7UJppBQYl1ODQSaUFPc3AJFnR24px6SGMHUwXuZETm4D-dQ2b7Z-XyLudrvJvM4Gg
     */
    public function modificar_pago(){
        $this->load->model('stock_model');
        echo "<p>usuario:".$this->input->post('invoice')."</p>";
        echo "<p>Total:".$this->input->post('payment_gross')."</p>";
        echo "<p>Codigo Autorizacion:".$this->input->post('auth')."</p>";
        echo "<p>id comprador paypal:".$this->input->post('payer_id')."</p>";
        echo "<p>status de pago:".$this->input->post('payer_status')."</p>";
        echo "<p>transaccion id:".$this->input->post('txn_id')."</p>";
        echo "<p>tipo de pago:".$this->input->post('txn_type')."</p>";
        echo "<p>tipo de pago:".$this->input->post('payment_type')."</p>";
        
        echo "<hr>";
        for($i = 1; $i<= $this->input->post('num_cart_items'); $i++):
                       
            echo "<p>id de producto:".$this->input->post('item_number'.$i)."</p>";
            echo "<p>nombre producto:".$this->input->post('item_name'.$i)."</p>";
            echo "<p>cantidad producto:".$this->input->post('quantity'.$i)."</p>";
            echo "<p>subtotal:".$this->input->post('mc_gross_'.$i)."</p>";
            echo "<p>manejo:".$this->input->post('mc_handling'.$i)."</p>";
            echo "<p>impuesto:".$this->input->post('tax'.$i)."</p>";
            echo "<p>Envio:".$this->input->post('mc_shipping'.$i)."</p>";
            
            echo "<hr>";
            $id = $this->input->post('item_number'.$i);
            $cantidad = $this->input->post('quantity'.$i);
            $stock_prod = $this->stock_model->get_stock_id($id);
//            print_r($stock_prod);
//            echo "cantidad: ".$cantidad."stock_prod: ".$stock_prod[0]->stock_cantidad;
            if(intval($stock_prod[0]->stock_cantidad) > intval($cantidad)){
                $this->stock_model->desc_stock($id, $cantidad);
                $this->cart->destroy();
                redirect('carrito');
            }else{
                redirect('producto/mostrar_carrito');
            }
            
            
        endfor;
        
        
        
        
        $recepcion_data = print_r($this->input->post(), TRUE);
        
        echo "<pre>$recepcion_data</pre>";
    }
    
    public function cancelar_pago(){
        redirect('producto/mostrar_carrito');
    }
}
