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
            <div class="modal-footer" v-if="role != null">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <Link method="DELETE" class="btn btn-danger" :href="route('roles.destroy',role.id)  "
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
            role : null
        }
    },
    mounted(){
        Bus.$on('deleteRole',(role) => {
            this.role = role;
            console.log(role);
        });

    },
    beforeDestroy(){
        Bus.$off('deleteRole');
    }

}
</script>

<style>

</style>
