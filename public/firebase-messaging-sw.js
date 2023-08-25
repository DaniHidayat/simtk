// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
const firebaseConfig = {
	apiKey: "AIzaSyDf6nxPgyqzZ3agjb8ODaK8ptG-A89v24c",
  authDomain: "notifikasi-c4a8c.firebaseapp.com",
  projectId: "notifikasi-c4a8c",
  storageBucket: "notifikasi-c4a8c.appspot.com",
  messagingSenderId: "663941759997",
  appId: "1:663941759997:web:7d08dbf23dd048d3418f94"
};

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);
    const title = "Hello world is awesome";
    const options = {
        body: "Your notificaiton message .",
        icon: "/firebase-logo.png",
    };
    return self.registration.showNotification(
        title,
        options,
    );
});
