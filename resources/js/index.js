function statusChangeCallback(response) {
    if (response.status === 'connected' && window.location.pathname != '/dashboard' ) {
        loginAPI();
    }
    
    //FB.logout(handleSessionResponse);

}
window.checkLoginState = function() {
    FB.getLoginStatus(function (response) {
        statusChangeCallback(response);
    });
}


window.fbAsyncInit = function () {
    FB.init({
        appId: '4625825104143973',
        cookie: true,
        xfbml: true,
        version: 'v12.0'
    });


    FB.getLoginStatus(function (response) {
       statusChangeCallback(response);
    });
};

function logoutFacebook() {
    FB.logout(function (response) {
        logoutAPI();
    });
}

function loginAPI() {
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

function logoutAPI() {
    $.ajax({
        method: "POST",
        url: "/api/logout",
        data: "{{ csrf_token() }}"
    })
        .done(function () {
            window.location = '/';
        });
}

jQuery(document).ready(function ($) {
    $("#logout_facebook").click(function (e) {
        logoutFacebook();
    });
});
