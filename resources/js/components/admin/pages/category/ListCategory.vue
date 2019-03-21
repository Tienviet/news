<template>
  <div>
    <div class="row">
      <div class="table-responsive">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Manager category</h4>
                <button class="btn btn-success btn-sm" @click="create()"><i class="mdi mdi-plus"></i> Create</button>
              <div class="table-responsive">
                <table class="table a">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th colspan="2" class="text-center">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-for="(item,index) in items">
                    <td>{{ index + 1 }}</td>
                    <td>{{ item.name }}</td>
                    <td class="text-center">
                      <button type="button" class="btn btn-dark btn-sm">
                        <i class="mdi mdi-cloud-download"></i>Edit
                      </button>
                      <button @click="deleteCate()" type="button" class="btn btn-danger btn-sm">
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
    <modal-create></modal-create>
    <!--<v-dialog/>-->
  </div>
</template>

<script>
    import {HTTP} from "@/BaseRequest";
    import ModalCreate from "../modals/ModalCreate"

    export default {
        name: "ListCategory",
        components: {
            ModalCreate
        },

        data() {
            return {
                items: [],
                category: {
                    name: []
                }
            }
        },
        created() {
            this.getCategory();

        },
        methods: {
            getCategory() {
                HTTP.get('api/category').then(respone => {
                    this.items = respone.data;
                })
            },

            create(){
              this.$modal.show('modal-create')
            },

            deleteCate(){
                this.$modal.show('dialog',{
                    title: 'Delete category',
                    text: 'Are you delete category ?',
                    buttons: [
                        {
                            title: 'Delete',
                        }
                    ]
                })
            },

            createCate(){
              console.log('dhdhdfdfjkd')
            }

        }
    }
</script>

<style scoped>

</style>
