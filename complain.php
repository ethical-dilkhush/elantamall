<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complain</title>
    <link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Arbutus' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
        *{
             margin: 0;
             padding: 0;
     
         }
         body{
            font-family:  Helvetica Neue,Helvetica,sans-serif;
            font-size:smaller;
         }
         .header-1{
     
            background-color:#0081FF ;
            height: 6em;
            color: aliceblue;
            font-family:  Helvetica,Helvetica,sans-serif;
           position: absolute;
           width: 100%;
            margin: 0;
            padding: 0;
            
         }
         .complain{
            width:200px;
            margin-left:22px;
            position: absolute;
            margin-top: 11px;
            
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


        .spn
        {
            position: absolute;
            margin-top: 50px;
            margin-left: 4px;
            width: 100%;
        }
        .btn-1
        {
            width: 20%;
                height: 3.2em;
                background-color: white;
                border: none;
                border-radius: 5px;
                
        }
        @keyframes anim
        {
            from{opacity: 0;} to{opacity: 1;}
        }
         
         </style>
         <script>
            function level1()
            {
                document.getElementById("cmp").style.color="black";
                document.getElementById("wt").style.color="#f1f1f1";
               
            }
            function level2()
            {
                document.getElementById("wt").style.color="black";
                document.getElementById("cmp").style.color="#f1f1f1"
               
        
            }
        </script>
</head>
<body style="background-color: #f1f1f1; color: #333; ">
    <div class="header-1">
        <div class="complain">Add Complaints & Suggestion</div>
        &nbsp;&nbsp;<i class="fa fa-angle-left" style="font-size:25px; margin-top: 8px; position: absolute;"></i>
        <i class="fa fa-plus" style="float:right; margin-right: 15px; margin-top: 11px;" ></i>
    <center style="margin-top: 2rem;">
        <input onclick="level1()" id="cmp" style="border: none; color: #f1f1f1; font-size: smaller; outline: none; background-color: #0081FF;"  type="submit" value="COMPLETED">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input onclick="level2()" id="wt" style="border: none; color: #f1f1f1; font-size: smaller; outline: none; background-color: #0081FF;" type="submit" value="WAIT"> 
    <label ></label>
    </center>
        
    
    </div>
    
    
    <div class="footer"> 
        <center>
            <button onclick="location.href='index.php'" style="float:left;outline:none;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:25px;color:#696969;color:grey"></i></button>
            <button  onclick="location.href='/insert/my_account'" style="outline:none;"  class="footer_btn"><i id="f_my" class="far fa-search" style="font-size:25px;color:#696969;color:grey"></i></button>
            
            <button  onclick="location.href='win'" style="outline:none;margin-left: 18%;"  class="footer_btn"><i id="f_my" class="far fa-trophy-alt" style="font-size:25px;color:#696969;color:grey"></i></button>
            <button  onclick="location.href='home'" style="float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:25px;color:#696969;color:grey"></i></button>
        </center>
          </div>
                       


       
       
</body>
</html>