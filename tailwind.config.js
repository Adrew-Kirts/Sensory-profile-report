/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./assets/**/*.js",
        "./templates/**/*.html.twig",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: ["pastel"],
    },
    safelist: [
        'bg-orange-400',
        'bg-green-400',
        'bg-purple-400',
        'bg-pink-400',
        'bg-blue-400',
    ],
}

