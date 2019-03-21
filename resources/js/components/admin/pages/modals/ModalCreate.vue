<template>
  <modal name="modal-create">
    <div class="modal-header">
      <h5 class="modal-title">Create category</h5>
      <a class="close text-black" @click="$modal.hide('modal-create')">
        <span aria-hidden="true">&times;</span>
      </a>
    </div>
    <div class="modal-body">
      <form class="forms-sample">
        <div class="form-group">
          <label>Name</label>
          <input v-validate="'required'" v-model="category.name" :class="{err:errors.has('name')}" type="text"
                 class="form-control"
                 placeholder="Name" name="name">
          <span class="text-danger">{{ errors.first('name')}}</span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success mr-2" @click="submit()">Add</button>
          <button type="reset" class="btn btn-light">Cancel</button>
        </div>
      </form>
    </div>
  </modal>
</template>

<script>
    import {HTTP} from "@/BaseRequest";

    export default {
        name: "ModalCreate",
        data() {
            return {
                category: {}
            }
        },
        created() {

        },

        methods: {
            submit() {
                this.$validator.validateAll();
                this.createCate();
            },

            createCate() {
                this.$validator.validateAll();
                HTTP.post('api/category', this.category).then(() => {
                    this.$modal.hide('modal-create');
                    this.$emit('success');
                    this.$toast.success('Add category success !', {
                        duration: 5000,
                    })
                })

            }
        }
    }
</script>

<style scoped>

</style>
