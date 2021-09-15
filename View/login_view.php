<head>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="824004373954-nv33gj118qlr59n3s2r3lssae7gters3.apps.googleusercontent.com">
</head>
<body>
<div id="photo"></div>
        <div id="name"></div>
        <div id="email"></div>

        <div class="g-signin2" data-onsuccess="onSignIn"></div>

        <button onclick="signOut()">Sign out</button>

        <script>
            function onSignIn(googleUser) {
                // get user profile information
                console.log("Calling the 'profile'");
                console.log("Profile");

                console.log("using googleUser.getBasicProfile()");
                console.log(googleUser.getBasicProfile())
        
                // get user profile as an ID Token, or JWT Token
                console.log("Using googleUser.getAuthResponse().id_token");
                console.log(googleUser.getAuthResponse().id_token);
            
                // pulling out individual data from the getBasicProfile
                var profile = googleUser.getBasicProfile();
                console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
                console.log('Name: ' + profile.getName());
                console.log('Image URL: ' + profile.getImageUrl());
                console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
            
                // below is the code to get the user information to show up on the page
                var image = document.createElement('img');
                image.setAttribute('src', googleUser.getBasicProfile().getImageUrl());

                document.querySelector("#photo").append(image);
                document.querySelector("#name").innerText = googleUser.getBasicProfile().getName();
                document.querySelector("#email").innerText = googleUser.getBasicProfile().getEmail();
            }

            function signOut() {
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut().then(function () {
                console.log('User signed out.');

                // remove content elements
                document.querySelector("#photo").remove();
                document.querySelector("#name").remove();
                document.querySelector("#email").remove();
                });
            }
        </script>
</body>
