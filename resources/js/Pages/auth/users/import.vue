<template>
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Import Users</h1>
        <Link :href="route('users.index')" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</Link>
    </div>
    <Alert></Alert>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Import Users</h6>
        </div>
        <form  @submit.prevent="save" >
            <div class="card-body">
                <div class="form-group row">

                    <div class="col-md-12 mb-3 mt-3">
                        <p>Please Upload CSV in Given Format
                            <a href="/files/sample-data-sheet.csv" target="_blank">Sample CSV Format</a></p>
                    </div>
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>File Input(Datasheet)</label>
                        <input
                            type="file"
                            class="form-control form-control-user " :class="errors.file ? 'is-invalid' : '' "
                            id="exampleFile"
                            name="file"
                               @input="form.file = $event.target.files[0]"
                             @change="onFileImport"
                             >
                          <span class="text-danger" v-if="errors.file">{{errors.file}}</span>
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Upload Users</button>
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
                file : null
            })
        }
    },
    props:{
        errors : Object
    },
    methods:{
        save() {
            this.form.post(this.route("users.upload"), {
                preserveState: true,
                onError: errors => {
                if (Object.keys(errors).length > 0) {

                }
                },
                onSuccess: page => {
                    this.form.reset();
                }
            });
        },
        onFileImport(e){
            const file = e.target.files[0];
            this.file = URL.createObjectURL(file);
        }
    }
}
</script>

<style>

</style>
