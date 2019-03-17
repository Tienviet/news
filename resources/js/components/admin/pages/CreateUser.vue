<template>
    <div class="row">
        <div class="col-md-12 grid-margin  mt-5">
            <div class="">
                <div class="card-body">
                    <h4 class="card-title">Basic form</h4>
                    <p class="card-description">
                        Basic form elements
                    </p>
                    <form class="">
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input v-model="user.name" type="text" class="form-control" id="exampleInputName1"
                                   placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email address</label>
                            <input v-model="user.email" type="email" class="form-control" id="exampleInputEmail3"
                                   placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input v-model="user.password" type="password" class="form-control"
                                   placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control"
                                   placeholder="Confirm Password">
                        </div>
                        <div class="" v-for="item in roles">
                            <label class="">
                                <input v-model="user.role" type="checkbox" :value="item.id">{{ item.display_name}}
                            </label>
                        </div>
                        <button type="button" class="btn btn-success mr-2" @click="createUser()">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ListPage from './ListPage.vue';

    export default {
        name: "CreateUser",

        components: {
            ListPage
        },

        data() {
            return {
                roles: [],
                permissions: [],
                user: {
                    name: '',
                    email: '',
                    password: '',
                    role: []
                }
            }
        },

        methods: {
            createUser() {
                axios.post('api/users', data)
                    .then(function () {
                        this.$router.push({path: '/list-user'});
                    }).catch(function () {

                })
            },

            getRoles: function getVueItems() {
                axios.get('/api/roles').then(function (response) {
                    this.roles = response.data;
                });
            },
        },

        mounted: function mounted() {
            this.getRoles();
        },

    }
</script>

<style scoped>

</style>
