try {

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