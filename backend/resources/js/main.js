Vue.config.devtools = true;
import Vue from 'vue';
const room=document.getElementById('room');
// import InfiniteLoading from 'vue-infinite-loading'; // ライブラリの読み込み
// Vue.component('infinite-loading', InfiniteLoading); // コンポーネント化
// $(function() {
//     getNewData();
// });

new Vue({
    el: '#room',
    data:{
        page: 0,
        chats: JSON.parse(room.dataset.chats)
    },
    methods: {
        fetchChats() {
            console.log(`/member/${room.dataset.memberId}/fetch`);
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

        }
    }
});
