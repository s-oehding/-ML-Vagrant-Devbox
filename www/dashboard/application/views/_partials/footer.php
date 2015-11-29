</div>
</div>
<!-- /#wrapper -->

<!-- Morris Charts -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->


<script src="/static/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trianglify/0.4.0/trianglify.min.js"></script>
<script>
    var pattern = Trianglify({
        width: window.innerWidth,
        height: window.innerHeight,
        cell_size: 40
    });
    // document.body.appendChild(pattern.canvas())
    canvas = pattern.canvas();
    $('#page-content-wrapper').css({'background-image': "url(" + canvas.toDataURL("image/png") + ")"});
</script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>
