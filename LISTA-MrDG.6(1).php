<?php 
ob_start();
$token = "Token"; # Token
define("API_KEY", $token);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}}
# Short
$update = json_decode(file_get_contents("php://input"));
$msg = $update->message;
$txt = $msg->caption;
$text = $msg->text;
$chat_id = $msg->chat->id;
$from_id = $msg->from->id;
$new = $msg->new_chat_members;
$message_id = $msg->message_id;
$type = $msg->chat->type;
$name = $msg->from->first_name;
if(isset($update->callback_query)){
$callbackMessage = '';
var_dump(bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>$callbackMessage]));
$up = $update->callback_query;
$chat_id = $up->message->chat->id;
$from_id = $up->from->id;
$user = $up->from->username;
$message_id = $up->message->message_id;
$data = $up->data;
}
$id = $update->inline_query->from->id; 
$hadl = "@MrDGSY"; // help
$hadll = "@MrDGFMBOT"; // bot
$hadlll = "30 عضو ."; 
$text_inline = $update->inline_query->query;
include "code/$text_inline/code.php";
include "data/lista.php";
mkdir("start");
mkdir("data");
mkdir("code");
mkdir("ms");
mkdir("up");
$mang = -1001130606880; // ID-GP
$sudo = array("163609269"); // admin
# Data
$unll = file_get_contents("unll.txt");
$gettext = file_get_contents("data/text.txt");
$RALST = file_get_contents("data/RALST.txt");
$ASLST = file_get_contents("data/ASLST.txt");
$MRTEST = file_get_contents("data/MRTEST.txt");
$EMLST = file_get_contents("data/EMLST.txt");
$ESLST = file_get_contents("data/ESLST.txt");
$FASLST = file_get_contents("data/FASLST.txt");
$START = file_get_contents("data/start.txt");
$users = explode("\n", file_get_contents("data/users.txt"));
$getstart = file_get_contents("data/start.txt");
$getids = explode("\n", file_get_contents("data/ids.txt"));
$getlista = explode("\n", file_get_contents("data/lista.txt"));
$getban = explode("\n", file_get_contents('data/ban.txt'));
$getmes_id = explode("\n", file_get_contents("ms/$message_id.txt"));
# Back
if(in_array($chat_id, $sudo)){
$back = json_encode(['inline_keyboard'=>[[['text'=>"الصفحة الرئيسية",'callback_data'=>"left"]],]]);
if($data == "left"){
file_put_contents("unll.txt", " ");
bot('editmessagetext',[
'chat_id'=>$chat_id,
'text'=>"
َ
ℓ♻️- [welcome bot lista new](t.me/MrDGBOTS)
➖➖
ℓ🎁- اهلا وسهلا بك في بوت لستة
ℓ📮- [تعديل وتطوير عن طريق حمزة](t.me/MrDGBOTS)
-
ℓ📦- نشر - رفع - حذف -شفاف
ℓ⚙️- [ماردراكون - معرفات - توجيه](t.me/MrDGBOTS)
-
ℓ🌀- *Admin* => [Mr DG](http://t.me/MrDGFMBOT)
➖➖
ℓ📌- [commands all bot list](t.me/MrDGBOTS)
➖➖
ℓ📃- اليك اعدادات لستة هاذا كل ما تحتاجة
",
'disable_web_page_preview'=>'true',
'parse_mode'=>"MarkDown",
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"تحويل شفاف",'callback_data'=>"res"],['text'=>"اختبار شفاف",'callback_data'=>"test"]],
[['text'=>"نشر شفاف",'callback_data'=>"send"],['text'=>"حذف شفاف",'callback_data'=>"delete"]],
[['text'=>"رفع شفاف",'callback_data'=>"up"]],
[['text'=>"نشر كود",'callback_data'=>"sendcode"],['text'=>"نشر ماركداون",'callback_data'=>"sendlink"]],
[['text'=>"نشر هتمل",'callback_data'=>"sendhtml"],['text'=>"نشر توجيه",'callback_data'=>"sendfwd"]],
[['text'=>"صنع منشور",'callback_data'=>"ba"]],
[['text'=>"نشر الكودات",'callback_data'=>"sendallcode"],['text'=>"حذف المنشورات",'callback_data'=>"deleteallms"]],
[['text'=>"اضافة قناة",'callback_data'=>"add"],['text'=>"حذف قناة",'callback_data'=>"dele"]],
[['text'=>"حذف جميع القنوات",'callback_data'=>"delech"]],
[['text'=>"حظر قناة",'callback_data'=>"ban"],['text'=>"الغاء حظر قناة",'callback_data'=>"unban"]],
[['text'=>"القنوات المحضورة",'callback_data'=>"listban"]],
[['text'=>"رسالة ستارت",'callback_data'=>"editstart"],['text'=>"رئس شفاف",'callback_data'=>"editlist"]],
[['text'=>" عدد المشتركين الأدنى ".$had,'callback_data'=>"0"]
],
[['text'=>"+20",'callback_data'=>"p20"],
['text'=>"+100",'callback_data'=>"p100"],
['text'=>"+1k",'callback_data'=>"p1k"]
],
[['text'=>"-20",'callback_data'=>"m20"],
['text'=>"-100",'callback_data'=>"m100"] ,
['text'=>"-1k",'callback_data'=>"m1k"]
],
[['text'=>" حذف الملفات المؤقته ",'callback_data'=>"resfull"]],
[['text'=>"تحويل معرفات",'callback_data'=>"MRMOR"],['text'=>"تحويل ماركدون",'callback_data'=>"MRMRK"]],
[['text'=>"اختبار معرفات",'callback_data'=>"MRTESTMO"],['text'=>"اختبار ماركدون",'callback_data'=>"MRTEST"]],
[['text'=>" رفع لستة ",'callback_data'=>"MRRF"]],
[['text'=>"نشر معرفات",'callback_data'=>"MRSNDMO"],['text'=>"نشر ماركدون",'callback_data'=>"MRSND"]],
[['text'=>"حذف الستة",'callback_data'=>"MRDEL"]],
[['text'=>"رئس لستة",'callback_data'=>"RALST"],['text'=>"اسفل لستة",'callback_data'=>"ASLST"]],
[['text'=>"احصائيات قنوات",'callback_data'=>"AHSLST"]],
[['text'=>"يمين لستة",'callback_data'=>"EMLST"],['text'=>"يسار لستة",'callback_data'=>"ESLST"]],
[['text'=>"فاصل لستة",'callback_data'=>"FASLST"],['text'=>"حذف زخرفة",'callback_data'=>"DELZH"]],
]])
]);
}
$had = file_get_contents("data/users.txt");
function MrDG($chat_id,$message_id,$mang)
	 { $had = file_get_contents("data/users.txt");
file_put_contents("unll.txt", " ");
bot('editmessagetext',[
'chat_id'=>$chat_id,
'text'=>"
َ
ℓ♻️- [welcome bot lista new](t.me/MrDGBOTS)
➖➖
ℓ🎁- اهلا وسهلا بك في بوت لستة
ℓ📮- [تعديل وتطوير عن طريق حمزة](t.me/MrDGBOTS)
-
ℓ📦- نشر - رفع - حذف -شفاف
ℓ⚙️- [ماردراكون - معرفات - توجيه](t.me/MrDGBOTS)
-
ℓ🌀- *Admin* => [Mr DG](http://t.me/MrDGFMBOT)
➖➖
ℓ📌- [commands all bot list](t.me/MrDGBOTS)
➖➖
ℓ📃- اليك اعدادات لستة هاذا كل ما تحتاجة
",
'disable_web_page_preview'=>'true',
'parse_mode'=>"MarkDown",
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"تحويل شفاف",'callback_data'=>"res"],['text'=>"اختبار شفاف",'callback_data'=>"test"]],
[['text'=>"نشر شفاف",'callback_data'=>"send"],['text'=>"حذف شفاف",'callback_data'=>"delete"]],
[['text'=>"رفع شفاف",'callback_data'=>"up"]],
[['text'=>"نشر كود",'callback_data'=>"sendcode"],['text'=>"نشر ماركداون",'callback_data'=>"sendlink"]],
[['text'=>"نشر هتمل",'callback_data'=>"sendhtml"],['text'=>"نشر توجيه",'callback_data'=>"sendfwd"]],
[['text'=>"صنع منشور",'callback_data'=>"ba"]],
[['text'=>"نشر الكودات",'callback_data'=>"sendallcode"],['text'=>"حذف المنشورات",'callback_data'=>"deleteallms"]],
[['text'=>"اضافة قناة",'callback_data'=>"add"],['text'=>"حذف قناة",'callback_data'=>"dele"]],
[['text'=>"حذف جميع القنوات",'callback_data'=>"delech"]],
[['text'=>"حظر قناة",'callback_data'=>"ban"],['text'=>"الغاء حظر قناة",'callback_data'=>"unban"]],
[['text'=>"القنوات المحضورة",'callback_data'=>"listban"]],
[['text'=>"رسالة ستارت",'callback_data'=>"editstart"],['text'=>"رئس شفاف",'callback_data'=>"editlist"]],
[['text'=>" عدد المشتركين الأدنى ".$had,'callback_data'=>"0"]
],
[['text'=>"+20",'callback_data'=>"p20"],
['text'=>"+100",'callback_data'=>"p100"],
['text'=>"+1k",'callback_data'=>"p1k"]
],
[['text'=>"-20",'callback_data'=>"m20"],
['text'=>"-100",'callback_data'=>"m100"] ,
['text'=>"-1k",'callback_data'=>"m1k"]
],
[['text'=>" حذف الملفات المؤقته ",'callback_data'=>"resfull"]],
[['text'=>"تحويل معرفات",'callback_data'=>"MRMOR"],['text'=>"تحويل ماركدون",'callback_data'=>"MRMRK"]],
[['text'=>"اختبار معرفات",'callback_data'=>"MRTESTMO"],['text'=>"اختبار ماركدون",'callback_data'=>"MRTEST"]],
[['text'=>" رفع لستة ",'callback_data'=>"MRRF"]],
[['text'=>"نشر معرفات",'callback_data'=>"MRSNDMO"],['text'=>"نشر ماركدون",'callback_data'=>"MRSND"]],
[['text'=>"حذف الستة",'callback_data'=>"MRDEL"]],
[['text'=>"رئس لستة",'callback_data'=>"RALST"],['text'=>"اسفل لستة",'callback_data'=>"ASLST"]],
[['text'=>"احصائيات قنوات",'callback_data'=>"AHSLST"]],
[['text'=>"يمين لستة",'callback_data'=>"EMLST"],['text'=>"يسار لستة",'callback_data'=>"ESLST"]],
[['text'=>"فاصل لستة",'callback_data'=>"FASLST"],['text'=>"حذف زخرفة",'callback_data'=>"DELZH"]],
]])
]);
}
if($text == "الاوامر" ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
َ
ℓ♻️- [welcome bot lista new](t.me/MrDGBOTS)
➖➖
ℓ🎁- اهلا وسهلا بك في بوت لستة
ℓ📮- [تعديل وتطوير عن طريق حمزة](t.me/MrDGBOTS)
-
ℓ📦- نشر - رفع - حذف -شفاف
ℓ⚙️- [ماردراكون - معرفات - توجيه](t.me/MrDGBOTS)
-
ℓ🌀- *Admin* => [Mr DG](http://t.me/MrDGFMBOT)
➖➖
ℓ📌- [commands all bot list](t.me/MrDGBOTS)
➖➖
ℓ📃- اليك اعدادات لستة هاذا كل ما تحتاجة
",
'disable_web_page_preview'=>'true',
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"تحويل شفاف",'callback_data'=>"res"],['text'=>"اختبار شفاف",'callback_data'=>"test"]],
[['text'=>"نشر شفاف",'callback_data'=>"send"],['text'=>"حذف شفاف",'callback_data'=>"delete"]],
[['text'=>"رفع شفاف",'callback_data'=>"up"]],
[['text'=>"نشر كود",'callback_data'=>"sendcode"],['text'=>"نشر ماركداون",'callback_data'=>"sendlink"]],
[['text'=>"نشر هتمل",'callback_data'=>"sendhtml"],['text'=>"نشر توجيه",'callback_data'=>"sendfwd"]],
[['text'=>"صنع منشور",'callback_data'=>"ba"]],
[['text'=>"نشر الكودات",'callback_data'=>"sendallcode"],['text'=>"حذف المنشورات",'callback_data'=>"deleteallms"]],
[['text'=>"اضافة قناة",'callback_data'=>"add"],['text'=>"حذف قناة",'callback_data'=>"dele"]],
[['text'=>"حذف جميع القنوات",'callback_data'=>"delech"]],
[['text'=>"حظر قناة",'callback_data'=>"ban"],['text'=>"الغاء حظر قناة",'callback_data'=>"unban"]],
[['text'=>"القنوات المحضورة",'callback_data'=>"listban"]],
[['text'=>"رسالة ستارت",'callback_data'=>"editstart"],['text'=>"رئس شفاف",'callback_data'=>"editlist"]],
[['text'=>" عدد المشتركين الأدنى ".$had,'callback_data'=>"0"]
],
[['text'=>"+20",'callback_data'=>"p20"],
['text'=>"+100",'callback_data'=>"p100"],
['text'=>"+1k",'callback_data'=>"p1k"]
],
[['text'=>"-20",'callback_data'=>"m20"],
['text'=>"-100",'callback_data'=>"m100"] ,
['text'=>"-1k",'callback_data'=>"m1k"]
],
[['text'=>" حذف الملفات المؤقته ",'callback_data'=>"resfull"]],
[['text'=>"تحويل معرفات",'callback_data'=>"MRMOR"],['text'=>"تحويل ماركدون",'callback_data'=>"MRMRK"]],
[['text'=>"اختبار معرفات",'callback_data'=>"MRTESTMO"],['text'=>"اختبار ماركدون",'callback_data'=>"MRTEST"]],
[['text'=>" رفع لستة ",'callback_data'=>"MRRF"]],
[['text'=>"نشر معرفات",'callback_data'=>"MRSNDMO"],['text'=>"نشر ماركدون",'callback_data'=>"MRSND"]],
[['text'=>"حذف الستة",'callback_data'=>"MRDEL"]],
[['text'=>"رئس لستة",'callback_data'=>"RALST"],['text'=>"اسفل لستة",'callback_data'=>"ASLST"]],
[['text'=>"احصائيات قنوات",'callback_data'=>"AHSLST"]],
[['text'=>"يمين لستة",'callback_data'=>"EMLST"],['text'=>"يسار لستة",'callback_data'=>"ESLST"]],
[['text'=>"فاصل لستة",'callback_data'=>"FASLST"],['text'=>"حذف زخرفة",'callback_data'=>"DELZH"]],
]])
]);
}$mang=0;
if ( $data == "p20" ) {
$had1=$had+20;
file_put_contents("data/users.txt",$had1);
MrDG( $chat_id,$message_id,$mang);
}
elseif ( $data == "p100" ) {
$had1=$had+100;
file_put_contents("data/users.txt",$had1);
MrDG( $chat_id,$message_id,$mang);
}
elseif ( $data == "p1k" ) {
$had1=$had+1000;
file_put_contents("data/users.txt",$had1);
MrDG( $chat_id,$message_id,$mang);
}
elseif ( $data == "m20" ) {
$had1=$had-20;
file_put_contents("data/users.txt",$had1);
MrDG( $chat_id,$message_id,$mang);
}
elseif ( $data == "m100" ) {
$had1=$had-100;
file_put_contents("data/users.txt",$had1);
MrDG( $chat_id,$message_id,$mang);
}
elseif ( $data == "m1k" ) {
$had1=$had-1000;
file_put_contents("data/users.txt",$had1);
MrDG( $chat_id,$message_id,$mang);
}

