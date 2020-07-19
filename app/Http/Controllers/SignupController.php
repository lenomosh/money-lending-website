<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Validator;
use Illuminate\Http\Request;
use PDO;
use Illuminate\Support\Facades\DB;
use App\Rules\ProperName;
use App\Rules\AgeOfAdult;
use App\Rules\ValideID;
use App\Rules\KenyanPhoneCode;
use App\Rules\SafaricomLine;

class SignupController extends Controller
{
    public function fetch (Request $request){
        $validation = true;
        $validator= Validator::make($request->all(),
            [
                'fname'=>['required', new ProperName],
                'lname'=>['required', new ProperName],
                'dob'=>['required', new AgeOfAdult],
                'idno'=>['required',
                    'regex:/^\d+$/',
                    'min:7',
                    'max:8',
                    new ValideID],
                'gender'=>'required',
                'tel'=>['required',
                    new KenyanPhoneCode,
                    new SafaricomLine],
                'ltype'=>'required'

            ],
            $messages = array(
                'fname.required'    => 'First Name is required',
                'tel.required'    => 'Phone Number is required',
                'lname.required' => 'Last name is required.',
                'gender.required'      => 'Gender is required',
                'ltype.required'      => 'Loan type field is required',
                'idno.required'      => 'Your ID Number is required',
                'idno.min'      => 'The ID Number must be at least 7 characters',
                'idno.regex'      => 'Please enter a valid ID Number',
                'idno.max'      => 'Your ID Number may not be greater than 8 characters.',
                'dob.required'      => 'Please fill in your date of birth'
            )
            );
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $firstName = strtoupper($request->input('fname'));
        $lastName = strtoupper($request->input('lname'));
        $dob = strtoupper($request->input('dob'));
        $idNumber = strtoupper($request->input('idno'));
        $gender = strtoupper($request->input('gender'));
        $phoneNumber = strtoupper($request->input('tel'));
        $loanType = strtoupper($request->input('ltype'));
        //trim phone number
        $snumber = ltrim($phoneNumber, "+");
        $execute = DB::table('hopemore_users')
            ->where('phoneNumber', '=', $snumber)
            ->orWhere('idNumber','=', $idNumber)
            ->get();
        //check if a user is already registered
        $ifexists = count($execute);
        if ($ifexists == 1){
            foreach ($execute as $user){
                $jina = $user->firstName;
                $paid = $user->paid;
                $idno = $user->idNumber;

            }
            if ($paid == "NO") {
                $errorMessage = "Hey $jina, looks like you're already registered but not paid the registration fee.";
                $request->session()->put('name', $firstName);
                $request->session()->put('phone', $snumber);
                echo '<script type="text/javascript">alert("'.$errorMessage.'");</script>';
                $validation=false;
                return view('regcom');
//                header("refresh:5;url=regcom");


            }elseif ($paid == "Y") {
                $successMessage = "Hey $jina, you're already a registered member of Hopemore Solutions";
                session()->flush();
                echo '<script type="text/javascript">alert("'.$successMessage.'");</script>';
//                header("refresh:5; url=index");
                $validation=false;
                return view('index');
            }
            }
        $user = array(
            'firstName'=>$firstName,
                'lastName'=>$lastName,
                'dob'=>$dob,
                'idNumber'=>$idNumber,
                'gender'=>$gender,
                'loanType'=>$loanType,
                'phoneNumber'=>$snumber
        );
        //check if phone number or idNumber has already been used

        $execute = DB::table('hopemore_users')
            ->where('phoneNumber', '=', $snumber)
            ->orWhere('idNumber','=', $idNumber)
            ->get();
        $count = count($execute);
        if ($count >0){
            $message = "It looks like either the ID or phone Number you entered is already registered with one of our users. please check and try again";

            echo '<script type="text/javascript">alert("'.$message.'");</script>';
            $validation=false;
            return view('signup');
//            header("refresh:7; url=signup");
        }
        //initialize insert;
        if ($validation==true){
            DB::table('hopemore_users')->insert($user);
            echo '<script type="text/javascript">alert("Record inserted successfully.");</script>';
            $request->session()->put('name', $firstName);
            $request->session()->put('phone', $snumber);
            return view('regcom');
//            header("refresh:5; url=regcom");
        }echo '<script type="text/javascript">alert("Internal server error. please try again");</script>';



    }

