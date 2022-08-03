<template>
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Holo-Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <Link class="nav-link" :href="route('home')">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></Link>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider2">
    <!-- account management -->

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item" >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown_account"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-alt"></i>
            <span>Account Information</span>
        </a>
        <div id="taTpDropDown_account" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <Link class="collapse-item" :href="route('users.index')" v-if="hasAnyPermission(['user-list'])">User name</Link>
                <Link class="collapse-item" :href="route('users.create')" v-if="hasAnyPermission(['user-create'])">TopUp</Link>
                <Link class="collapse-item" :href="route('users.import')" v-if="hasAnyPermission(['user-create'])">Chage Arena</Link>
                 <Link class="collapse-item" :href="route('users.create')" v-if="hasAnyPermission(['user-create'])">Calories Exchange</Link>
                <Link class="collapse-item" :href="route('users.import')" v-if="hasAnyPermission(['user-create'])">Advertising</Link>
            </div>
        </div>
    </li>
        <hr class="sidebar-divider2" >

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item"  v-if="hasAnyRoles(['Admin'])">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages_game"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Game Management</span>
            </a>
            <div id="collapsePages_game" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                     <Link class="collapse-item" :href="route('roles.index')">Game Installation</Link>
                    <Link class="collapse-item" :href="route('roles.index')">Tournament</Link>
                    <Link class="collapse-item" :href="route('permissions.index')">Quick Match</Link>
                </div>
            </div>
        </li>
        <!-- Divider -->
    <!-- Divider -->
    <hr class="sidebar-divider2">
    <li class="nav-item" >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-alt"></i>
            <span>User Management</span>
        </a>
        <div id="taTpDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Management:</h6>
                <Link class="collapse-item" :href="route('users.index')" v-if="hasAnyPermission(['user-list'])">List</Link>
                <Link class="collapse-item" :href="route('users.create')" v-if="hasAnyPermission(['user-create'])">Add New</Link>
                <Link class="collapse-item" :href="route('users.import')" v-if="hasAnyPermission(['user-create'])">Import Data</Link>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" >
        <!-- Heading -->
        <div class="sidebar-heading" v-if="hasAnyRoles(['Admin'])">
            Admin Section
        </div>
        <li class="nav-item"  v-if="hasAnyRoles(['Admin'])">
            <a class="nav-link nav-item-child collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Role & Permissions</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <Link class="collapse-item" :href="route('roles.index')">Roles</Link>
                    <Link class="collapse-item" :href="route('permissions.index')">Permissions</Link>
                </div>
            </div>
        </li>
        <li class="nav-item"  v-if="hasAnyRoles(['Admin'])">
            <Link class="nav-link nav-item-child collapsed" href="#" >
                <i class="fas fa-fw fa-folder"></i>
                <span>Demo Contact</span>
            </Link>
        </li>
         <li class="nav-item"  v-if="hasAnyRoles(['Admin'])">
            <Link class="nav-link nav-item-child collapsed" href="#" >
                <i class="fas fa-fw fa-folder"></i>
                <span>Invoice Controll</span>
            </Link>
        </li>
        <li class="nav-item"  v-if="hasAnyRoles(['Admin'])">
            <a class="nav-link nav-item-child collapsed" href="#" data-toggle="collapse" data-target="#collapsePages_product"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Product</span>
            </a>
            <div id="collapsePages_product" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <Link class="collapse-item" :href="route('roles.index')">Package License</Link>
                    <Link class="collapse-item" :href="route('permissions.index')">Version</Link>
                     <Link class="collapse-item" :href="route('permissions.index')">Map</Link>
                      <Link class="collapse-item" :href="route('permissions.index')">Notification</Link>
                </div>
            </div>
        </li>
         <li class="nav-item"  v-if="hasAnyRoles(['Admin'])">
            <Link class="nav-link nav-item-child collapsed" href="#" >
                <i class="fas fa-fw fa-folder"></i>
                <span>Mail Format</span>
            </Link>
        </li>
         <li class="nav-item"  v-if="hasAnyRoles(['Admin'])">
            <Link class="nav-link nav-item-child collapsed" href="#" >
                <i class="fas fa-fw fa-folder"></i>
                <span>Blogs Management</span>
            </Link>
        </li>

    <hr class="sidebar-divider2 d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
    <logoutModalVue></logoutModalVue>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>

</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
import logoutModalVue from "@/Components/Layout/logout-modal.vue";
export default {
    components:{
        Link,
        logoutModalVue
    }

}
</script>

<style>
    .sidebar-divider2{
        border-top: 1px solid rgba(255,255,255,.15);
    }
    .sidebar hr.sidebar-divider2 {
        margin: 0 1rem 0rem;
    }
    .sidebar .nav-item .nav-item-child{
        padding: 0.5rem;
    }
</style>
