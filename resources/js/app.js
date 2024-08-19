import "flowbite";
import { initFlowbite, initDropdowns, initModals } from "flowbite";

import axios from "axios";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

document.addEventListener("livewire:navigated", () => {
    initFlowbite();
    initDropdowns();
    initModals();
});
