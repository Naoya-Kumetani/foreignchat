window.addEventListener('load', function(e) {
    function sendData() {
      const XHR = new XMLHttpRequest();
  
      // FormData オブジェクトと form 要素を紐づける
      const FD  = new FormData(form);
  
    //   // リクエストをセットアップします

      const room=document.getElementById('room');
      XHR.open("POST", `/member/${room.dataset.memberId}/add`,true);
  
      // 送信したデータは、ユーザーがフォームで提供したものです
      XHR.send(FD);
    }
   
    // form 要素にアクセスしなければなりません
    const form = document.getElementById("new-message");
    const textarea = document.getElementById("form");
    const file = document.getElementById( "label" );

    // フォームの submit イベントを乗っ取ります
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      sendData();
      textarea.value = '';
      file.innerHTML='';
    });
  });




