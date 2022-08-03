<template>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Role</h1>
        <Link :href="route('roles.index')" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</Link>
    </div>
        <Alert></Alert>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Role</h6>
        </div>
        <div class="card-body">
            <form @submit.prevent="save">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Name</label>
                        <input
                            type="text"
                            class="form-control form-control-user" :class="errors.name ? 'is-invalid' : '' "
                            id="exampleName"
                            placeholder="Name"
                            name="name"
                            v-model="form.name">
                        <span class="text-danger" v-if="errors.name">{{errors.name}}</span>
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Guard Name</label>
                        <select class="form-control form-control-user" name="guard_name" :class="errors.guard_name ? 'is-invalid' : '' " v-model="form.guard_name">
                            <option selected disabled>Select Guard Name</option>
                            <option value="web" selected>Web</option>
                            <option value="api">Api</option>
                        </select>
                        <span class="text-danger" v-if="errors.guard_name">{{errors.guard_name}}</span>
                    </div>

                </div>

                 <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                    <Link class="btn btn-primary float-right mr-3 mb-3" :href="route('roles.index')">Cancel</Link>
                </div>

            </form>
        </div>
    </div>

</div>

</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
import layoutVue from '@/Components/Layout/layout.vue';
import Alert from '@/Components/Alert/index.vue';
import { Head } from '@inertiajs/inertia-vue';
import  DeleteModal from '@/Pages/auth/roles/delete-modal.vue';
export default {
    layout:layoutVue,
    components:{
        Link,
        Alert,
        Head,
        DeleteModal
    },
    data(){
        return{
            form: this.$inertia.form({
                name : null,
                guard_name : null
            })
        }
    },
    props:{
        errors : Object
    },
    methods:{
    save() {
      this.form.post(this.route("roles.store"), {
        preserveState: true,
         onError: errors => {
          if (Object.keys(errors).length > 0) {

          }
        },
        onSuccess: page => {
            this.form.reset();
        }
      });
    }
    }
}
</script>

<style>

</style>
