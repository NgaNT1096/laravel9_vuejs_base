<template>
<div id="page-top">
   <div id="wrapper">

        <!-- Sidebar -->
      <sidebar></sidebar>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               <Header></Header>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <slot />
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
          <footer ></footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <!-- <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a> -->
</div>
</template>

<script>
import Header from '@/Components/Layout/header'
import Footer from '@/Components/Layout/footer'
import Sidebar from '@/Components/Layout/sidebar'

export default {
    components:{
        Header,
        Footer,
        Sidebar

     }

}
</script>

<style>

</style>
