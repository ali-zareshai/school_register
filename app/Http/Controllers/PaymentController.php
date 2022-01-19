<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use App\Models\User;
use App\Models\Payments;

class PaymentController extends Controller
{
    private $FAIL_PAYMENT = 1;
    private $SUCCESS_PAYMENT = 2;

    public function __construct()
    {
        // $this->;
    }

    public function paymentNewRequest(Request $request)
    {
        $data = [
            "amount" => intVal(env("PAYMENT_AMOUNT")),
            "description" => "مجتمع آموزشی خالقیه",
            "return_url" => route('payment.verify'),
            "mobile" => auth()->user()->mobile,
            "email" => auth()->user()->email,
            "user_id"=>auth()->user()->id,
            "ip"=>$request->ip()
        ];
        return response()->json(\json_decode($this->getPaymentUrl($data)));
    }
    
    public function paymentResult(Request $request){
        $invoice = Payments::where('ref_id', $request->Authority)->first();
        if ($request->Status == 'OK') {
            if ($invoice) {
                try {
                    $receipt = Payment::amount($this->rialToToman($invoice->amount))->transactionId($invoice->ref_id)->verify();
                    $this->updateInvoticeStatus($invoice->ref_id, $this->SUCCESS_PAYMENT, $receipt->getReferenceId());
                    return $this->resultView(true, $invoice);
                } catch (InvalidPaymentException $exception) {
                    $this->updateInvoticeStatus($invoice->ref_id, $this->FAIL_PAYMENT, null, $exception->getMessage());
                    return $this->resultView(false, $invoice);
                }
            }
        }
        if ($invoice) {
            $this->updateInvoticeStatus($invoice->ref_id, $this->FAIL_PAYMENT, null, 'پرداخت لغو شد');
            return $this->resultView(false, $invoice);
        } else {
            return abort(404);
        }
    }

    private function resultView($status, $invoice)
    {
        $message = [
            'state' =>  $status ? $this->SUCCESS_PAYMENT : $this->FAIL_PAYMENT,
            'message'   =>  $status ? 'پرداخت با موفقیت انجام شد' : 'خطا در پرداخت',
            'payment_type' => $invoice->payment_type
        ];
        return view('payments.result', compact(['message']));
    }


    private function getPaymentUrl($data){
        $invoice = new Invoice;
        $invoice->amount($this->rialToToman($data["amount"]));
        $invoice->detail(['description' => $data["description"],'email'=>$data['email'], 'mobile' => $data["mobile"]]);

        return Payment::callbackUrl($data['return_url'])
            ->purchase(
                $invoice,
                function ($driver, $transactionId) use ($data) {
                    $data['ref_id']=$transactionId;
                    $this->savePayment($data);
                }
            )->pay()->toJson();


        return [
            "action" => "",
            "inputs" => [],
            "method" => "GET"
        ];
    }

    private function updateInvoticeStatus($authorityId, $status, $peygiriCode = null, $message = null){
        $invoice = Payments::where('ref_id', $authorityId);
        if ($status == $this->FAIL_PAYMENT) {
            $invoice->update([
                'status' => $this->FAIL_PAYMENT,
                'message' => $message
            ]);
        } else if ($status == $this->SUCCESS_PAYMENT) {
            $invoice->update([
                'status' => $this->SUCCESS_PAYMENT,
                'payment_at' => now(),
                'tracking_code' => $peygiriCode
            ]);
        }
    }

    private function rialToToman($rial)
    {
        return $rial / 10;
    }

    private function savePayment($invoiceData)
    {
        Payments::create($invoiceData);

        return true;
    }
}