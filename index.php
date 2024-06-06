<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: 125.php");
    exit();
}

include 'configdb.php';

$id = $_SESSION["id"];
$name = $_SESSION["name"];
//$coins = $_SESSION["coins"];
$FbUid = $_SESSION["FbUid"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatWithAiOfficial</title>
    <link rel="stylesheet" href="assets/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="messenger-container">

    <div class="messenger-header" id="myBtn">
    
        <h1 style="text-align:center ">OctoBotWebv1 | ⚙️</h1>
        <i align="left">💰Coins: <span id="coins">0</span> | 👤<?php echo $name; ?> | <?php
include 'userlogindata.php';
if ($result_count_users->num_rows > 0) {
    while ($row = $result_count_users->fetch_assoc()) {
        echo "👥" . $row["total_users"] . "";
    }
} else {
    echo "0 results";
}
?></i>
<?php
    if(isset($_GET['hard'])){
        echo "<p style='color: orange;'>OctoBot: ".$_GET['hard']."</p>";
    }
    ?>
    </div>
 
    <div class="messenger-chat">
        <div class="chat-messages" id="chatMessages">
            <!--  dirr na to -->
        </div>
        <form id="messageForm">
         <input type="text" id="userName" placeholder="Your Name" value="<?php echo $name; ?>" hidden>
            <input type="text" id="message" name="message" placeholder="Type your message...">
            <button type="submit" id="sendButton">Send</button>
        
        </form>
    </div>
</div>

<!--meow-->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close" id="closeBtn">&times;</span>
        <center><h style="font-size:50px">🐙</h></center>
        
        <p>ChatWithAi (OctoBotWeb🐙) is a bot modules modified by RJRD aim is to create something wierd</p>
  <fieldset>
        <details>
	<summary>DEVELOPER:
	</summary>
        <p>-Develop by: Rejard</p>
        <a href="https://www.facebook.com/rejardbentazarofficial "><i  class="fa fa-facebook-official"> /rejardbentazarofficial</i></a>
       <br>
        <hr></hr>
        </details> 
      
	
        <details>
    <summary>CHATWITHAI OFFICIAL GC: </summary>
 <section>
 <a href="https://m.me/j/Abbl63EsX-6_NN7W/"><i class="fa fa-link "></i> https://m.me/j/Abbl63EsX-6_NN7W/</a>
 </section>
    </details><br>
       <button id="claimButton">🎁Claim</button>
    </fieldset>
    </div>
</div> 
<!-- Modal Structure -->
<div id="myModal2" class="modal">
    <div class="modal-content">
        <span class="close">✖️</span>
       <p>Welcome to <strong>OctoBotWeb</strong> gaya lang po eto ng messenger bot kaso nasa web at hshshs </p>
       
       <button id="claimButton">🎁Claim</button>
    </div>
</div>
 <marquee behavior="scroll" direction="left">Claim Your Free 5 Coins every 20 minutes</marquee>
 
<script src="assets/scripts.js"></script>
<script src="assets/features.js" ></script>
</body>
</html>
