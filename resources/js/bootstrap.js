import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

async function lockScreen() {
    try {
        window.currentWakeLock = await navigator.wakeLock.request();
        console.log('Wake Lock enabled'); // Optional: Log success in the console instead of using alert.
    } catch (err) {
        console.error(err); // Log any errors to the console for debugging.
    }
}

async function releaseScreen() {
    if (window.currentWakeLock && !window.currentWakeLock.released) {
        await window.currentWakeLock.release(); // Ensure release is awaited [[5]].
        window.currentWakeLock = null; // Reset currentWakeLock to prevent inconsistencies.
        console.log('Wake Lock released'); // Optional: Log success in the console.
    }
}

document.addEventListener('DOMContentLoaded', function () {
    // Automatically lock the screen after the DOM is fully loaded.
    lockScreen();
});