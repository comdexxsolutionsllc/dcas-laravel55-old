<template>
    <div id="onlineUsers">
        <div class="row">
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <span class="message">
                        There {{ pluralize('is', online) }} currently {{ online }} {{ pluralize('user', online) }} online.
                    </span>
                    <ul class="users" v-if="users">
                        <li v-for="user in users"><strong>{{ user }}</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import pluralize from 'pluralize';

    export default {
        data() {
            return {
                online: '',
                users: []
            }
        },
        mounted() {
            this.checkForUsers(60);
        },
        methods: {
            onlineUsers() {
                axios.post('/api/v1/online-users').then(response => {
                    this.users = response.data.users;
                    this.online = this.users.length;
                });
            },
            checkForUsers(time) {
                this.onlineUsers();

                setInterval(function () {
                    this.onlineUsers();
                }.bind(this), time * 1000);
            },
            pluralize
        }
    }
</script>

<style>
    #onlineUsers {
        margin-left: 25px;
        color: white;
    }

    .message {

    }

    .panel {
        background-color: #0d6aad;
    }

    .users {
        margin-left: -25px;
        list-style-type: none;
    }
</style>
