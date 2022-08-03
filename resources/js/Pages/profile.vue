<template>
    <div class="container-fluid">
        <Head>
            <title>Profile</title>

            </Head>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 border-bottom">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
        </div>
        <Alert></Alert>

        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="admin/img/undraw_profile.svg">
                    <span class="font-weight-bold" >{{ $page.props.auth.user.full_name }}</span>
                    <span class="text-black-50"><i>Role:
                        {{ $page.props.auth.user.roles ?  $page.props.auth.user.roles[0].name : 'N/A'}}</i></span>
                    <span class="text-black-50">{{ $page.props.auth.user.email }}</span>
                </div>
            </div>
            <div class="col-md-9 border-right">

                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile</h4>
                    </div>
                    <form @submit.prevent="save" >
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels">First Name</label>
                                <input type="text" class="form-control "
                                    name="first_name" placeholder="First Name" v-model="form.first_name"
                                    >
<!--
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror -->
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Last Name</label>
                                <input type="text" name="last_name"
                                    class="form-control "  placeholder="Last Name" v-model="form.last_name">

                                <!-- @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror -->
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Mobile Number</label>
                                <input type="text" class="form-control" name="mobile_number" placeholder="Mobile Number" v-model="form.mobile_number">
                                <!-- @error('mobile_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror -->
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit" >Update Profile</button>
                        </div>
                    </form>
                </div>

                <hr>

                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Change Password</h4>
                    </div>

                    <form @submit.prevent="changePass">
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels">Current Password</label>
                                <input type="password" name="current_password" class="form-control" placeholder="Current Password" required v-model="form.current_password">
                                <!-- @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror -->
                            </div>
                            <div class="col-md-4">
                                <label class="labels">New Password</label>
                                <input type="password" name="new_password" class="form-control " required placeholder="New Password" v-model="form.new_password">
                                <!-- @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror -->
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Confirm Password</label>
                                <input type="password" name="new_confirm_password" class="form-control " required placeholder="Confirm Password" v-model="form.new_confirm_password">
                                <!-- @error('new_confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror -->
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-success profile-button" type="submit">Change Password {{ fullName }}</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>



    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
import layoutVue from '@/Components/Layout/layout.vue';
import Alert from '@/Components/Alert/index.vue';
import { Head } from '@inertiajs/inertia-vue'
export default {
    layout:layoutVue,
    components:{
        Link,
        Alert,
        Head
    },
    computed:{
        fullName(){
            return this.form.last_name + this.form.first_name
        }
    },

    data(){
        return {
            showModal: false,
            form:{
                first_name : this.user.first_name,
                last_name : this.user.last_name,
                mobile_number : this.user.mobile_number,
                current_password : null,
                new_password : null,
                new_confirm_password : null
            }
        }
    },
    props:{
        user : Object
    },
    methods :{
    toggleModal: function() {
      this.showModal = !this.showModal;
    },
    closeModal: function() {
      this.showModal = false;
      this.reset();
      this.editMode = false;
    },
    save() {
      // console.log(this.form.name);
      this.$inertia.post(this.route("profile.update"), this.form);
      this.toggleModal();
    },
    changePass(){
        this.$inertia.post(this.route("profile.change-password"), this.form);
        this.toggleModal()
        this.reset();
    },
    reset: function() {
      this.form = {
        current_password : null,
        new_password : null,
        new_confirm_password : null
      };
    },
    }


}
</script>

<style>

</style>
