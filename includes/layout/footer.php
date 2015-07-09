	<footer role="contentinfo">
<small>Copyright &copy; <time datetime="2013">2013</time></small>
		
	</footer>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/jquerycatslider.js"></script>
		<script>
			$(function() {

				$( '#mi-slider' ).catslider();

			});
		</script>
</body>

</html>

<?php
//close db connection
if(isset($connection)){
mysqli_close($connection);
}
?>
