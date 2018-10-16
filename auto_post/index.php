
<?php
require_once __DIR__ . '/vendor/autoload.php'; // change path as needed

$fb = new \Facebook\Facebook([
  'app_id' => '6628568379',
  'app_secret' => 'c1e620fa708a1d5696fb991c1bde5662',
  'default_graph_version' => 'v2.10'
  
]);
$posts = json_decode(file_get_contents('http://localhost/CronJobs/AutoPost'),true);


foreach ($posts as $post) {
	$anh = false;
	$fb->setDefaultAccessToken($post['access_token']);
	$attached_media = []; 

	if($post['privacy'] == 'albums'){

		$arr_gr = json_decode($post['ab_gr'], false, 512, JSON_BIGINT_AS_STRING);
    	

		foreach (json_decode($post['image'], true) as $photo) {
	       $data = array(
	        'url' => $photo,
	        'caption' => $post['message'],
	        'privacy' => array(
           		 'value' => privacy_convert($post['privacy'])
         	 )
	      );
	      $response = $fb->post($arr_gr[array_rand($arr_gr, 1)].'/photos', $data);
	      echo $response->getGraphNode()['id'];
	    }
	   continute();
	}

    foreach (json_decode($post['image'], true) as $photo) {
       $data = array(
        'url' => $photo,
        'published' => false

      );
      $response = $fb->post('/me/photos', $data);
      if(isset($response->getGraphNode()['id'])){
        array_push($attached_media, '{"media_fbid":"'.$response->getGraphNode()['id'].'"}');
      }
    }
    $arr_post = array(
    	'message' => $post['message']
    );
    if(count($attached_media) > 0){
    	$arr_post['attached_media'] = $attached_media;
    	$anh = true;
    }
    switch ($post['post_where']) {
    	case 'group':
    		$arr_gr = json_decode($post['ab_gr'], false, 512, JSON_BIGINT_AS_STRING);
    		$url = $arr_gr[array_rand($arr_gr, 1)].'/feed';
    		
    		break;
    	default:
    		$url ='me/feed';
    		break;
    }
     $post_img = $fb->post($url, $arr_post);
	 if(isset($post_img->getGraphNode()['id'])){

        $id_post = $post_img->getGraphNode()['id'];
        if($id_post !=''){
        	file_get_contents('http://sv1.hethongbotvn.com')
        }
        var_dump($fb->post($id_post, array(
          'privacy' => array(
            'value' => privacy_convert($post['privacy'])
          )
        ))->getGraphNode());
     }

}
function privacy_convert($pr){
	switch ($pr) {
		case 'everyone':
			return 'EVERYONE';
			break;
		case 'friend':
			return 'ALL_FRIENDS';
			break;
		default:
			return 'SELF';
			break;
	}
}
exit();
try {

$fb->setDefaultAccessToken('EAAAAAYsX7TsBAMTdANVgB9QNHBnZB13AtZACd6nLZCHMKyGbYMOmMMQcGYPx95IqUDFscX0rR3Iq97RjVwRXhDeb4UNf9uAOv1T9oV5dkXuYBd2YnYWgMyDQCodZAdyAQizBL2TI51LAblCeVje8KdXS5GmlZBksXXV7xBkQ5KwWYMfunGxXlpfhycEZBpWLQPpdmZCZCWR2mG2dYZAIXDOLq');

    $attached_media = array();
    $img = array(
      'https://i.imgur.com/EXV7VLc.jpg',
      'https://i.imgur.com/c6FBJGu.jpg',
      'https://i.imgur.com/HTYnO35.jpg',
      'https://i.imgur.com/SyUX45T.jpg'
    );
    foreach ($img as $photo) {
       $data = array(
        'url' => $photo,
        'published' => false

      );
      $response = $fb->post('/me/photos', $data);
      if(isset($response->getGraphNode()['id'])){
        array_push($attached_media, '{"media_fbid":"'.$response->getGraphNode()['id'].'"}');
      }
    }
    //array post
     $post_img = $fb->post('/me/feed', array(
            'message' => 'Testing multi-photo post! ',
            'attached_media' => $attached_media
     ));
     if(isset($post_img->getGraphNode()['id'])){
        var_dump($fb->post($post_img->getGraphNode()['id'], array(
          'privacy' => array(
            'value' => 'SELF'
          )
        ))->getGraphNode());
     }
    
    
    
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
