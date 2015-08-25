<div id="footer">
  <div class="container">
    <p class="muted credit">developed by <a href="http://nemoryoliver.com">Nemory Oliver Martinez</a> - <a href= "mailto: nemoryoliver@gmail.com" >nemoryoliver@gmail.com</a></p>
  </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>	
<script src="js/i18n/grid.locale-en.js"></script>
<script src="js/jquery.jqGrid.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="js/jquery.toast.min.js"></script>

<script>

	$.toast.config.align = 'right';
    $.toast.config.closeForStickyOnly = false;
    $.toast.config.width  = 200;

    function showToast(message, type)
    {
      var options = 
      {
        duration: 3000,
        sticky: false,
        type: type
      };

      $.toast(message, options);
    }

</script>