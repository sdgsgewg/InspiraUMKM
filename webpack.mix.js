const mix = require("laravel-mix");

// Compile the JavaScript
mix.js("resources/js/chat.js", "public/js").vue(); // Add this line if you're using Vue.js, otherwise omit it.
