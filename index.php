<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Elanta Mall</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Arbutus' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

</head>
<style>
  * {
    margin: 0;
    padding: 0;
  }

  /*text-indent:30px; to left the text in text fields*/
  .header {
    background: #8799a3;
    
    width: 100%;
    height: 45px;

  }
   .footer{

display:block;

position: fixed;

   left: 0;

   bottom: 0;

   width: 100%;

height:auto;

   background-color: white;

   color: grey;

   text-align: left;

}







/*buttons in the footer*/

.footer_btn{

background:white;

  border: none;

  color: white;

  padding: 10px 10px;

  text-align: center;

  text-decoration: none;

  font-size: 14px;

border-radius: 2px;

width:auto;

}

.footer_btn:hover{ /*when hover on footer buttons change color*/

background:#C0C0C0;

}

  /*container for footer buttons*/
  .footer {
    display: block;
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    height: auto;
    background-color: white;
    color: grey;
    text-align: left;
  }

  /*buttons in the footer*/
  .footer_btn {
    background: white;
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    font-size: 14px;
    border-radius: 2px;
    width: auto;
  }

  .footer_btn:hover {
    /*when hover on footer buttons change color*/
    background: #C0C0C0;

  }

  .footer_btn:hover {
    /*when hover on footer buttons change color*/
    background: #C0C0C0;
  }

</style>
</head>

<body style="background-color: #f1f1f1; color: #333;font-family:Helvetica, sans-serif;">


  <!-- Header for back button and login text at top -->
  <div class="header">

    <img src="/assets/diamond.jpg"
      style="width: 30px; height: 34px; position: relative; margin-top: 5px; margin-left: 13px; border-radius: 5px;">
  </div>
  <br>
  <div>
    <p style="text-align:center;color:black;font-size:15px; color: #0000ff;">Welcome Back</p>
    <p style="text-align:center;color:black;font-size:8px; color: #808080;">Quality Guarantee</p>
  </div><br>

  <div style="height:250px;width:100%">
    <img src="/assets/logo0.jpg" style="object-fit: cover;" width="100%" height="100%">

  </div><br>
<!-----items product----->


<div style="float: left; height: 40%; width: 50%;">
  <img src="/assets/item2.jpg" width="90%" height="100%">
  

</div>


<div style="float: right; height: 40%; width: 50%;">
  <img src="/assets/item3.jpg" width="100%" height="100%">
 

</div>
  <div style="float: left; height: 40%; width: 50%;margin-top: 20px;">
  <img src="/assets/item1.jpg" width="90%" height="100%">
  

</div>

<div style="float: right; height: 40%; width: 50%;margin-top: 20px;">
  <img src="/assets/item0.jpg" width="100%" height="100%">
 

</div>
  



  <!-- footer start -->
  <div class="footer">
    <center>

      <button onclick="location.href='/insert/home'" style="float:left;outline:none;" class="footer_btn"><i id="f_home"
          class="fa fa-home" style="font-size:25px;color:#696969;color:grey"></i></button>

      <button onclick="location.href='/insert/my_account'" style="outline:none;" class="footer_btn"><i id="f_my"
          class="far fa-search" style="font-size:25px;color:#696969;color:grey"></i></button>

      <button onclick="location.href='/insert/my_account'" style="outline:none;margin-left: 18%;" class="footer_btn"><i
          id="f_my" class="far fa-trophy-alt" style="font-size:25px;color:#696969;color:grey"></i></button>

      <button onclick="location.href='/insert/my_account'" style="float:right;outline:none;" class="footer_btn"><i
          id="f_my" class="fa fa-user" style="font-size:25px;color:#696969;color:grey"></i></button>

    </center>
  </div>
  <div class="footer"> 
        <center>
            <button onclick="location.href='index.php'" style="float:left;outline:none;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:25px;color:#0081FF"></i></button>
            <button  onclick="location.href='#'" style="outline:none;"  class="footer_btn"><i id="f_my" class="far fa-search" style="font-size:25px;color:#696969;color:grey"></i></button>
            
            <button  onclick="location.href='win'" style="outline:none;margin-left: 18%;"  class="footer_btn"><i id="f_my" class="far fa-trophy-alt" style="font-size:25px;color:#696969;color:grey"></i></button>
            <button  onclick="location.href='home'" style="float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:25px;color:#696969;color:grey"></i></button>
        </center>
          </div>
</body>

</html>