<template>
    <div class="row">
        <div class="table-responsive">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manager User</h4>
                        <router-link to="/create-role">
                            <button class="btn btn-success btn-sm"><i class="mdi mdi-plus"></i> Create</button>
                        </router-link>
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in items">
                                    <td>{{ item.name }}</td>
                                    <td>{{ item.display_name }}</td>
                                    <td>

                                        <router-link :to="{name :'EditUser',params:{id: item.id}}">
                                            <button type="button" class="btn btn-dark btn-sm">
                                                <i class="mdi mdi-cloud-download"></i>Edit
                                            </button>
                                        </router-link>

                                        <button type="button" class="btn btn-danger btn-sm">
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
</template>

<script>
    export default {
        name: "ListRole",
        data: function () {
            return {
                items: []
            }
        },
        mounted: function mounted() {
            this.getVueItems();
        },
        methods: {
            getVueItems: function getVueItems() {
                var _this = this;

                axios.get('/api/roles').then(function (response) {
                    _this.items = response.data;
                });
            }
        }
    }
</script>

<style scoped>

</style>
