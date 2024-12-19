$(document).ready(function() {
   $('#keyword').on('keyup', function() {
      $('#container').load('ajax/confess_box.php?keyword=' + $('#keyword').val())
   })
})