<?php
   session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash Board</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel = "stylesheet" href="css/main.css">
</head>
<body>
    

    <header>
          <input type ="checkbox" name="" id="toggler">
          <label for ="toggler" class ="fas fa-bars"></label>       
         <a href="" class="logo"> Drippin Essence<span>.</span></a>
  
       <nav class ="navbar">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#products">Products</a>
        <a href="#review">Reviews</a>
        <a href="#contact">Contacts</a>
       </nav>

       <div class="icons">
        <a href="products.php" class="fa-solid fa-basket-shopping"></a>
        <a href="" class="fa-solid fa-user"></a>
        <a href="index.php" >Login</i></a>
    </div>
      
       </div>
    
          
       
  
    </header>


    <!--Section-->

<section class ="home" id="home">
     
    <div class="content">
         <h3>Welcome</h3>
         <span>Best Shop For | FASHION</span>
         <p>Shop now! we are 100% sure that our customer will be satisfied to our products!</p>
         <a href="products.php" class="btn">Shop Now</a>
    </div>
     
</section>

    <section class="about" id="about">
       
         <h1 class ="heading"> <span> about  us </span></h1> 

        <div class="row">

            <div class="img-container">
                <img src ="image/drip.jpg">
                  <h3>best shirts sellers</h3>
            </div>
                <div class="content">
                    <h3>why choose us?</h3>
                    <p>Choose Drippin Essence for unparalleled style. Our shirts embody individuality, crafted with quality materials and vibrant designs. Stand out from the crowd with confidence in every stitch. Elevate your wardrobe with pieces that speak volumes. 
                        Drippin Essence isn't just a brand; it's a statement of your unique essence.</p>
                    <p>
                        Choose Drippin Essence for unmatched style. 
                        Our shirts blend quality, creativity, and confidence, ensuring you make a statement everywhere you go.</p>    
                   <a href ="#" class="btn">Learn More</a>
                    </div>
        </div>

    </section>

<!--Icons start-->
   

   <section class="icons-container">
          
       <div class="icons">
           <img src ="https://cdn-icons-png.freepik.com/512/4947/4947265.png" style="width: 100px;">
           <div class="info">
                <h3>free delivery</h3>
                <span>on all order</span>
           </div>
       </div>
            
       <div class="icons">
        <img src ="https://static.thenounproject.com/png/1147124-200.png" style="width: 100px;">
        <div class="info">
             <h3>3 Days returns</h3>
             <span>Moneyback guarantee</span>
        </div>
    </div>

    <div class="icons">
        <img src ="https://cdn-icons-png.flaticon.com/512/1261/1261038.png" style="width: 100px;">
        <div class="info">
             <h3>Offer & gifts</h3>
             <span>on all order</span>
        </div>
    </div>

    <div class="icons">
        <img src ="https://cdn-icons-png.flaticon.com/512/4827/4827568.png" style="width: 100px;">
        <div class="info">
             <h3>Secure payments</h3>
             <span>Protected by Maya</span>
        </div>
    </div>
           
   </section>


