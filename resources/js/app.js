import 'flowbite';
import { initFlowbite } from "flowbite";

import { Dropdown } from "flowbite";
window.Dropdown = Dropdown;

import { Chart } from 'chart.js/auto';
window.Chart = Chart;

import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

document.addEventListener('livewire:navigated', () => {
   initFlowbite();
});
