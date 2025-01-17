import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    publicDir: 'public', 
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/css/bootstrap.min.css',
                'resources/css/daterangepicker.css',
                'resources/css/bootstrap-datetimepicker.min.css',
                'resources/css/animate.css',
                'resources/css/select2.min.css',
                'resources/css/fontawesome.min.css',
                'resources/css/all.min.css',
                'resources/css/feather.css',
                'resources/css/jquery.fancybox.min.css',
                'resources/css/summernote-bs4.min.css',
                'resources/css/bootstrap-tagsinput.css',
                'resources/css/dataTables.bootstrap5.min.css',
                'resources/css/intlTelInput.css',
                'resources/css/plyr.css',
                'resources/css/owl.carousel.min.css',
                'resources/css/swiper.min.css',
                'resources/css/boxicons.min.css',
                'resources/css/style.css',

                'resources/js/jquery-3.7.1.min.js',
                'resources/js/moment.min.js',
                'resources/js/feather.min.js',
                'resources/js/jquery.slimscroll.min.js',
                'resources/js/bootstrap.bundle.min.js',
                'resources/js/apexcharts.min.js',
                'resources/js/chart-data.js',
                'resources/js/sweetalert2.all.min.js',
                'resources/js/sweetalerts.min.js',
                'resources/js/swiper.min.js',
                'resources/js/jquery.fancybox.min.js',
                'resources/js/select2.min.js',
                'resources/js/bootstrap-datetimepicker.min.js',
                'resources/js/daterangepicker.js',
                'resources/js/bootstrap-tagsinput.js',
                'resources/js/jquery.dataTables.min.js',
                'resources/js/dataTables.bootstrap5.min.js',
                'resources/js/summernote-bs4.min.js',
                'resources/js/intlTelInput.js',
                'resources/js/plyr-js.js',
                'resources/js/owl.carousel.min.js',
                'resources/js/ResizeSensor.js',
                'resources/js/theia-sticky-sidebar.js',
                'resources/js/script.js',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
    css: {
        devSourcemap: false,
    },
    build: {
        sourcemap: false,
    },
    server: {
        sourcemapIgnoreList: () => true,
    },
});
