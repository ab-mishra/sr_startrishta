<html>

<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="http://beneposto.pl/jqueryrotate/js/jQueryRotateCompressed.js"></script>
</head>
<body>
<img src="http://static.jquery.com/files/rocker/images/logo_jquery_215x53.gif" id="btn1">	

<script>
$('#btn1').click(function() {
      var angle = getRightRotate();
      alert(angle);
    $(this).rotate(angle);
  });
    
    rightAngle = 0;
function getRightRotate() {
    rightAngle += 90;    
    return rightAngle;
}	
</script>
</body>
</html>