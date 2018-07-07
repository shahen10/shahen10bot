<?php 

ob_start();
$API_KEY = '619250385:AAHtg1CbSpWetULVEL8uk4FYBo3aDkSXNgw'; //add your bot token
$sudo = 204535577; // add your id
$bot_id = 474669491; 
$e = "@i9ii_bot";
define('API_KEY',$API_KEY);
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


$update = json_decode(file_get_contents('php://input'));
var_dump($update);
$message    = $update->message;
$from_id    = $message->from->id;
$text       = $message->text;
$chat_id    = $message->chat->id;
$new        = $message->new_chat_member;
$left       = $update->message->left_chat_member;
$contact    = $update->message->contact;
$audio      = $update->message->audio;
$location   = $update->message->location;
$memb       = $update->message->message_id;
$game       = $update->message->game; 
$name       = $update->message->from->first_name;
$gp_name    = $update->message->chat->title;
$user       = $update->message->from->username;
$for        = $update->message->from->id;
$sticker    = $update->message->sticker;
$video      = $update->message->video;
$photo      = $update->message->photo;
$voice      = $update->message->voice;
$doc        = $update->message->document;
$fwd        = $update->message->forward_from;
$re         = $update->message->reply_to_message;
$re_id      = $update->message->reply_to_message->from->id;
$re_user    = $update->message->reply_to_message->from->username;
$re_msgid   = $update->message->reply_to_message->message_id;
$type       = $update->message->chat->type;
$mid        = $message->message_id;

$number     = str_word_count($text);
$numper     = strlen($text);
$set        = file_get_contents("data/$chat_id.txt");
$ex         = explode("\n", $set);
$photo1     = $ex[0];
$sticker1   = $ex[1];
$contact1   = $ex[2];
$doc1       = $ex[3];
$fwd1       = $ex[4];
$voice1     = $ex[5];
$link1      = $ex[6];
$audio1     = $ex[7];
$video1     = $ex[8];
$tag1       = $ex[9];
$mark1      = $ex[10];
$bots1      = $ex[11];
$commands = array('/add','/lock photo','/lock voice','/lock audio','/lock video','/lock link','/lock user','/lock sticker','/lock contact','/lock doc','/promote','/ban','/kick','/pin','/setname',"قفل الصور","قفل البصمات","قفل الصوت","قفل الفيديو","قفل الروابط","قفل الجهات","قفل الملفات","حظر","طرد","رفع ادمن","ضع اسم","تثبيت","/link","الرابط");
$s = file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=$chat_id&user_id=".$bot_id);
$ss = json_decode($s, true);
$bot = $ss['result']['status'];
if(in_array($text, $commands) and $bot != "administrator"){
  bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"• Sorry Bot has not been promoted in the group ☄️🔥",
  'reply_to_message_id'=>$mid
    ]);
}
$get = file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=$chat_id&user_id=".$from_id);
$info = json_decode($get, true);
$you = $info['result']['status'];
$gp_get = file_get_contents("data/groups.txt");
$groups = explode("\n", $gp_get);
 if($text=="/start" and $type == "private"){
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"اهلا بك في بوت حمايه 🗜
الاقوى بلتلكرام 🚭

البوت يعمل بلغه 📤
En / ar 📌

قم ب اضافه البوت الى مجموعتك ورفعه ادمن 📍 واسل امر /add 
او تفعيل 🛡

#مطور البوت 🥀 @Ailnoor 

تابع جديدنا 📮
 @DEV_the_stun",
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>"Add me to Your GP 🔥",'url'=>"telegram.me/i9ii_bot?startgroup=new"]],
        [['text'=>"اضفني الى مجموعتك 🔥",'url'=>"telegram.me/i9ii_bot?startgroup=new"]],
        [['text'=>"تابع 🌿", 'url'=>"telegram.me/i_lo_v_e"]]
    ]

  ])
  ]);
}
if ($new and $new->id == $bot_id) {
  bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"قم برفعي ادمن اولا 📍
      \n• وارسل كلمه تفعيل او :- /add ☄️",
    ]);
}

