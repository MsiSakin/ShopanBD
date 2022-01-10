importScripts('https://www.gstatic.com/firebasejs/3.9.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.9.0/firebase-messaging.js');

// Initialize the Firebase app in the service worker by passing in the
// messagingSenderId.
firebase.initializeApp({
    apiKey: "AIzaSyCEqsYDUgQD0XGj2zdsGBtXkt-JNp9dE9w",
    authDomain: "shopanbd2022.firebaseapp.com",
    projectId: "shopanbd2022",
    storageBucket: "shopanbd2022.appspot.com",
    messagingSenderId: "9439353332",
    appId: "1:9439353332:web:4f46939b18b01feebf41a1",
    measurementId: "G-5X13EXCGY5"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  const notificationTitle = 'Background Message Title';
  const notificationOptions = {
    body: 'Background Message body.',
    icon: 'https://images.theconversation.com/files/93616/original/image-20150902-6700-t2axrz.jpg' //your logo here
  };

  return self.registration.showNotification(notificationTitle,
      notificationOptions);
});
