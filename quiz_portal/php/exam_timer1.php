<link href="quiz.css" rel="stylesheet" type="text/css">
<?php
    session_start();
    if( empty( $_SESSION['quiz'] ) )$_SESSION['quiz']=date('Y-m-d H:i:s');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <script language ="javascript" >
    <?php
              $start=$_SESSION['quiz'];
              $end=date('Y-m-d H:i:s', strtotime( $_SESSION['quiz'] . ' +20 minutes' ) );
                echo "
                    var date_quiz_start='$start';
                    var date_quiz_end='$end';
                    var time_quiz_end=new Date('$end').getTime();";
      ?>
        var tim;
        var hour= 00;
        var min = 30;
        var sec = 00;
        var f = new Date();
        function f1() {
            f2();
            document.getElementById("starttime").innerHTML = "Your Exam Started at " + f.getHours() + ":" + f.getMinutes();
        }
        function f2() {
            if (parseInt(sec) > 0) {
                sec = parseInt(sec) - 1;
                document.getElementById("showtime").innerHTML = "Your Left Time  is :"+hour+" hours:"+min+" Minutes :" + sec+" Seconds";
                tim = setTimeout("f2()", 1000);
            }
            else {
                if (parseInt(sec) == 0) {
                    min = parseInt(min) - 1;
                    if (parseInt(min) == 0) {
                        clearTimeout(tim);
                        window.location.href ="index.php";
                    }
                    else {
                        sec = 60;
                        document.getElementById("showtime").innerHTML = "Your Left Time  is :" + min + " Minutes ," + sec + " Seconds";
                        tim = setTimeout("f2()", 1000);
                    }
                }
            }
        }
    </script>

</head>
<body onLoad="f1()" >
    <form id="form1" runat="server">
    <div>
      <table width="100%" align="center">
        <tr>
          <td>
            <div id="starttime" style="width:300px; float:left; padding-left:20px; font-weight: bold; color: #000;"></div>
            <div id="endtime"></div>
            <div id="showtime" style="width:600px; text-align:right; float:right; padding-right:20px; font-weight: bold; color: #000;"></div>
          </td>
        </tr>
        
      </table>
      <br />
    </div>
    </form>



</body>
</html>