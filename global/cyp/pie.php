<?php
if (!isset($_SESSION['ID'])) {
    header('location: login.php');
} else {
?>
    </div>
    <script>
        $("body").prognroll({
                    //Altura de la barra de progreso
                    height: 4,
                    //Color de la barra de progreso
                    color: "#13804c",
            // Si queremos añadir una barra de progreso a una capa ponemos el valor true
            custom: false
        });
    </script>
    <!--
 <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    

<script src="assets/libs/popper.js/dist/umd/popper.min.js"></script> -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <script src="dist/js/feather.min.js"></script>

    <script src="assets/extra-libs/c3/d3.min.js"></script>
    <script src="assets/extra-libs/c3/c3.min.js"></script>
    <!-- <script src="assets/libs/chartist/dist/chartist.min.js"></script>
-->
    <!--<script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>-->
    <script src="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.min.js"></script>
    </body>

    </html>

<?php
}
?>