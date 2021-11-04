console.log("aa")
function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
    console.log('statusChangeCallback');
    console.log(response);                   // The current login status of the person.
    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
        loginAPI();
    } else {                                 // Not logged into your webpage or we are unable to tell.
        document.getElementById('status').innerHTML = 'Please log ' +
            'into this webpage.';
    }
}


window.checkLoginState = function() {               // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function (response) {   // See the onlogin handler
        statusChangeCallback(response);
    });
}


window.fbAsyncInit = function () {
    FB.init({
        appId: '4625825104143973',
        cookie: true,                     // Enable cookies to allow the server to access the session.
        xfbml: true,                     // Parse social plugins on this webpage.
        version: 'v12.0'           // Use this Graph API version for this call.
    });


    FB.getLoginStatus(function (response) {   // Called after the JS SDK has been initialized.
        statusChangeCallback(response);        // Returns the login status.
    });
};

function logoutFacebook() {
    console.log('logout')
    FB.logout(function (response) {
        console.log(response)
    });
}

function loginAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', {fields: 'email,first_name,last_name'}, function (response) {
        response._token = "{{ csrf_token() }}";
        response.facebook_id = response.id;
        response.password = response.id;
        $.ajax({
            method: "POST",
            url: "/api/login",
            data: response
        })
            .done(function (response) {
                console.log(response)
                window.location = response.data.url;
            });
    });
}

jQuery(document).ready(function ($) {
    // CREATE
    $("#logout_facebook").click(function (e) {
        logoutFacebook();
        //alert('lalala')
    });
});
