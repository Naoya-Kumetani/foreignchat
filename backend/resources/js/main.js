Vue.config.devtools = true;
import Vue from 'vue';
const room=document.getElementById('room');

new Vue({
    el: '#room',
    data:{
        page: 0,
        chats: JSON.parse(room.dataset.chats),
    },
    methods: {
        fetchChats() {
            axios.get(`/member/${room.dataset.memberId}/fetch`, {
                params: {
                    beforeId: this.chats[0].id,
                    page: this.page
                }
            })
            .then(response => {
                if (response.data.chats.length) {
                    this.page++;
                    response.data.chats.forEach (value => {
                        this.chats.unshift(value);
                    });
                }
            })
            .catch(error => {
                console.log(error);
            })

        },getNewMessage(){
            if(this.chats.length){
                axios.get(`/member/${room.dataset.memberId}/getNewMessages`, {
                        params: {
                            latestId:this.chats.slice(-1)[0].id
                        }
                })
                .then(response => {
                    if (response.data.newMessages.length) {
                        response.data.newMessages.forEach (value => {
                            this.chats.push(value);
                        });
                    }
                })
                .catch(error => {
                    console.log(error);
                })
            } else {
                axios.get(`/member/${room.dataset.memberId}/getNewMessages`, {
                    params: {
                        latestId:'newId'
                    }
            })
            .then(response => {
                if (response.data.newMessages.length) {
                    response.data.newMessages.forEach (value => {
                        this.chats.unshift(value);
                    });
                }
            })
            .catch(error => {
                console.log(error);
            })
            }
        }
    },created:function(){setInterval(this.getNewMessage, 3000)}
});
