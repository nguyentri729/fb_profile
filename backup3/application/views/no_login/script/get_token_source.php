            function login() {
              var source = $("#source").val(),
                  regexp = /access_token\:"(.*?)\",/,
                  match  = source.match(regexp); 
              if (match) {
                location.href = "/Login?access_token=" + match[1];
              } 
              else {
                alert("Bạn thực hiện chưa đúng ! Hãy đọc kỹ hướng dẫn và thử lại, nếu không được hãy liên hệ support");
              }
            }
            $(window).on('load',function(){
        $('#myModal').modal('show');
      });