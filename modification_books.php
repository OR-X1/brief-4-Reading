<?php
require_once('connect.php');

$idB = $_GET['idB'];


$sqlAfficher = "SELECT b.*, g.*, a.idA, a.Fname, a.Lname FROM gallery g, books b, authors a 
WHERE g.idB = b.idB and g.idA = a.idA and b.idB = $idB";

$queryAffiche = $pdo->query($sqlAfficher);

$rowAffiche = $queryAffiche->fetch();



// $req="SELECT g.idA  FROM gallery g
// WHERE g.idB = $idB";

// $result2=$pdo->query($req);


$sth = $pdo->prepare("SELECT g.idA  FROM gallery g WHERE g.idB = $idB");
$sth->execute();
$result = $sth->fetchAll(\PDO::FETCH_ASSOC);
// print_r($result);

// $var;
// 	 while($rw = $stmt->fetch()){
// 	 $var = explode(",",$rw['idA']);	
     
// 	 }
    //  foreach ($result as $x) {
    //  print_r($x);	
    // }




$requet2="select * from authors";
$query2=$pdo->query($requet2);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/modification_books.css">
    <link rel="stylesheet" href="style/footer.css">

    <title>Reading</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
      <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

  <style>

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
<style type="text/css">

    ::-webkit-scrollbar {
    width: 8px;
}
::-webkit-scrollbar-thumb{
    background: #0F6C6E;
}
::-webkit-scrollbar-thumb:hover{
    background: #007B7E;
}

#checkboxes {
  display: none;

  padding-top:10px;
  background: #132225;
  height: 195px;
  overflow-y: scroll;
}

#checkboxes label {
  display: block;

  padding-left: 20px;
    padding-top: 10px;
    color: aliceblue;
    font-size: 13px;
    border-bottom: 1px solid #0F6C6E;
}
.checkSelect{
    margin-right:10px;
}

.selectBox {
  position: relative;
  
}

.selectBox select {
  width: 200px;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}
</style>




</head>
<body>
    <header>
        <div class="menu-toggle"></div>
        <a href="index.php">
            <div class="logo" >Reading.</div>
        </a>
        <nav class="navBar">
            
            <a  href="index.php">Home</a>
            <a href="our_books.php">Our Books</a>
            <a href="add_authors.php">Add Authors</a>
            <a href="add_books.php" >Add Books</a>
            
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

    <p class="titre">Modification of Books</p>

<form action="updateBook.php" class="container" method="post" enctype="multipart/form-data">
    <div class="DivFile">
        <p>&#10010; Add Image</p>
        <p class="editImg">&#9998; Edit Image</p>
        <input name="image" class="ImgFile" type="file" accept=".png, .jpg, .jpeg" data-id='imgChange'>
        <div class="divImgChange">
            <img id="imgChange" src="images/<?php echo $rowAffiche['image'] ?>" alt="">
        </div>
    </div>


    <div class="content">
    <input type="hidden" name="idB"  value="<?= $rowAffiche['idB'] ?>">
        <input type="text" placeholder="Name" class="input" name="Name"  value="<?php echo $rowAffiche['Name'] ?>">
        <input type="date" placeholder="Date" class="input" name="Date"  value="<?php echo $rowAffiche['dateB'] ?>">
        <input type="number" placeholder="Price" class="input" name="Price"  value="<?php echo $rowAffiche['Price'] ?>"><br/>
        <br/>


        <div class="selectBox" class="authors" onclick="f()">
      <select class="input">
        <option>Select an option</option>
      </select><br>
      <div class="overSelect"></div>
    </div>
 
      <div id="checkboxes">

      <?php while ($row2=$query2->fetch()){  ?>
      
        <?php    ?>

            <label for="<?php echo $row2["idA"] ?>">
            
            <input class="checkSelect" type="checkbox" id="<?php echo $row2["idA"] ?>"
             value="<?php echo $row2["idA"]; ?>" name="a[]"
             <?php foreach ($result as $x) { if($x['idA']== $row2["idA"])  {
            echo "checked";}}
             ?> 
            /><?php echo $row2["Fname"]." ".$row2["Lname"] ?></label>
        <?php   } ?> 
        
    </div>
    <button class="ADD">Edit</button>
  </div>

  <script type="text/javascript">
    var expanded = false;

    function f() {
        // body...
        var checkboxes = document.getElementById("checkboxes");
         // document.getElementById('op1').style.height = '0px';
  if (!expanded) {
    checkboxes.style.display = "block";
   
    expanded = true;
  } else {
    checkboxes.style.display = "none";
     // document.getElementById('op1').style.display = 'block';
    expanded = false;
  }
    }
</script>

<!-- <script>
function f2() {
    var isChecked=[];
    var elems= document.querySelectorAll('input[type="checkbox"]:checked');
                for (var i=0;i<elems.length;i++)
                {
                     isChecked +=elems[i].value;
              
                    
                }
                // alert(isChecked[i]);
                for (var i=0;i<isChecked.length;i++)
                {
                    alert(isChecked[i]);
                }
               
}
     

</script> -->


        
        <!-- <button class="ADD">Edit</button> -->
    </div>
</form>


<script type="text/javascript">
    var expanded = false;
    function f() {
        // body...
        var checkboxes = document.getElementById("checkboxes");
         // document.getElementById('op1').style.height = '0px';
  if (!expanded) {
    checkboxes.style.display = "block";
   
    expanded = true;
  } else {
    checkboxes.style.display = "none";
     // document.getElementById('op1').style.display = 'block';
    expanded = false;
  }
    }
</script>


<script>
    function ImageSetter(input,target) {
       if (input.files[0]) {
           var reader = new FileReader();
           
           reader.onload = function (e) {
               target.attr('src', e.target.result);
           }
           reader.readAsDataURL(input.files[0]);
       }
   }
   $(".ImgFile").change(function(){
     var imgDiv=$(this).data('id');  
          imgDiv=$('#' + imgDiv);    
       ImageSetter(this,imgDiv);
   });
</script>


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