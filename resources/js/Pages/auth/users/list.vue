<template>
  <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>
            <div class="row">
                <div class="col-md-6">
                    <Link :href="route('users.create')" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </Link>
                </div>
                <div class="col-md-6">
                    <Link :href="route('users.export')" class="btn btn-sm btn-success">
                        <i class="fas fa-check"></i> Export To Excel
                    </Link>
                </div>

            </div>

        </div>
        <Alert></Alert>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Users</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="20%">Name</th>
                                <th width="25%">Email</th>
                                <th width="15%">Mobile</th>
                                <th width="15%">Role</th>
                                <th width="15%">Status</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr v-for="user in  users.data" :key="user.id">
                                    <td>{{ user.first_name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>{{ user.mobile_number }}</td>
                                    <td>
                                        <span v-for="role in  user.roles" :key="role.id">{{ role.name }}</span></td>
                                    <td>
                                            <span class="badge badge-danger" v-if="user.status == 0">Inactive</span>
                                            <span class="badge badge-success" v-else>Active</span>
                                    </td>
                                    <td style="display: flex">
                                            <Link v-if="user.status == 0" :href="route('users.status', [user.id,1])"
                                                class="btn btn-success m-2">
                                                <i class="fa fa-check"></i>
                                            </Link>
                                            <Link v-else :href="route('users.status', [user.id,0])"
                                                class="btn btn-danger m-2">
                                                <i class="fa fa-ban"></i>
                                            </Link>
                                        <Link :href="route('users.edit',user.id)"
                                            class="btn btn-primary m-2">
                                            <i class="fa fa-pen"></i>
                                        </Link>
                                        <a class="btn btn-danger m-2" href="#" data-toggle="modal" data-target="#deleteModal" @click="delete_modal(user)">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <PaginationVue :links="users.links"></PaginationVue>
    <DeleteModal ></DeleteModal>
    </div>

</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
import layoutVue from '@/Components/Layout/layout.vue';
import Alert from '@/Components/Alert/index.vue';
import { Head } from '@inertiajs/inertia-vue';
import  DeleteModal from '@/Pages/auth/users/delete-modal.vue';
import PaginationVue from "@/Components/Layout/Pagination.vue";
export default {
    layout:layoutVue,
    components:{
        Link,
        Alert,
        Head,
        DeleteModal,
        PaginationVue
    },
    data(){
        return{
        }
    },
    props:{
        users : Object
    },
    methods:{
        delete_modal(user){
            console.log(user);
            Bus.$emit("deleteUser",user);
        },
    }
}
</script>

<style>

</style>
