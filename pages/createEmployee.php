 <?php
    include('../auth/authentication.php');
    include_once("../backend/employeeController.php");
    include_once("../backend/customerController.php");
    include_once("../backend/managerController.php");

    global $role;
    global $username;
    global $user_id;
    global $barId;

    ?>

 <?php include("../backend/createEmployeeController.php"); ?>

 <?php include("include/title.php"); ?>

 <?php include("include/header.php"); ?>

 <?php include("include/sidebar.php"); ?>

 <main id="main" class="main">
     <div class="pagetitle">
         <h1>Users</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                 <li class="breadcrumb-item">Users</li>
                 <li class="breadcrumb-item active">Create Employee</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->
     <section class="section">
         <div class="row">
             <div class="col-lg-12">

                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-title">Create Employee <?php echo $barId; ?></h5>

                         <!-- Floating Labels Form -->
                         <form class="row g-3 needs-validation" id="createEmployeeForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" novalidate>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control <?php echo (!empty($fullname_err)) ? 'is-invalid' : ''; ?>" id="fullname" placeholder="Employee Fullname" name="fullname" required>
                                     <label for="floatingName">Employee FullName</label>
                                     <span class="invalid-feedback"><?php echo $fullname_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="email" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" id="email" placeholder="Manager Email" name="username" required>
                                     <label for="floatingEmail">Employee Email</label>
                                     <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control <?php echo (!empty($contact_err)) ? 'is-invalid' : ''; ?>" id="mobile" placeholder="Mobile Number" name="contact" required>
                                     <label for="floatingNum">Mobile Number</label>
                                     <span class="invalid-feedback"><?php echo $contact_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="date" class="form-control <?php echo (!empty($dateOfBirth_err)) ? 'is-invalid' : ''; ?>" id="floatingNum" placeholder="Date Of Birth" name="dateOfBirth" required>
                                     <label for="floatingNum">Date Of Birth</label>
                                     <span class="invalid-feedback"><?php echo $dateOfBirth_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <select class="form-select <?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>" id="floatingGen" name="gender" required>
                                         <option selected>Select Gender</option>
                                         <option value="Male">Male</option>
                                         <option value="Female">Female</option>
                                     </select>
                                     <label for="floatingGen">Gender</label>
                                     <span class="invalid-feedback"><?php echo $gender_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <select class="form-select <?php echo (!empty($title_err)) ? 'is-invalid' : ''; ?>" id="floatingTitle" name="title" required>
                                         <option selected>Select Title</option>
                                         <option value="Counter">Counter</option>
                                         <option value="Waiter">Waiter</option>
                                         <option value="Waitress">Waitress</option>
                                     </select>
                                     <label for="floatingTitle">Employee Title</label>
                                     <span class="invalid-feedback"><?php echo $title_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" id="floatingName" placeholder="Physical Address" name="address" required>
                                     <label for="floatingName">Employee Physical Address</label>
                                     <span class="invalid-feedback"><?php echo $address_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="password" placeholder="Manager Password" name="password" required>
                                     <label for="floatingPass">Employee Password</label>
                                     <span class="invalid-feedback" id="invalid-feedback"><?php echo $password_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" id="confirmpassword" placeholder="Confirm Password" name="confirm_password" required>
                                     <label for=" floatingConfPass">Confirm Password</label>
                                     <span class="invalid-feedback" id="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="hidden" value="<?php echo $_SESSION["barID"]; ?>" name="barId" required>
                                 </div>
                             </div>

                             <div class="text-center">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                                 <button type="reset" class="btn btn-secondary">Reset</button>
                             </div>
                         </form><!-- End floating Labels Form -->

                     </div>
                 </div>

             </div>
         </div>
     </section>

 </main><!-- End #main -->


 <?php include_once("include/footer.php"); ?>

 <?php include_once("../backend/formValidationScript.php"); ?>

 <?php include_once("include/bodyClosing.php"); ?>