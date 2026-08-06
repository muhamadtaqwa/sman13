self.addEventListener('install', (event) => {
    console.log('Service Worker terinstal');
});

self.addEventListener('fetch', (event) => {
    // Kosongkan saja untuk syarat minimal PWA
});