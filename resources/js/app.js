import "./bootstrap";

// import "./charts/analytics-model-report-header.js"

import Swal from "sweetalert2";

window.Swal = Swal;

import ToastComponent from '../../vendor/usernotnull/tall-toasts/resources/js/tall-toasts'

import {
    Livewire,
    Alpine,
} from "../../vendor/livewire/livewire/dist/livewire.esm";
import collapse from "@alpinejs/collapse";

// Alpine.plugin(ToastComponent);

Livewire.start();

// Import our custom CSS
import "../scss/styles.scss";

// Import all of Bootstrap's JS
import * as bootstrap from "bootstrap";

Livewire.on("page-updated", () => {
    console.log("next page");
    // setChildContainerHeight();
});

// initialize popover js
const popoverTriggerList = document.querySelectorAll(
    '[data-bs-toggle="popover"]',
);
const popoverList = [...popoverTriggerList].map(
    (popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl),
);
