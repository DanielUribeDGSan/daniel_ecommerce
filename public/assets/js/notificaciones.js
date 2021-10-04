const messaging = firebase.messaging();

let enableForegroundNotification = true;
messaging.onMessage(function (payload) {
    console.log("mensaje recibido");
    if (enableForegroundNotification) {
        const { title, ...options } = JSON.parse(payload.data.notification);
        navigator.serviceWorker.getRegistrations().then(registration => {
            registration[0].showNotification(title, options);
        });
    }
});