if($data == "send"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري نشر الستة انتضر قليلا ☑️",
"message_id"=>$message_id,
]);
for($i=0;$i<count($getids);$i++){

$get=bot("sendMessage",[
"chat_id"=>$getids[$i],
"text"=>"$gettext",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"reply_markup"=>$getlist
]);
$msg_id = $get->result->message_id;
file_put_contents("data/lista.txt",$getids[$i]."==". $msg_id."\n", FILE_APPEND);
}
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"تم نشر الستة بجميع القنوات ✅",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"$gettext",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"reply_markup"=>$getlist
]);
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"✅ تـمَّـ - بِفضْلِ اللَّـه - نَشْــر اللسْتَــة.",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
}
# MRSND
if($data == "MRSND"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري نشر الستة انتضر قليلا ☑️",
"message_id"=>$message_id,
]);
for($i=0;$i<count($getids);$i++){

$get=bot("sendMessage",[
"chat_id"=>$getids[$i],
"text"=>"$MRTEST",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
$msg_id = $get->result->message_id;
file_put_contents("data/lista.txt",$getids[$i]."==". $msg_id."\n", FILE_APPEND);
}
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"تم نشر الستة بجميع القنوات ✅",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"$MRTEST",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"✅ تـمَّـ - بِفضْلِ اللَّـه - نَشْــر اللسْتَــة.",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
}
# MRSNDMO
if($data == "MRSNDMO"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري نشر الستة انتضر قليلا ☑️",
"message_id"=>$message_id,
]);
for($i=0;$i<count($getids);$i++){

$get=bot("sendMessage",[
"chat_id"=>$getids[$i],
"text"=>"$MRTEST",
'disable_web_page_preview'=>true,
'parse_mode'=>markdown,
]);
$msg_id = $get->result->message_id;
file_put_contents("data/lista.txt",$getids[$i]."==". $msg_id."\n", FILE_APPEND);
}
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"تم نشر الستة بجميع القنوات ✅",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"$MRTEST",
'disable_web_page_preview'=>true,
'parse_mode'=>markdown,
]);
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"✅ تـمَّـ - بِفضْلِ اللَّـه - نَشْــر اللسْتَــة.",
'disable_web_page_preview'=>true,
'parse_mode'=>markdown,
]);
}
# MRDEL
if($data == "MRDEL"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري حذف الستة انتضر قليلا 🗑",
"message_id"=>$message_id,
]);
for($d=0;$d<count($getlista);$d++){
$ex = explode("==", $getlista[$d]);
$getlista1=$ex['1'];
$getids1=$ex['0'];
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getlista1");
//}
}
unlink("data/lista.txt");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"تم حذف الستة من جميع القنوات 🗑",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"❎ تـمَّـ - بِفضْلِ اللَّـه - حَـذْفـ اللسْتَـة",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
}
# delete
if($data == "delete"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري حذف الستة انتضر قليلا 🗑",
"message_id"=>$message_id,
]);
for($d=0;$d<count($getlista);$d++){
$ex = explode("==", $getlista[$d]);
$getlista1=$ex['1'];
$getids1=$ex['0'];
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getlista1");
//}
}
unlink("data/lista.txt");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"تم حذف الستة من جميع القنوات 🗑",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"❎ تـمَّـ - بِفضْلِ اللَّـه - حَـذْفـ اللسْتَـة",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
}
if($data == "up"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري رفع الستة انتضر قليلا 🔄",
"message_id"=>$message_id,
]);
unlink("data/lista.txt");
for($d=0;$d<count($getlista);$d++){
$ex = explode("==", $getlista[$d]);
$getlista1=$ex['1'];
$getids1=$ex['0'];
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getlista1");

$get=bot("sendMessage",[
"chat_id"=>$getids1,
"text"=>"$gettext",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"reply_markup"=>$getlist
]);
$msg_id = $get->result->message_id;
file_put_contents("data/lista.txt",$getids1."==". $msg_id."\n", FILE_APPEND);
//}
}

bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"تم رفع الستة في جميع القنوات ☑️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"☑️ تـمَّـ - بِفضْلِ اللَّـه - رَفــعُ اللسْتَــة",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
}
# MRRF
if($data == "MRRF"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري رفع الستة انتضر قليلا 🔄",
"message_id"=>$message_id,
]);
unlink("data/lista.txt");
for($d=0;$d<count($getlista);$d++){
$ex = explode("==", $getlista[$d]);
$getlista1=$ex['1'];
$getids1=$ex['0'];
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getlista1");

$get=bot("sendMessage",[
"chat_id"=>$getids1,
"text"=>"$MRTEST",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
$msg_id = $get->result->message_id;
file_put_contents("data/lista.txt",$getids1."==". $msg_id."\n", FILE_APPEND);
//}
}

bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"تم رفع الستة في جميع القنوات ☑️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"☑️ تـمَّـ - بِفضْلِ اللَّـه - رَفــعُ اللسْتَــة",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
}
# test
if($data == "test"){
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"$gettext",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"reply_markup"=>$getlist
]);
}
# MRTEST
if($data == "MRTEST"){
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"$MRTEST",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
}
# MRTESTMO
if($data == "MRTESTMO"){
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"$MRTEST",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
}
# deleteallms
if($data == "deleteallms"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري حذف جميع المنشورات المنشوره ⛔️",
"message_id"=>$message_id,
]);
bot("sendMessage",[
"chat_id"=>$lista,
"text"=>"🗑 تَمُّ بِفَضْلِ اللَّهِ حُذِفَ جَمِيعَ الْمَنْشُورَاتِ",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
$file = scandir('ms');
for($l=0;$l<count($file);$l++){
$getmes_id = explode("\n", file_get_contents("ms/$file[$l]"));
for($d=0;$d<count($getmes_id);$d++){
$ex = explode("==", $getmes_id[$d]);
$getmes_id1=$ex['1'];
$getids1=$ex['0'];
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getmes_id1");
}
unlink("data/oo".$file[$l]);
unlink("ms/$file[$l]");
}
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"تم حذف المنشورات من جميع القنوات ☑️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
# sendcode
if($data == "sendcode"){
file_put_contents("unll.txt", "okcode");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"ارسل الان الكود لي نشره ⚙️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text != "/staet" and !$data and $unll == "okcode"){
 $get5=bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"جاري نشر الكود انتضر قليلا ⚙️",
"message_id"=>$message_id,
]);
$msg_id = $get5->result->message_id;
file_put_contents("unll.txt","");
include "code/$text/lista.php";
$getfull = file_get_contents("code/$text/txt.txt");
$getls = file_get_contents("code/$text/lista.php");
$gettxt = file_get_contents("code/$text/textlist.txt");
$getfile_id = file_get_contents("code/$text/text.txt");
$sens=file_get_contents("code/$text/tepe_code.txt");
$ss=str_replace("send","",$sens);
file_put_contents("up/".$msg_id."lista.php",$getls);
file_put_contents("up/".$msg_id."textlist.txt",$gettxt);
file_put_contents("up/".$msg_id."txt.txt",$getfull);
file_put_contents("up/".$msg_id."text.txt",$getfile_id);
file_put_contents("up/".$msg_id."tepe_code.txt",$sens);

if($sens=="text"){
for($i=0;$i<count($getids);$i++){
 $get=bot("sendMessage",[
"chat_id"=>$getids[$i],
"text"=>"$gettxt",
'parse_mode'=>Markdown,
'disable_web_page_preview'=>true,
"reply_markup"=>$list
]);
$get_send=$get->result;
if(!is_null($get_send))
{
$msg = $get->result->message_id;
file_put_contents("ms/$msg_id.txt",$getids[$i]."==".$msg."\n", FILE_APPEND);
}}}
else{
for($i=0;$i<count($getids);$i++){
 $get=bot($sens,[
"chat_id"=>$getids[$i],
"$ss"=>"$getfile_id",
'caption'=>"$getfull",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
"reply_markup"=>$list
]);
$get_send=$get->result;
if(!is_null($get_send))
{
$msg = $get->result->message_id;
file_put_contents("ms/$msg_id.txt",$getids[$i]."==".$msg."\n", FILE_APPEND);
}}}

file_put_contents("unll.txt", "");
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"✅ تـمَّـ - بِفضْلِ اللَّـه - نَشْــر اللسْتَــة.",
]);
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"تم نشر الكود بجميع القنوات ⚙️",
"message_id"=>$message_id+1,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حذف الكود",'callback_data'=>"delecode"],['text'=>"رفع الكود",'callback_data'=>"upcode"]]
]])
]);
}
# sendallcode
if($data == "sendallcode"){
file_put_contents("unll.txt", "okallcode");
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"ارسل نعم للتأكيد عزيزي ⚠️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text == "نعم" and !$data and $unll == "okallcode"){

file_put_contents("unll.txt","");

$files = scandir('code');
for($ii=2;$ii<count($files);$ii++){
$text=$files[$ii];

 $get5=bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>$text."\nجاري نشر الكود انتضر قليلا ⚙️",
"message_id"=>$message_id,
]);
$msg_id = $get5->result->message_id;
include "code/$text/lista.php";
$getfull = file_get_contents("code/$text/txt.txt");
$getls = file_get_contents("code/$text/lista.php");
$gettxt = file_get_contents("code/$text/textlist.txt");
$getfile_id = file_get_contents("code/$text/text.txt");
$sens=file_get_contents("code/$text/tepe_code.txt");
$ss=str_replace("send","",$sens);
file_put_contents("up/".$msg_id."lista.php",$getls);
file_put_contents("up/".$msg_id."textlist.txt",$gettxt);
file_put_contents("up/".$msg_id."txt.txt",$getfull);
file_put_contents("up/".$msg_id."text.txt",$getfile_id);
file_put_contents("up/".$msg_id."tepe_code.txt",$sens);

