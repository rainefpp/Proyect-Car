module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './vendor/lunarphp/stripe-payments/resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                        'zenit-blue': '#365569',
                    },

        },
    },
    plugins: [require('@tailwindcss/forms')],
};
