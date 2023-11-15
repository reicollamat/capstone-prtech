import "./bootstrap";

// Import our custom CSS
import "../scss/styles.scss";

// Import all of Bootstrap's JS
import * as bootstrap from "bootstrap";

// // Disable alpine plugin for now for livewire
// import Alpine from 'alpinejs';
// //
// window.Alpine = Alpine;
// //
// Alpine.start();

document.addEventListener("livewire:navigated", () => {
    console.log("navigated");
    // Runs immediately after Livewire has finished initializing
    // on the page...
});