if($sens=="text"){
for($i=0;$i<count($getids);$i++){
 $get=bot("sendMessage",[
"chat_id"=>$getids[$i],
"text"=>"$gettxt",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
"reply_markup"=>$list
]);
$get_send=$get->result;
if(!is_null($get_send))
{
$msg = $get->result->message_id;
file_put_contents("ms/$msg_id.txt",$getids[$i]."==".$msg."\n", FILE_APPEND);
}}
 bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"$gettxt",
'parse_mode'=>Markdown,
'disable_web_page_preview'=>true,
"reply_markup"=>$list
]);
}
else{
for($i=0;$i<count($getids);$i++){
 $get=bot($sens,[
"chat_id"=>$getids[$i],
"$ss"=>"$getfile_id",
'caption'=>"$getfull",
"reply_markup"=>$list
]);
$get_send=$get->result;
if(!is_null($get_send))
{
$msg = $get->result->message_id;
file_put_contents("ms/$msg_id.txt",$getids[$i]."==".$msg."\n", FILE_APPEND);
}}
 bot($sens,[
"chat_id"=>$chat_id,
"$ss"=>"$getfile_id",
'caption'=>"$getfull",
'parse_mode'=>Markdown,
'disable_web_page_preview'=>true,
"reply_markup"=>$list
]);
}
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"تم نشر الكود بجميع القنوات ☑️",
"message_id"=>$msg_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حذف الكود",'callback_data'=>"delecode"]],[['text'=>"رفع الكود",'callback_data'=>"upcode"]]
]])
]);
}}
# delecode
if($data == "delecode"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري حذف الكود انتضر قليلا 🗑",
"message_id"=>$message_id,
]);
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"❎ تـمَّـ - بِفضْلِ اللَّـه - حَـذْفـ اللسْتَـة",
]);
for($d=0;$d<count($getmes_id);$d++){
$ex = explode("==", $getmes_id[$d]);
$getmes_id1=$ex['1'];
$getids1=$ex['0'];
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getmes_id1");
//}
}
$msg_id = $message_id;
unlink("up/".$msg_id."lista.php");
unlink("up/".$msg_id."textlist.txt");
unlink("up/".$msg_id."text.txt");
unlink("up/".$msg_id."tepe_code.txt");
unlink("ms/$message_id.txt");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"تم حذف الكود من جميع القنوات 🗑",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
# upcode
if($data == "upcode"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري رفع الكود انتضر قليلا 🔄",
"message_id"=>$message_id,
]);
unlink("ms/$message_id.txt");

$msg_id = $message_id;

include "up/".$msg_id."lista.php";

$gettxt = file_get_contents("up/".$msg_id."textlist.txt");

$getfile_id = file_get_contents("up/".$msg_id."text.txt");

$getfull = file_get_contents("up/".$msg_id."txt.txt");

$sens=file_get_contents("up/".$msg_id."tepe_code.txt");

$ss=str_replace("send","",$sens);

for($d=0;$d<count($getmes_id);$d++){
$ex = explode("==", $getmes_id[$d]);
$getmes_id1=$ex['1'];
$getids1=$ex['0'];

file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getmes_id1");
if($sens=="text")
{
 $get=bot("sendMessage",[
"chat_id"=>$getids1,
"text"=>"$gettxt",
'parse_mode'=>Markdown,
'disable_web_page_preview'=>true,
"reply_markup"=>$list
]);
$get_send=$get->result;
if(!is_null($get_send))
{
$msg = $get->result->message_id;
file_put_contents("ms/$message_id.txt",$getids1."==".$msg."\n", FILE_APPEND);
}}
else{
 $get=bot($sens,[
"chat_id"=>$getids1,
"$ss"=>"$getfile_id",
'caption'=>"$getfull",
'parse_mode'=>Markdown,
'disable_web_page_preview'=>true,
"reply_markup"=>$list
]);
$get_send=$get->result;
if(!is_null($get_send))
{
$msg = $get->result->message_id;
file_put_contents("ms/$message_id.txt",$getids1."==".$msg."\n", FILE_APPEND);
}}}
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"☑️ تـمَّـ - بِفضْلِ اللَّـه - رَفــعُ اللسْتَــة",
]);
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"تم رفع الكود بجميع القنوات ☑️",
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حذف الكود",'callback_data'=>"delecode"],['text'=>"رفع الكود",'callback_data'=>"upcode"]],
]])
]);
}
# sendlink
if($data == "sendlink"){
file_put_contents("unll.txt", "oklink");
bot("editmessagetext",[
'chat_id'=>$chat_id, 
'text'=>"ارسل الان المنشور ياصديقي ‼️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text and !$data and $unll == "oklink"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"جاري نشر المنشور انتضر قليلا ☑️",
]);
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"$text",
'parse_mode'=>MarkDown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id+1,
]);
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"✅ تـمَّـ - بِفضْلِ اللَّـه - نَشْــر اللسْتَــة.",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
$msg = $message_id+1;
file_put_contents("data/oo".$msg.".txt",$text);
for($i=0;$i<count($getids);$i++){

$get =bot('SendMessage', [
'chat_id' => $getids[$i],
'text'=>$text,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true
]);
$msg_id = $get->result->message_id;
file_put_contents("ms/$msg.txt",$getids[$i]."==". $msg_id."\n", FILE_APPEND);
}
file_put_contents("unll.txt", "");
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"$text",
'parse_mode'=>MarkDown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id+1,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حذف المنشور",'callback_data'=>"delelink"],['text'=>"رفع المنشور",'callback_data'=>"uplink"]],
]])
]);
}
# delelink
if($data == "delelink"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري حذف المنشور انتضر قليلا 🗑",
"message_id"=>$message_id,
]);
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"❎ تـمَّـ - بِفضْلِ اللَّـه - حَـذْفـ اللسْتَـة",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
for($d=0;$d<count($getmes_id);$d++){
$ex = explode("==", $getmes_id[$d]);
$getmes_id1=$ex['1'];
$getids1=$ex['0'];
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getmes_id1");
}
unlink("data/oo".$message_id.".txt");
unlink("ms/$message_id.txt");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"تم حذف المنشور من جميع القنوات ☑️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "uplink"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري رفع المنشور انتضر قليلا 🔄",
"message_id"=>$message_id,
]);
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"☑️ تـمَّـ - بِفضْلِ اللَّـه - رَفــعُ اللسْتَــة",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
$text=file_get_contents("data/oo".$message_id.".txt");
unlink("ms/$message_id.txt");
for($d=0;$d<count($getmes_id);$d++){
$ex = explode("==", $getmes_id[$d]);
$getmes_id1=$ex['1'];
$getids1=$ex['0'];
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getmes_id1");
$get =bot('SendMessage', [
'chat_id' => $getids1,
'text'=>$text,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true
 
]);
$msg_id = $get->result->message_id;
file_put_contents("ms/$message_id.txt",$getids1."==". $msg_id."\n", FILE_APPEND);
}

bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"$text",
'parse_mode'=>MarkDown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حذف المنشور",'callback_data'=>"delelink"],['text'=>"رفع المنشور",'callback_data'=>"uplink"]],
]])
]);
}
# sendfwd
if($data == "sendfwd"){
file_put_contents("unll.txt", "okfwd");
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"ارسل الان المنشور الذي تريد  اعاده توجيهه ياصديقي ‼️",
"message_id"=>$message_id,
]);
}

if(!$data and $unll == "okfwd"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"جاري توجيه المنشور انتضر قليلا 🌀",
]);
$msg = $message_id+1;
file_put_contents("data/oo".$msg.".txt",$text);
for($i=0;$i<count($getids);$i++){

$get=bot('ForwardMessage',[
	'chat_id'=>$getids[$i],
	'from_chat_id'=>$chat_id,
	'message_id'=>$message_id
	]);
$msg_id = $get->result->message_id;
file_put_contents("ms/$msg.txt",$getids[$i]."==". $msg_id."\n", FILE_APPEND);
}
file_put_contents("unll.txt", "");

bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"تم التوجيه لهذا المنشور ✅",
'parse_mode'=>html,
'disable_web_page_preview'=>true,
"message_id"=>$message_id+1,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حذف التوجيه",'callback_data'=>"delelink"],['text'=>"رفع التوجيه",'callback_data'=>"upfwd"]],
]])
]);
}
if($data == "upfwd"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري رفع التوجيه انتضر قليلا 🔄",
"message_id"=>$message_id,
]);
$text=file_get_contents("data/oo".$message_id.".txt");
unlink("ms/$message_id.txt");
for($d=0;$d<count($getmes_id);$d++){
$ex = explode("==", $getmes_id[$d]);
$getmes_id1=$ex['1'];
$getids1=$ex['0'];
$get=bot('ForwardMessage',[
	'chat_id'=>$getids1,
	'from_chat_id'=>$getids1,
	'message_id'=>$getmes_id1
	]);
$msg_id = $get->result->message_id;
file_put_contents("ms/$message_id.txt",$getids1."==". $msg_id."\n", FILE_APPEND);
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getmes_id1");
}

bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"تم رفع التوجيه 🔄",
'parse_mode'=>html,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حذف التوجيه",'callback_data'=>"delelink"],['text'=>"رفع التوجيه",'callback_data'=>"upfwd"]],
]])
]);
}
# sendhtml
if($data == "sendhtml"){
file_put_contents("unll.txt", "okhtml");
bot("editmessagetext",[
'chat_id'=>$chat_id, 
'text'=>"ارسل الان المنشور ياصديقي ‼️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text and !$data and $unll == "okhtml"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"جاري نشر المنشور انتضر قليلا ⚠️",
]);
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"✅ تـمَّـ - بِفضْلِ اللَّـه - نَشْــر اللسْتَــة.",
]);
$msg = $message_id+1;
file_put_contents("data/oo".$msg.".txt",$text);
for($i=0;$i<count($getids);$i++){

$get =bot('SendMessage', [
'chat_id' => $getids[$i],
'text'=>$text,
'parse_mode'=>"html",
'disable_web_page_preview'=>true
]);
$msg_id = $get->result->message_id;
file_put_contents("ms/$msg.txt",$getids[$i]."==". $msg_id."\n", FILE_APPEND);
}
file_put_contents("unll.txt", "");
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"$text",
'parse_mode'=>html,
'disable_web_page_preview'=>true,
"message_id"=>$message_id+1,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حذف المنشور",'callback_data'=>"delelink"],['text'=>"رفع المنشو",'callback_data'=>"uphtml"]],
]])
]);
}
if($data == "uphtml"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري رفع المنشور انتضر قليلا 🔄",
"message_id"=>$message_id,
]);
$text=file_get_contents("data/oo".$message_id.".txt");
unlink("ms/$message_id.txt");
for($d=0;$d<count($getmes_id);$d++){
$ex = explode("==", $getmes_id[$d]);
$getmes_id1=$ex['1'];
$getids1=$ex['0'];
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getmes_id1");
$get =bot('SendMessage', [
'chat_id' => $getids1,
'text'=>$text,
'parse_mode'=>"html",
'disable_web_page_preview'=>true
]);
$msg_id = $get->result->message_id;
file_put_contents("ms/$message_id.txt",$getids1."==". $msg_id."\n", FILE_APPEND);
}
bot("sendMessage",[
"chat_id"=>-1001130606880,
"text"=>"☑️ تـمَّـ - بِفضْلِ اللَّـه - رَفــعُ اللسْتَــة",
]);
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"$text",
'parse_mode'=>html,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حذف المنشور",'callback_data'=>"delelink"],['text'=>"رفع المنشور",'callback_data'=>"uphtml"]],
]])
]);
}
# res
if($data == "res"){
file_put_contents("data/yeslist.txt", "");
file_put_contents("data/lista.php", '<?php'."\n".'$getlist = json_encode(['."\n".'"inline_keyboard"=>['."\n");
file_put_contents("data/nolist.txt", "");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"⏱ جاري فحص القنوات
وتحويل لستة لي شفاف.",
"message_id"=>$message_id,
]);
for($i=0;$i<count($getids);$i++){
$ok = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChatAdministrators?chat_id=$getids[$i]"))->ok;
if($ok == 1){
$json1 = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$getids[$i]"))->result;
$user1 = $json1->username; 
$userl = "@".$user1." - ";
$name1 = $json1->title; 
 $name1=str_replace("'","",$name1);
$name1=str_replace('"','',$name1);
file_put_contents("data/yeslist.txt", "$userl", FILE_APPEND);
file_put_contents("data/lista.php", "\n".'[["text"=>"'.$EMLST.$name1.$ESLST.'", "url"=>"https://t.me/'.$user1.'"]],', FILE_APPEND);
}
if($ok != 1){
$json2 = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$getids[$i]"))->result;
$user2 = $json2->username; 
$useri = "@".$user2." - ";
file_put_contents("data/nolist.txt", "$useri", FILE_APPEND);
}
}
$yes = file_get_contents("data/yeslist.txt");
$no = file_get_contents("data/nolist.txt");
file_put_contents("data/lista.php", "\n[['text'=>'للأشتراك', 'url'=>'https://t.me/MrDGBOTS']]\n]]);", FILE_APPEND);
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"ℓ🌀- القنوات المشاركة\n➖➖\n".$yes."\n➖➖\nℓ⛔️- القنوات المخالفة\n➖➖\n".$no."\n➖➖\nℓ⚙️- نوع لستة شفاف",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
# MRMOR
if($data == "MRMOR"){
file_put_contents("data/yeslist.txt", "");
file_put_contents("data/nolist.txt", "");
file_put_contents("data/MRTEST.txt", "$RALST\n");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"⏱ جاري فحص القنوات
وتحويل لستة لي معرفات.",
"message_id"=>$message_id,
]);
for($i=0;$i<count($getids);$i++){
$ok = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChatAdministrators?chat_id=$getids[$i]"))->ok;
if($ok == 1){
$json1 = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$getids[$i]"))->result;
$user1 = $json1->username; 
$userl = "@".$user1." - ";
$name1 = $json1->title; 
 $name1=str_replace("'","",$name1);
$name1=str_replace('"','',$name1);
file_put_contents("data/yeslist.txt", "$userl", FILE_APPEND);
file_put_contents("data/MRTEST.txt", "\n$EMLST $name1\n$ESLST @$user1\n$FASLST", FILE_APPEND);}
if($ok != 1){
$json2 = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$getids[$i]"))->result;
$user2 = $json2->username; 
$useri = "@".$user2." - ";
file_put_contents("data/nolist.txt", "$useri", FILE_APPEND);
}
}
$yes = file_get_contents("data/yeslist.txt");
$no = file_get_contents("data/nolist.txt");
file_put_contents("data/MRTEST.txt", "\n$ASLST", FILE_APPEND);
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"ℓ🌀- القنوات المشاركة\n➖➖\n".$yes."\n➖➖\nℓ⛔️- القنوات المخالفة\n➖➖\n".$no."\n➖➖\nℓ⚙️- نوع لستة معرفات",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}}
# MRMRK
if($data == "MRMRK"){
file_put_contents("data/yeslist.txt", "");
file_put_contents("data/nolist.txt", "");
file_put_contents("data/MRTEST.txt", "$RALST\n");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"⏱ جاري فحص القنوات
وتحويل لستة لي ماركدون.",
"message_id"=>$message_id,
]);
for($i=0;$i<count($getids);$i++){
$ok = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChatAdministrators?chat_id=$getids[$i]"))->ok;
if($ok == 1){
$json1 = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$getids[$i]"))->result;
$user1 = $json1->username; 
$userl = "@".$user1." - ";
$name1 = $json1->title; 
 $name1=str_replace("'","",$name1);
$name1=str_replace('"','',$name1);
file_put_contents("data/yeslist.txt", "$userl", FILE_APPEND);
file_put_contents("data/MRTEST.txt", "\n$EMLST [$name1](t.me/$user1)\n $ESLST [@$user1](t.me/$user1)\n$FASLST", FILE_APPEND);}
if($ok != 1){
$json2 = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$getids[$i]"))->result;
$user2 = $json2->username; 
$useri = "@".$user2." - ";
file_put_contents("data/nolist.txt", "$useri", FILE_APPEND);
}
}
$yes = file_get_contents("data/yeslist.txt");
$no = file_get_contents("data/nolist.txt");
file_put_contents("data/MRTEST.txt", "\n$ASLST", FILE_APPEND);
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"ℓ🌀- القنوات المشاركة\n➖➖\n".$yes."\n➖➖\nℓ⛔️- القنوات المخالفة\n➖➖\n".$no."\n➖➖\nℓ⚙️- نوع لستة ماركدون",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
# add
if($data == "add"){
file_put_contents("unll.txt", "add");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"ارسل الان معرف القناة ‼️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}

if($text and !$data and $unll == "add" ){
$json = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->id;
if(!in_array($json, $getids)){
file_put_contents("data/ids.txt", "$json\n", FILE_APPEND);
file_put_contents("unll.txt", "");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"تم اضافة القناة بنجاح ✅",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}else
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"القناة مشاركة بتأكيد عزيزي ⚠️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "dele"){
file_put_contents("unll.txt", "dele");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"ارسل الان معرف القناة ‼️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text and !$data and $unll == "dele"){
$json = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->id;
$i = file_get_contents("data/ids.txt");
$i = str_replace($json, ' ', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('data/ids.txt', $i);
file_put_contents("unll.txt", "");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"تم حذف القناة بنجاح ⛔️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "delech"){
file_put_contents("data/ids.txt", "");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"تم حذف جميع القنوات 🗑",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "ban"){
file_put_contents("unll.txt", "ban");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"ارسل الان معرف القناة ⛔️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text and !$data and $unll == "ban" ){
$json = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->id;
$i = file_get_contents("data/ids.txt");
$i = str_replace($json, ' ', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('data/ids.txt', $i);
file_put_contents("data/ban.txt", "$json\n", FILE_APPEND);
file_put_contents("unll.txt", "ban");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"تم حظر القناة ❌",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "unban"){
file_put_contents("unll.txt", "unban");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"ارسل الان معرف القناة 🌀",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text and !$data and $unll == "unban"){
$json = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->id;
$i = file_get_contents("data/ban.txt");
$i = str_replace($json, ' ', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('data/ban.txt', $i);
file_put_contents("data/ids.txt", "$json\n", FILE_APPEND);
file_put_contents("unll.txt", "");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"تم رفع الحظر القناة ✅",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "listban"){
file_put_contents("data/banall.txt", "");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري فحص القنوات ⚠️",
"message_id"=>$message_id,
]);
for($i=0;$i<count($getban);$i++){
$json1 = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$getban[$i]"))->result;
$user1 = $json1->username; 
$userl = "@".$user1." - "; 
file_put_contents("data/banall.txt", "$userl", FILE_APPEND);
}
$banall = file_get_contents("data/banall.txt");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"ℓ❌- القنوات المحظورة\n➖➖\n".$banall,
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "editstart"){
file_put_contents("unll.txt", "setstart");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"ارسل الترحيب الذي تريد وضعه 📃",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text and !$data and $unll == "setstart"){
file_put_contents("data/start.txt", "$text");
file_put_contents("unll.txt", "");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"تم تعديل الرسالة الترحيب ☑️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "editlist"){
file_put_contents("unll.txt", "setlist");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"ارسل الكليشة رئس الستة ‼️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text and !$data and $unll == "setlist"){
file_put_contents("data/text.txt", "$text");
file_put_contents("unll.txt", "");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"تم وضع رئس الى الستة ✅",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
# RALST
if($data == "RALST"){
file_put_contents("unll.txt", "RALST");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"ارسل الكليشة رئس الستة ⚠️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text and !$data and $unll == "RALST"){
file_put_contents("data/RALST.txt", "$text");
file_put_contents("unll.txt", "");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"تم وضع رئس اعلى الستة ✔️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
# ASLST
if($data == "ASLST"){
file_put_contents("unll.txt", "ASLST");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"ارسل الكليشة اسفل الستة ⚠️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text and !$data and $unll == "ASLST"){
file_put_contents("data/ASLST.txt", "$text");
file_put_contents("unll.txt", "");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"تم وضع كليشة اسفل الستة ✔️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
# EMLST
if($data == "EMLST"){
file_put_contents("unll.txt", "EMLST");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"ارسل يمن الستة الأن ⚠️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text and !$data and $unll == "EMLST"){
file_put_contents("data/EMLST.txt", "$text");
file_put_contents("unll.txt", "");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"تم حفظ يمين الستة ✔️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
# ESLST
if($data == "ESLST"){
file_put_contents("unll.txt", "ESLST");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"ارسل يسار الستة الأن ⚠️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text and !$data and $unll == "ESLST"){
file_put_contents("data/ESLST.txt", "$text");
file_put_contents("unll.txt", "");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"تم حفظ يسار الستة ✔️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
# FASLST
if($data == "FASLST"){
file_put_contents("unll.txt", "FASLST");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"ارسل فاصل الستة الأن ⚠️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text and !$data and $unll == "FASLST"){
file_put_contents("data/FASLST.txt", "$text");
file_put_contents("unll.txt", "");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"تم حفظ فاصل الستة ✔️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
# DELZH
if($data == "DELZH"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري حذف الزخرفة الأن ⏱",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
file_put_contents("data/EMLST.txt", "");
file_put_contents("data/ESLST.txt", "");
file_put_contents("data/FASLST.txt", "");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>" تم حذف الزخرفة يمين لستة
ويسار لستة وفاصل لستة  ✔️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
# AHSLST
$get = file_get_contents('data/ban.txt');
$ex = explode("\n",$get);
$bamem = count($ex);
$get = file_get_contents('data/ids.txt');
$ex = explode("\n",$get);
$chmem = count($ex);

if($data == "AHSLST"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري عمل احصائيات ⏱",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
bot('SendMessage',[
'chat_id'=>-1001130606880,    
 'text'=>"
[أحْصُائياُت](t.me/MrDGFMBOT) الْقَنَوَاتَ ✔️

📊 { $chmem } عُدِّدَ الْقَنَوَاتُ [الْمُشَارِكَةُ](t.me/MrDGFMBOT).
❌ { $bamem } عُدِّدَ الْقَنَوَاتُ [الْمَحْظُورَةُ](t.me/MrDGFMBOT).
",
'disable_web_page_preview'=>'true',
'parse_mode'=>"MarkDown",
]);
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"تم ارسال احصائيات للقروب  ✔️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
# resfull
if($data == "resfull"){
file_put_contents("data/banall.txt", "");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري حذف الملفات المؤقته انتضر قليلاً 🗑",
"message_id"=>$message_id,
]);
$files = scandir('code');
$file = scandir('start');
for($l=0;$l<count($file);$l++){
unlink("start/$file[$l]");
for($i=0;$i<count($files);$i++){
unlink("code/$files[$i]/tepe_code.txt");
unlink("code/$files[$i]/code.php");
unlink("code/$files[$i]/lista.php");
unlink("code/$files[$i]/file_id.txt");
unlink("code/$files[$i]/textlist.txt");
unlink("code/$files[$i]/text.txt");
unlink("code/$files[$i]/txt.txt");
Rmdir("code/$files[$i]");
unlink("mark/$files[$i]");
unlink("data/nolist.txt");
unlink("data/yeslist.txt");
unlink("data/banall.txt");
unlink("data/lista.php");
}
}
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"لقد حذف جميع ملفات الغير هامة ☑️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
# commands member
$ba = json_encode(['inline_keyboard'=>[[['text'=>"الصفحة الرئيسية",'callback_data'=>"ba"]],]]);
$start = file_get_contents("start/l$from_id.txt");
if($data == "ba"){
file_put_contents("start/l$from_id.txt", "");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>$getstart."\n\nصنع كود ماركداون - انلاين 🔖",
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"صنع منشور",'callback_data'=>"start"]],
]])
]);
}

$chat_id = $msg->chat->id;
if($chat_id==$mang)
{
file_put_contents("start/l$from_id.txt", "add");
 $txtrep=str_replace("\n"," ",$text);
     $txtrep=str_replace("  "," ",$txtrep);
  $texts = explode(" ",$txtrep);
for($h=0;$h<7; $h++){
if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$texts[$h])  )
{
$text=trim($texts[$h]);
}
}
if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$text)  )
{
$ok = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChatMemberscount?chat_id=$text"))->result;
$admins = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChatAdministrators?chat_id=$text"))->ok;
$ch_id = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->id;
#-
$get_asbahi = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"));
$name_chat=$get_asbahi->result->title;
$username_chat=$get_asbahi->result->username;
#-
if($text and !$data and $start == "add" and $ok > $users[0] and $admins == 1 and !in_array($ch_id, $getids) and !in_array($ch_id, $getban)){
file_put_contents("data/ids.txt", "$ch_id\n", FILE_APPEND);
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"
[$name](tg://user?id=$from_id) 
تَمَّ اضافة الْقَنَاةَ بِنجَاحِ ✅
",
'reply_to_message_id'=>$message_id,
'disable_web_page_preview'=>'true',
'parse_mode'=>"markdown",
]);}

