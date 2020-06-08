const mix = require("laravel-mix");

//login
mix.styles(
    [
        "resources/plugins/fontawesome-free/css/all.min.css",
        "resources/dist/css/ionicons.min.css",
        "resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css",
        "resources/dist/css/adminlte.min.css",
    ],
    "public/css/login.css"
);

mix.scripts(
    [
        "resources/plugins/jquery/jquery.min.js",
        "resources/plugins/bootstrap/js/bootstrap.bundle.min.js",
        "resources/dist/js/adminlte.min.js",
    ],
    "public/js/login.js"
);

//layout
mix.styles(
    [
        "resources/plugins/fontawesome-free/css/all.min.css",
        "resources/plugins/overlayScrollbars/css/OverlayScrollbars.min.css",
        "resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css",
        "resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css",
        "resources/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css",
        "resources/plugins/select2/css/select2.min.css",
        "resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css",
        "resources/dist/css/adminlte.min.css",
    ],
    "public/css/app.css"
);

mix.scripts(
    [
        "resources/plugins/jquery/jquery.min.js",
        "resources/plugins/jquery-ui/jquery-ui.min.js",
        "resources/plugins/bootstrap/js/bootstrap.bundle.min.js",
        "resources/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js",
        "resources/plugins/jquery-validation/jquery.validate.min.js",
        "resources/plugins/jquery-validation/additional-methods.min.js",
        "resources/plugins/sweetalert2/sweetalert2.min.js",
        "resources/plugins/datatables/jquery.dataTables.min.js",
        "resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js",
        "resources/plugins/datatables-responsive/js/dataTables.responsive.min.js",
        "resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js",
        "resources/plugins/select2/js/select2.full.min.js",
        "resources/dist/js/adminlte.min.js",
        "resources/dist/js/common.js",
    ],
    "public/js/app.js"
);