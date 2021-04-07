<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
 <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr {
  background-color: #ffffff;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1"><div class="container">
<link rel="stylesheet" href="style.css">
<script>
  function myfunc(id){
    console.log(id);
    document.cookie = "myJavascriptVar = " + id; 
    
  document.getElementById('id03').style.display='block';
}
</script>
</head>
<body>

<div id="navbar">
  <a class="active" href="index.html">Home</a>
  <?php 
  if(isset($_SESSION['email']))
  {
    $name=$_SESSION['email'];
    echo "<a href='logout_page.php'>Logout</a>";
    echo "<a href='index.php' style='float:right' >$name</a>";
  }
  else
  {
    echo "<a href='login_page.php'>Login</a>";
  } ?>
  <?php if(isset($_SESSION['email'])){
  echo "<a onclick=document.getElementById('id02').style.display='block' style='width:auto;'>Add a vehicle</a>";

  echo "<a onclick=document.getElementById('id04').style.display='block' style='width:auto;'>View my vehicle bookings</a>";
  }
  ?>
  <a onclick="document.getElementById('id05').style.display='block'">About Us</a>
  
  
</div>


  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ8mtnAbI4yoOTNxDcNuenuPtOTPfWUS13H2w&usqp=CAU" alt="transport" style="width:100%;">
  <?php 
  if(isset($_SESSION['email']))
  {
    $name=$_SESSION['fname']." ".$_SESSION['lname'];
    echo "<button class='btn' onclick='#' style='width:auto;'>Welcome $name</button>";
  }
  else
  {
  echo "<button class='btn' onclick=document.getElementById('id01').style.display='block' style='width:auto;'>Sign Up to to Share Your Transport</button>";
  } ?>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form  method="post" onsubmit="return onSignUp()" action='./sign_up.php' class="modal-content">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
       <label for="fname"><b>First Name</b></label>
      <input type="text" placeholder="Enter First Name" name="fname" required>
      
       <label for="lname"><b>Last Name</b></label>
      <input type="text" placeholder="Enter Last Name" name="lname" required>
      
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>
      <b><p id="email_error" style="color:red"></p></b>


      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" title="password shoule contain atleast one lower letter,one upper letter and one special symbol and length should be between 8 to 12" name="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" title="password shoule contain atleast one lower letter,one upper letter and one special symbol and length should be between 8 to 12" name="psw-repeat" required>
      <b><p id="psw_error" style="color:red"></p></b>
  
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>
</div>

<!----------------------------------------------my code-->
<div id="id02" class="modal" enctype="multipart/form-data">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form  method="post" action='./add_vehicle.php' class="modal-content" enctype="multipart/form-data">
    <div class="container">
      <h1>Add Vehicle</h1>
      <p>Please fill in this form to add vehicle.</p>
      <hr>
      
       <label for="lname"><b>Vehicle Name</b></label>
      <input type="text" placeholder="Enter Vehicle Name" name="vehicle_name" required>

      <label for="lname"><b>Choose vehicle type:</b></label>

<select name="vehicle_type" id="vehicle_type">
  <option value="Jeep">Jeep</option>
  <option value="Truck">Truck</option>
  <option value="MiniTruck">Mini Truck</option>
  <option value="Car">Car</option>
</select>
<br/>
<br/>
      
      <label for="email"><b>Vehicle travelling From:</b></label>
      <input type="text" placeholder="Enter address" name="vehicle_from" required>
      <b><p id="email_error" style="color:red"></p></b>

      <label for="email"><b>Vehicle travelling To:</b></label>
      <input type="text" placeholder="Enter address" name="vehicle_to" required>
      <b><p id="email_error" style="color:red"></p></b>

      <label for="email"><b>Enter volume available for goods:</b></label>
      <br/>
      <label for="email"><b>Length:</b></label>
      <input type="text" placeholder="Enter length" name="length" required>
      <b><p id="email_error" style="color:red"></p></b>

      <label for="email"><b>Breadth:</b></label>
      <input type="text" placeholder="Enter breadth" name="breadth" required>
      <b><p id="email_error" style="color:red"></p></b>

      <label for="email"><b>Height:</b></label>
      <input type="text" placeholder="Enter height" name="height" required>
      <b><p id="email_error" style="color:red"></p></b>

      <label for="email"><b>Photo of Vehicle:</b></label>
      <input type="file" name="afile" id="file"><br><br>

      <b><p id="psw_error" style="color:red"></p></b>
  
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Submit</button>
      </div>
    </div>
  </form>
</div>
</div>


<!------------here's about section--->
<div id="id05" class="modal">
  <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
  <table>
    <th><font size="5"> This is a transport management app ,where the vehicle owners can rent their vehicle for transport. Firstly they have to signup ,login and they can add vehicles and some details about vehicles such as vehicle type, vehicle name ,dimensions available for storing the goods, the place & destination of the vehicle .These vehicles can be booked by customers .Details that are to added are required dimensions , goods type , full name and email id for contacting.
    </font>
      <tr>
    <th>
      <font size="5">This app is made by using technologies such as PHP ,MySql ,HTML and CSS.</font></th>
      </tr>
   
      
      
  </table>


</div>
<!---------------about section ends here-->
<!-----------------here's my code-->
<div id="id04" class="modal">
  <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
  <table>
    <thead>
      <tr>
        <th>Customer's Name</th>
        <th>Customer's Email Id</th>
        <th>Vehicle Name</th>
        <th>Vehicle Type</th>
        <th>Place</th>
        <th>Destination</th>
        <th>Required Length</th>
        <th>Required Breadth</th>
        <th>Required Height</th>
      </tr>
    </thead>
    <tbody>
  <?php 
  $oid=$_SESSION['id'];

$query_is_this=mysqli_query($con,"SELECT * FROM `bookings` inner join `vehicles`  on  bookings.vehicle_id=vehicles.id  where vehicles.is_booked=1 and vehicles.owner_id=$oid ;");
  while($row=mysqli_fetch_array($query_is_this)){
    
  ?>

    
    
    
      <tr>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['email']?></td>

        <td><?php 
        $vid=$row['vehicle_id'];
          mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `vehicles` where id =$vid"));
        
        echo $row['vehicle_name']?></td>
        <td><?php echo $row['vehicle_type']?></td>
      
        <td><?php echo $row['place']; ?></td>
        <td><?php echo $row['destination']; ?></td>
        <td><?php echo $row['length']; ?></td>
        <td><?php echo $row['breadth']; ?></td>
        <td><?php echo $row['height']; ?></td>
      </tr>
   

      <?php 
}
 ?>
    </tbody>
  </table>


</div>
<!-----------------here's my code -->
<!------------------------here is my code -->
<div id="id03" class="modal">
  <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form  method="post" action='./book_a_vehicle.php' class="modal-content">
    <div class="container">
      <h1>Book a Vehicle</h1>
      <p>Please fill in this form to book a vehicle.</p>
      <hr>
      
       <label for="lname"><b>Name:</b></label>
      <input type="text" placeholder="Enter Your Full Name" name="name" required>

      <label for="lname"><b>Email:</b></label>
      <input type="text" placeholder="Enter Your Email" name="email" required>

    
<br/>
<br/>
      
      <label for="email"><b>Place:</b></label>
      <input type="text" placeholder="Enter address" name="place" required>
      <b><p id="email_error" style="color:red"></p></b>

      <label for="email"><b>Destination:</b></label>
      <input type="text" placeholder="Enter address" name="destination" required>
      <b><p id="email_error" style="color:red"></p></b>

      <label for="email"><b>Enter dimensions required for goods:</b></label>
      <br/>
      <label for="email"><b>Length:</b></label>
      <input type="text" placeholder="Enter length" name="length" required>
      <b><p id="email_error" style="color:red"></p></b>

      <label for="email"><b>Breadth:</b></label>
      <input type="text" placeholder="Enter breadth" name="breadth" required>
      <b><p id="email_error" style="color:red"></p></b>

      <label for="email"><b>Height:</b></label>
      <input type="text" placeholder="Enter height" name="height" required>
      <b><p id="email_error" style="color:red"></p></b>
      <br>

      <label for="email"><b>Product Type:</b></label>
      <input type="text" placeholder="Enter product type" name="product_type" required>
      <b><p id="email_error" style="color:red"></p></b>


      <b><p id="psw_error" style="color:red"></p></b>
  
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel

        </button>
        <button type="submit" class="signupbtn">Submit</button>
      </div>
    </div>
  </form>
</div>
</div>
<!---------------------------here is my code-->
<!----------------------------------------------my code-->
<div class="wrapper">

  <div class="cards_wrap">
  
  

<?php 
$query_is_this=mysqli_query($con,"SELECT * FROM `vehicles` WHERE is_booked=0;");
  while($row=mysqli_fetch_array($query_is_this)){
    
  ?>
      <div class="card_item">
      <div class="card_inner">
        <div class="card_top">
          <?php
          echo '<img src="'.$row['file'].'">';
          
          ?>
        </div>
        <div class="card_bottom">
          <div class="card_category">
           <b>Type of vehical:</b>
           <?php 
            echo $row['vehicle_type']
            ?>
          </div>
          <div class="card_category">
           <b>Name of vehical:</b>
           <?php 
            echo $row['vehicle_name']
            ?>
          </div>
          <div class="card_info">
            <p class="title">Origin :
            <?php 
            echo $row['vehicle_from']
            ?><br/> Destination:
            <?php 
            echo $row['vehicle_to']
            ?> 
          </p>
            <p>
              <!-- Type of product:<br> -->
        Dimensions: 
        <br/>
        Length:
        <?php 
            echo $row['length']." meters"
            ?> <br/>
        Breadth:
        <?php 
            echo $row['breadth']." meters"
            ?> <br/>
        Height:
        <?php 
            echo $row['height']." meters"

            ?> <br/>
        
            </p>
          </div>
         
          <div class="card_creator">
            
              
           <button class="button" onclick=myfunc(<?php echo $row['id']; ?>) style="vertical-align:middle"><span>Book </span></button>
          </div>
        </div>
      </div>
    </div>;

         ;
  
<?php 
}
 ?>
  


	

	
	
	
	

	
	
	

	
	
	

	
    
  </div>
</div>






<script>

function onSignUp()
{
var re = /\S+@\S+\.\S+/;
if(!re.test(document.getElementsByName("email")[0].value))
{
  document.getElementById('email_error').innerHTML="Given Email is Invalid";
  return false;
}
else
{
  document.getElementById('email_error').innerHTML="";

}

if(document.getElementsByName("psw")[0].value != document.getElementsByName("psw-repeat")[0].value)
{
  document.getElementById('psw_error').innerHTML="password do not match";
  return false;
}
else
{
  document.getElementById('psw_error').innerHTML="";
}

}
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
