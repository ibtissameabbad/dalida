<?php

namespace App\Http\Controllers;

use App\Models\Solde;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalPaymentController extends Controller
{
    private $session;

    public function __construct()
    {
        $this->middleware('auth');
        $this->session = request()->get('session');
    }

    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('product.checkout');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        // dd($this->session['product'][1]['type']);
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction',['session' =>$this->session]),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => request()->get('total')
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('createTransaction')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);



        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $session = request()->get('session');

            if(isset($session['campaign'])){
                foreach ($session['campaign'] as $el) {
                    Solde::create([
                        'soldeable_id' => $el['id'],
                        'soldeable_type' => 'App\Models\Campaign',
                        'qte' => $el['qte']
                    ]);
                }
                // Session::forget($session['campaign']);
                // $session['campaign']::flush();
            }
            if (isset($session['product'])) {
                foreach ($session['product'] as $el) {
                    Solde::create([
                    'soldeable_id' => $el['id'],
                    'soldeable_type' => 'App\Models\Product',
                    'qte' => $el['qte']
                ]);
                }
            }

            \Session::flush();
            return redirect()
                ->route('home')
                ->with('success', 'Transaction completed Successfully !');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('createTransaction')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
