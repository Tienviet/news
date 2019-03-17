<template>
    <div>
        <label>
            <input v-model="isShow" type="checkbox" class=""
                   @click="showData()"> {{ title }}
        </label>
        <div style="margin-left: 50px"
             v-for="items in permissions"
             v-show="isShow">

            <label class="">
                <input type="checkbox" class="">
                {{ items.display_name }}
            </label>
        </div>

    </div>
</template>

<script>
    export default {
        name: "ListPage",

        data: function () {
            return {
                isShow: false,
                permissions: []
            }
        },
        props: [
            'id',
            'title'
        ],

        mounted() {
            this.getListPermission(this.id);
        },

        methods: {

            showData() {
                this.isShow = !this.isShow
            },
            getListPermission(roleID) {
                let self = this;
                axios.get(`/api/roles/${roleID}/edit`).then(function (response) {
                    self.permissions = response.data;
                });
            },
        }
    }
</script>

<style scoped>

</style>