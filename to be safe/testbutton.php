<!DOCTYPE html> 
<html> 
      
<head> 
    <title> 
        How to call PHP function 
        on the click of a Button ? 
    </title> 
</head> 
  
<body style="text-align:center;"> 
      
    <h1 style="color:green;"> 
        GeeksforGeeks 
    </h1> 
      
    <h4> 
        How to call PHP function 
        on the click of a Button ? 
    </h4> 
      
    <?php
        if(array_key_exists('button1', $_POST)) { 
            button1(); 
        } 

        function button1() { 
            echo "This is Button1 that is selected"; 
        } 
 
    ?> 
  
    <form method="post"> 
        <input type="submit" name="button1"
                class="button" value="Button1" /> 
          

    </form> 
</head> 
  
</html>