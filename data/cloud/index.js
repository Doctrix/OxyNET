var ref = new Firebase('https://mifa-concept.firebaseio.com');


firebase.auth().signInWithEmailAndPassword(email, password).catch(function (error) {
    console.log(error.code);
    console.log(error.message);
});

firebase.auth().signOut().then(function () {
    console.log("Logged out!")
}, function (error) {
    console.log(error.code);
    console.log(error.message);
});

var provider = new firebase.auth.GoogleAuthProvider();

function googleSignin() {
    firebase.auth()

        .signInWithPopup(provider).then(function (result) {
            var token = result.credential.accessToken;
            var user = result.user;

            console.log(token)
            console.log(user)
        }).catch(function (error) {
            var errorCode = error.code;
            var errorMessage = error.message;

            console.log(error.code)
            console.log(error.message)
        });
}

function googleSignout() {
    firebase.auth().signOut()

        .then(function () {
            console.log('Signout Succesfull')
        }, function (error) {
            console.log('Signout Failed')
        });
}