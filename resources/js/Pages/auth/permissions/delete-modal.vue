<template>
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalExample"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalExample">Are you Sure You wanted to Delete?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Delete" below if you want to delete role!.</div>
            <div class="modal-footer" v-if="permission != null">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <Link method="DELETE" class="btn btn-danger" :href="route('permissions.destroy',permission.id)  "
                   data-dismiss="modal">
                    Delete
                </Link>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
    components:{
        Link
    },
    data(){
        return {
            permission : null
        }
    },
    mounted(){
        Bus.$on('deletePermission',(permission) => {
            this.permission = permission;
            console.log(permission);
        });

    },
    beforeDestroy(){
        Bus.$off('deletePermission');
    }

}
</script>

<style>

</style>
