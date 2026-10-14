<template>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card card-default">
                    <div class="card-header">Active Users</div>

                    <div class="card-body">
                        <ul v-chat-scroll>


                            <li class="py-2" v-for="(user,index) in users" :key="index">
                                {{user.name}}

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                <div class="card card-default">
                    <div class="card-header">Messages</div>

                    <div class="card-body p-0">
                        <ul class="list-unstyled" style="height:300px;overflow-y:scroll" v-chat-scroll>
                            <li class="p-2" v-for="(message,index) in messages" :key="index">
                                <strong>{{message.user.name}}</strong>
                                {{message.message}}
                            </li>
                        </ul>
                    </div>

                    <input
                            @keydown="sendTypingEvent"
                            @keyup.enter="sendMessage"
                            v-model="newMessage"
                            type="text"
                            name="message"
                            class="form-control"
                            placeholder="Enter your message...."/>

                </div>
            </div>
        </div>

    </div>

</template>

<script>
    export default {

        props: ['user'
        ],
        data() {
            return {
                messages: [],
                newMessage: '',
                users: [],
                activeUser: false,
                typingTimer: false,
            }
        },

        created() {

            this.getMessages();
            Echo.join('globalchat').here(user => {
                if (this.messages.length >= 100) {
                    axios.get('/clearMessages');
                }
                this.users = user;
            }).joining(user => {
                if (this.users.length < 10) {
                    this.users.push(user);
                } else if(this.users.length==10){
                    this.users.push("many others++");
                    this.users.push(" ");
                }

            }).leaving(user => {

                this.users = this.users.filter(u => u.id != user.id);
            }).listen('GlobalMessageSent', (event) => {
                    this.messages.push(event.message);
                }
            ).listenForWhisper('typing', (user) => {
                this.activeUser = user;

                if (this.typingTimer) {
                    clearTimeout(this.typingTimer);
                }
                this.typingTimer = setTimeout(() => {
                        this.activeUser = false
                    }, 3000
                );
            });
        }
        ,


        methods: {
            getMessages() {

                axios.get('/messages').then(response => {
                    this.messages = response.data;
                })
            }
            ,
            sendMessage() {
                this.messages.push({
                    user: this.user,
                    message: this.newMessage
                });

                axios.post('/messages', {message: this.newMessage});
                this.newMessage = '';
            }
            ,
            sendTypingEvent() {
                Echo.join('globalchat').whisper('typing', this.user);
            }
        }
    }
    ;
</script>