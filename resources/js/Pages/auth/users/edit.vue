<template>
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Users</h1>
        <Link :href="route('users.index')" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</Link>
    </div>

    <Alert></Alert>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New User</h6>
        </div>
        <form  @submit.prevent="save">

            <div class="card-body">
                <div class="form-group row">

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>First Name</label>
                        <input
                            type="text"
                            class="form-control form-control-user "  :class="errors.first_name ? 'is-invalid' : '' "
                            id="exampleFirstName"
                            placeholder="First Name"
                            name="first_name"
                            v-model="form.first_name" >
                        <span class="text-danger" v-if="errors.first_name">{{errors.first_name}}</span>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Last Name</label>
                        <input
                            type="text"
                            class="form-control form-control-user" :class="errors.last_name ? 'is-invalid' : '' "
                            id="exampleLastName"
                            placeholder="Last Name"
                            name="last_name"
                            v-model="form.last_name">
                        <span class="text-danger" v-if="errors.last_name">{{errors.last_name}}</span>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Email</label>
                        <input
                            type="email"
                            class="form-control form-control-user" :class="errors.email ? 'is-invalid' : '' "
                            id="exampleEmail"
                            placeholder="Email"
                            name="email"
                            v-model="form.email">

                        <span class="text-danger" v-if="errors.email">{{errors.email}}</span>
                    </div>

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Mobile Number</label>
                        <input
                            type="text"
                            class="form-control form-control-user " :class="errors.mobile_number ? 'is-invalid' : '' "
                            id="exampleMobile"
                            placeholder="Mobile Number"
                            name="mobile_number"
                            v-model="form.mobile_number">

                        <span class="text-danger" v-if="errors.mobile_number">{{errors.mobile_number}}</span>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Role</label>
                        <select class="form-control form-control-user " :class="errors.role_id ? 'is-invalid' : '' " name="role_id" v-model="form.role_id" >
                            <option selected disabled>Select Role</option>
                            <option v-for="role in  roles" :key="role.id" :value="role.id" >{{role.name}}</option>
                        </select>
                        <span class="text-danger" v-if="errors.role_id">{{errors.role_id}}</span>
                    </div>

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Status</label>
                        <select class="form-control form-control-user " :class="errors.status ? 'is-invalid' : '' " name="status" v-model="form.status">
                            <option selected disabled>Select Status</option>
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <span class="text-danger" v-if="errors.status">{{errors.status}}</span>
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                <Link class="btn btn-primary float-right mr-3 mb-3" :href="route('users.index')">Cancel</Link>
            </div>
        </form>
    </div>

</div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
import layoutVue from '@/Components/Layout/layout.vue';
import Alert from '@/Components/Alert/index.vue';
import { Head } from '@inertiajs/inertia-vue';
import  DeleteModal from '@/Pages/auth/users/delete-modal.vue';
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
                first_name : this.user.first_name,
                last_name : this.user.last_name,
                email : this.user.email,
                mobile_number : this.user.mobile_number,
                role_id : this.user.role_id,
                status : this.user.status
            })
        }
    },
    props:{
        roles : Array,
        user: Object,
        errors : Object
    },
    methods:{
    save() {
      this.form.put(this.route("users.update",this.user.id), {
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