if($text and !$data and $start == "add" and $ok > $users[0] and $admins != 1 and !in_array($ch_id, $getban)){
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"
[$name](tg://user?id=$from_id)
⚠️ قنَاتُكَ لَمـ تُضَافـ !
 أضِفـ البُوتـ ".$hadll." إدَارِي بِقنَاتُك ثُمَّ
 ↩️ أعِد إرسَال قَناتُك كَمَـا فِـي الرِسَالـة التَالِـيـ⬇️ـه .",
 'reply_to_message_id'=>$message_id,
'disable_web_page_preview'=>'true',
'parse_mode'=>"markdown",
]);
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"$name_chat @$username_chat",
]);}

if($text and !$data and $start == "add" and $ok > $users[0] and $admins == 1 and in_array($ch_id, $getids) and in_array($json, $getban)){
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"
[$name](tg://user?id=$from_id)
قنَاتُكَ مُضَافَةُ وَتَمُّ تَحْدِيثِهَا ☑️
- - -
$name_chat\n@$username_chat",
'reply_to_message_id'=>$message_id,
'disable_web_page_preview'=>'true',
'parse_mode'=>"markdown",
]);}

if($text and !$data and $start == "add" and $ok < $users[0] and !in_array($ch_id, $getban) and !in_array($ch_id, $getids)){
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"
[$name](tg://user?id=$from_id)
⚠️ | المَعذِرة عَدد مُشتركي قناتك أقلّ من ".$hadlll,
'reply_to_message_id'=>$message_id,
'disable_web_page_preview'=>'true',
'parse_mode'=>"markdown",
]);}

