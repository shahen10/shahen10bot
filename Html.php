<?php

/*
By : Memo & @IYahoo

Ch : @TeamMemo
*/
define('API_KEY', '558947885:AAGsvB0wFehO4djgdc5XSUb9CPZuxVS_X1Y');
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
    }
}

function SendMessage($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
 bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>$text,
 'parse_mode'=>$parsmde,
 'disable_web_page_preview'=>$disable_web_page_preview,
 'reply_markup'=>$keyboard
 ]);
 } 
 function sendphoto($chat_id, $photo, $caption){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$photo,
 'caption'=>$caption,
 ]);
 }
 function Forward($chatid,$from_chat,$message_id){
  bot('ForwardMessage',[
  'chat_id'=>$chatid,
  'from_chat_id'=>$from_chat,
  'message_id'=>$message_id
  ]);
  }
function senddocument($chat_id,$document,$caption){
    bot('senddocument',[
        'chat_id'=>$chat_id,
        'document'=>$document,
        'caption'=>$caption
    ]);
}
 function sendvideo($chat_id, $video, $caption){
 bot('sendvideo',[
 'chat_id'=>$chat_id,
 'photo'=>$video,
 'caption'=>$caption,
 ]);
 }
 function sendaudio($chat_id, $audio, $caption){
 bot('sendaudio',[
 'chat_id'=>$chat_id,
 'audio'=>$audio,
 'caption'=>$caption,
 ]);

 }
//====================TeamMemo======================//

$update = json_decode(file_get_contents('php://input'));
$message = $update->message; 
$chat_id = $message->chat->id;
$text = $message->text;
@mkdir("data/$chat_id");
@$memoo = file_get_contents("data/$chat_id/memo.txt");
$admin = 367759364;
$panel = file_get_contents("mirtm.txt");
$name = $message->from->first_name;
$lastname = $message->from->last_name;
$username = $message->from->username;
$from_id = $message->from->id;
//=========Memo™=========//
if($text == '/start'){
$user = file_get_contents('Member.txt');
$members = explode("\n",$user);
if (!in_array($chat_id,$members)){
$add_user = file_get_contents('Member.txt');
$add_user .= $chat_id."\n";
file_put_contents('Member.txt',$add_user);
}
bot('sendMessage', [
'chat_id' => $chat_id,
'text'=>"- اهلا وسهلا بك

في بوت تحميل قوالب المواقع دون اخطاء !",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"تحميل قالب"]
],
[
['text'=>"مساعدة"]
],
[
['text'=>"مطور البوت"]
],
[
['text'=>"تابع جديدنا"]
],
]
])
]);
}
if($text == 'تحميل قالب'){
file_put_contents("data/$from_id/memo.txt","dansite");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"أرسل رابط الموقع الذي تريد تنزيله",
 'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"رجوع"]
],
]
])
]);
}
elseif($memoo == 'dansite'){
$dan = file_get_contents("$text");
file_put_contents("data/$from_id/q.html", $dan);
file_put_contents("data/$from_id/memo.txt","djsjshhwhah");
    bot('senddocument',[
        'chat_id'=>$chat_id,
        'document'=>new CURLFile("data/$from_id/q.html"),
        'caption'=>"اليك قالب الموقع
تابعنا @TeamMemo",
    ]);
}
if($text == "رجوع"){
file_put_contents("data/$from_id/reza".txt,"");
file_put_contents("mirtm.txt","");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"العودة إلى القائمة الرئيسية ، يرجى تحديد خيار ",
'parse_mode'=>"markDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"تحميل قالب"]
],
[
['text'=>"مساعدة"]
],
[
['text'=>"مطور البوت"]
],
[
['text'=>"تابع جديدنا"]
],
]
])
]);
}
if($text == "تابع جديدنا"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" هذا البوت من قبل فريق برمجة ŦЄẤⱮ ṂẼḾỒ",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"ŦЄẤⱮ ṂẼḾỒ <َ/>",'url'=>"http://t.me/TeamMemo"]
],
]
])
]);
}
if($text=="مطور البوت"){
file_put_contents("data/$from_id/memo.txt","nnnn");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم برمجة هذا البوت و كتابتة ،  من قبل  @IYahoo",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"رجوع"]
],
]
])
]);
}
if($text == "مساعدة"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لاستخدام هذا البوت ، قم بأرسال رابط الموقع المراد تحميل قالبة  ، على النحو الاتي 

حيث يجب ان يحتوي على 

http

or

https

كمثال :- 
https://Google.com
",
]);
}

//-------
if($text == '/Memo' && $from_id == $admin){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"مرحبا بك سيدي المطور ، اليك الاوامر :- 
",
 'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"المشتركين"],['text'=>"اذاعة"]
]
],
"resize_keyboard"=>true,
])
]);
}
if($text == 'المشتركين' && $from_id == $admin){
$users = file_get_contents("Member.txt");
$member_id = explode("\n",$user);
$member_count = count($member_id);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"عدد المشتركين هو  : $member_count",
 'parse_mode'=>"markdown",
 ]);
}
if($text == 'اذاعة' && $from_id == $admin){
file_put_contents("mirtm.txt","Send");
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "أرسل الرسالة التي تريد إرسالها إلى الجميع",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"رجوع"]
],
]
])
]);
}
elseif($panel == "Send" && $from_id == $admin){
file_put_contents("mirtm.txt","none");
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم إرسال الرسالة للجميع.",
'parse_mode' => 'html'
]);
$all_member = fopen( "Member.txt", "r");
while( !feof( $all_member)) {
$user = fgets( $all_member);
SendMessage($user,$text,'html');
}
}
?>
