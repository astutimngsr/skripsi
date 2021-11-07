<div class="row" style="margin: 0;">
    <!-- <div class="col-xl-4">
        <div class="card">
            <div class="card-header">Profile Picture</div>
            <div class="card-body text-center">
                <img class="img-account-profile rounded-circle mb-2" src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/profiles/profile-1.png" alt="">
                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                <button class="btn btn-primary" type="button">Upload new image</button>
            </div>
        </div>
    </div> -->
    <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Account Details</div>
            <div class="card-body">
                <form>
                    <!-- Form Group (username)-->
                    <div class="form-group">
                        <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                        <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="username">
                    </div>
                    <!-- Form Row-->
                    <div class="form-row">
                        <!-- Form Group (first name)-->
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="inputFirstName">First name</label>
                            <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="Valerie">
                        </div>
                        <!-- Form Group (last name)-->
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="inputLastName">Last name</label>
                            <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="Luna">
                        </div>
                    </div>
                    <!-- Form Row        -->
                    <div class="form-row">
                        <!-- Form Group (organization name)-->
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="inputOrgName">Organization name</label>
                            <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="Start Bootstrap">
                        </div>
                        <!-- Form Group (location)-->
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="inputLocation">Location</label>
                            <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="San Francisco, CA">
                        </div>
                    </div>
                    <!-- Form Group (email address)-->
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Email address</label>
                        <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com">
                    </div>
                    <!-- Form Row-->
                    <div class="form-row">
                        <!-- Form Group (phone number)-->
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="inputPhone">Phone number</label>
                            <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567">
                        </div>
                        <!-- Form Group (birthday)-->
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="inputBirthday">Birthday</label>
                            <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value="06/10/1988">
                        </div>
                    </div>
                    <!-- Save changes button-->
                    <button class="btn btn-primary" type="button">Save changes</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Password</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample" style="">
            <div class="card-body">
                <form>
                    <!-- Form Group (current password)-->
                    <div class="form-group">
                        <label class="small mb-1" for="currentPassword">Current Password</label>
                        <input class="form-control" id="currentPassword" type="password" placeholder="Enter current password">
                    </div>
                    <!-- Form Group (new password)-->
                    <div class="form-group">
                        <label class="small mb-1" for="newPassword">New Password</label>
                        <input class="form-control" id="newPassword" type="password" placeholder="Enter new password">
                    </div>
                    <!-- Form Group (confirm password)-->
                    <div class="form-group">
                        <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                        <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm new password">
                    </div>
                    <button class="btn btn-primary" type="button">Save</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>