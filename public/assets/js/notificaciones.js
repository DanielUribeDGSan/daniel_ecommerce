
const messaging = firebase.messaging();

const pedirPermiso = () => {
    messaging.requestPermission()
        .then(function () {
            console.log("Se han haceptado las notificaciones");
            return messaging.getToken();
        }).then(function (token) {
            console.log(token);
            // guardarToken(token);
        }).catch(function (err) {
            console.log(err);
        });
}

window.onload = function () {
    pedirPermiso();
}