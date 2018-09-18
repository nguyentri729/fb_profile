<template>
  <div class="page" data-name="all_app">

    <div class="page-content">
                <div class="page-content hide-navbar-on-scroll x-iphone-x">
    <div class="navbar">
      <div class="navbar-inner sliding">
        <div class="title">Tất cả các App</div>
      </div>
    </div>


                    <div class="row no-gap">
                        <div class="col-100 tablet-50">

                            <div class="x-box">
                               <!--  <div class="x-box-desc">Kho FTOS VIP CRACK</div>
                               <div class="x-box-title">Tất cả app</div>
                               <br><br>
                                -->
                      
                                <ul id="show_search">
                              
<?php

                                      include('../Mysql.php');
                                      $app_vip = $db->get('app_vip');

                                   ?>
                                   <?php foreach ($app_vip as $vip): 
                                    if($vip['id'] > 30){
                                      break;
                                    }
                                    ?>
 <li>
                                        <img src="<?=$vip['image']?>" class="x-box-icon" style="margin-top: 15px;">
                                        <div class="item-content" onclick="download_app(<?=$vip['id_main']?>)">
                                            <div class="x-li-line">
                                                <div class="x-box-app-title"><img src="mobile/appdesc/work.png" class="x-box-app-status-list"><?=$vip['name']?></div>
                                                <div class="x-box-app-desc">
                                                    <span class="x-box-app-spec" style="margin-left: 0px;"><i class="f7-icons x-icon-size">money_euro</i> VIP </span>
                                                    <span class="x-box-app-spec"><i class="f7-icons x-icon-size">info</i> FTOS X</span> 
                                                </div>
                                                <div class="x-box-cat" style="margin-bottom: -10px;">
                                                  Miễn phí
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                   <?php endforeach ?>


                                    

                                   <!--  <li>
                                       <div class="x-more-latest">
                                           <a href="/store-new/">Xem tất cả</a>
                                       </div>
                                   </li> -->

                                </ul>

                            </div>
                        </div>

                      

                    </div>
                </div>


    </div>
  </div>


</template>
  <script>
    $('#search-submit').click();
  </script>