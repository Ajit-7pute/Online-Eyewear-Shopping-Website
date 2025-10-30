<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
<?php
        include_once "header.php";
      ?>
  <section class="about">
    <div class="main">
      <img src="https://images.unsplash.com/photo-1508921912186-1d1a45ebb3c1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cGhvdG98ZW58MHx8MHx8&w=1000&q=80">
      <div class="about-text">
      <h1>
        About Us
	<div class="border"></div>
      </h1>
      <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati necessitatibus quam sit facilis voluptates incidunt, nobis aut ea odit velit eaque. Magni dicta inventore ut corrupti tenetur labore iste temporibus nobis? Distinctio nemo repellendus vitae corrupti hic temporibus. Numquam possimus consequatur, provident aspernatur maiores itaque voluptatem dolore ullam et laudantium. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, atque.</p>
      </button>
    </div>
</div>
</section> 
</body>
</html>


<style>
*{
  padding: 0;
  margin: 0;
  font-family: 'Josefin Sans', sans-serif;
  box-sizing: border-box;
}


.about{
  width:100%;
  padding: 78px 0px;
  background:#8fc0fbcc;
}


.about img{
  height:auto;
  width: 420px;
}


.about-text{
  width: 550px;
}

@media (max-width:40em) and (min-width:20em) {
  .about{
    font-size: 18px;
  }
}

.main{
  width:1130px;
  max-width: 95%;
  margin: auto;
  display: flex;
  align-items: center;
  justify-content: space-around;
}

.about-text h1{
  color: white;
  font-size: 80px;
  text-transform: capitalize;
  margin-bottom: 20px;
}



.about-text p{
  color: #fff;
  letter-spacing: 1px;
  line-height: 28px;
  font-size: 18px;
  margin-bottom: 45px;
}

button{
    border: none;
    padding: 8px 15px;
    background-color: #00a2f9;
    color: #fff;
    transition: 0.4s;
    border: 2px solid transparent;
    padding: 13px 30px;
    border-radius: 30px;
    margin-bottom: 45px;
  }
  
  #more {display: none;}

  button:hover{
    text-decoration: underline;
    background: transparent;
    border: 2px solid #f9004d;
    cursor: pointer;
  }

  /* On screens that are 992px wide or less, go from four columns to two columns */
@media (max-width: 700px) {
  .about{
    min-height : 100vh;
      text-align: center;
      justify-content : center;
      align-items : center;
      
  }
  .main{
    display : inline;
    
  }
  .about img{
       width: 150px;
       margin-bottom : 15px;
  }
  .about-text .text{
    font-size: 14px;
  }
 
}

/* On screens that are 600px wide or less, make the columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .row {
    flex-direction: column;
  }
    }


</style>