if ($type == "supergroup" and in_array($chat_id, $groups)){
  
  if($you != "creator" && $you != "administrator" && $from_id != $sudo){
    if($photo && $photo1 == "l"){
        bot('deleteMessage',[
            'chat_id'=>$chat_id,
            'message_id'=>$message->message_id
        ]);
    }

    if($voice and $voice1 == "l"){
      bot('deleteMessage',[
          'chat_id'=>$chat_id,
          'message_id'=>$message->message_id
      ]);
    } 
    if($audio && $audio1 == "l"){
      bot('deleteMessage',[
          'chat_id'=>$chat_id,
          'message_id'=>$message->message_id
      ]);
    }
    if($video && $video1 == "l"){
      bot('deleteMessage',[
          'chat_id'=>$chat_id,
          'message_id'=>$message->message_id
      ]);
    }
    if($link1 == "l" and preg_match('/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)|([Hh]ttp|[Hh]ttps|t.me)(.*)|(.*)([Hh]ttp|[Hh]ttps|t.me)|(.*)[Tt]elegram.me(.*)|[Tt]elegram.me(.*)|(.*)[Tt]elegram.me|(.*)[Tt].me(.*)|[Tt].me(.*)|(.*)[Tt].me/',$text) ){
       bot('deleteMessage',[
         'chat_id'=>$chat_id,
         'message_id'=>$message->message_id
      ]);
    } 
    if($tag1 == "l" and  preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)#(.*)|#(.*)|(.*)#/',$text)){
       bot('deleteMessage',[
        'chat_id'=>$chat_id,
        'message_id'=>$message->message_id
       ]);
    }
    if($doc and $doc1 == "l"){
      bot('deleteMessage',[
          'chat_id'=>$chat_id,
          'message_id'=>$message->message_id
      ]);
    }
    if($sticker and $sticker1 == "l"){
      bot('deleteMessage',[
          'chat_id'=>$chat_id,
          'message_id'=>$message->message_id
      ]);
    }
    if($update->message->forward_from && $fwd1 == "l"){
      bot('deleteMessage',[
          'chat_id'=>$chat_id,
          'message_id'=>$message->message_id
      ]);
    }
    if($message->entities and $mark1 == "l"){
      bot('deleteMessage',[
          'chat_id'=>$chat_id,
          'message_id'=>$message->message_id
      ]);
    }
    if($new and $bots1 == "l"){
      $new_user = $new->username;
      if (preg_match('/^(.*)([Bb][Oo][Tt]/', $new_user)) {
        bot('kickChatMember',[
          'chat_id'=>$chat_id,
          'user_id'=>$new->id
          ]);
      }
    }
  }

