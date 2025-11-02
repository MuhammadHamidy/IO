import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/calendar.js",
                "resources/js/nav.js",
                "resources/js/see-detail.js",
                "resources/js/carousel.js"
            ],
            refresh: true,
        }),
    ],
});
