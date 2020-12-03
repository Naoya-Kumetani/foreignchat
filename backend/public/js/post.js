window.addEventListener('load', function(e) {
    function sendData() {
      const XHR = new XMLHttpRequest();
  
      // FormData オブジェクトと form 要素を紐づけます
      const FD  = new FormData(form);
  
    //   // データが正常に送信された場合に行うことを定義します
    //   XHR.addEventListener("submit", function(event) {
    //     alert(event.target.responseText);
    //   });
  
    //   // エラーが発生した場合に行うことを定義します
    //   XHR.addEventListener("error", function(event) {
    //     alert('Oups! Something goes wrong.');
    //   });
  
    //   // リクエストをセットアップします

      const room=document.getElementById('room');
      XHR.open("POST", `/menber/${room.dataset.menberId}/add`,true);
  
      // 送信したデータは、ユーザーがフォームで提供したものです
      XHR.send(FD);
    }
   
    // form 要素にアクセスしなければなりません
    const form = document.getElementById("new-message");
    const textarea = document.getElementById("form");
  
    // フォームの submit イベントを乗っ取ります
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      sendData();
      textarea.value = '';
    });
  });