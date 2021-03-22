<?php

require_once("connect.php");

$requet="select *  from books ";

$query1= $pdo->query($requet);

$requet2="select * from authors";
$query2=$pdo->query($requet2);



$option = '';
function listauthor($ib) {
	global $option,$pdo;
	$option = '';
	$qr="SELECT a.idA , a.Fname,a.Lname FROM authors a , gallery g where g.idA=a.idA  and  g.idB=$ib ";
    // echo $ib;

    $que=$pdo->query($qr);

	while($row2 = $que->fetch(PDO::FETCH_ASSOC))
	{
		
	// $option .= '<option value = "'.$row2['idA'].'">'.$row2['Fname'].'</option>';
	$option .= '<option value = "'.$row2["idA"].'">' .$row2['Fname']." ".$row2['Lname']. '</option>';

	}
}






?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/our_books.css">
    <link rel="stylesheet" href="style/footer.css">


    <title>Reading</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

    
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
    <style>
        .backHome{
            width: 100%;
            height: 1340px;
            background-image: url("images/color back.png");
            background-position: center;
            background-size: cover;

            position: absolute;
            z-index: -1;
        }


        @media only screen and (max-width: 820px) {
            
        
            .navBar{
                display: block;
                
        }
            .navBar.activeBar{
            height: 320px;
            position: relative;
            
            background-color: #ffffff;
            width: 100%;
            box-shadow: 0px 3px 6px rgb(0 0 0 / 45%);
            position: fixed;
            top: 0;
            padding-top: 50px;
            z-index: 10;
            transition: 0.5s;
            
        }
            .navBar a{
              display: none;
              padding: 10px;
              color: #006D6F;
                            /* border-top: 1px solid #666565; */
              left: 50px;
              transition: 0.5s;
            
        }
          .navBar.activeBar a{
            display: grid;
                grid-template-columns: auto;
        
                width: 70vw;
              padding: 10px;
              font-size: 15px;
              border-bottom: 1px solid #8EDCDC;
              left: 45px;
              top: 35px;
              transition: 0.5s;
            
        }
        
        .navBar.activeBar a:hover{
            color: #004446;
              transition: 0.5s;
            
        }
        
        
        .navBar.activeBar .register{
                position: absolute;
                right: 140px;
                top: 240px;
        }
        .navBar.activeBar .register .aSingIn{
                width: 50px;
                height: 23px;
                font-size: 13px;
              border-bottom: none;
              transition: 0.5s;
              margin-left: 20px;
        }
        
        .navBar.activeBar .register .aSingIn .login{
            padding: 13px 30px;
                width: 38px;
                height: 13px;
                font-size: 13px;
                color: #fff;
        
        }
        .navBar.activeBar .register .aSingIn .singin{
            padding: 13px 15px;
                width: 45px;
                height: 13px;
                font-size: 13px;
                color: #fff;
        }
            
            .menu-toggle{
                display: block;
                width: 40px;
                height: 40px;
                margin: 25px 40px;
        
                float: right;
                cursor: pointer;
                text-align: center;
                font-size: 30px;
        
                position: relative;
                z-index: 99;
                        
                    }
                    .menu-toggle:before{
                      
                        content: '\f0c9';
                        font-family: fontAwesome;
                        line-height: 40px;
                        color: #ffffff;
                        transition: 0.5s;
                    }
                    .menu-toggle.activeBar:before{
                        content: '\f00d';
                       
                        color: #006D6F;
                        transition: 0.5s;
                    }
        
                } 
    </style>
</head>
<body>
    <div class="backHome" >

        <header>
            <div class="menu-toggle"></div>
            <a href="index.php">
                <div class="logo" >Reading.</div>
            </a>
            <nav class="navBar">
                
                <a  href="index.php">Home</a>
                <a href="our_books.php"  class="active">Our Books</a>
                <a href="add_authors.php">Add Authors</a>
                <a href="add_books.php">Add Books</a>
                
                <div class="register">
                    <a href="login.php" class="aSingIn"><div class="singin" >Sing in</div></a>
                    <a href="login.php" class="aSingIn"><div class="login" >Log in</div></a>
                </div>
            </nav>
           
        </header>
    
        <script>
            $(document).ready(function(){
                $('.menu-toggle').click(function(){
                    $('.menu-toggle').toggleClass('activeBar')
                    $('.navBar').toggleClass('activeBar')
                    $('.navBar a').toggleClass('activeBar')
                })
            }); 
        </script>


