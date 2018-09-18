
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BotCommentVui extends CI_Controller {
	

	public $nd = array('Đằng sau 1 người đàn ông ngoại tình là 1 người đàn bà ngồi rình',
'Cuộc đời như tốt sang sông,
Tiến ngang tiến dọc chứ không được lùi.
Cuộc đời như vở kịch dài,
Ta là vai chính, cả hài lẫn bi.',
'Nếu em là bịch thuốc phiện… Anh sẽ là thằng nghiện đầu tiên.
Nếu em là trại thương điên… Anh sẽ là thằng điên mãi mãi.',
'Con đường tới vinh quang không có dấu chân của kẻ lười biếng vì kẻ lười biếng thì làm quái gì chịu đi bộ mà có dấu chân',
'Kính vợ đắc thọ,
Nể vợ sống lâu,
Để vợ trên đầu là trường sinh bất lão . ',
'Trước cổng nhà thờ,anh và em…
Hai đứa hôn nhau,Chúa đứng xem…
Giật mình Cha bảo:này hai đứa!
Hôn nhau như thế…Cha cũng…thèm.',
'Trúc xinh trúc mọc đầu đình
Em xinh em hút thuốc lào cũng xinh',
'Cô kia cắt cỏ một mình
Cớ sao không rủ người tình cắt chung ?',
'Bỏ cả giang sơn vì mỹ nữ
Ai ngờ mỹ nữ thích giang sơn.',
'Giang hồ hiểm ác
Không bằng mạng lag thất thường.',
'Trăm năm bia đá cũng mòn
Bia chai cũng bể
Chỉ còn bia …. ôm!',
'Thứ 7 máu chảy về tim,
Lim dim đi tìm chỗ ngủ.',
'Khi tôi ăn cơm…Cả quán dõi theo từng động tác.Tự Tin -Gắp Nhanh – Phong Cách. Tôi thích cơm bụi.Cơm bụi rất lôi cuốn.Lôi cuốn là phải ăn nhanh.Ăn nhanh là sạch sẽ. Tôi là…Sinh Viên Nghèo!!!!',
'Nhớ quá khứ buồn rơi nước mắt
Nhìn tương lai lạnh toát mồ hôi',
'Nắng mưa là chuyện do trời
Cúp cua là chuyện ở đời học sinh
Cúp cua đừng cúp một mình
Rủ thêm vài đứa tâm tình cho vui.',
'Là người phụ nữ nên tin tưởng đàn ông ? Cũng giống như tin tưởng hòa bình thế giới sẽ đến, mặc dù bạn biết chiến tranh thế giới liên tiếp không ngừng.',
'Nếu phiên bản đầu tiên của bạn không thành công, hãy đạt tên nó là phiên bản 1.0',
'Những cô gái giống như những tên miền Internet, những tên đẹp mà ta thích đã có chủ nhân rồi! ',
'Con mèo mà trèo cây cau, hỏi thăm chú chuột đi đâu vắng nhà.
Chú chuột đi chợ đằng xa, em là cô chuột, vào nhà đi anh! ',
'Không thương…Không nhớ…Không mơ mộng
Không buồn…Không chán…Lệ không rơi
Không yêu ai cả…Lòng băng giá
Không nhớ ai cả…Hồn tự do.',
'Ngồi buồn há miệng ra xem 
Đến khi ngậm lại chết trăm con ruồi 
Con nào khoẻ cánh thì bay 
Con nào yếu cánh chết ngay trong mồm ',
'Xa anh 1ngày em tưởng chừng 24 tiếng
Cơm không ăn chỉ ăn phở cầm hơi
Đêm 5 canh em ngủ 4 canh đầu
Còn canh cuối em âm thầm….ngủ tiếp. Nợ nần biến người ta thành……con nợ ! ',
'Sống là phải cho đi! Hãy cho đi tất cả nhừng gì bạn có, để rồi hối hận nhận ra rằng đòi lại sẽ rất khó! ',
'Tiền túng, tình tan, tư tưởng tồi tàn tiến tới tự tử. ',
'Quay đầu là bờ … Ai ngờ là Thái Bình Dương. ',
'Con trai có 1 vẻ đẹp của Châu Á .
Sự lạnh giá của Châu Âu .
Làn da nâu của Châu phi
Và nét lì lợm của …………trâu bò',
'Đằng sau 1 người đàn ông ngoại tình là 1 người đàn bà ngồi rình',
'Cuộc đời như tốt sang sông,
Tiến ngang tiến dọc chứ không được lùi.
Cuộc đời như vở kịch dài,
Ta là vai chính, cả hài lẫn bi.',
'Nếu em là bịch thuốc phiện… Anh sẽ là thằng nghiện đầu tiên.
Nếu em là trại thương điên… Anh sẽ là thằng điên mãi mãi.',
'Con đường tới vinh quang không có dấu chân của kẻ lười biếng vì kẻ lười biếng thì làm quái gì chịu đi bộ mà có dấu chân',
'Kính vợ đắc thọ,
Nể vợ sống lâu,

Để vợ trên đầu là trường sinh bất lão . ',
'Trước cổng nhà thờ,anh và em…
Hai đứa hôn nhau,Chúa đứng xem…
Giật mình Cha bảo:này hai đứa!
Hôn nhau như thế…Cha cũng…thèm.',
'Trúc xinh trúc mọc đầu đình
Em xinh em hút thuốc lào cũng xinh',
'Cô kia cắt cỏ một mình
Cớ sao không rủ người tình cắt chung ?',
'Bỏ cả giang sơn vì mỹ nữ
Ai ngờ mỹ nữ thích giang sơn.',
'Giang hồ hiểm ác
Không bằng mạng lag thất thường.',
'Trăm năm bia đá cũng mòn
Bia chai cũng bể
Chỉ còn bia …. ôm!',
'Thứ 7 máu chảy về tim,
Lim dim đi tìm chỗ ngủ.',
'Khi tôi ăn cơm…Cả quán dõi theo từng động tác.Tự Tin -Gắp Nhanh – Phong Cách. Tôi thích cơm bụi.Cơm bụi rất lôi cuốn.Lôi cuốn là phải ăn nhanh.Ăn nhanh là sạch sẽ. Tôi là…Sinh Viên Nghèo!!!!',
'Nhớ quá khứ buồn rơi nước mắt
Nhìn tương lai lạnh toát mồ hôi',
'Nắng mưa là chuyện do trời
Cúp cua là chuyện ở đời học sinh
Cúp cua đừng cúp một mình
Rủ thêm vài đứa tâm tình cho vui.',
'Là người phụ nữ nên tin tưởng đàn ông ? Cũng giống như tin tưởng hòa bình thế giới sẽ đến, mặc dù bạn biết chiến tranh thế giới liên tiếp không ngừng.',
'Nếu phiên bản đầu tiên của bạn không thành công, hãy đạt tên nó là phiên bản 1.0',
'Những cô gái giống như những tên miền Internet, những tên đẹp mà ta thích đã có chủ nhân rồi! ',
'Con mèo mà trèo cây cau, hỏi thăm chú chuột đi đâu vắng nhà.
Chú chuột đi chợ đằng xa, em là cô chuột, vào nhà đi anh! ',
'Không thương…Không nhớ…Không mơ mộng
Không buồn…Không chán…Lệ không rơi
Không yêu ai cả…Lòng băng giá
Không nhớ ai cả…Hồn tự do.',
'Con cò đi uống rượu đêm
Đậu phải cành mềm lộn cổ xuống ao
Còn anh chả uống ngụm nào
Cũng say ngây ngất ngã vào lòng em .',
'Trách người quân tử vô danh.
Chơi hoa xong lại… hái cành kế bên.',
'Gái ơi đừng lấy chồng gù
Đến khi nó chết quan tài so le',
'Trăm năm trong cõi người ta
Ai ai cũng phải thở ra hít vào
Trăm năm trong cõi người nào
Ai ai cũng phải thở vào hít ra.',
'Lên non mới biết non cao
Có bồ mới biết là mau hết tiền',
'Ngày xưa giám thị cũng đi thi
Cũng quay cũng cop chẳng kém chi
Mà nay giám thị lại trông chặt
Chẳng để em xem 1 tí gì…',
'Đằng sau người đàn ông thành công là người đàn bà ngồi không.
Đằng sau người đàn ông thất bại là người đàn bà xúi dại.',
'Yêu nhau cởi áo cho nhau,
Ghét nhau trợn mắt : “Áo đâu? Mặc vào!!! “',
'Đêm nằm ở dưới bóng trăng
Thương cha nhớ mẹ không bằng nhớ em',
'Râu tôm nấu với ruột bầu
Chồng chan vợ húp gật đầu khen ngon
Chỉ tội cho cái thằng con
Đứng ngoài chầu chực biết ngon là gì.',
'Hữu duyên thiên lý năng tương ngộ
Vô duyên lệch sóng đá vỡ mồm',
'1 canh 2 canh lại 3 canh
Trằn trọc băn khoăn giấc chẳng thành
Canh 4 canh 5 vừa chợp mắt
Bà xã đã gọi : “dậy đi anh”',
'Má ơi đừng gả con xa
Chim kêu vượn hú biết nhà má đâu
Thôi má hãy gả nhà giàu
Có tiền chỉnh mặt, làm đầu cho con.',
'Chồng người du kích sông Lô
Chồng em ngồi bếp nướng ngô cháy quần.',
'Ai đưa con sáo sang sông.
Để cho con sáo mắc công bay về',
'Mẹ ơi con muốn lấy chồng…Con ơi mẹ cũng một lòng như con.',
'Thà làm đường thẳng song song.
Cùng nhau đi mãi chẳng hề xa nhau.
Còn hơn 2 đường căt nhau.
Chạm nhau 1 điểm xa nhau muôn đời… ',
'Đời học sinh là đời đau khổ
Hãy đứng lên lật đổ nhà trường .',
'Xa anh 1ngày em tưởng chừng 24 tiếng
Cơm không ăn chỉ ăn phở cầm hơi
Đêm 5 canh em ngủ 4 canh đầu
Còn canh cuối em âm thầm….ngủ tiếp.',
'Kiến thức rồi sẽ qua đi chỉ có tấm bằng là ở lại',
'Con giun kéo mãi cũng phải … chết'
);
	public function index()
	{
		set_time_limit(0);
		
		$this->db->select('bot_comment_vui.id,bot_comment_vui.the_loai, access_token.access_token, access_token.id_fb');
		$this->db->from('bot_comment_vui');
		$this->db->limit(10);
		$this->db->order_by('bot_comment_vui.id', 'RANDOM');
		$this->db->join('access_token','bot_comment_vui.id_fb=access_token.id_fb');
						
		$get = $this->db->get()->result_array();


		foreach ($get as $bot) {
			//get_home
			$feed = json_decode($this->m_func->curl_api('https://graph.facebook.com/me/home?access_token='.$bot['access_token'].'&method=GET&fields=message&limit=5'), true);
			if(isset($feed['data'])){
				
				foreach ($feed['data'] as $post) {
					$name_file_log = 'log_comments/'.$bot['id'].'_vui_'.$post['id'].''; //Tên của file log
					//Kiểm tra file log
					if(file_exists($name_file_log)){
						continue;
					}
					$noi_dung = urlencode($this->creat_message($this->nd[rand(0, count($this->nd)-1)]));
					$cmt = json_decode($this->m_func->curl_api("https://graph.facebook.com/{$post['id']}/comments?message=$noi_dung&access_token={$bot['access_token']}&method=POST"), true);

					if(isset($cmt['id'])){
					    $f = fopen($name_file_log,'w');
					    fwrite($f,'');
					    fclose($f);
					}
					
				}
			}
		}
	}
function creat_message($text){
	$icon = array(
		urldecode('%F3%BE%80%80'),
		urldecode('%F3%BE%80%81'),
		urldecode('%F3%BE%80%82'),
		urldecode('%F3%BE%80%83'),
		urldecode('%F3%BE%80%84'),
		urldecode('%F3%BE%80%85'),
		urldecode('%F3%BE%80%87'), 
		urldecode('%F3%BE%80%B8'), 
		urldecode('%F3%BE%80%BC'),
		urldecode('%F3%BE%80%BD'),
		urldecode('%F3%BE%80%BE'),
		urldecode('%F3%BE%80%BF'),
		urldecode('%F3%BE%81%80'),
		urldecode('%F3%BE%81%81'),
		urldecode('%F3%BE%81%82'),
		urldecode('%F3%BE%81%83'),
		urldecode('%F3%BE%81%85'),
		urldecode('%F3%BE%81%86'),
		urldecode('%F3%BE%81%87'),
		urldecode('%F3%BE%81%88'),
		urldecode('%F3%BE%81%89'), 
		urldecode('%F3%BE%81%91'),
		urldecode('%F3%BE%81%92'),
		urldecode('%F3%BE%81%93'), 
		urldecode('%F3%BE%86%90'),
		urldecode('%F3%BE%86%91'),
		urldecode('%F3%BE%86%92'),
		urldecode('%F3%BE%86%93'),
		urldecode('%F3%BE%86%94'),
		urldecode('%F3%BE%86%96'),
		urldecode('%F3%BE%86%9B'),
		urldecode('%F3%BE%86%9C'),
		urldecode('%F3%BE%86%9D'),
		urldecode('%F3%BE%86%9E'),
		urldecode('%F3%BE%86%A0'),
		urldecode('%F3%BE%86%A1'),
		urldecode('%F3%BE%86%A2'),
		urldecode('%F3%BE%86%A4'),
		urldecode('%F3%BE%86%A5'),
		urldecode('%F3%BE%86%A6'),
		urldecode('%F3%BE%86%A7'),
		urldecode('%F3%BE%86%A8'),
		urldecode('%F3%BE%86%A9'),
		urldecode('%F3%BE%86%AA'),
		urldecode('%F3%BE%86%AB'),
		urldecode('%F3%BE%86%AE'),
		urldecode('%F3%BE%86%AF'),
		urldecode('%F3%BE%86%B0'),
		urldecode('%F3%BE%86%B1'),
		urldecode('%F3%BE%86%B2'),
		urldecode('%F3%BE%86%B3'), 
		urldecode('%F3%BE%86%B5'),
		urldecode('%F3%BE%86%B6'),
		urldecode('%F3%BE%86%B7'),
		urldecode('%F3%BE%86%B8'),
		urldecode('%F3%BE%86%BB'),
		urldecode('%F3%BE%86%BC'),
		urldecode('%F3%BE%86%BD'),
		urldecode('%F3%BE%86%BE'),
		urldecode('%F3%BE%86%BF'),
		urldecode('%F3%BE%87%80'),
		urldecode('%F3%BE%87%81'),
		urldecode('%F3%BE%87%82'),
		urldecode('%F3%BE%87%83'),
		urldecode('%F3%BE%87%84'),
		urldecode('%F3%BE%87%85'),
		urldecode('%F3%BE%87%86'),
		urldecode('%F3%BE%87%87'), 
		urldecode('%F3%BE%87%88'),
		urldecode('%F3%BE%87%89'),
		urldecode('%F3%BE%87%8A'),
		urldecode('%F3%BE%87%8B'),
		urldecode('%F3%BE%87%8C'),
		urldecode('%F3%BE%87%8D'),
		urldecode('%F3%BE%87%8E'),
		urldecode('%F3%BE%87%8F'),
		urldecode('%F3%BE%87%90'),
		urldecode('%F3%BE%87%91'),
		urldecode('%F3%BE%87%92'),
		urldecode('%F3%BE%87%93'),
		urldecode('%F3%BE%87%94'),
		urldecode('%F3%BE%87%95'),
		urldecode('%F3%BE%87%96'),
		urldecode('%F3%BE%87%97'),
		urldecode('%F3%BE%87%98'),
		urldecode('%F3%BE%87%99'),
		urldecode('%F3%BE%87%9B'), 
		urldecode('%F3%BE%8C%AC'),
		urldecode('%F3%BE%8C%AD'),
		urldecode('%F3%BE%8C%AE'),
		urldecode('%F3%BE%8C%AF'),
		urldecode('%F3%BE%8C%B0'),
		urldecode('%F3%BE%8C%B2'),
		urldecode('%F3%BE%8C%B3'),
		urldecode('%F3%BE%8C%B4'),
		urldecode('%F3%BE%8C%B6'),
		urldecode('%F3%BE%8C%B8'),
		urldecode('%F3%BE%8C%B9'),
		urldecode('%F3%BE%8C%BA'),
		urldecode('%F3%BE%8C%BB'),
		urldecode('%F3%BE%8C%BC'),
		urldecode('%F3%BE%8C%BD'),
		urldecode('%F3%BE%8C%BE'),
		urldecode('%F3%BE%8C%BF'), 
		urldecode('%F3%BE%8C%A0'),
		urldecode('%F3%BE%8C%A1'),
		urldecode('%F3%BE%8C%A2'),
		urldecode('%F3%BE%8C%A3'),
		urldecode('%F3%BE%8C%A4'),
		urldecode('%F3%BE%8C%A5'),
		urldecode('%F3%BE%8C%A6'),
		urldecode('%F3%BE%8C%A7'),
		urldecode('%F3%BE%8C%A8'),
		urldecode('%F3%BE%8C%A9'),
		urldecode('%F3%BE%8C%AA'),
		urldecode('%F3%BE%8C%AB'), 
		urldecode('%F3%BE%8D%80'),
		urldecode('%F3%BE%8D%81'),
		urldecode('%F3%BE%8D%82'),
		urldecode('%F3%BE%8D%83'),
		urldecode('%F3%BE%8D%84'),
		urldecode('%F3%BE%8D%85'),
		urldecode('%F3%BE%8D%86'),
		urldecode('%F3%BE%8D%87'),
		urldecode('%F3%BE%8D%88'),
		urldecode('%F3%BE%8D%89'),
		urldecode('%F3%BE%8D%8A'),
		urldecode('%F3%BE%8D%8B'),
		urldecode('%F3%BE%8D%8C'),
		urldecode('%F3%BE%8D%8D'),
		urldecode('%F3%BE%8D%8F'),
		urldecode('%F3%BE%8D%90'),
		urldecode('%F3%BE%8D%97'),
		urldecode('%F3%BE%8D%98'),
		urldecode('%F3%BE%8D%99'),
		urldecode('%F3%BE%8D%9B'),
		urldecode('%F3%BE%8D%9C'),
		urldecode('%F3%BE%8D%9E'), 
		urldecode('%F3%BE%93%B2'), 
		urldecode('%F3%BE%93%B4'),
		urldecode('%F3%BE%93%B6'), 
		urldecode('%F3%BE%94%90'),
		urldecode('%F3%BE%94%92'),
		urldecode('%F3%BE%94%93'),
		urldecode('%F3%BE%94%96'),
		urldecode('%F3%BE%94%97'),
		urldecode('%F3%BE%94%98'),
		urldecode('%F3%BE%94%99'),
		urldecode('%F3%BE%94%9A'),
		urldecode('%F3%BE%94%9C'),
		urldecode('%F3%BE%94%9E'),
		urldecode('%F3%BE%94%9F'),
		urldecode('%F3%BE%94%A4'),
		urldecode('%F3%BE%94%A5'),
		urldecode('%F3%BE%94%A6'),
		urldecode('%F3%BE%94%A8'), 
		urldecode('%F3%BE%94%B8'),
		urldecode('%F3%BE%94%BC'),
		urldecode('%F3%BE%94%BD'), 
		urldecode('%F3%BE%9F%9C'), 
		urldecode('%F3%BE%A0%93'),
		urldecode('%F3%BE%A0%94'),
		urldecode('%F3%BE%A0%9A'),
		urldecode('%F3%BE%A0%9C'),
		urldecode('%F3%BE%A0%9D'),
		urldecode('%F3%BE%A0%9E'),
		urldecode('%F3%BE%A0%A3'), 
		urldecode('%F3%BE%A0%A7'),
		urldecode('%F3%BE%A0%A8'),
		urldecode('%F3%BE%A0%A9'), 
		urldecode('%F3%BE%A5%A0'), 
		urldecode('%F3%BE%A6%81'),
		urldecode('%F3%BE%A6%82'),
		urldecode('%F3%BE%A6%83'), 
		urldecode('%F3%BE%AC%8C'),
		urldecode('%F3%BE%AC%8D'),
		urldecode('%F3%BE%AC%8E'),
		urldecode('%F3%BE%AC%8F'),
		urldecode('%F3%BE%AC%90'),
		urldecode('%F3%BE%AC%91'),
		urldecode('%F3%BE%AC%92'),
		urldecode('%F3%BE%AC%93'),
		urldecode('%F3%BE%AC%94'),
		urldecode('%F3%BE%AC%95'),
		urldecode('%F3%BE%AC%96'),
		urldecode('%F3%BE%AC%97'),
		);
	$pattern = "/ /";
	while(preg_match($pattern, $text)) {
		$text = preg_replace($pattern, $icon[array_rand($icon)], $text, 1);
	}
	
	return $text.'
	'.date('H:i:s - d/m/y').' - LikeCuoi•Vn';
}
}

/* End of file BotComment.php */
/* Location: ./application/controllers/CronJobs/BotComment.php */