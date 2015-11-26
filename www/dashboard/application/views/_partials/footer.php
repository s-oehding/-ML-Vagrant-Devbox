    </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- AjaxNav -->
    <script type="text/javascript" src="/static/js/ajax.js"></script>
    <script type="text/javascript" src="/static/js/vm.js"></script>

    <script type="text/javascript" src="/static/js/simplePaginations.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trianglify/0.4.0/trianglify.min.js"></script>
		<script>
	    var pattern = Trianglify({
	        width: window.innerWidth,
	        height: window.innerHeight,
					cell_size: 40
	    });
	    // document.body.appendChild(pattern.canvas())
			canvas = pattern.canvas();
			$('#page-content-wrapper').css({'background-image':"url(" + canvas.toDataURL("image/png")+ ")" });
    </script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
