// Import Axios
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Add Laravel CSRF Token to Axios headers
const token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: Ensure a meta tag with name "csrf-token" exists in your HTML.');
}

// Import Alpine.js
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start(); // Initialize Alpine.js