<section class="products" id="products">
    <h1 class="heading"><a href ="products.php">Check latest products</a></h1>

    <div class="box-container">
       
        <div class="box">
            <span class="discount">5%</span>
             <div class="image">
                <img src ="image/khaki.jpg">
                  <div class="icons">
                      <a href="#" class="fas fa-heart"></a>
                      <a href="#" class="cart-btn">Add to cart</a>
                      <a href="#" class="fas fa-share"></a>
                  </div>
             </div>
              <div class="content">
                  <h3>Khaki shirt</h3>
                  <div class="price"> ₱250 <span>₱300</span></div>
              </div>
        </div>

        <div class="box">
            <span class="discount">-10%</span>
             <div class="image">
                <img src ="image/stussy.jpg">
                  <div class="icons">
                      <a href="#" class="fas fa-heart"></a>
                      <a href="#" class="cart-btn">Add to cart</a>
                      <a href="#" class="fas fa-share"></a>
                  </div>
             </div>
              <div class="content">
                  <h3>Khaki shirt</h3>
                  <div class="price"> ₱250 <span>₱300</span></div>
              </div>
        </div>  

        <div class="box">
            <span class="discount">-20%</span>
             <div class="image">
                <img src ="image/stussy.jpg">
                  <div class="icons">
                      <a href="#" class="fas fa-heart"></a>
                      <a href="#" class="cart-btn">Add to cart</a>
                      <a href="#" class="fas fa-share"></a>
                  </div>
             </div>
              <div class="content">
                  <h3>Khaki shirt</h3>
                  <div class="price"> ₱250 <span>₱300</span></div>
              </div>
        </div>  

        <div class="box">
            <span class="discount">20%</span>
             <div class="image">
                <img src ="image/LA.jpg">
                  <div class="icons">
                      <a href="#" class="fas fa-heart"></a>
                      <a href="#" class="cart-btn">Add to cart</a>
                      <a href="#" class="fas fa-share"></a>
                  </div>
             </div>
              <div class="content">
                  <h3>Khaki shirt</h3>
                  <div class="price"> ₱250 <span>₱300</span></div>
              </div>
        </div>  

        <div class="box">
            <span class="discount">30%</span>
             <div class="image">
                <img src ="image/brown.jpg">
                  <div class="icons">
                      <a href="#" class="fas fa-heart"></a>
                      <a href="#" class="cart-btn">Add to cart</a>
                      <a href="#" class="fas fa-share"></a>
                  </div>
             </div>
              <div class="content">
                  <h3>Khaki shirt</h3>
                  <div class="price"> ₱250 <span>₱300</span></div>
              </div>
        </div>  

        <div class="box">
            <span class="discount">9%</span>
             <div class="image">
                <img src ="image/mb.jpg">
                  <div class="icons">
                      <a href="#" class="fas fa-heart"></a>
                      <a href="#" class="cart-btn">Add to cart</a>
                      <a href="#" class="fas fa-share"></a>
                  </div>
             </div>
              <div class="content">
                  <h3>Khaki shirt</h3>
                  <div class="price"> ₱250 <span>₱300</span></div>
              </div>
        </div>  
       
        <div class="box">
            <span class="discount">19%</span>
             <div class="image">
                <img src ="image/cat.jpg">
                  <div class="icons">
                      <a href="#" class="fas fa-heart"></a>
                      <a href="#" class="cart-btn">Add to cart</a>
                      <a href="#" class="fas fa-share"></a>
                  </div>
             </div>
              <div class="content">
                  <h3>Khaki shirt</h3>
                  <div class="price"> ₱250 <span>₱300</span></div>
              </div>
        </div>  

        <div class="box">
            <span class="discount">16%</span>
             <div class="image">
                <img src ="image/white.jpg">
                  <div class="icons">
                      <a href="#" class="fas fa-heart"></a>
                      <a href="#" class="cart-btn">Add to cart</a>
                      <a href="#" class="fas fa-share"></a>
                  </div>
             </div>
              <div class="content">
                  <h3>Khaki shirt</h3>
                  <div class="price"> ₱250 <span>₱300</span></div>
              </div>
        </div>  
        
        <div class="box">
            <span class="discount">20%</span>
             <div class="image">
                <img src ="image/nike.jpg">
                  <div class="icons">
                      <a href="#" class="fas fa-heart"></a>
                      <a href="#" class="cart-btn">Add to cart</a>
                      <a href="#" class="fas fa-share"></a>
                  </div>
             </div>
              <div class="content">
                  <h3>Khaki shirt</h3>
                  <div class="price"> ₱250 <span>₱300</span></div>
              </div>
        </div>  


    </div>
</section>

     <section class="review" id="review">

        <h1 class="heading" style = "color: white;">customers review</h1>

        <div class="box-container">
              <div class="box">
                  <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                    Quod eius quo placeat distinctio facilis neque quisquam quasi itaque rem, exercitationem laudantium, aperiam, 
                    sunt assumenda aliquam ab voluptatibus doloremque eum unde.</p>
                      <div class="user">
                           <img src="image/brucefabria.jpg">
                            <div class="user-info">
                                <h3>Bruce Fabria</h3>
                                <span>happy customer</span>
                            </div>
                      </div>
                      <span class="fas fa-quote-right"></span>
                 </div>

                 <div class="box">
                    <div class="stars">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                      Quod eius quo placeat distinctio facilis neque quisquam quasi itaque rem, exercitationem laudantium, aperiam, 
                      sunt assumenda aliquam ab voluptatibus doloremque eum unde.</p>
                        <div class="user">
                             <img src="image/8.jpg">
                              <div class="user-info">
                                  <h3>Prince Ciudadano</h3>
                                  <span>happy customer</span>
                              </div>
                        </div>
                        <span class="fas fa-quote-right"></span>
                   </div>

                   <div class="box">
                    <div class="stars">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                      Quod eius quo placeat distinctio facilis neque quisquam quasi itaque rem, exercitationem laudantium, aperiam, 
                      sunt assumenda aliquam ab voluptatibus doloremque eum unde.</p>
                        <div class="user">
                             <img src="image/aa.jpg">
                              <div class="user-info">
                                  <h3>Jay Lawrence M. Danuco</h3>
                                  <span>happy customer</span>
                              </div>
                        </div>
                        <span class="fas fa-quote-right"></span>
                   </div>
        </div>
     </section>

   <section class="contact" id="contact">
          <h1 class="heading" style = "color: white;">Contact Us</h1>

          <div class="row">
               <form action="">
                <input type="text" placeholder="name" class="box">
                <input type="email" placeholder="email" class="box">
                <input type="number" placeholder="number" class="box">
                <textarea name="message" id="message" placeholder="message" cols="30" rows="10" class="box">
                </textarea>
                <input type="submit" value="send message" class="btn">
            </form>
            <div class="image">
                <img src="image/dr.jpg" alt="">
            </div>
          </div>

   </section>
 
  

</body>
</html>