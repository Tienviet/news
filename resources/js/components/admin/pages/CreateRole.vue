<template>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Basic form</h4>
                    <p class="card-description">
                        Basic form elements
                    </p>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input v-model="user.name" type="text" class="form-control" id="exampleInputName1"
                                   placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Display Name</label>
                            <input v-model="user.display_name" type="email" class="form-control" id="exampleInputEmail3"
                                   placeholder="Email">
                        </div>
                        <div class=" " v-for="item in items">
                            <label class="">
                                <input v-model="user.permission" type="checkbox" class=""
                                       :value="item.id">{{
                                item.display_name }}
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
    export default {
        name: "CreateRole",
        data: function () {
            return {
                items: [],
                user: {
                    name: '',
                    display_name: '',
                    permission: []
                }
            }
        },
        methods: {
            createUser() {
                event.preventDefault();
                var self = this;
                var data = self.user;
                console.log(data);
                axios.post('/api/roles', data)
                    .then(function () {
                        app.$router.push({path: '/list-role'});
                    }).catch(function () {

                })
            },
            getVueItems: function getVueItems() {
                var _this = this;

                axios.get('/api/permissions').then(function (response) {
                    _this.items = response.data;
                });
            }
        },
        mounted: function mounted() {
            this.getVueItems();
        },

    }
</script>

<style scoped>

</style>
