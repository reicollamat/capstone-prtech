import "./bootstrap";

import {
    Livewire,
    Alpine,
} from "../../vendor/livewire/livewire/dist/livewire.esm";
import collapse from "@alpinejs/collapse";

Alpine.plugin(collapse);

Livewire.start();

// Import our custom CSS
import "../scss/styles.scss";

// Import all of Bootstrap's JS
import * as bootstrap from "bootstrap";

// this will remove the navbar height from the page height to remove scrolling
function setChildContainerHeight() {
    // get the height if main wrapper
    let parentHeight = document.getElementById("main").clientHeight;
    // get the height of navigation bar
    let otherElementHeight =
        document.getElementById("navigationbar").clientHeight;
    // get the child container where we need to set the height
    let childContainer = document.getElementById("wrapper");
    // apply the height to the element
    childContainer.style.height = parentHeight - otherElementHeight + "px";

    console.log(parentHeight, otherElementHeight, childContainer.style.height);
}

// event listener to adjust the height of the child container
window.addEventListener("load", setChildContainerHeight);
window.addEventListener("resize", setChildContainerHeight);

document.addEventListener("livewire:navigated", () => {
    console.log("navigated");
    // Runs immediately after Livewire has finished initializing
    // on the page...
    setChildContainerHeight();
});
