<script type="text/javascript">
    // execute messageScroll function immediately after the page has loaded
    window.onload = messageScroll;

    // scrolling message to be displayed 
    // extra spaces on front of promoMessage so that substring method can make the scrolling message appear from the end of the textbox
    // instead of from the middle so that it looks like a perfect loop 
    var promoMessage = "                                                                 Please recommend Touristy to your friends!";
    // scrolling progress counter
    var counter = 0;
    
    function messageScroll() {
      // extracts the characters from index of counter to the end of promoMessage and display it
      document.scrolling.message.value = promoMessage.substring(counter, promoMessage.length);
      // add to scrolling progress counter
      counter++;
      // if counter reaches the same number as length of promoMessage (one complete scroll is completed)
      if (counter == promoMessage.length){ 
          // reset the counter so that the substring can begin from start from index 0 again
          counter = 0; 
         }
      // call messageScroll function after 100 milliseconds (setting scroll speed)
      window.setTimeout("messageScroll()", 100);
      }
</script>

<footer class="ftco-footer ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">About<span><a href="index.php"> Touristy</a></span></h2>
            <p>Penang's tourism gamification website</p>
            <form name="scrolling">
              <input type="text" name="message" value=" " size="30" style="font-family:Calibri;font-size: 18px;background-color:#1b1919;color: #d3d3d3;border-style:none;">
            </form>  
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5"></ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Question?</h2>
            
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">98 Nibong Residence, Persiaran Pantai Jerjak 1, Kampung Sungai Nibong, 11900 Bayan Lepas, Pulau Pinang</span></li>
                <li><span class="icon icon-phone"></span><span class="text">+60 112746 8204</span></a></li>
                <!-- activates the default mail client on the computer for sending an e-mail and prepare email with subject = Questions about Touristy and body = Questions to p18009969@student.newinti.edu.my -->    		
                <li><a href="mailto:p18009969@student.newinti.edu.my?subject=Questions about Touristy&amp;body=Questions"><span class="icon icon-envelope"></span><span class="text"> p18009969@student.newinti.edu.my</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
        </div>
      </div>
    </div>
    </footer>
    
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<!-- bootstrap -->
<script src="https://code.jquery/com/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>