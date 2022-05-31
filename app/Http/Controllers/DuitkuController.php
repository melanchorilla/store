<?php

namespace App\Http\Controllers;
error_reporting(0);
use Session;
Use PDF;
use App\Mail\mailregister;
use App\Mail\reset;
use App\Register;
use App\Time;
use App\ProfileToko;
use App\Aboutus;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DuitkuController extends Controller
{
  public function index(Request $request)
  {
    dd($request->all());
  }

  public function apirequest(Request $request)
  {
    //dd($request->all());
    $merchantCode = 'D8914'; // from duitku sandbox
    $merchantKey = '72d6f06ea37e4fe56a05910c4d0e548b'; // from duitku sandbox
    //$merchantCode = 'D1869'; // from duitku
    //$merchantKey = '0f42e8c033267f8f64ac51bd5980bb45'; // from duitku
    $paymentAmount = $request->amount;
    $paymentMethod = $request->paymentmethod;  // WW = duitku wallet, VC = Credit Card, MY = Mandiri Clickpay, BK = BCA KlikPay
    $merchantOrderId = $request->merchantorderid;   // from merchant, unique
    $productDetails = 'Sahabat Mebel';
    $email = $request->email; // your customer email
    $phoneNumber = $request->phonenumber; // your customer phone number (optional)
    $additionalParam = ''; // optional
    $merchantUserInfo = ''; // optional
    $customerVaName = ''; // display name on bank confirmation display
    $callbackUrl = 'https://store15.websitetangguh.com/callback'; // url for callback
    $returnUrl = 'https://store15.websitetangguh.com/paymentconfirm'; // url for redirect
    $expiryPeriod = '1440'; // set the expired time in minutes

    $signature = md5($merchantCode . $merchantOrderId . $paymentAmount . $merchantKey);

    $item1 = array(
      'name' => 'Test Item 1',
      'price' => 10000,
      'quantity' => 1);

      $item2 = array(
        'name' => 'Test Item 2',
        'price' => 30000,
        'quantity' => 3);

        $itemDetails = array(
          $item1, $item2
        );

        $params = array(
          'merchantCode' => $merchantCode,
          'paymentAmount' => $paymentAmount,
          'paymentMethod' => $paymentMethod,
          'merchantOrderId' => $merchantOrderId,
          'productDetails' => $productDetails,
          'additionalParam' => $additionalParam,
          'merchantUserInfo' => $merchantUserInfo,
          'customerVaName' => $customerVaName,
          'email' => $email,
          'phoneNumber' => $phoneNumber,
          //'itemDetails' => $itemDetails,
          'callbackUrl' => $callbackUrl,
          'returnUrl' => $returnUrl,
          'signature' => $signature,
          'expiryPeriod' => $expiryPeriod
        );

        $params_string = json_encode($params);
        $url = 'https://sandbox.duitku.com/webapi/api/merchant/v2/inquiry'; // Sandbox
        //$url = 'https://passport.duitku.com/webapi/api/merchant/v2/inquiry'; // Production
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
          'Content-Length: ' . strlen($params_string))
        );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        //execute post
        $request = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($httpCode == 200)
        {
          $result = json_decode($request, true);
          header('location: '. $result['paymentUrl']);
          echo "paymentUrl :". $result['paymentUrl'] . "<br />";
          echo "merchantCode :". $result['merchantCode'] . "<br />";
          echo "reference :". $result['reference'] . "<br />";
          echo "vaNumber :". $result['vaNumber'] . "<br />";
          echo "amount :". $result['amount'] . "<br />";
          echo "statusCode :". $result['statusCode'] . "<br />";
          echo "statusMessage :". $result['statusMessage'] . "<br />";
        }
        else
        echo $httpCode;
      }

      public function response(Request $request){
        dd($request->all());
      }

      public function store(Request $request){
        //dd($request->all());
        date_default_timezone_set ( 'Asia/Jakarta' );

        $transidmerchant = $request->transidmerchant;
        $totalamount = $request->totalamount;
        $trxstatus = $request->trxstatus;
        $channel = $request->channel;

        $random = mt_rand(10000000,99999999);
        $no_invoice = 'INV'.$random;

        DB::table('duitku')->insert([
          "merchantorderid"=>$transidmerchant,
          "amount"=>$totalamount,
          "trxstatus"=>$trxstatus,
          "paymentmethod"=>$channel,
          "no_invoice"=>$no_invoice
        ]);

        $no_pemesanan = Session::get('no_pemesanan');
        $namapen = $request->namapen;
        $emailpen = $request->emailpen;
        $teleponpen = $request->teleponpen;
        $alamatalternatif = $request->alamatalternatif;
        $data_propinsi = $request->data_propinsi;
        $data_kota = $request->data_kota;
        $jenis_kurir = $request->jenis_kurir;
        $grand_total = $request->grand_total;
        $grand_total2 = $request->grand_total2;
        $total = $request->grand_total2;
        $banktujuan = $request->banktujuan;

        $pisahkurir = explode("-" , $jenis_kurir);
        $kurir = $pisahkurir[0];
        $paket = $pisahkurir[1];
        $biaya = $pisahkurir[2];
        //pemesanan

        DB::table('pemesanan')->where('no_pemesanan', $no_pemesanan)->update([
          'provider_ongkir' => $kurir,
          'service_ongkir' => $paket,
          'cost_ongkir' => $biaya,
          'grandtotal' => $total,
          'notifikasi' => 1
        ]);

        //pemesanan

        //invoice
        $tanggal_sekarang = date("Y-m-d");
        $lama_hari        = mktime(0,0,0,date("n"),date("j")+1,date("Y"));
        $jatuh_tempo      = date("Y-m-d", $lama_hari);

        DB::table('invoice')->insert([
          "no_invoice"=>$no_invoice,
          "tanggal"=>date("Y-m-d H:i:s"),
          "jatuh_tempo"=>$jatuh_tempo,
          "metode_pembayaran"=>2,
          "transidmerchant"=>$transidmerchant,
          "channel"=>$channel,
          "biaya_tambahan"=>0,
          "status"=>1,
          "no_pemesanan"=>$no_pemesanan
        ]);

        //invoice

        //$no_statuspembayaran = 'SPB'.$digit_akhir;
        $random = mt_rand(10000000,99999999);
        $no_statuspembayaran = 'SPB'.$random;

        DB::table('statuspembayaran')->insert([
          "no_statuspembayaran"=>$no_statuspembayaran,
          // "bank"=>$bank,
          // "rekening"=>$rekening,
          // "nama"=>$nama,
          "bank_tujuan"=>$banktujuan,
          "status_pembayaran"=>2,
          "no_invoice"=>$no_invoice
        ]);
        //status pembayaran

        // $no_statustransaksi = 'STR'.$digit_akhir;

        $random = mt_rand(10000000,99999999);
        $no_statustransaksi = 'STR'.$random;

        DB::table('statustransaksi')->insert([
          "no_statustransaksi"=>$no_statustransaksi,
          "respon_pesanan"=>1,
          "status_pengiriman"=>0,
          "no_resi"=>"",
          "status_ekspedisi"=>'DELIVERED',
          "konfirmasi_penerimaan"=>0,
          "no_statuspembayaran"=>$no_statuspembayaran
        ]);
        //status transaksi

        if($alamatalternatif){
          $alamat_alternatif = $alamat_alternatif;
        }else{
          $alamat_alternatif = '';
        }

        //pengiriman
        DB::table('pengiriman')->insert([
          "nama"=>$namapen,
          "email"=>$emailpen,
          "propinsi"=>$data_propinsi,
          "kota"=>$data_kota,
          "telepon"=>$teleponpen,
          "alamat"=>'',
          "alamat_alternatif"=>$alamat_alternatif,
          "no_statustransaksi"=>$no_statustransaksi
        ]);
        //pengiriman

        //PDF

        //data tb_profiltoko
        $profiltoko = DB::table('profiltoko')->where('id_profiltoko', '1')->first();
        //data tb_profiltoko

        //alamat
        $alamatmember = DB::table('alamat')->where('id_alamat', $alamatalternatif)->first();
        //alamat

        //logo
        $logo = DB::table('logo')->where('id_logo', '1')->first();
        //logo

        // $pdf = PDF::loadView('export.userpdf', [
        //   'profiltoko' => $profiltoko,
        //   'alamatmember' => $alamatmember,
        //   'logo' => $logo,
        //   'no_invoice' => $no_invoice,
        //   'pembayaran' => 'Manual',
        //   'status' => 'Belum dibayar',
        //   'namapen' => $namapen,
        //   'emailpen' => $emailpen,
        //   'teleponpen' => $teleponpen,
        //   'jatuh_tempo' => $jatuh_tempo,
        //   'no_pemesanan' => $no_pemesanan,
        //   'kurir' => $kurir,
        //   'paket' => $paket,
        //   'biaya' => $biaya,
        //   'total' => $total,
        // ]);
        //return $pdf->download('marketplace.pdf');
        // Storage::put('invoice.pdf', $pdf->output());
        // return $pdf->download('invoice.pdf');
        // $path = public_path('invoice/');
        // $pdf->save($path.'/'.$no_invoice.'.pdf');
        //pdf

        // \Mail::to($emailpen)->send(new notifikasi($no_invoice));

        Session::forget('no_pemesanan');

        echo $no_invoice;


      }

      public function callback(){
        //echo "Result : 00<br />";
        $apiKey = '72d6f06ea37e4fe56a05910c4d0e548b'; // Your api key sandbox
        //$apiKey = '0f42e8c033267f8f64ac51bd5980bb45'; // Your api key production
        $merchantCode = isset($_POST['merchantCode']) ? $_POST['merchantCode'] : null;
        $amount = isset($_POST['amount']) ? $_POST['amount'] : null;
        $merchantOrderId = isset($_POST['merchantOrderId']) ? $_POST['merchantOrderId'] : null;
        $productDetail = isset($_POST['productDetail']) ? $_POST['productDetail'] : null;
        $additionalParam = isset($_POST['additionalParam']) ? $_POST['additionalParam'] : null;
        $paymentMethod = isset($_POST['paymentCode']) ? $_POST['paymentCode'] : null;
        $resultCode = isset($_POST['resultCode']) ? $_POST['resultCode'] : null;
        $merchantUserId = isset($_POST['merchantUserId']) ? $_POST['merchantUserId'] : null;
        $reference = isset($_POST['reference']) ? $_POST['reference'] : null;
        $signature = isset($_POST['signature']) ? $_POST['signature'] : null;

        if(!empty($merchantCode) && !empty($amount) && !empty($merchantOrderId) && !empty($signature))
        {
          $params = $merchantCode . $amount . $merchantOrderId . $apiKey;
          $calcSignature = md5($params);

          if($signature == $calcSignature)
          {
            //Your code here

            if($resultCode == "00")
            {
              DB::table('duitku')->where('merchantorderid', $merchantOrderId)->update([
                "merchantcode"=>$merchantCode,
                "amount"=>$amount,
                "trxstatus"=>"Success",
                "merchantorderid"=>$merchantOrderId,
                "productdetail"=>$productDetail,
                "additionalparam"=>$additionalParam,
                "paymentmethod"=>$paymentMethod,
                "resultcode"=>$resultCode,
                "merchantuserid"=>$merchantUserId,
                "reference"=>$reference,
                "signature"=>$signature
              ]);

              echo "SUCCESS"; // Save to database
            }
            else
            {
              DB::table('duitku')->where('merchantorderid', $merchantOrderId)->update([
                "merchantcode"=>$merchantCode,
                "amount"=>$amount,
                "trxstatus"=>"Failed",
                "merchantorderid"=>$merchantOrderId,
                "productdetail"=>$productDetail,
                "additionalparam"=>$additionalParam,
                "paymentmethod"=>$paymentMethod,
                "resultcode"=>$resultCode,
                "merchantuserid"=>$merchantUserId,
                "reference"=>$reference,
                "signature"=>$signature
              ]);

              echo "FAILED"; // Please update the status to FAILED in database
            }
          }
          else
          {
            throw new Exception('Bad Signature');
          }
        }
        else
        {
          throw new Exception('Bad Parameter');
        }
      }

      public function paymentconfirm(){
        // echo "merchantOrderId :". $_GET['merchantOrderId'] . "<br />";
        // echo "resultCode :". $_GET['resultCode'] . "<br />";

        $merchantOrderId = isset($_GET['merchantOrderId']) ? $_GET['merchantOrderId'] : null;
        $resultCode = isset($_GET['resultCode']) ? $_GET['resultCode'] : null;
        $reference = isset($_GET['reference']) ? $_GET['reference'] : null;

        $detail_payment = DB::table('duitku')->where('merchantorderid', $merchantOrderId)->first();
        $total = $detail_payment->amount;

        //Cek transaksi ======================================================================================================

        $merchantCode = 'D8914'; // from duitku sandbox
        $merchantKey = '72d6f06ea37e4fe56a05910c4d0e548b'; // from duitku sandbox
        // $merchantCode = 'D1869'; // from duitku production
        // $merchantKey = '0f42e8c033267f8f64ac51bd5980bb45'; // from duitku production
        $merchantOrderId = $merchantOrderId; // from merchant, unique

        $signature = md5($merchantCode . $merchantOrderId . $merchantKey);

        $params = array(
          'merchantCode' => $merchantCode,
          'merchantOrderId' => $merchantOrderId,
          'signature' => $signature
        );

        $params_string = json_encode($params);
        $url = 'https://sandbox.duitku.com/webapi/api/merchant/transactionStatus'; // Sandbox
        //$url = 'https://passport.duitku.com/webapi/api/merchant/transactionStatus'; // Production
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
          'Content-Length: ' . strlen($params_string))
        );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        //execute post
        $request = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);


        if($httpCode == 200)
        {
          $result = json_decode($request, true);

          $cektrans = json_decode($request);

          $merchantOrderId = $cektrans->{'merchantOrderId'};
          $reference = $cektrans->{'reference'};
          $amount = $cektrans->{'amount'};
          $statusCode = $cektrans->{'statusCode'};
          $statusMessage = $cektrans->{'statusMessage'};

          $data['orderid'] = $merchantOrderId;

          //update database
          DB::table('duitku')->where('merchantorderid', $merchantOrderId)->update([
            "merchantcode"=>$merchantCode,
            "amount"=>$amount,
            "trxstatus"=>$statusMessage,
            "merchantorderid"=>$merchantOrderId,
            "resultcode"=>$statusCode,
            "reference"=>$reference
          ]);
          //update database

          //invoice
          $detailinvoice = DB::table('invoice')->where('transidmerchant', $merchantOrderId)->first();
          $no_pemesanan = $detailinvoice->no_pemesanan;
          $no_invoice = $detailinvoice->no_invoice;
          //invoice

          //update invoice
          DB::table('invoice')->where('no_invoice', $no_invoice)->update([
            "status"=>1
          ]);
          //update invoice

          //update stok

          $no_pemesanan = Session::get('no_pemesanan');
          $getpemesanan = DB::table('pemesanan')->where('no_pemesanan', $no_pemesanan)->first();
          $grandtotal = $getpemesanan->$grandtotal;
          $biaya = $getpemesanan->$cost_ongkir;
          $keranjang = DB::table('detailpemesanan')->where('no_pemesanan', $no_pemesanan)->get();

          foreach($keranjang as $result){

            $kode_produk = $result->kode_produk;
            $product = DB::table('produk')->where('kode_produk', $kode_produk)->first();
            $kode_produk = $product->kode_produk;
            $nama_produk = $product->nama;
            $harga = $product->harga;
            $stok = $product->stok;
            $qty = $result->jumlah;
            $subtotal = $result->total;

            DB::table('produk')->where('kode_produk', $kode_produk)->update([
              "stok"=>$stok-$qty
            ]);

          }

          //update stok

        }else{

          //update database
          DB::table('duitku')->where('merchantorderid', $merchantOrderId)->update([
            "merchantcode"=>$merchantCode,
            "amount"=>$amount,
            "trxstatus"=>$statusMessage,
            "merchantorderid"=>$merchantOrderId,
            "resultcode"=>$statusCode,
            "reference"=>$reference
          ]);
          //update database

          //echo $httpCode;
        }

        //Cek transaksi

        $detailpayment = DB::table('duitku')->where('merchantorderid', $merchantOrderId)->first();
        $resultcode = $detailpayment->resultcode;
        $paymentmethod = $detailpayment->paymentmethod;
        $total = $detailpayment->amount;

        return view('web.pages.paymentsuccess', compact(
          'resultcode',
          'paymentmethod',
          'total'
        ));

      }

    }
