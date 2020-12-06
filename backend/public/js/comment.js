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
                                    <div class="row">
                                        <span class="comment-body-user" id="name">${data.chats[i].member.name}</span>
                                        <span class="comment-body-time" id="created_at">${new Date(data.chats[i].created_at).toLocaleString({hour12:true})}</span>
                                    </div>
                                    <span class="comment-body-content" id="comment">${data.chats[i].body}</span>
                                    <span class="comment-body-content" id="file"><img src="${data.chats[i].file}"></span>
                                </div>
                            </div>
                        `;
        
                    $("#comment-data").append(html);
                }else{
                    var html = `
                                <div class="media comment-visible">
                                    <div class="media-body comment-body">
                                        <div class="row">
                                            <span class="comment-body-user" id="name">${data.chats[i].member.name}</span>
                                            <span class="comment-body-time" id="created_at">${new Date(data.chats[i].created_at).toLocaleString({hour12:true})}</span>
                                        </div>
                                        <span class="comment-body-content" id="comment">${data.chats[i].body}</span>
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

    setTimeout("get_data()", 1000);
}