if($text and !$data and $start == "add" and $ok > $users[0] and in_array($ch_id, $getban)){
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"
[$name](tg://user?id=$from_id)
⚠️ | المَعذِرة قناتك قامَت بمُخالفة شُروط الِسـتـة وتـ⁉️ـم حَظرُها .
♻️ راسِـل مُدير الِسـتـة إِن كَانـ لَديكَ أي سُـؤال ".$hadl,
'reply_to_message_id'=>$message_id,
'disable_web_page_preview'=>'true',
'parse_mode'=>"markdown",
]);
}}}
# start
if($data == "start"){
$countsend = file_get_contents("data/countsend.txt");
$countsend1=$countsend+1;
 file_put_contents("data/countsend.txt",$countsend1);
mkdir("code/$countsend1");
file_put_contents("start/l$from_id.txt", "code");
file_put_contents("code/$countsend1/lista.php", "");
file_put_contents("code/$countsend1/code.php", "");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"
لان يمكنك ارسال احد الميديا 🔢
💞- صوره ، فديو ، بصمه ، ملف ،
📩- صوره متحركه , mp3  
🔖- ويمكنك ارسال نص .
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
$lllll = "الان ارسل دكم الكيبورد\n دكمة جوه دكمة كـ مثال\n\nHi = t.me/MrDGSY\nHello = t.me/MrDGSY\n\nدكمة بصف دكمة كـ مثال\n\nHi = t.me/MrDGSY + Hello = t.me/MrDGSY\n\n📮- CH - @MrDGBOTS";
$countsend1 = file_get_contents("data/countsend.txt");
if($text and !$data and $start == "code"){
file_put_contents("code/$countsend1/tepe_code.txt","text");
file_put_contents("code/$countsend1/code.php", '<?php'."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "results"=>json_encode([[ "type"=>"article", "id"=>base64_encode(rand(5,555)), "title"=>"ارسال الكليشة 💌", "input_message_content"=>[ "message_text"=>"'.$text.'"], "parse_mode"=>html, "disable_web_page_preview"=>true, "reply_markup"=>[
"inline_keyboard"=>['."\n");
file_put_contents("start/l$from_id.txt", "gooo");
file_put_contents("code/$countsend1/textlist.txt", $text);
bot('sendmessage',[
'chat_id'=>$chat_id, 
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
'text'=>$lllll
]);
}
if($update->message->photo and !$data and $start == "code"){
file_put_contents("code/$countsend1/tepe_code.txt","sendphoto");
$file_id = $update->message->photo[1]->file_id;
file_put_contents("code/$countsend1/code.php", '<?php'."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "cache_time"=>"'.$message_id.'", "results"=>json_encode([[ "type"=>"photo", "id"=>base64_encode(rand(5,555)), "photo_url"=>"'.$file_id.'", "thumb_url"=>"'.$file_id.'", "caption"=>"'.$txt.'", "reply_markup"=>[ "inline_keyboard"=>['."\n");
file_put_contents("code/$countsend1/text.txt", $file_id);
file_put_contents("code/$countsend1/txt.txt", $txt);
file_put_contents("start/l$from_id.txt", "gooo");
bot('sendmessage',[
'chat_id'=>$chat_id, 
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
'text'=>$lllll
]);
}
if($update->message->document and !$data and $start == "code"){
file_put_contents("code/$countsend1/tepe_code.txt","senddocument");
$file_id = $update->message->document->file_id;
file_put_contents("code/$countsend1/code.php", '<?php'."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "cache_time"=>"'.$message_id.'", "results"=>json_encode([[ "type"=>"gif", "id"=>base64_encode(rand(5,555)), "gif_url"=>"'.$file_id.'", "thumb_url"=>"'.$file_id.'", "caption"=>"'.$txt.'", "reply_markup"=>[ "inline_keyboard"=>['."\n");
file_put_contents("code/$countsend1/text.txt", $file_id);
file_put_contents("code/$countsend1/txt.txt", $txt);
file_put_contents("start/l$from_id.txt", "gooo");
bot('sendmessage',[
'chat_id'=>$chat_id, 
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
'text'=>$lllll
]);
}
if($update->message->sticker and !$data and $start == "code"){
file_put_contents("code/$countsend1/tepe_code.txt","sendsticker");
$file_id = $update->message->sticker->file_id;
file_put_contents("code/$countsend1/code.php", '<?php'."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "cache_time"=>"'.$message_id.'", "results"=>json_encode([[ "type"=>"sticker", "id"=>base64_encode(rand(5,555)), "sticker_file_id"=>"'.$file_id.'", "thumb_url"=>"'.$file_id.'", "caption"=>"'.$txt.'", "reply_markup"=>[ "inline_keyboard"=>['."\n");
file_put_contents("code/$countsend1/text.txt", $file_id);
file_put_contents("code/$countsend1/txt.txt", $txt);
file_put_contents("start/l$from_id.txt", "gooo");
bot('sendmessage',[
'chat_id'=>$chat_id, 
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
'text'=>$lllll
]);
}
if($update->message->voice and !$data and $start == "code"){
file_put_contents("code/$countsend1/tepe_code.txt","sendvoice");
$file_id = $update->message->voice->file_id;
file_put_contents("code/$countsend1/code.php", '<?php'."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "cache_time"=>"'.$message_id.'", "results"=>json_encode([[ "type"=>"voice", "id"=>base64_encode(rand(5,555)), "voice_file_id"=>"'.$file_id.'", "thumb_url"=>"'.$file_id.'", "caption"=>"'.$txt.'", "reply_markup"=>[ "inline_keyboard"=>['."\n");
file_put_contents("code/$countsend1/text.txt", $file_id);
file_put_contents("code/$countsend1/txt.txt", $txt);
file_put_contents("start/l$from_id.txt", "gooo");
bot('sendmessage',[
'chat_id'=>$chat_id, 
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
'text'=>$lllll
]);
}
if($update->message->audio and !$data and $start == "code"){
file_put_contents("code/$countsend1/tepe_code.txt","sendaudio");
$file_id = $update->message->audio->file_id;
file_put_contents("code/$countsend1/code.php", '<?php'."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "cache_time"=>"'.$message_id.'", "results"=>json_encode([[ "type"=>"audio", "id"=>base64_encode(rand(5,555)), "audio_file_id"=>"'.$file_id.'", "thumb_url"=>"'.$file_id.'", "caption"=>"'.$txt.'", "reply_markup"=>[ "inline_keyboard"=>['."\n");
file_put_contents("code/$countsend1/text.txt", $file_id);
file_put_contents("code/$countsend1/txt.txt", $txt);
file_put_contents("start/l$from_id.txt", "gooo");
bot('sendmessage',[
'chat_id'=>$chat_id, 
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
'text'=>$lllll
]);
}
if($update->message->video and !$data and $start == "code"){
file_put_contents("code/$countsend1/tepe_code.txt","sendvideo");
$file_id = $update->message->video->file_id;
file_put_contents("code/$countsend1/code.php", '<?php'."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "cache_time"=>"'.$message_id.'", "results"=>json_encode([[ "type"=>"video", "id"=>base64_encode(rand(5,555)), "video_file_id"=>"'.$file_id.'", "thumb_url"=>"'.$file_id.'", "caption"=>"'.$txt.'", "reply_markup"=>[ "inline_keyboard"=>['."\n");
file_put_contents("code/$countsend1/text.txt", $file_id);
file_put_contents("code/$countsend1/txt.txt", $txt);
file_put_contents("start/l$from_id.txt", "gooo");
bot('sendmessage',[
'chat_id'=>$chat_id, 
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
'text'=>$lllll
]);
}

if($text != "/start" and !$data and $start == "gooo"){
$ex = explode("\n", $text);
# code
$getfull = file_get_contents("code/$countsend1/txt.txt");
$gettxt = file_get_contents("code/$countsend1/textlist.txt");
$getfile_id = file_get_contents("code/$countsend1/text.txt");
file_put_contents("code/$countsend1/lista.php", '<?php'."\n".'$list = json_encode(['."\n".'"inline_keyboard"=>['."\n");

for($i=0;$i<count($ex);$i++){
$h = explode("\n", $text);
$ooo = str_replace("http://", "", $h[$i]);
$oo = str_replace("https://", "", $ooo);
$o = str_replace("+ ", "\n", $oo);
$u = explode("\n", $o);
$n = count($u);

if(preg_match("/^(.*) = (.*)/", $o, $ch) and $n == 1){
file_put_contents("code/$countsend1/lista.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"]],', FILE_APPEND);
file_put_contents("code/$countsend1/code.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"]],', FILE_APPEND);
}
if(preg_match("/^(.*) = (.*)\n(.*) = (.*)/", $o, $ch) and $n == 2){
file_put_contents("code/$countsend1/lista.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"]],', FILE_APPEND);
file_put_contents("code/$countsend1/code.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"]],', FILE_APPEND);
}
if(preg_match("/^(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)/", $o, $ch) and $n == 3){
file_put_contents("code/$countsend1/lista.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"]],', FILE_APPEND);
file_put_contents("code/$countsend1/code.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"]],', FILE_APPEND);
}
if(preg_match("/^(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)/", $o, $ch) and $n == 4){
file_put_contents("code/$countsend1/lista.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"]],', FILE_APPEND);
file_put_contents("code/$countsend1/code.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"]],', FILE_APPEND);
}
if(preg_match("/^(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)/", $o, $ch) and $n == 5){
file_put_contents("code/$countsend1/lista.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"],["text"=>"'.$ch[9].'", "url"=>"'.$ch[10].'"]],', FILE_APPEND);
file_put_contents("code/$countsend1/code.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"],["text"=>"'.$ch[9].'", "url"=>"'.$ch[10].'"]],', FILE_APPEND);
}
if(preg_match("/^(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)/", $o, $ch) and $n == 6){
file_put_contents("code/$countsend1/lista.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"],["text"=>"'.$ch[9].'", "url"=>"'.$ch[10].'"],["text"=>"'.$ch[11].'", "url"=>"'.$ch[12].'"]],', FILE_APPEND);
file_put_contents("code/$countsend1/code.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"],["text"=>"'.$ch[9].'", "url"=>"'.$ch[10].'"],["text"=>"'.$ch[11].'", "url"=>"'.$ch[12].'"]],', FILE_APPEND);
}
if(preg_match("/^(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)/", $o, $ch) and $n == 7){
file_put_contents("code/$countsend1/lista.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"],["text"=>"'.$ch[9].'", "url"=>"'.$ch[10].'"],["text"=>"'.$ch[11].'", "url"=>"'.$ch[12].'"],["text"=>"'.$ch[13].'", "url"=>"'.$ch[14].'"]],', FILE_APPEND);
file_put_contents("code/$countsend1/code.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"],["text"=>"'.$ch[9].'", "url"=>"'.$ch[10].'"],["text"=>"'.$ch[11].'", "url"=>"'.$ch[12].'"],["text"=>"'.$ch[13].'", "url"=>"'.$ch[14].'"]],', FILE_APPEND);
}
if(preg_match("/^(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)/", $o, $ch) and $n == 8){
file_put_contents("code/$countsend1/lista.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"],["text"=>"'.$ch[9].'", "url"=>"'.$ch[10].'"],["text"=>"'.$ch[11].'", "url"=>"'.$ch[12].'"],["text"=>"'.$ch[13].'", "url"=>"'.$ch[14].'"],["text"=>"'.$ch[15].'", "url"=>"'.$ch[16].'"]],', FILE_APPEND);
file_put_contents("code/$countsend1/code.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"],["text"=>"'.$ch[9].'", "url"=>"'.$ch[10].'"],["text"=>"'.$ch[11].'", "url"=>"'.$ch[12].'"],["text"=>"'.$ch[13].'", "url"=>"'.$ch[14].'"],["text"=>"'.$ch[15].'", "url"=>"'.$ch[16].'"]],', FILE_APPEND);
}
}
file_put_contents("start/l$from_id.txt", "");
file_put_contents("code/$countsend1/lista.php", "\n".']]);', FILE_APPEND);
file_put_contents("code/$countsend1/code.php", "\n".']]]])]);', FILE_APPEND);

