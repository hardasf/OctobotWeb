<!DOCTYPE html>
 <html>
 <head>
	    <title>CHATWITHAI</title>
    	    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1,user-scalable="no">
    	      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <meta charset="UTF-8"/>
	 <link rel="stylesheet" href="res/hard.css" type="text/css"/>
	  <link rel="stylesheet" href="res/imoangmama.css" type="text/css"/>
	 	 <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	  
	 <style>
 /*Imong mama ga style */
	 </style>
 
 </head>
	 <body>
	 
	
<a href="https://www.facebook.com/rejardbentazarofficial"><i class="fa fa-bug"></i>REPORT BUG</a>

<center>
   
    <h3 id="title"></h3>
    <img src="res/leechshares.png"></img>
    <?php
    if(isset($_GET['hard'])){
        echo "<p style='color: blue;'>OctoBot: ".$_GET['hard']."</p>";
    }
    ?>
    
    </center>
     <!-- Modal content -->
    <div class="modal-content2">
        <span class="crown" >🐙</span>
        <center></center>
        
        
  <fieldset>
      
         <details open>
	<summary>LOGIN:
	</summary>
      
         <form method="post" action="login.php">
        FbUid: <input type="text" class="custom-textarea" name="FbUid" required><br>
        Password: <input type="password" class="custom-textarea" name="password" required><br>
       <button> <input type="submit" value="Login"></button>
    </form>
       <br>
        <hr></hr>
        </details> 
      
	
        <details>
    <summary>SIGN UP:</summary>
 <section>
<strong>CREATE ACCOUNT 
</strong>
	 <form method="post" action="register.php">
        Name: <input type="text" class="custom-textarea" name="name" placeholder= "Kahit Ano" required><br>
        FbUid: <input type="text" placeholder= "100012874754515" class="custom-textarea"  name="FbUid" required><br>
        Password: <input type="password" placeholder= "******" class="custom-textarea"  name="password" required><br>
        <button>
        <input type="submit" value="Register"></button>
    </form>
    </section>
    </details>
    </fieldset>
    </br>
  
    <!--YW-->
<marquee style="text-align:  center; color:lime;background-color: black;font-size: 17px;border: 2px solid black ;border-radius:5px">
(C) Rejard 2023 | CHATWITHAI Official | LABYOU
</marquee>
 <script>
  document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('joinNa');

    var joinButton = document.querySelector('#joinNa button');

    modal.style.display = 'block';

    joinButton.addEventListener('click', function () {
      modal.style.display = 'none';
    });
  });
</script>

 
	 </body>
 </html>