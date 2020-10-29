<?php
use Illuminate\Support\Facades\DB;
use App\Setting;

function settingAll(){
    if(class_exists('DB')){
      if(DB::connection()->getPdo()){
        return Setting::where('category','basic')->pluck('value','name')->toArray();
      }
    }
}

function settingValue($col){
        return Setting::where('name',$col)->pluck('value')->first();
    }

function sendSms($contact,$msg,$smsType = 'text'){
    //dd($smsType);
    $msg = urlencode($msg);
    file_get_contents("http://sms.rampsbd.com/smsapi?api_key=".config('settings.sms_api_key', 'Laravel')."&type=".$smsType."&contacts=".$contact."&senderid=".config('settings.sms_senderid', 'Laravel')."&msg=".$msg);

    //$status=file_get_contents("http://sms.rampsbd.com/miscapi/C20015595aeaf3b16ee668.16154193/getDLR/getAll");

//$balance=file_get_contents("http://sms.rampsbd.com/miscapi/C20015595aeaf3b16ee668.16154193/getBalance");
}

function smsBalance(){
    //return file_get_contents("http://sms.rampsbd.com/miscapi/".config('settings.sms_api_key', 'Laravel')."/getBalance");
    return '0:0';
}


function fileIcom($file){
    $info = pathinfo(url('/public').'/upload/post_file/'.$file);
    $ext = $info['extension'];

    switch ($ext) {
    case 'pdf':
        return url('public/frontend/images').'/pdf.jpg';
        break;
    case 'doc':
        return url('public/frontend/images').'/word.jpg';
        break;
    case 'docx':
        return url('public/frontend/images').'/word.jpg';
        break;
    case 'xls':
        return url('public/frontend/images').'/excel.jpg';
        break;
    case 'xlsx':
        return url('public/frontend/images').'/excel.jpg';
        break;
    case 'ppt':
        return url('public/frontend/images').'/ppt.jpg';
        break;
    case 'pptx':
        return url('public/frontend/images').'/ppt.jpg';
        break;
    default:
        return '';
    }

}


function the_content_limit($content,$limit){
    $content=strip_tags($content);
    return str_limit($content,$limit);
}

/**
 * @param null $title
 * @param null $message
 * @return \Illuminate\Foundation\Application|mixed
 * For the flash messages.
 */
function flash($title = null, $message = null) {
    // Set variable $flash to fetch the Flash Class
    // in Flash.php
    $flash = app('App\Http\Flash');

    // If 0 parameters are passed in ($title, $message)
    // then just return the flash instance.
    if (func_num_args() == 0) {
        return $flash;
    }

    // Just return a regular flash->info message
    return $flash->info($title, $message);
}

/**
 * @param $date
 * @return bool|string
 * Format the time to this
 composer dump-autoload
 */
function prettyDate($date) {
    return date("d-M-Y", strtotime($date));
}

function prettyDateS($date) {
    return date("d/m", strtotime($date));
}

//file_get_contents("http://sms.rampsbd.com/smsapi?api_key=C20015595aeaf3b16ee668.16154193&type=text&contacts=01757839516&senderid=4559&msg=".$msg);

//$status=file_get_contents("http://sms.rampsbd.com/miscapi/C20015595aeaf3b16ee668.16154193/getDLR/getAll");

//$balance=file_get_contents("http://sms.rampsbd.com/miscapi/C20015595aeaf3b16ee668.16154193/getBalance");