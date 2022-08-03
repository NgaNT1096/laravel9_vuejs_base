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
            <div class="modal-body">Select "Delete" below if you want to delete User!.</div>
            <div class="modal-footer" v-if="user != null">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <Link method="DELETE" class="btn btn-danger" :href="route('users.destroy',user.id)  "
                   data-dismiss="modal">
                    Delete {{ user.first_name }}
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
            user : null
        }
    },
    mounted(){
        Bus.$on('deleteUser',(user) => {
            this.user = user;
            console.log(user);
        });

    },
    beforeDestroy(){
        Bus.$off('deleteUser');
    }

}
</script>

<style>

</style>
