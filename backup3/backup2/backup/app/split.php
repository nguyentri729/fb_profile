<?php
$xml_str= '<plist version="1.0">
<dict>
   <key>items</key>
   <array>
       <dict>
           <key>assets</key>
           <array>
               <dict>
                   <key>kind</key>
                   <string>software-package</string>
                   <key>url</key>
                   <string>http://vip.ftios.vn/000G/kodi22.ipa</string>
               </dict>
               <dict>
                   <key>kind</key>
                   <string>display-image</string>
                   <key>needs-shine</key>
                   <true/>
                   <key>url</key>
                   <string>http://vip.ftios.vn/img/kodi1.png</string>
               </dict>
           </array><key>metadata</key>
           <dict>
               <key>bundle-identifier</key>
               <string>vn.a6da7f60bf.XYn9ful</string>
               <key>bundle-version</key>
               <string>17.6</string>
               <key>kind</key>
               <string>software</string>
               <key>title</key>
<string>
Kodi (000G)
 FTiOS Team </string>
           </dict>
       </dict>
   </array>
</dict>
</plist>';
/* libxml_use_internal_errors(true);
$st = simplexml_load_string($xml_str);
var_dump($st);*/


echo substr($test, 0, -25);
?>
