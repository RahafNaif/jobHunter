
<html lang="en">
<head>

<style>

.jobDeatailsContainer {
  font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
    "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
  color: #192d50;
  z-index: 200000;
  position: absolute;
  background-color: white;
  border: 5px solid white;
  border-radius: 20px;
  left: 50%;
  top: 150%;
  transform: translate(-50%,-50%);
  height:max-content;
  width: 70%;
  padding-bottom: 2rem;
  display:none;


}

.jobDeatailsContainer #companySVG,
.companySVG {
  text-align: center;
}

.jobDeatailsContainer .JobHeader h1 {
  text-align: center;
  font-size: 2.2rem;
  font-weight: 400;
  padding: 0.9rem 0;
}
.jobDeatailsContainer .JobHeader h5 {
  text-align: center;
  font-size: 1rem;
  font-weight: 400;
  padding: 0.5rem;
}

.jobDeatailsContainer .details {
  position: relative;
  float: left;
  list-style: none;
  width: 50%;
  height: fit-content;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  border-radius: 1.25rem;
  font-size: 1rem;
  padding: 1rem;
  margin-top: 1.25rem;
  margin-left: 5%;
  margin-right: 0.5rem;
  background-color: rgba(234, 243, 250, 0.8);
  padding-bottom: 1rem;
}
.jobDeatailsContainer .details li {
  text-align: justify;
  width: 80%;
  margin-bottom: 1.1rem;
  position: relative;
}
.jobDeatailsContainer .details p{
  position: relative;
}
.jobDeatailsContainer .sideBar {
  display: inline-block;
  position: relative;
  float: right;
  height: fit-content;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  border-radius: 20px;
  font-size: 1rem;
  padding: 15px;
  margin-top: 20px;
  background-color: rgba(234, 243, 250, 0.8);
  margin-right: 5%;
  width: 30%;
}
.jobDeatailsContainer .titleAndValueDiv {
  margin: 2rem 0.2rem;
}
.jobDeatailsContainer .titleAndValueDiv h5 {
  font-size: smaller;
  font-weight: 400;
  padding-bottom: 0.2rem;
}
.jobDeatailsContainer .titleAndValueDiv,
.jobDeatailsContainer .details h6 {
  font-size: large;
  font-weight: bold;
}
.jobDeatailsContainer .details h4 {
  font-size: larger;
  padding-bottom: 2rem;
}

.jobDeatailsContainer .applyBtn button {
  background-color: burlywood;
  margin-top: 2rem;
  padding: 1rem;
  margin-left: 70%;
  margin-bottom: 3%;
  height: 50px;
  width: 100px;
  border-radius: 50px;
  background-color: #fa9746;
  outline: none;
  border-style: none;
  color: white;
  font-size: 18px;
}
.jobDeatailsContainer ol,.jobDeatailsContainer ul {
  position: relative;
  padding: 1rem;
  padding-right: 0;



  text-align: justify;
  width: fit-content;

}

.jobDeatailsContainer li {
  text-indent: -1.3em;
  padding-left: 3em;
}

.jobDeatailsContainer button {
  position: relative;
  margin: 10px;
  margin-left: 80px;
  margin-right: 10px;
  border-radius: 20px;
  width: 100px;
  height: 30px;
  font-size: 12px;
  color: rgb(234, 243, 250);
  cursor: pointer;
  border: none;
  outline: none;
  background: #fa9746;
  overflow: hidden;
}

.jobDeatailsContainer button:hover {
  transition: 0.3s ease-in;
  background: transparent;
  border: 1px solid rgb(138, 177, 244);
  color: #8cb3f4;
  transform: scale(1.2);
}

.jobDeatailsContainer button:focus {
  color: #8cb3f4;
  border: 1px solid #8cb3f4;
  background: rgba(234, 243, 250, 0.8);
}
.jobDeatailsContainer .details h6 {
  font-weight: 400;
}

.jobDeatailsContainer .closeIcon {
  position: absolute;
  top: 1%;
  left: 95%;
  z-index: 1;
}
.jobDeatailsContainer .closeIcon:hover {
  fill: darkorange;
}
.overlay{
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
  display: none;


}

