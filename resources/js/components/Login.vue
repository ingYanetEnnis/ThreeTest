<template>
    <div class="col-md-6 offset-md-3 mt-5 text-center">
        <div class="card">
            <h4 class="card-header">Vue.js Facebook Login Example</h4>
            <div class="card-body">
                <button class="btn btn-facebook" @click="checkLoginState">
                    <i class="fa fa-facebook mr-1"></i>
                    Login with Facebook
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import Vue from "vue";
export default {
    created() {
        console.log('created login')
    },
    methods: {
        checkLoginState :   function () {
            FB.getLoginStatus(function(response) {   // See the onlogin handler
                FB.login(function(response) {
                    if (response.status === 'connected') {
                        console.log('conex')
                    } else {
                        console.log('go to conex')
                        // The person is not logged into your webpage or we are unable to tell.
                    }
                });
            });
        }
    }
}
</script>

<style scoped>

</style>