    public function initiate(Request $request){
        $mpesa= new \Safaricom\Mpesa\Mpesa();
        $snumber = $request->session()->get('phone');
        $execute = DB::table('hopemore_users')
            ->where('phoneNumber', '=', $snumber)
            ->get();
        $exist = count($execute);
        //mpesa credentials
        $BusinessShortCode = "739283";
        $Amount = "100";
        $PartyA = $snumber;
        $PartyB = "739283";
        $PhoneNumber = $snumber;
        $CallBackURL = "https://goafrica-kenyagrantmakers.com/public/mpesacall";
        $AccountReference = "Hopemore";
        $Remarks="Hopemore Reg Fee";
        $TransactionType = "CustomerPayBillOnline";
        $AccountReference = $snumber;
        if ($exist > 0) {
            foreach ($execute as $user)
                $AccountReference = $user->firstName;

        }
        $TransactionDesc = "Registration fee";
        $LipaNaMpesaPasskey = "f1482f1a235123d24e0a90dff020145af6e06ce81928b32bdd04f0c3bb1723e7";
        //end of mpesa credentials
        $stkPushSimulation=$mpesa->STKPushSimulation($BusinessShortCode, $LipaNaMpesaPasskey, $TransactionType, $Amount, $PartyA, $PartyB, $PhoneNumber, $CallBackURL, $AccountReference, $TransactionDesc, $Remarks);
//        echo $stkPushSimulation;
//        return $stkPushSimulation;
        $decodedResponse = json_decode($stkPushSimulation);
        $checkoutRequestID= json_decode($stkPushSimulation)->CheckoutRequestID;
//        $checkoutRequestID= $decodedResponse->CheckoutRequestID;
//        return $checkoutRequestID;
        $request->session()->put('checkoutRequestID', $checkoutRequestID);

        if (isset($decodedResponse->ResponseCode)) {
            $ResponseCode = $decodedResponse->ResponseCode;
            if ($ResponseCode == '0') {
                $message = "M-Pesa Express initiated successfully";
                echo '<script type="text/javascript">alert("'.$message.'");</script>';
                return \redirect('regcom');
//                header("refresh:5; url=regcom");

            } else {
                $message = "An error occured while trying to initiate the process. Please try again";
                echo '<script type="text/javascript">alert("'.$message.'");</script>';
                return \redirect('signup');

//
            }
        }
        if (isset($decodedResponse->errorCode)) {
            $errorMessage = $decodedResponse->errorMessage;
            $message = "We ran into a problem, our developers are working on it";

        }

        echo '<script type="text/javascript">alert("Internal server error. Our Developers are working on it");</script>';
        return \redirect('index');
//        header("refresh:5; url=index");
    }
    //callback url working well
    public function callbackurl(Request $request){
        $mpesa= new \Safaricom\Mpesa\Mpesa();
        $callbackData=$mpesa->getDataFromCallback();
        $callbackData=json_decode($callbackData);
        if ($callbackData->Body->stkCallback->ResultCode == '0'){
            $resultCode=$callbackData->Body->stkCallback->ResultCode;
            $resultDesc=$callbackData->Body->stkCallback->ResultDesc;
            $merchantRequestID=$callbackData->Body->stkCallback->MerchantRequestID;
            $checkoutRequestID=$callbackData->Body->stkCallback->CheckoutRequestID;
            $amount=$callbackData->Body->stkCallback->CallbackMetadata->Item[0]->Value;
            $mpesaReceiptNumber=$callbackData->Body->stkCallback->CallbackMetadata->Item[1]->Value;
//            $balance=$callbackData->Body->stkCallback->CallbackMetadata->Item[2]->Value;
            $transactionDate=$callbackData->Body->stkCallback->CallbackMetadata->Item[3]->Value;
            $phoneNumber=$callbackData->Body->stkCallback->CallbackMetadata->Item[4]->Value;
            $result=array(
                "resultDesc"=>$resultDesc,
                "resultCode"=>$resultCode,
                "merchantRequestID"=>$merchantRequestID,
                "checkoutRequestID"=>$checkoutRequestID,
                "amount"=>$amount,
                "mpesaReceiptNumber"=>$mpesaReceiptNumber,
                "transactionDate"=>$transactionDate,
                "phoneNumber"=>$phoneNumber
            );
//          $query="INSERT INTO successful_transactions(resultDesc, resultCode, merchantRequestID, checkoutRequestID, amount, balance, transactionDate, phoneNumber) VALUES ('$resultDesc','$resultCode','$merchantRequestID','$checkoutRequestID','$amount','$balance','$transactionDate','$phoneNumber')";
            $execute =DB::table('successful_transactions')->insert($result);
            $update = DB::update("UPDATE hopemore_users SET paid = 'Y' WHERE phoneNumber ='$phoneNumber'");
            $request->session()->flush();
        }
        else{
            $merchantRequestID=$callbackData->Body->stkCallback->MerchantRequestID;
            $checkoutRequestID=$callbackData->Body->stkCallback->CheckoutRequestID;
            $resultCode=$callbackData->Body->stkCallback->ResultCode;
            $resultDesc=$callbackData->Body->stkCallback->ResultDesc;
            $result = array(
                'resultDesc'=>$resultDesc,
                'resultCode'=>$resultCode,
                'merchantRequestID'=>$merchantRequestID,
                'checkoutRequestID'=>$checkoutRequestID
            );
//            $query="INSERT INTO failed_transactions(resultDesc, resultCode, merchantRequestID, checkoutRequestID) VALUES('$resultDesc','$resultCode','$merchantRequestID','$checkoutRequestID')";
            $execute =DB::table('failed_transactions')->insert($result);
        }
    }
    public function status(Request $request){
//    $mpesa= new \Safaricom\Mpesa\Mpesa();
//    $timestamp='20'.date(    "ymdhis");
//    $LipaNaMpesaPasskey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
//    $BusinessShortCode = "174379";
//    $businessShortCode = $BusinessShortCode;
//    $checkoutRequestID = session()->get('checkoutRequestID');
//    if (empty($checkoutRequestID)){
//        $response = "Please intitiate the first transaction first for you to check the transaction status";
//        Redirect::back()->withErrors($response);
//    }
//    $password=base64_encode($BusinessShortCode.$LipaNaMpesaPasskey.$timestamp);
//    $STKPushRequestStatus=$mpesa->STKPushQuery($checkoutRequestID,$businessShortCode,$password,$timestamp);
////    $request->session()->put('querystatus', $STKPushRequestStatus);
//        $decodedResponse = json_decode($STKPushRequestStatus);
////        $checkoutRequestID= $decodedResponse->CheckoutRequestID;
//
//        if (isset($decodedResponse->ResponseCode)) {
//            $ResponseCode = $decodedResponse->ResponseCode;
//            if ($ResponseCode == '0') {
//                $message = "You should see STK push on your phone";
//                $request->session()->put('querystatus', $message);
//                echo '<script type="text/javascript">alert("'.$message.'");</script>';
//                return \redirect()->back();
////                header("refresh:5; url=regcom");
//
//            } else {
//                $message = "An error occured while trying to initiate the process. Please try again";
//                $request->session()->put('querystatus', $message);
//                echo '<script type="text/javascript">alert("'.$message.'");</script>';
//                return \redirect()->back();
//
////
//            }
//        }
//        if (isset($decodedResponse->errorCode)) {
//            $errorMessage = $decodedResponse->errorMessage;
//            $message = "We ran into a problem, our developers are working on it";
//            $request->session()->put('querystatus', $message);
//            echo '<script type="text/javascript">alert("'.$message.'");</script>';
//            return \redirect()->back();
//
//        }
        $snumber = $request->session()->get('phone');
//        $fquery = "SELECT * FROM successfultransactions where phoneNumber='$phone' ORDER BY transaction_id DESC LIMIT 1";
        $execute= DB::select("SELECT * FROM successful_transactions where phoneNumber='$snumber' ORDER BY id DESC LIMIT 1");
//            ->where('phoneNumber','=',$snumber)->orderBy('transaction_id','DESC')->limit(1);
//       return $execute ;
        $existence =count($execute);
        if ($existence > 0) {

            $message = "Payment was received. We'll get back to you soon";
            $request->session()->put('querystatus', $message);
//            $query = "UPDATE users SET paid = 'Y' WHERE phone ='$phone'";
//            $query=DB::update('UPDATE users SET paid = \'Y\' WHERE phone =\'$phone\'');
//            table('hopemore_users')->where('phoneNumber','=',$snumber)->update(array('paid'=>'Y'));
//            $execute = $conn->query($query);
                $request->session()->flush();
            echo '<script type="text/javascript">alert("'.$message.'");</script>';
            header("refresh:2; url=https://goafrica-kenyagrantmakers.com");
        } else {

            $message = "Payment not successful please try again";
            echo '<script type="text/javascript">alert("'.$message.'");</script>';
            header("refresh:1; url=https://goafrica-kenyagrantmakers.com/public/regcom");
        }


//    $callbackData = $STKPushRequestStatus;
//    if ($callbackData->Body->stkCallback->ResultCode == '0'){
//        $resultCode=$callbackData->Body->stkCallback->ResultCode;
//        $resultDesc=$callbackData->Body->stkCallback->ResultDesc;
//        $merchantRequestID=$callbackData->Body->stkCallback->MerchantRequestID;
//        $checkoutRequestID=$callbackData->Body->stkCallback->CheckoutRequestID;
//        $amount=$callbackData->stkCallback->Body->CallbackMetadata->Item[0]->Value;
//        $mpesaReceiptNumber=$callbackData->Body->stkCallback->CallbackMetadata->Item[1]->Value;
//        $balance=$callbackData->stkCallback->Body->CallbackMetadata->Item[2]->Value;
//        $transactionDate=$callbackData->Body->stkCallback->CallbackMetadata->Item[3]->Value;
//        $phoneNumber=$callbackData->Body->stkCallback->CallbackMetadata->Item[4]->Value;
//
//        $result=array(
//            "resultDesc"=>$resultDesc,
//            "resultCode"=>$resultCode,
//            "merchantRequestID"=>$merchantRequestID,
//            "checkoutRequestID"=>$checkoutRequestID,
//            "amount"=>$amount,
//            "mpesaReceiptNumber"=>$mpesaReceiptNumber,
//            "balance"=>$balance,
//            "transactionDate"=>$transactionDate,
//            "phoneNumber"=>$phoneNumber
//        );
//        $query="INSERT INTO successfultransactions(resultDesc, resultCode, merchantRequestID, checkoutRequestID, amount, balance, transactionDate, phoneNumber) VALUES ('$resultDesc','$resultCode','$merchantRequestID','$checkoutRequestID','$amount','$balance','$transactionDate','$phoneNumber')";
//        $execute = DB::insert($query);
//        return json_encode($result);
//
//    }else{
//        $merchantRequestID=$callbackData->Body->stkCallback->MerchantRequestID;
//        $checkoutRequestID=$callbackData->Body->stkCallback->CheckoutRequestID;
//        $resultCode=$callbackData->Body->stkCallback->ResultCode;
//        $resultDesc=$callbackData->Body->stkCallback->ResultDesc;
//        $query="INSERT INTO failedtransactions(resultDesc, resultCode, merchantRequestID, checkoutRequestID) VALUES('$resultDesc','$resultCode','$merchantRequestID','$checkoutRequestID')";
//        $execute =DB::insert($query);
//    }
}

}
