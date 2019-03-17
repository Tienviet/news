<template>
    <div>
        <div class="row">
            <div class="table-responsive">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Manager User</h4>
                            <router-link to="/create-user">
                                <button class="btn btn-success btn-sm"><i class="mdi mdi-plus"></i> Create</button>
                            </router-link>
                            <div class="table-responsive">
                                <table class="table table-hover ">
                                    <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Date Created</th>
                                        <th class="text-center">Level</th>
                                        <th colspan="2" class="text-center">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in items">
                                        <td>{{ item.name }}</td>
                                        <td>{{ item.email }}</td>
                                        <td>{{ item.created_at }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-success btn-rounded btn-fw">{{ item.id
                                                }}
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <router-link :to="{name :'EditUser',params:{id: item.id}}">
                                                <button type="button" class="btn btn-dark btn-sm">
                                                    <i class="mdi mdi-cloud-download"></i>Edit
                                                </button>
                                            </router-link>
                                            <button @click="deleteUser()" type="button" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash-o"></i>Delete
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {HTTP} from '@/BaseRequest.js';

    export default {

        name: "UserTable",

        data() {
            return {
                items: [],
            }
        },

        mounted() {
            this.getVueItems();
        },

        methods: {

            getVueItems() {
               HTTP.get('api/users').then(response => {
                   this.items = response.data;
               })
            },

            deleteUser() {
                console.log('faffs', this)

            }

        }
    }
</script>

<style scoped>
</style>
