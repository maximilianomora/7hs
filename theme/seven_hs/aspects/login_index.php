<script type="text/javascript">
 function setCookie()
 {
     YAHOO.util.Cookie.set("browsersize", screen.width,{expires: new Date("January 12, 2025"),  path: "/"});
 }
</script>

<?php
 global $PAGE;
 
  $PAGE->requires->js("/lib/yui/2.8.2/build/cookie/cookie-min.js");
  $PAGE->requires->js_function_call('setCookie');
  
  if (isset($_COOKIE["browsersize"]))
    {
    
        if(strrpos($_SERVER['HTTP_USER_AGENT'],"Android")|| ($_COOKIE["browsersize"]<=1024))
        {
            $_SESSION['SESSION']->browsersize = 1;     
        }
        else
        {
            $_SESSION['SESSION']->browsersize = 2;         
        }
        
      
    }
    //$_SESSION['SESSION']->browsersize = 1;
?>
