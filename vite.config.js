import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/tailwind.css",
                "resources/js/app.js",
                "resources/css/bootstrap.css",
                "resources/js/bootstrap.js",
            ],
            refresh: true,
        }),
    ],
});