<script>
    function filtrage(){
      
        var authors = document.getElementById('nom_auteur').value;
         var auteur = document.getElementsByName('auteur');
         var min = document.getElementById('min').value;
        var max = document.getElementById('max').value;
        var prix = document.getElementsByName('prix');
        
        if(authors=="" && min!="" && max!="" ){
            //  alert("empty");
            for( var i=0;i<auteur.length;i++){

            if (parseInt(min) <=prix[i].innerHTML && parseInt( max)>=prix[i].innerHTML){
            
                    document.getElementsByClassName("gallery")[i].style="display:visible";
                   
                }
                else{
                    document.getElementsByClassName("gallery")[i].style="display:none";
        
                }
            }
        }


        if(authors!="" && min=="" && max=="" ){
            //  alert("empty");
            for( var i=0;i<auteur.length;i++){

                for( var j=0;j<auteur[i].length;j++){
                    // console.log(auteur[i].options[j].value+" "+authors);

                    if (authors==auteur[i].options[j].value){

                        // alert('jjjjjjj');
                        // console.log("sss");
            
                        document.getElementsByClassName("gallery")[i].style="display:visible";
                        break;
                    
                    }
                    else{

                        document.getElementsByClassName("gallery")[i].style="display:none";

                    }


                }

            
            }
        }
    



        if(authors!="" && min!="" && max!="" ){
         for( var i=0;i<auteur.length;i++){
            
             
        if (authors==auteur[i].innerHTML  && parseInt(min) <=prix[i].innerHTML && parseInt( max)>=prix[i].innerHTML){
            
            document.getElementsByClassName("gallery")[i].style="display:visible";
           
        }
        else{
            document.getElementsByClassName("gallery")[i].style="display:none";

        }
        
    }
        }
    }

</script>
    <p class="titre">Books at Reading</p>
    <div class="info-book">
<div class="info ">
    <label class="label1">Authors :</label>
    <select name="" class="authors" id="nom_auteur">
    <option value="" disabled selected hidden>Authors</option>

<?php while ($row2=$query2->fetch()){ ?>
        <option value="<?= $row2["idA"] ?>"><?php echo $row2["Fname"]." ".$row2["Lname"] ?></option>
<?php    }?>
    </select>
    </div>
<div class="info">
    <label class="label2">prix :</label>
    <input type="number" placeholder="min" id="min" class="prix">
    <input type="number" placeholder="max" id="max" class="prix">
    <button class="ok"  onclick="filtrage()"  >Ok</button>

</div>
</div>

<div class="our_book">



<?php  while ($row=$query1->fetch()){  ?>



        <div class="gallery" >
            <img src="images/<?php echo $row['image'] ?>" alt="book1" width="210px" height="280px">
            <p class="book"><?php echo $row['Name'] ?><br />
            
                <span class="font1" >
                <?php listauthor($row['idB']); ?>
               
                <select  name="auteur"> 
						
						<?php echo $option; ?>
				</select>
                
                
                
                </span><br/>
                <span class="prix_book" name="prix" ><?php echo $row['Price'] ?></span></p>
        </div>

 <?php   } ?>


</div>



<footer class="footer">
    <div class="t-list">
    <div class="list">
        <ul>
            <li><span class="color_F">About Us</span></li>
            <li>About us</li>
            <li>Features</li>
            <li>Commission</li>
            <li>Prices</li>
        </ul>
    </div>
    <div class="list">
        <ul>
            <li ><span class="color_F">General</span></li>
            <li>Reading awards</li>
            <li>Press Space</li>
            <li>Join us</li>
        </ul>
    </div>

    <div class="list">
        <ul>
            <li><span class="color_F">Support</span></li>
            <li>Help</li>
            <li>FAQ</li>
            <li>Blog</li>
        </ul>
    </div>

    <div class="list">
        <ul>
            <li><span class="color_F">Conditionst</span></li>
            <li>Temes of use</li>
            <li>Contact Us</li>
        </ul>
    </div>

    <div class="list">
        <ul>
            <li><span class="color_F"> Follow Ust</span> </li>
                <li><i class="fa fa-facebook"></i> Facebook</li>
                <li> <i class="fa fa-twitter"></i> Twitter</li>
                <li> <i class="fa fa-instagram"></i>  Instagram</li>
                <li><i class="fa fa-linkedin"></i> Linkedin</li>
        </ul>
    </div>
  
    <div class="list2">
            <p class="color_R"><b> Reading.</b> </p>
                <p class="app">Download The app and enjoy the great experience wherever you<br />are</p>
                <div class="app_store">
                <img src="images/1.png" alt="img1">
                <img src="images/2.png" alt="img2">
                </div>
    </div>

                
   
</div>  
    </footer>
    <div class="copyright">© Copyright 2021 Reading.  by AG developer</div>
    
    
</body>
</html>