<template>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Roles</h1>
        <Link :href="route('roles.create')" class="btn btn-sm btn-primary" >
            <i class="fas fa-plus"></i> Add New
        </Link>
    </div>

    <Alert></Alert>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Roles</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="40%">Name</th>
                            <th width="40%">Guard Name</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                           <tr v-for="role in roles.data" :key="role.id">
                               <td>{{role.name}}</td>
                               <td>{{role.guard_name}}</td>
                               <td style="display: flex">
                                   <Link :href="route('roles.edit', role.id)" class="btn btn-primary m-2">
                                        <i class="fa fa-pen"></i>
                                   </Link>
                                    <a class="btn btn-danger m-2" href="#" data-toggle="modal" data-target="#deleteModal" @click="delete_modal(role)">
                                            <i class="fas fa-trash"></i>
                                    </a>
                               </td>
                           </tr>
                        <PaginationVue :links="roles.links"></PaginationVue>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <DeleteModal ></DeleteModal>
</div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
import layoutVue from '@/Components/Layout/layout.vue';
import Alert from '@/Components/Alert/index.vue';
import { Head } from '@inertiajs/inertia-vue';
import  DeleteModal from '@/Pages/auth/roles/delete-modal.vue';
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
        roles : Object
    },
    methods:{
        delete_modal(role){
            console.log(role);
            Bus.$emit("deleteRole",role);
        },
    }
}
</script>

<style>

</style>