</style>
<script src="js/Jquery.js"></script>
<script>
$(document).ready(function(){

$(".JobDetails").click(
    
    function () { 
    $('.jobDeatailsContainer').toggle();
    $('.overlay').toggle();}    
    );
$(".closeBtn").click(
  function(){
    $('.jobDeatailsContainer').hide();
    $('.overlay').hide();
  }
);

});
</script>
</head>
<body>
<?php
if(isset($_POST['Apply'])){
  
}
?>    
<div class="jobDeatailsContainer" >
                  <div class="closeBtn">
      
                      <a  class="closeIcon"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                          height="24" viewBox="0 0 24 24" width="30">
                          <g>
                              <path d="M0,0h24v24H0V0z" fill="none" />
                          </g>
                          <g>
                              <g>
                                  <path
                                      d="M18.3,5.71L18.3,5.71c-0.39-0.39-1.02-0.39-1.41,0L12,10.59L7.11,5.7c-0.39-0.39-1.02-0.39-1.41,0l0,0 c-0.39,0.39-0.39,1.02,0,1.41L10.59,12L5.7,16.89c-0.39,0.39-0.39,1.02,0,1.41l0,0c0.39,0.39,1.02,0.39,1.41,0L12,13.41l4.89,4.89 c0.39,0.39,1.02,0.39,1.41,0l0,0c0.39-0.39,0.39-1.02,0-1.41L13.41,12l4.89-4.89C18.68,6.73,18.68,6.09,18.3,5.71z" />
                              </g>
                          </g>
                      </svg></a>
                  
                  </div>
              
                    <div class="JobHeader">
                      <!--from github-->
                      <!-- Company svg -->
                      
                      <div class="companySVG">
                          <?xml version="1.0" encoding="UTF-8"?>
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100pt" height="116pt" viewBox="0 0 100 116" version="1.1">
                          <g id="surface1">
                          <path style=" stroke:none;fill-rule:nonzero;fill:rgb(16.862745%,27.45098%,54.509804%);fill-opacity:1;" d="M 92.710938 60.355469 C 92.710938 36.054688 73.011719 16.355469 48.710938 16.355469 C 24.410156 16.355469 4.710938 36.054688 4.710938 60.355469 C 4.710938 84.65625 24.410156 104.355469 48.710938 104.355469 C 73.011719 104.355469 92.710938 84.65625 92.710938 60.355469 Z M 92.710938 60.355469 "/>
                          <path style=" stroke:none;fill-rule:nonzero;fill:rgb(63.529412%,75.686275%,93.72549%);fill-opacity:1;" d="M 60.371094 40.015625 C 60.371094 46.640625 54.996094 52.015625 48.371094 52.015625 C 41.742188 52.015625 36.371094 46.640625 36.371094 40.015625 C 36.371094 33.386719 41.742188 28.015625 48.371094 28.015625 C 54.996094 28.015625 60.371094 33.386719 60.371094 40.015625 Z M 60.371094 40.015625 "/>
                          <path style=" stroke:none;fill-rule:nonzero;fill:rgb(63.529412%,75.686275%,93.72549%);fill-opacity:1;" d="M 48.371094 56.015625 C 36.21875 56.015625 26.371094 65.863281 26.371094 78.015625 L 26.371094 82.015625 C 26.371094 85.328125 29.054688 88.015625 32.371094 88.015625 L 64.371094 88.015625 C 67.683594 88.015625 70.371094 85.328125 70.371094 82.015625 L 70.371094 78.015625 C 70.371094 65.863281 60.519531 56.015625 48.371094 56.015625 Z M 48.371094 56.015625 "/>
                          <path style=" stroke:none;fill-rule:nonzero;fill:rgb(54.901961%,70.196078%,94.901961%);fill-opacity:1;" d="M 70.371094 78.015625 L 70.371094 82.015625 C 70.371094 85.328125 67.683594 88.015625 64.371094 88.015625 L 48.371094 88.015625 L 48.371094 56.015625 L 49.710938 56.015625 C 50.269531 56.015625 50.808594 56.015625 51.328125 56.175781 L 52.507812 56.375 L 53.53125 56.59375 L 54.230469 56.773438 L 55.128906 57.035156 L 56.390625 57.492188 C 57.214844 57.808594 58.015625 58.183594 58.789062 58.613281 C 65.929688 62.453125 70.378906 69.90625 70.371094 78.015625 Z M 70.371094 78.015625 "/>
                          <path style=" stroke:none;fill-rule:nonzero;fill:rgb(96.862745%,69.019608%,46.27451%);fill-opacity:1;" d="M 55.210938 79.253906 L 50.210938 67.253906 C 49.894531 66.515625 49.171875 66.039062 48.371094 66.039062 C 47.566406 66.039062 46.84375 66.515625 46.53125 67.253906 L 41.53125 79.253906 C 41.261719 79.925781 41.375 80.691406 41.828125 81.253906 L 46.828125 87.253906 C 47.210938 87.710938 47.773438 87.976562 48.371094 87.976562 C 48.964844 87.976562 49.53125 87.710938 49.910156 87.253906 L 54.910156 81.253906 C 55.363281 80.691406 55.480469 79.925781 55.210938 79.253906 Z M 55.210938 79.253906 "/>
                          <path style=" stroke:none;fill-rule:nonzero;fill:rgb(98.039216%,59.215686%,27.45098%);fill-opacity:1;" d="M 54.910156 81.292969 L 49.910156 87.292969 C 49.527344 87.75 48.964844 88.015625 48.371094 88.015625 L 48.371094 66.015625 C 49.175781 66.019531 49.902344 66.507812 50.210938 67.253906 L 50.667969 68.375 L 55.210938 79.253906 C 55.496094 79.9375 55.378906 80.722656 54.910156 81.292969 Z M 54.910156 81.292969 "/>
                          <path style=" stroke:none;fill-rule:nonzero;fill:rgb(91.764706%,95.294118%,98.039216%);fill-opacity:1;" d="M 58.789062 58.652344 C 52.289062 55.132812 44.449219 55.132812 37.949219 58.652344 L 46.949219 69.433594 C 47.324219 69.8125 47.835938 70.027344 48.371094 70.027344 C 48.902344 70.027344 49.414062 69.8125 49.789062 69.433594 Z M 58.789062 58.652344 "/>
                          <path style=" stroke:none;fill-rule:nonzero;fill:rgb(54.901961%,70.196078%,94.901961%);fill-opacity:1;" d="M 60.371094 40.015625 C 60.371094 46.640625 54.996094 52.015625 48.371094 52.015625 L 48.371094 28.015625 C 54.996094 28.015625 60.371094 33.386719 60.371094 40.015625 Z M 60.371094 40.015625 "/>
                          <path style=" stroke:none;fill-rule:nonzero;fill:rgb(84.313725%,88.627451%,94.901961%);fill-opacity:1;" d="M 58.789062 58.652344 L 50.667969 68.375 L 49.789062 69.433594 C 49.410156 69.808594 48.902344 70.015625 48.371094 70.015625 L 48.371094 56.015625 L 49.710938 56.015625 C 50.269531 56.015625 50.808594 56.015625 51.328125 56.175781 L 52.507812 56.375 L 53.53125 56.59375 L 54.230469 56.773438 L 55.128906 57.035156 L 56.390625 57.492188 C 57.210938 57.832031 58.015625 58.21875 58.789062 58.652344 Z M 58.789062 58.652344 "/>
                          </g>
                          </svg>
                          
                          
                      </div>
                      
                      <!-- end Company svg -->
                      <h1  style="font-weight :bolder" >Graphic Designer </h1>
                      <h5><a href="EmployerProfile.html">STC</a> For information Technology | Riyadh, Saudi Arabia</h5>
                  </div>
            
            
                      <div class="details">
                          <h4 style="font-weight:bolder ;">Job Description</h4>
                          <h6>Roles and responsibilities:</h6>
                          <p id="o">
                              <ol>
                                  <li>Using various programs for editing images and planning to make various designs.</li>
                                  <li>Create original logos, photos and illustrations to convey a specific message.                </li>
                                  <li>Create layouts for the design that will be done by choosing colors and images.</li>
                                  <li>Adding the new changes wanted by the administration and putting it in the final designs.</li>
                                  <li>Review designs for errors before printing and publishing.</li>
                                  <li>The graphic designer collaborates with the content writer in choosing the words and where to place them, whether in paragraphs, tables or lists.</li>
                                  <li>Converting data into visual graphics and diagrams in order to facilitate explanation of complex ideas, through the use of different images, colors and text.</li>
                                  <li>Executing business ideas professionally and creatively</li>
                  
                              </ol>
                          </p>
                          <h6>Required Skills</h6>
                          <p>
                              <ul>
                                  <li>Excellent IT skills, especially with design and photo-editing software</li>
                                  <li>Exceptional creativity and innovation</li>
                                  <li>Excellent time management and organisational skills</li>
                                  <li>Accuracy and attention to detail</li>
                              </ul>
                          </p>
                          <h6>Rrequired Qualifications</h6>
                          <p id="QualificationsP">
                              <ul>
                                  <li> Bachelor's degree in graphic arts or design, or any other graphic-related field.</li>
                                  <li>3 to 5 years of experience in graphic design..</li>
                                  <li>Familiar with ADOBE PHOTOSHOP, IIIustrator, and inDesign as well as other graphic design software.</li>
                                  <li>Has strong skills working on analysis and scrutiny in the smallest details.</li>
                              </ul>
                          </p>
                                              <!-- apply Buttton -->
                                              <div class="applyBtn">
            <form action="JobDetailsPopUp.php" method="POST">
            <a href="/Myapplicationlist.html"> <button> <input name="Apply" type="submit"/> Apply </button> </a>

            </form>
                                              </div>
                      </div>
                      
                  
                      <div class="sideBar">
                          <div class="titleAndValueDiv">            
                              <h5>Job Type</h5>
                              <p>Full-Time</p></div>
                          <div class="titleAndValueDiv">
                              <h5>Gender</h5>
                              <p>Female</p>    
                          </div>
                          <div class="titleAndValueDiv">
                              <h5>Location</h5>    
                              <p>Riyadh, Saudi Arabia</p>
                          </div>
                          <div class="titleAndValueDiv">            
                              <h5>Salary Starts From</h5>
                              <p>11,000 SR</p></div>
            
                      </div>
            
            </div>
            <div class="overlay"></div>
            
</body>
</html>