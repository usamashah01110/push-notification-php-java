// this file must be in root folder
importScripts('https://www.gstatic.com/firebasejs/9.14.0/firebase-app-compat.js')
importScripts('https://www.gstatic.com/firebasejs/9.14.0/firebase-messaging-compat.js')

// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyCE4H3VlMwCGG65oT2F8sYWi4R4Lt3gN6I",
    authDomain: "test-b15d3.firebaseapp.com",
    projectId: "test-b15d3",
    storageBucket: "test-b15d3.appspot.com",
    messagingSenderId: "373345115312",
    appId: "1:373345115312:web:28167434bfb4cc8821ef75",
    measurementId: "G-6VC9FQFF52"
};

// receiving messages in background
const app = firebase.initializeApp(firebaseConfig)
const messaging = firebase.messaging()

// get this type of message in background
messaging.onBackgroundMessage(function (payload) {
    if (!payload.hasOwnProperty('notification')) {
        const notificationTitle = payload.data.title
        const notificationOptions = {
            body: payload.data.body,
            icon: payload.data.icon,
            image: payload.data.image
        }
        self.registration.showNotification(notificationTitle, notificationOptions);
        self.addEventListener('notificationclick', function (event) {
            const clickedNotification = event.notification
            clickedNotification.close();
            event.waitUntil(
                clients.openWindow(payload.data.click_action)
            )
        })
    }
})