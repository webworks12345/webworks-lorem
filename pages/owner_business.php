<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>

<?= element( 'header' ) ?>

<?= element( 'owner-side-nav' ) ?>
              
<div id= "own-bus"class="own-bus">
        <div class="d-flex justify-content-between p-3">
          <h1>My Business</h1>
          <a href="#" class="btn-edit btn-lg float-end mt-4 pb-1">
            <i class="bi bi-plus-square"></i>
            <span>Register your business here!</span>
        </a>
        </div>
        <br>
        <!--nka read only but ma edit if na click ang edit button-->
        <div class="bus-info card border-0 rounded-5 shadow p-3 mb-5 bg-white rounded">
          <div class="d-flex justify-content-between p-4">
            <h2>Business Information</h2>
            <a href="#" class="btn-edit float-end mt-4 ">
              <i class="bi bi-pencil-fill"></i>
              <span>Edit</span>
             </a>
          </div>
          <!-- 2 columns for details and pic-->
          <div class="column d-flex row justify-content-between">
            <div class="col-md-7 flex-column">
              <h6>About Us</h6>
              <input type="text" class="bus-name-field form-control" id="fname" placeholder="Business Name">
              <h6>About Us</h6>
              <input type="text" class="about-field form-control" id="fname" placeholder="Tell something about your business">
              <h6>Contact Us</h6>
              <input type="text" class="contact-field form-control" id="fname" placeholder="(e.g. Links, Contact Numbers, Websites)">
            </div>
            <!--image preview-->
            <div class="col-md-5">
              <div>
              <div class="mb-4 d-flex justify-content-center">
                  <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                  alt="example placeholder" />
              </div>
              <div class="d-flex justify-content-center">
                  <div class="btn btn-primary btn-rounded">
                      <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                      <input type="file" class="form-control d-none" id="customFile1" />
                  </div>
              </div>
          </div>
        </div>
        <a href="#" class="btn-add-branch align-items-center justify-content-center">
          <i class="bi bi-plus-square"></i>
          <span>Add Branch </span>
        </a>
       </div>
</div>
       <div class="branch-info card border-0 rounded-5 shadow p-3 mb-5 bg-white rounded">
          <div class="d-flex justify-content-between p-4">
            <h2>Branch Information</h2>
            <a href="#" class="btn-edit float-end mt-4 ">
              <i class="bi bi-pencil-fill"></i>
              <span>Edit</span>
             </a>
          </div>
          <!-- 2 columns for details and pic-->
          <div class="column d-flex row justify-content-between">
            <div class="col-md-7 flex-column">
              <h6>Branch Name</h6>
              <input type="text" class="form-control" id="fname" placeholder="Branch Name Including Location">
              <h6>Address</h6>
              <input type="text" class="form-control" id="fname" placeholder="House/Building No., Street, City/Province">
              <h6>Coordinates</h6>
              <input type="text" class="form-control" id="fname" placeholder="Coordinates">
            </div>
            <!--image preview-->
            <div class="col-md-5">
              <div>
              <div class="mb-4 d-flex justify-content-center">
                  <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                  alt="example placeholder" />
              </div>
              <div class="d-flex justify-content-center">
                  <div class="btn btn-primary btn-rounded">
                      <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                      <input type="file" class="form-control d-none" id="customFile1" />
                  </div>
              </div>
          </div>
        </div>

        <div>
        <a href="./ownpack2.html" class="btn-add-branch align-items-center justify-content-center">
          <i class="bi bi-plus-square"></i>
          <span>Add Package</span>
        </a>
       </div>
           
        </div> <!--end of branch info-->
</div>


<?= element( 'footer' ) ?>
        