include "code/$countsend1/lista.php";
$sens=file_get_contents("code/$countsend1/tepe_code.txt");
$ss=str_replace("send","",$sens);
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"$gettxt",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"reply_markup"=>$list
]);
bot($sens,[
"chat_id"=>$chat_id,
"$ss"=>"$getfile_id",
'caption'=>"$getfull",
"reply_markup"=>$list
]);

bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"`@ECMRBOT $countsend1`",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"صنع منشور",'callback_data'=>"start"],['text'=>'شارك المنشور', 'switch_inline_query'=>"$from_id"]],
]])
]);	
}

if($text == '/start'){
bot('SendMessage',[
'chat_id'=>$from_id,
'reply_to_message_id'=>$message_id,
'text'=>"$START",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"♻️- Channel -♻️", 'url'=>"t.me/joinchat/AAAAAEPaLXggbIUH9jlMEw"]
],
]
])
]);
}
# delete-Fwd
include "ID-MRDG.php";

function message($chat_id, $text, $message_id){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'reply_to_message_id'=>$message_id,
]);
}

if($msg->forward_from_chat and in_array($from_id, $sudo)){
bot('deleteMessage',[
'chat_id'=>$msg->forward_from_chat->id,
'message_id'=>$msg->forward_from_message_id,
]);
message($chat_id, "تم مسح الرسالة من القناة ✅", $message_id);
}
# GP-SMS
$lista = -1001130606880; #IDBP
# SR
if($text == "/sr" and in_array($chat_id, $sudo)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"جاري ارسال رسالة الشروط للقروب 📃",
]);
bot('sendMessage',[
'chat_id'=>$lista,
'text'=>'
[لي قبول قناتك اتبع الشروط..‼️](http://t.me/MrDGFMBOT)
-
1️⃣-ان تكون قناتك محافظة
2️⃣-ان تكون خالية من صور النساء
3️⃣-ان تكون خالية من الأغاني
4️⃣-ان تكون خالية من لستات مخالفة
-
[استقبال قنوات مفتوح..✅](http://t.me/MrDGFMBOT)',
'disable_web_page_preview'=>'true',
'parse_mode'=>"MarkDown",
]);
} 
# GO
if($text == "/go" && in_array($from_id, $sudo)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"جاري ارسال رسالة استقبال للقروب ✅",
]);
bot('sendMessage',[
'chat_id'=>$lista,
'text'=>'َ
[لستات إبداع للقنوات المحافظة 🌹](http://t.me/MrDGBOTS)
-
[اِسْتِقْبَالُ الْقَنَوَاتِ مَفْتُوحَ ✅](http://t.me/MrDGBOTS)
-
للأشتراك بل لستة ..😇
يرجا ارسال قناتك علا شكل تالي
-
[عالم البوتات 🙈](http://t.me/MrDGAPK)
@MrDGBOTS

[بوت لِسِتَّةٍ ضَعْهُ اداري !! 🤖](http://t.me/ECMRBOT)

@ECMRBOT

للأبلاغ عَنْ قَنَوَاتِ [ اضغط هنا🌹](http://t.me/MrDGFMBOT)',
'disable_web_page_preview'=>'true',
'parse_mode'=>"MarkDown",
]);
} 
if($text == "/help" && in_array($from_id, $sudo)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'
َ
ℓ🌹- اهلا بك في لوحت اوامر للقروب
ℓ🌹- الأوامر فقد عبر الخاص تستخدم

ℓ📦- الاوامر كالتالي

ℓ🔖- رسالة استقبال
ℓ📌- /go

ℓ🔖- رسالة شروط 
ℓ📌- /sr

ℓ📄- لي ارسال رسالة للقروب لستة
ℓ📄- مثال كيف ارسال

ℓ📝- /bc السلام عليكم 🌹

ℓ☑️- وسيتم ارسال للقروب
',
'disable_web_page_preview'=>'true',
'parse_mode'=>"MarkDown",
]);
} 
# BC-GROUP-ADMIN
$get1 = file_get_contents('TNBEH-GR.txt');
$ex2 = explode("\n",$get1);
$count = count($ex2);

$bc = explode("/bc", $text);
if($bc and in_array($from_id, $sudo)){
$real = file_get_contents("TNBEH-GR.txt");
$ex_real = explode("\n", $real);
for($y=0;$y<count($ex_real); $y++){
bot('sendMessage', [
'chat_id'=>$ex_real[$y],
'parse_mode'=>'markdown',
'disable_web_page_preview'=>true,
'text'=>$bc[1],
]);
}}
?> 