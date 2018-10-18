<style type="text/css">
    /*-- Global Selectors --*/
a{
    color:#47649F;
}

.card img {
    width: auto !important;
}
/*-- Content Style --*/
.post-footer-option li{
    float:left;
    margin-right:50px;
    padding-bottom:15px;
}

.post-footer-option li a{
    color:#AFB4BD;
    font-weight:500;
    font-size:1.3rem;
}

.photo-profile{
    border:1px solid #DDD;    
}

.anchor-username h4{
    font-weight:bold;    
}

.anchor-time{
    color:#ADB2BB;
    font-size:1.2rem;
}

.post-footer-comment-wrapper{
    background-color:#F6F7F8;
}
.btn.btn-default{
  background-color: #ffffff!important;
  color: #2196f3!important;
}
</style>

<?php
$time_st = time();
$info_members = $this->m_func->info_member();
$this->db->select('posts.id, posts.post_where, posts.ab_gr, posts.time_post, posts.image, posts.message, posts.privacy');
$this->db->from('posts');
$this->db->where('auto_post.id_fb', $this->session->userdata('id_fb'));
$this->db->where("auto_post.time_use > $time_st");
$this->db->join('auto_post', 'auto_post.id_fb = posts.id_fb');
$query = $this->db->get();
//$this->output->enable_profiler(TRUE);
?>
<?php foreach ($query->result_array() as $posts): ?>
   <div class="col-md-6">
       <div class="card">
            <div class="card-content">

               <section class="post-heading">
                    <div class="row">
                        <div class="col-md-12">
                           <div class="media text-primary">
                               <?php
                                switch ($posts['post_where']) {
                                  case 'profile':
                                    echo '<button class="btn btn btn-default btn-block btn-xs">Đăng lên trang cá nhân</button>';
                                    break;
                                  case 'group':
                                    echo '<button class="btn btn btn-default btn-block btn-xs" onclick="group(\''.$posts['ab_gr'].'\')" data-toggle="popover" data-content="đang tải..." data-html="true" data-placement="bottom">Đăng lên nhóm</button>';
                                    break;
                                  default:
                                   echo '<button class="btn btn btn-default btn-block btn-xs" onclick="albums(\''.$posts['ab_gr'].'\')" data-toggle="popover" data-content="đang tải..." data-html="true" data-placement="bottom">Đăng vào albums</button>';
                                    break;
                                }
                               ?>
                            </div>
                            <div class="media">
                              <div class="media-left">
                                <a href="#">
                                  <img class="media-object photo-profile" src="https://graph.fb.me/<?=$info_members['id_fb']?>/picture?width=60" width="60" height="60" alt="<?=$info_members['name']?>">
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="#" class="anchor-username"><h4 style="font-size: 16px;" class="media-heading"><?=$info_members['name']?></h4></a> 
                                <a href="#" class="anchor-time"><?php

                               
                                if($posts['time_post'] < time()){
                                  echo ''.date("Y-m-d H:i", $posts['time_post']).' ('.$this->m_func->timeAgo($posts['time_post']).')';
                                }else{
                                  echo ''.date("Y-m-d H:i", $posts['time_post']).' ('.$this->m_func->time_remaining($posts['time_post']).' nữa)';
                                }
                                ?></a> <?php
                                  switch ($posts['privacy']) {
                                    case 'everyone':
                                      echo '<a href="#" class="anchor-time" data-toggle="tooltip" title="Công khai"><i class="fa fa-globe"></i>';
                                      break;
                                    case 'friend':
                                      echo '<a href="#" class="anchor-time" data-toggle="tooltip" title="Bạn bè"><i class="fa fa-users"></i>';
                                      break;
                                    default:
                                      echo '<a href="#" class="anchor-time" data-toggle="tooltip" title="Chỉ mình tôi"><i class="fa fa-lock"></i>';
                                      break;
                                  }
                                ?></a> 
                              </div>
                            </div>
                        </div>
                         
                    </div>             
               </section><br>
               <section class="post-body">
                   <p><?=$posts['message']?></p>
                  
                   <div class="row">
                        <?php
                        $decode_img = json_decode($posts['image'], true);
                       
                        if($decode_img != null){
                          echo '<br>';
                            foreach ($decode_img as $img) {
                             ?>
                                 <div class="col-md-4 col-xs-4 col-lg-4 col-sm-4" style="padding: 3%;">
                                       <img src="<?=$img?>" class="img-responsive" alt="Ảnh kèm theo">
                                 </div>
                             <?php
                            }
                        }
                       
                       ?>
                     

                   </div>
               </section>
               <section class="post-footer">
                   <hr>
                   <div class="post-footer-option container">
                        <ul class="list-unstyled text-center">
                            <li><a href="#" onclick="delete_post(<?=$posts['id']?>)" style="color: red!important;"><i class="fa fa-trash"></i> Xóa lịch</a></li>
                            <?php
                            if(time() >= $posts['time_post']){
                              echo '<li ><a href="#" style="color: #4CAF50!important;" ><i class="fa fa-check"></i> Đã đăng bài</a></li>';
                            }
                            ?>
                        </ul>
                   </div>
                   
               </section>
            </div>
        </div>   
    </div>

<?php endforeach ?>
 