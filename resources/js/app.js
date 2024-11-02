import {initFlowbite} from "flowbite";
import flatpickr from "flatpickr";
import axios from "axios";
import 'flatpickr/dist/flatpickr.min.css';
import './../../vendor/power-components/livewire-powergrid/dist/powergrid';
import './../../vendor/power-components/livewire-powergrid/dist/tailwind.css';

window.flatpickr = flatpickr;
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
document.addEventListener("livewire:navigated", () => {
    initFlowbite();
});





