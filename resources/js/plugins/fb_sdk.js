
function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
    console.log('statusChangeCallback');
    console.log(response);                   // The current login status of the person.
    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
        testAPI();
    } else {                                 // Not logged into your webpage or we are unable to tell.
        document.getElementById('status').innerHTML = 'Please log ' +
            'into this webpage.';
    }
}

function logoutFacebook() {
    console.log('logout')
    FB.logout(function(response) {
        console.log(response)
    });
}
function checkLoginState() {               // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function(response) {   // See the onlogin handler
        statusChangeCallback(response);
    });
}


window.fbAsyncInit = function() {
    FB.init({
        appId      : '4625825104143973',
        cookie     : true,                     // Enable cookies to allow the server to access the session.
        xfbml      : true,                     // Parse social plugins on this webpage.
        version    : 'v12.0'           // Use this Graph API version for this call.
    });


    FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
        statusChangeCallback(response);        // Returns the login status.
    });
};

function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
        console.log('Successful login for: ' + response.name);
        document.getElementById('status').innerHTML =
            'Thanks for logging in, ' + response.name + '!';
    });
}
jQuery(document).ready(function($){


    // CREATE
    $("#logout_facebook").click(function (e) {
        logoutFacebook();
        alert('lalala')

        /*      $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                  }
              });
              e.preventDefault();
              var formData = {
                  title: jQuery('#title').val(),
                  description: jQuery('#description').val(),
              };
              var state = jQuery('#btn-save').val();
              var type = "POST";
              var todo_id = jQuery('#todo_id').val();
              var ajaxurl = 'todo';
              $.ajax({
                  type: type,
                  url: ajaxurl,
                  data: formData,
                  dataType: 'json',
                  success: function (data) {
                      var todo = '<tr id="todo' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + data.description + '</td>';
                      if (state == "add") {
                          jQuery('#todo-list').append(todo);
                      } else {
                          jQuery("#todo" + todo_id).replaceWith(todo);
                      }
                      jQuery('#myForm').trigger("reset");
                      jQuery('#formModal').modal('hide')
                  },
                  error: function (data) {
                      console.log(data);
                  }
              });*/
    });
});
