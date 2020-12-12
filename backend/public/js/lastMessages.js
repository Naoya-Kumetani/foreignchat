function escapeHTML(str) {
    return str.replace(/&/g, '&amp;')
              .replace(/</g, '&lt;')
              .replace(/>/g, '&gt;')
              .replace(/"/g, '&quot;')
              .replace(/'/g, '&#039;');
  }
$(function() {
    get_data();
});


function get_data() {
    $.ajax({
        url: "result/ajax/",
        dataType: "json",
        success: data => {
            $("#comment-data")
                .find(".comment-visible")
                .remove();
        
            for (var i = 0; i < data.chats.length; i++) {
                if(data.chats[i].file){
                    var html = `
                            <div class="media comment-visible">
                                <div class="media-body comment-body">
                                    <div>
                                        <span class="comment-body-user" id="name">${escapeHTML(data.chats[i].member.name)}</span> |
                                        <span class="comment-body-time" id="created_at">
                                        ${new Date(data.chats[i].created_at).toLocaleString('ja',{
                                            "hour12": false,
                                            "month": "numeric",
                                            "day": "numeric",
                                            "hour": "2-digit",
                                            "minute": "2-digit"
                                        })}
                                        </span> |
                                        <span class="comment-body-content" id="comment">${escapeHTML(data.chats[i].body)}</span> |
                                        <span class="comment-body-content" id="file"><img style="max-width:320px;max-height:180px;" src="${data.chats[i].file}"></span>
                                    </div>
                                </div>
                            </div>
                        `;
        
                    $("#comment-data").append(html);
                }else{
                    var html = `
                                <div class="media comment-visible">
                                    <div class="media-body comment-body">
                                        <div>
                                            <span class="comment-body-user" id="name">${escapeHTML(data.chats[i].member.name)}</span> |
                                            <span class="comment-body-time" id="created_at">
                                            ${new Date(data.chats[i].created_at).toLocaleString('Ja',{
                                                "hour12": false,
                                                "month": "numeric",
                                                "day": "numeric",
                                                "hour": "2-digit",
                                                "minute": "2-digit"
                                            })}
                                            </span> |
                                            <span class="comment-body-content" id="comment">${escapeHTML(data.chats[i].body)}</span>
                                        </div>
                                    </div>
                                </div>
                            `;
            
                    $("#comment-data").append(html);
                }
            }
        },
        error: () => {
            alert("ajax Error");
        }
    });

    setTimeout("get_data()", 3000);
}
