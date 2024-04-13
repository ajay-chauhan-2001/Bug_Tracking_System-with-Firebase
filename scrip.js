<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyC4p-DAN6_F_5v5Cf4o3foMfe1-uVQK0dQ",
    authDomain: "bug-tracking-system-79205.firebaseapp.com",
    projectId: "bug-tracking-system-79205",
    storageBucket: "bug-tracking-system-79205.appspot.com",
    messagingSenderId: "147961094462",
    appId: "1:147961094462:web:694f24607fdb1417274c6f",
    measurementId: "G-Y78MSBVEQN"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>