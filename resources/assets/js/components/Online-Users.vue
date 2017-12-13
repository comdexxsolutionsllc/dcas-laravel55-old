<template>
    <div id="onlineUsers">
        <div class="row">
            <div class="panel panel-default">
                There {{ pluralize('is', online) }} currently {{ online }} {{ pluralize('user', online) }} online.
                <ul class="users" v-if="users">
                    <li v-for="user in users"><strong>{{ user }}</strong></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import pluralize from 'pluralize';

    export default {
        data() {
            return {
                online: 0,
                users: []
            }
        },
        mounted() {
            this.onlineUsers();

            setInterval(function () {
                this.onlineUsers();
            }.bind(this), 30000);
        },
        methods: {
            onlineUsers() {
                axios.post('/api/v1/online-users').then(response => {
                    this.online = response.data.count;
                    this.users = response.data.users;
                });
            },
            pluralize
        }
    }
</script>

<style>
    #onlineUsers {
        margin-left: 25px;
    }

    .users {
        margin-left: -25px;
        list-style-type: none;
    }
</style>
