import flatpickr from "flatpickr";
window.flatpickr = flatpickr;
import 'flatpickr/dist/flatpickr.min.css';

import './../../vendor/power-components/livewire-powergrid/dist/powergrid';
import './../../vendor/power-components/livewire-powergrid/dist/tailwind.css';

import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

import axios from "axios";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import {initFlowbite} from "flowbite";
document.addEventListener("livewire:navigated", () => {
    initFlowbite();
});
