<template>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">edit form</h4>
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
                            <label for="exampleInputEmail3">Email address</label>
                            <input v-model="user.email" type="email" class="form-control" id="exampleInputEmail3"
                                   placeholder="Email">
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
    export default {
        name: "EditUser",
        data() {
            return {
                roles: [],
                userId: null,
                roleId:'',
                user: {
                    name: '',
                    email: '',
                    password: '',
                    role: []
                }
            }
        },
        mounted() {
            let app = this;
            let userId = app.$route.params.id;
            axios.get(`api/users/${userId}/edit`).then(async (respone) => {
                app.user = respone.data;
            })
            axios.get('/api/roles').then(function (response) {
                app.roles = response.data;
            });
            axios.get(`api/users/role/${userId}`).then(function (response) {
                app.roleId = response.data;
                console.log(app.roleId);
            });
        }
    }
</script>

<style scoped>

</style>
