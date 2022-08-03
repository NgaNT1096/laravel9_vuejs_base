<template>
        <div class="alert alert-success alert-dismissible" role="alert" v-if="$page.props.flash.success">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            <strong>Success !</strong> {{ $page.props.flash.success }}
        </div>

        <div class="alert alert-danger alert-dismissible" role="alert" v-else-if="$page.props.flash.warning">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            <strong>Error !</strong> {{$page.props.flash.warning }}
        </div>
</template>

<script>
export default {

}
</script>

<style>

</style>