if($bot == "administrator"){
if($you == "creator" or $you == "administrator") {
$re_user    = $update->message->reply_to_message->from->username;
  if($re  &&  $text == "/del"){
    bot('deleteMessage',[
        'chat_id'=>$chat_id,
        'message_id'=>$re_msgid
    ]);
  }
  if($re and $re_id != $bot and $re_id != $sudo and $text=="/ban" or $text == "حظر" or $text == "/kick" or $text=="طرد"){
    bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"• User 🔥 : - @$re_user
• Has been Banned from group ☄️💫 !",
  'reply_to_message_id'=>$mid
      ]);
    bot('kickChatMember',[
        'chat_id'=>$chat_id,
        'user_id'=>$re_id
      ]);
  }
  if($re and $re_id != $bot and $re_id != $sudo and $text=="/unban" or $text == "الغاء حظر"){
    bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"• User 🔥 : - @@$re_user 
• Has been unBanned from group ☄️💫 !",
  'reply_to_message_id'=>$mid
      ]);
    bot('unbanChatMember',[
        'chat_id'=>$chat_id,
        'user_id'=>$re_id
      ]);
    }
  if($text == "/promote" or $text == "رفع ادمن"){
      bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"• User 🔥 : - @$re_user
• Was promoted in the group ☄️💫 !

تابع جديدنا 🌸@I_LO_V_E",
  'reply_to_message_id'=>$mid
      ]);
      bot('promoteChatMember',[
          'chat_id'=>$chat_id,
          'user_id'=>$re_id
        ]);
  }
  $ename = str_replace("/setname ", "$ename", $text);
  $aname = str_replace("ضع اسم ", "$aname", $text);
  if($text == "/setname $ename"){
    bot('setChatTitle',[
      'chat_id'=>$chat_id,
      'title'=>$ename 
      ]);
  }
   if($text == "ضع اسم $aname"){
     bot('setChatTitle',[
      'chat_id'=>$chat_id,
      'title'=>$aname 
      ]);
   }
   if($re and $text == "/pin" or $text == "تثبيت"){
    bot('pinChatMessage',[
        'chat_id'=>$chat_id,
        'message_id'=>$re_msgid
      ]);
   }
   if($text == "/lock photo" or $text == "قفل الصور"){
    file_put_contents("data/$chat_id.txt", "l\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
     bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"•  *Photos* 🔥 
•  *Has Been Locked in Group* 📡

•  تم قفل الصور  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
 
   if($text == "/open photo" or $text == "فتح الصور"){
    file_put_contents("data/$chat_id.txt", "o\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"•  *Photos* 🔥 
•  *Has Been Opened in Group* 📡

•  تم فتح الصور  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
 
    if($text == "/lock sticker" or $text == "قفل الملصقات"){
    file_put_contents("data/$chat_id.txt", "$photo1\nl\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"•  *Stickers* 🔥 
•  *Has Been Locked in Group* 📡

•  تم قفل الملصقات  ☑️",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
       if($text == "/open sticker" or $text == "فتح الملصقات"){
    file_put_contents("data/$chat_id.txt", "$photo1\no\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"•  *Stickers* 🔥 
•  *Has Been Opened in Group* 📡

•  تم فتح الملصقات  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
       if($text == "/lock contact" or $text == "قفل الجهات"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\nl\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"•  *contacts* 🔥 
•  *Has Been Locked in Group* 📡

•  تم قفل الجهات  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
 if($text == "/open contact" or $text == "فتح الجهات"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\no\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"•  *contacts* 🔥 
•  *Has Been Opened in Group* 📡

•  تم فتح الجهات  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
   if($text == "/lock doc" or $text == "قفل الملفات"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\nl\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"•  *documents* 🔥 
•  *Has Been Locked in Group* 📡,

•  تم قفل الملفات  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
  if($text == "/open doc" or $text == "فتح الملفات"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\no\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"•  *documents* 🔥 
•  *Has Been Opened in Group* 📡

•  تم فتح الملفات  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
if($text == "/lock fwd" or $text == "قفل التوجيه"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\nl\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"•  *Forward* 🔥 
•  *Has Been Locked in Group* 📡

•  تم قفل التوجيه  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
   if($text == "/open fwd" or $text == "فتح التوجيه"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\no\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"•  *Forward* 🔥 
•  *Has Been Opened in Group* 📡

•  تم فتح التوجيه  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
   if($text == "/lock voice" or $text == "قفل البصمات"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\nl\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"•  *voice* 🔥 
•  *Has Been Locked in Group* 📡

•  تم قفل البصمات  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
     if($text == "/open voice" or $text == "فتح البصمات"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\no\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"•  *voice* 🔥 
•  *Has Been Locked in Group* 📡

•  تم فتح البصمات  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
     if($text == "/lock link" or $text == "قفل الروابط"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\nl\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"•  *Links* 🔥 
•  *Has Been Locked in Group* 📡

• تم قفل الروابط  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
   if($text == "/open link" or $text == "فتح الروابط"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\no\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"•  *Links* 🔥 
•  *Has Been Opened in Group* 📡

•  تم فتح الروابط  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
   if($text == "/lock audio" or $text == "قفل الصوت"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\nl\n$video1\n$tag1\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"•  *audios* 🔥 
•  *Has Been Locked in Group* 📡

•  تم قفل الصوت  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
   if($text == "/open audio" or $text == "فتح الصوت"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\no\n$video1\n$tag1\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"•  *audios* 🔥 
•  *Has Been Opened in Group* 📡

•  تم فتح الصوت  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
   if($text == "/lock video" or $text == "قفل الفيديو"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\nl\n$tag1\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"• *Videos* 🔥 
•  *Has Been Locked in Group* 📡

•  تم قفل الفيديو  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
   if($text == "/open video" or $text == "فتح الفيديو"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\no\n$tag1\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"• *Videos* 🔥 
•  *Has Been Opened in Group* 📡

•  تم فتح الصور  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
   if($text == "/lock user" or $text == "قفل المعرف"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\nl\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"• *Users* 🔥 
•  *Has Been Locked in Group* 📡

•  تم قفل المعرف ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
   if($text == "/open user" or $text == "فتح المعرف"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\no\n$mark1\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"• *Users* 🔥 
•  *Has Been Opened in Group* 📡

•  تم فتح المعرف  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
    if($text == "/lock mark" or $text == "قفل الماركدون"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\nl\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"• *Markdown* 🔥 
•  *Has Been Locked in Group* 📡

•  تم قفل الماركداون  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
   if($text == "/open mark" or $text == "فتح الماركدون"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\no\n$bots1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"• *Markdown* 🔥 
•  *Has Been Opened in Group* 📡

•  تم فتح الماركداون  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
  if($text == "/lock bots" or $text == "قفل البوتات"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\nl");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"• *bots* 🔥 
•  *Has Been Locked in Group* 📡

•  تم قفل البوتات  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
   if($text == "/open bots" or $text == "فتح البوتات"){
    file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\no");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"• *bots* 🔥 
•  *Has Been Opened in Group* 📡

•  تم فتح البوتات  ☑️

[تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
      ]);
   }
   if($text=="/help" or $text=="/help@i9ii_bot" or $text=="الاوامر"){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"اهلا بك عزيزي ☑️ في قائمة الاوامر 🔗
        
        جديدنا للبوتات 📮
  @DEV_the_stun

• باللغة العربية 🇮🇶

قفل || للقفل ♦️
فتح || للفتح 🌟

• باللغة الانكليزية 🗒

/lock || للقفل 🌪
/open || للفتح ⏱

ֆ • • • • • • • • • • • • • ֆ

link || الروابط 📡
user || المعرف 🔱
mark || الماركداون 📚
bots  || البوتات 🕹

ֆ • • • • • • • • • • • • • ֆ

photo || الصور 🌿
sticker || الملصقات ⏱
video || الفيديو 📒
bsma || البصمات 🎙

ֆ • • • • • • • • • • • • • ֆ

fwd || التوجيه 💎
audio || الصوت ♦️
contact || الجهات 🏷
doc || الملفات ⚡️

ֆ • • • • • • • • • • • • • ֆ

• /del || امسح ( بالرد ) لحذف رسالة 🌀

• /promote || رفع ادمن 🔗
بالرد لرفع ادمن في المجموعه 🔻

• /setname || ضع اسم 🌿
لوضع اسم للمجموعه 📌

• /pin || تثبيت ✔️
بالرد لتثبيت رسالة 🔑

• /ban || حظر 💎
بالرد لحظر العضو 📚

• /kick || طرد 🔥
بالرد لطرد العضو 🎵

• /unban || الغاء الحظر 🐾
بالرد لالغاء حظر العضو 📊

تابع 🔥 @I_LO_V_E",
      ]);
   }
   if($text=="اوامر" or $text=="مساعدة" or $text=="مساعده"){
    bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"اهلا بك عزيزي ☑️ في قائمة الاوامر 🔗
      
جديدنا للبوتات 📮
  @DEV_the_stun
  
• باللغة العربية 🇮🇶

قفل || للقفل ♦️
فتح || للفتح 🌟

• باللغة الانكليزية 🗒

/lock || للقفل 🌪
/open || للفتح ⏱

ֆ • • • • • • • • • • • • • ֆ

link || الروابط 📡
user || المعرف 🔱
mark || الماركداون 📚
bots  || البوتات 🕹

ֆ • • • • • • • • • • • • • ֆ

photo || الصور 🌿
sticker || الملصقات ⏱
video || الفيديو 📒
bsma || البصمات 🎙

ֆ • • • • • • • • • • • • • ֆ

fwd || التوجيه 💎
audio || الصوت ♦️
contact || الجهات 🏷
doc || الملفات ⚡️

ֆ • • • • • • • • • • • • • ֆ

• /del || امسح ( بالرد ) لحذف رسالة 🌀

• /promote || رفع ادمن 🔗
بالرد لرفع ادمن في المجموعه 🔻

• /setname || ضع اسم 🌿
لوضع اسم للمجموعه 📌

• /pin || تثبيت ✔️
بالرد لتثبيت رسالة 🔑

• /ban || حظر 💎
بالرد لحظر العضو 📚

• /kick || طرد 🔥
بالرد لطرد العضو 🎵

• /unban || الغاء الحظر 🐾
بالرد لالغاء حظر العضو 📊

تابع 🔥 @I_LO_V_E",
      ]);
  }
 }
}
if($text=="/setting" or $text=="/setting$e" or $text=="الاعدادات"){

  bot('sendMessage',['chat_id'=>$chat_id, 'text'=>"اهلا بك 🌿 عزيزي في قائمة الاعدادات ⚠️
  
جديدنا للبوتات 📮
  @DEV_the_stun
( l = مقفول ) 🔗
( o = مفتوح ) ♦️

ֆ • • • • • • • • • • • • • ֆ
• الصور  ⚠️ - $photo1
• الملصقات 🔱 - $sticker1

• الفيديو 🌟 - $video1
• الروابط 📊 -  $link1

• الجهات 🔥 - $contact1
• الملفات 📒 - $doc1

• التوجيه ♦️ - $fwd1
• البصمات 🔊 - $bsma1

• الصوت 📢 - $audio1
• المعرف ⏱ - $tag1

• الماركداون ⚡️ - $mark1
• البوتات 🕹    - $bots1

تابع 🔥 @I_LO_V_E",
]);
}
}
if($bot == "administrator"){
 if ($you == "administrator" or $you == "creator") {
if($text == "/add" or $text == "/add$e" or $text=="تفعيل"){
if(!in_array($chat_id, $groups)){
  file_put_contents("data/$chat_id.txt", "o\no\no\no\nl\no\nl\no\no\nl\no");
  file_put_contents("data/groups.txt", "$chat_id\n",FILE_APPEND);
$t =  $message->chat->title;
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"•  Group 🔥 :- $t
    
     تم تفعيل المجموعه  ☑️
    
• has been successfully added to the bot ☑️
  لعرض الاوامر:- /help
  
  [تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
    ]);
 }
if (in_array($chat_id, $groups)) {
$t =  $message->chat->title;
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"•  Group 🔥 :- $t
    
      تم تفعيل المجموعه  ☑️
      
• is aleardy added to the bot ☑️
   لعرض الاوامر :- /help
  
  [تابع جديدنا 🌸](https://telegram.me/I_LO_V_E)",
  'reply_to_message_id'=>$mid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
    ]);
 }
}
}
}
 if($text == "المجموعات"){
  $c = count($groups);
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"$c"
    ]);
 }
if($text == "اذاعة" and $for == $sudo){
  file_put_contents("mode.txt", "bc");
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"دز الكليشه"
    ]);
}
$mode = file_get_contents("mode.txt");
if($text != "اذاعة" and $mode=="bc" and $for == $sudo){
  for ($i=0; $i < count($groups); $i++) { 
    bot('sendMessage',[
      'chat_id'=>$groups[$i],
      'text'=>" $text"
    ]);
  }
  unlink("mode.txt");
}
$id   = $message->from->id; 
$user = $message->from->username; 
$name = $message->from->first_name; 
if($text=="موقعي" and $you == "creator"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"انت منشى 🔗 في المجموعةه ☑️ 
📡 معرفك :- @$user
🔗 ايديك :- $id
🔥 اسمك :- $name
"
]);
}
if($text=="موقعي" and  $you == "administrator"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"انت ادمن 🔗 في المجموعةه ☑️ 
📡 معرفك :- @$user
🔗 ايديك :- $id
🔥 اسمك :- $name"
]);
}
if($text=="موقعي" and  $you == "member"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"انت عضو 🔗 في المجموعةه ☑️ 
📡 معرفك :- @$user
🔗 ايديك :- $id
🔥 اسمك :- $name"
]);
}
 
$rnd = rand(1,999999999999999999);
if($text=="معلوماتي" or $text == "ايدي" or $text == "/id" or $text == "id"){
$re = bot("getUserProfilePhotos",["user_id"=>$id,"limit"=>1,"offset"=>0]);
$res = $re->result->photos[0][2]->file_id;
$pa = bot("getFile",["file_id"=>$res]);
$path = $pa->result->file_path;
file_put_contents("$rnd.jpg",file_get_contents("https://api.telegram.org/file/bot".$API_KEY."/".$path));
$uphoto = "http://alsaednnn.000webhostapp.com/$rnd.jpg"; // يوزر استضافتك
bot("sendPhoto",[
'chat_id'=>$chat_id,
"photo"=>$uphoto,
'caption'=>"
🌿 ايدي المجموعةه :- $chat_id
📡 معرفك :- @$user
🔗 ايديك :- $id
🔥 اسمك :- $name "
]);
unlink("$rnd.jpg");
}
if($re and $text == "جلب صورته"){
  $g = bot("getUserProfilePhotos",["user_id"=>$re_id,"limit"=>1,"offset"=>0]);
$r = $g->result->photos[0][2]->file_id;
$pa = bot("getFile",["file_id"=>$r]);
$path = $pa->result->file_path;
file_put_contents("$rnd.jpg",file_get_contents("https://api.telegram.org/file/bot".$API_KEY."/".$path));
$uphoto = "http://alsaednnn.000webhostapp.com/$rnd.jpg"; // بوزر استضافتك
bot("sendPhoto",[
'chat_id'=>$chat_id,
"photo"=>$uphoto,
]);
unlink("$rnd.jpg");
}
if($text == "/link" or $text == "الرابط"){
  $export = json_decode(file_get_contents("api.telegram.org/bot".$API_KEY."/exportChatInviteLink?chat_id=$chat_id"));
  $l = $export->result;
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"~> $l"
    ]);
}
if($text == "مطور"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"مطور البوت 🥀
 @Ailnoor

تواصل محضورين 🍂📮
@alsaed_ali_bot",
'reply_to_message_id'=>$message->message_id, 
]);
}
 if($text == "المطور"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"مطور البوت 🥀
 @Ailnoor

تواصل محضورين 🍂📮
@alsaed_ali_bot",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "هدوء"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"فديت ربه هذا صنعني 😻🌸
@Ailnoor",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "بوت"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"منو صاحني ☹️💔
كول حمبي 😻🌸",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "رايد بوت" or $text == "اريد بوت"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"اني بوت
ضيفني بكروبك ورفعني ادمن وقفل
معرفي @i9ii_bot
",

'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "/start"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"لا تغلس 😐💔

شترك هنا 😻🌸
@i_LO_V_E",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "شلونكم" or $text == "شلونك" or $text == "شلونج"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"تمام ونته/ي 😻🌸",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "هلا" or $text == "هلاو" or $text == "هلو"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"هلاوات نورت/ي 😻🌸",
'reply_to_message_id'=>$message->message_id, 
]);
}
$new_user = $new->username;
      if ($new) {
        bot('sendMessage',[
          'chat_id'=>$chat_id,
          'text'=>"اجه الكمر 😻🍂

تعال تعال 😻🌸
شترك هنا 📮 @I_LO_V_E"
          ]);
      }
