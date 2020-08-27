<footer class="page-footer blue">
    <div class="container">
            © <script>document.write(new Date().getFullYear()); </script> BITSATHY Server
            <a class="grey-text text-lighten-4 right" href="http://sethilnasa.site/">Senthil Nasa</a>
    </div>
</footer>
<script src="<?php echo $GLOBALS['_path'] ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo $GLOBALS['_path'] ?>assets/js/materialize.min.js"></script>
    <script src="<?php echo $GLOBALS['_path'] ?>assets/js/script.js"></script>
    <script src="<?php echo $GLOBALS['_path'] ?>assets/js/chartjsutil.js"></script>
    <script src="<?php echo $GLOBALS['_path'] ?>assets/js/chartjs.js"></script>
    <script src="<?php echo $GLOBALS['_path'] ?>assets/js/chartjszoom.js"></script>
    <script src="<?php echo $GLOBALS['_path'] ?>assets/js/hammer.js"></script>
    
    <script>
        let starttime=<?php echo strtotime("-3 hours");?>000;
        let hourTime=<?php echo strtotime("-1 hours");?>000;
        let dayTime=<?php echo strtotime("-1 day");?>000;
        let weekTime=<?php echo strtotime("-7 day");?>000;
        let weeksTime=<?php echo strtotime("-14 day");?>000;
        let monthTime=<?php echo strtotime("-1 month");?>000;
        let yearTime=<?php echo strtotime("-1 year");?>000;
        let endtime=<?php echo strtotime("+1 hours");?>000;
        $(document).ready(function() {
            var pathname ='../'+window.location.pathname.split("/admin/")[1];
            $("li > a").each(function() {
                if ($(this).attr("href") == pathname) {
                    $(this).parent().addClass("active");
                }
            });
        });
    </script>
</body>

</html>