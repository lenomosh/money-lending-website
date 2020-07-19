@php($result=array(
                "resultDesc"=>$resultDesc,
                "resultCode"=>$resultCode,
                "merchantRequestID"=>$merchantRequestID,
                "checkoutRequestID"=>$checkoutRequestID,
                "amount"=>$amount,
                "mpesaReceiptNumber"=>$mpesaReceiptNumber,
                "balance"=>$balance,
                "transactionDate"=>$transactionDate,
                "phoneNumber"=>$phoneNumber
            );
            json_encode($result))
<form method="post" action="http://localhost/laravel/public/mpesacall">

</form>


