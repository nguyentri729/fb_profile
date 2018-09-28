<?php
require_once __DIR__ . '/vendor/autoload.php'; // change path as needed

$fb = new \Facebook\Facebook([
  'app_id' => '6628568379',
  'app_secret' => 'c1e620fa708a1d5696fb991c1bde5662',
  'default_graph_version' => 'v2.10',
  'default_access_token' => 'EAAAAAYsX7TsBAMTdANVgB9QNHBnZB13AtZACd6nLZCHMKyGbYMOmMMQcGYPx95IqUDFscX0rR3Iq97RjVwRXhDeb4UNf9uAOv1T9oV5dkXuYBd2YnYWgMyDQCodZAdyAQizBL2TI51LAblCeVje8KdXS5GmlZBksXXV7xBkQ5KwWYMfunGxXlpfhycEZBpWLQPpdmZCZCWR2mG2dYZAIXDOLq', // optional
]);
//EAAAAAYsX7TsBAMTdANVgB9QNHBnZB13AtZACd6nLZCHMKyGbYMOmMMQcGYPx95IqUDFscX0rR3Iq97RjVwRXhDeb4UNf9uAOv1T9oV5dkXuYBd2YnYWgMyDQCodZAdyAQizBL2TI51LAblCeVje8KdXS5GmlZBksXXV7xBkQ5KwWYMfunGxXlpfhycEZBpWLQPpdmZCZCWR2mG2dYZAIXDOLq
//EAAAAAYsX7TsBANfQGpymmBZAfHyqMD4iCFNwHizadGVkRPbxDSSKcJYgbQHlMnBAwRMCcL7vyp9TXGTBylZCVGCNI8lGSPR2uLPrRILqG7jVWJJOtjoz98QSeQwO2e0uKSePASEf0zsbLjs13PGCjNsXPjZA6gwLQPkRIRDZAWARWV2dHtPRv4GpiWUdJfZBqveVzMM23YQEQlrd9r0UZC
try {

/*$fb->setDefaultAccessToken('EAAAAAYsX7TsBAMTdANVgB9QNHBnZB13AtZACd6nLZCHMKyGbYMOmMMQcGYPx95IqUDFscX0rR3Iq97RjVwRXhDeb4UNf9uAOv1T9oV5dkXuYBd2YnYWgMyDQCodZAdyAQizBL2TI51LAblCeVje8KdXS5GmlZBksXXV7xBkQ5KwWYMfunGxXlpfhycEZBpWLQPpdmZCZCWR2mG2dYZAIXDOLq');*/
  $res = $fb->get('GET','/search', array(
    'q' => 'ok',
    'type' => 'post'
  ));
  var_dump($res->getGraphNode());
  /* $attached_media = array();
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
     }*/
    
    
    
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
