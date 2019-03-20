<template>
  <modal name="modal-create">
    <div class="modal-header">
      <h5 class="modal-title">Create category</h5>
      <a  class="close text-black" @click="$modal.hide('modal-create')">
        <span aria-hidden="true">&times;</span>
      </a>
    </div>
    <div class="modal-body">
      <form class="forms-sample">
        <div class="form-group">
          <label for="exampleInputName1">Name</label>
          <input v-model="name" type="text" class="form-control" id="exampleInputName1"
                 placeholder="Name">
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-success mr-2" @click="createUser()">Submit</button>
        <button class="btn btn-light">Cancel</button>
        </div>
      </form>
    </div>
  </modal>
</template>

<script>
    export default {
        name: "ModalCreate"
    }
</script>

<style scoped>

</style>
