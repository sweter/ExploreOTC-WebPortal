<?php
    include('Validation/validate_session.php');
    include('DB/conn.php');
    include('Helpers/FilterPage.php');
 ?>
<!-- https://learn.getgrav.org/user/pages/05.admin-panel/09.faq/faq_2.png -->
<!-- http://ionicons.com/ -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ExploreOTC Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
</head>
<body>
    <div style="width: 100vw">
        <div style="height: 100vh" id="height">
            <section class="side-nav" id="sideNav">
                <div class="title-button">
                    ExploreOTC
                </div>
                <div class="menu-functions">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">
                                <ion-item>
                                    <ion-icon class="icon" name="speedometer">&nbsp;&nbsp</ion-icon>
                                    <span class="icon-text">Dashboard</span>
                                </ion-item>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="registration.php">
                                <ion-item>
                                    <ion-icon class="icon" name="person">&nbsp;&nbsp</ion-icon>
                                    <span class="icon-text">Registration</span>
                                </ion-item>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="qr_scans.php">
                                <ion-item>
                                    <ion-icon class="icon" name="qr-scanner">&nbsp;&nbsp</ion-icon>
                                    <span class="icon-text">QR Code</span>
                                </ion-item>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <ion-item>
                                    <ion-icon class="icon" name="clipboard">&nbsp;&nbsp</ion-icon>
                                    <span class="icon-text">Survey</span>
                                </ion-item>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>

            <nav class="main-nav navbar navbar-expand-sm" id="mainNav">
                <div class="container">
                    <button class="filter-btn" data-toggle="collapse" data-target="#filter">
                        <ion-item>
                            <ion-icon class="icon" name="funnel"></ion-icon>
                            <span class="ion-text">&nbsp;&nbspFilter</span>
                        </ion-item>
                    </button>
                    <div>
                        <a href="index.php">
                            <ion-item>
                                <ion-icon class="icon" name="log-out"></ion-icon>
                                <span class="icon-text">Log Out</span>
                            </ion-item>
                        </a>
                    </div>
                </div>
            </nav>

            <section class="main-content" id="mainContent">
                <div class="collapse" id="filter">
					<form action="survey.php" method="get">
                        <div class="d-block">
    						<div class="form-group d-inline-block">
								<label for="programDrop">Program</label>
								<select class="form-control" id="programDrop" name="Program">
									<option value="">Any</option>
                                    <?php
                                        $options = [
                                            "ABR" => "Auto Collision Repair", "AGR" => "Agriculture",
                                            "AUM" => "Automotive Technology", "AVI" => "Aviation",
                                            "CIS" => "Computer Information Science", "CST" => "Construction Technology",
                                            "CUL" => "Culinary Arts", "DDT" => "Drafting and Design Technology",
                                            "DSL" => "Diesel Technology", "ECD" => "Early Childhood Development",
                                            "EDS" => "Electrical Trades Technology", "ELC" => "Electricity",
                                            "EMP" => "Electronic Media Production", "FST" => "Fire Science Technology",
                                            "GDT" => "Graphics Design Technology", "HRA" => "Heating, Refrigeration, and Air Conditioning",
                                            "HSC" => "Health Sciences", "HSM" => "Hospitatlity Management",
                                            "IST" => "Industrial Systems Technology", "MFG" => "Manufacturing Technology",
                                            "MTT" => "Machine Tool Technology", "NET" => "Networking Technology",
                                            "WLD" => "Welding Technology"
                                        ];
                                        create_drop_down($options, 'Program', True);
                                     ?>
								</select>
                            </div>
                        </div>
                        <div class="d-block">
                            <div class="form-group d-inline-block ml-4">
                                <input type="checkbox" class="form-check-input" id="Military" name="Military" <?php get_input_data('Military'); ?>>
                                <label for="Military" class="form-check-label">Military</label>
                            </div>
                            <div class="form-group d-inline-block ml-5">
                                <input type="checkbox" class="form-check-input" id="AssociatesDegree" name="AssociatesDegree" <?php get_input_data('AssociatesDegree'); ?>>
                                <label for="AssociatesDegree" class="form-check-label">Associates Degree</label>
                            </div>
                            <div class="form-group d-inline-block ml-5">
                                <input type="checkbox" class="form-check-input" id="BachelorsDegree" name="BachelorsDegree" <?php get_input_data('BachelorsDegree'); ?>>
                                <label for="BachelorsDegree" class="form-check-label">Bachelors Degree</label>
                            </div>
                            <div class="form-group d-inline-block ml-4">
                                <input type="checkbox" class="form-check-input" id="NoPlans" name="NoPlans" <?php get_input_data('NoPlans'); ?>>
                                <label for="NoPlans" class="form-check-label">Not Planning on Attending College</label>
                            </div>
                            <div class="form-group d-inline-block ml-5">
                                <input type="checkbox" class="form-check-input" id="GoToWork" name="GoToWork" <?php get_input_data('GoToWork'); ?>>
                                <label for="GoToWork" class="form-check-label">Go to Work</label>
                            </div>
                            <div class="form-group d-inline-block ml-4">
                                <input type="checkbox" class="form-check-input" id="DontKnow" name="DontKnow" <?php get_input_data('DontKnow'); ?>>
                                <label for="DontKnow" class="form-check-label">Don't Know</label>
                            </div>
                        </div>
						<div class="d-block">
							<div class="form-group d-inline-block ml-5">
								<label for="aPlus">A+ Qualified</label>
							</div>
							<div class="form-group d-inline-block ml-4">
                                <input type="checkbox" class="form-check-input" id="aPlusYes" name="aPlusYes" <?php get_input_data('Yes'); ?>>
                                <label for="aPlusYes" class="form-check-label">Yes</label>
							</div>
							<div class="form-group d-inline-block ml-4">
                                <input type="checkbox" class="form-check-input" id="aPlusNo" name="aPlusNo" <?php get_input_data('No'); ?>>
                                <label for="aPlusNo" class="form-check-label">No</label>
							</div>
						</div>
						<div class="d-block">
							<div class="form-group d-inline-block ml-5">
								<label for="increasedInterest">Event Increased Interest</label>
							</div>
							<div class="form-group d-inline-block ml-4">
                                <input type="checkbox" class="form-check-input" id="increasedInterestYes" name="increasedInterestYes" <?php get_input_data('Yes'); ?>>
                                <label for="increasedInterestYes" class="form-check-label">Yes</label>
							</div>
							<div class="form-group d-inline-block ml-4">
                                <input type="checkbox" class="form-check-input" id="increasedInterestNo" name="increasedInterestNo" <?php get_input_data('No'); ?>>
                                <label for="increasedInterestNo" class="form-check-label">No</label>
							</div>
						</div>
						<div class="d-block">
							<div class="form-group d-inline-block ml-5">
								<label for="fullDay">Attend Full Day</label>
							</div>
							<div class="form-group d-inline-block ml-4">
                                <input type="checkbox" class="form-check-input" id="fullDayYes" name="fullDayYes" <?php get_input_data('Yes'); ?>>
                                <label for="fullDayYes" class="form-check-label">Yes</label>
							</div>
							<div class="form-group d-inline-block ml-4">
                                <input type="checkbox" class="form-check-input" id="fullDayNo" name="fullDayNo" <?php get_input_data('No'); ?>>
                                <label for="fullDayNo" class="form-check-label">No</label>
							</div>
						</div>
						<div class="d-block">
							<div class="form-group d-inline-block ml-5">
								<label for="halfDay">Attend Half Day</label>
							</div>
							<div class="form-group d-inline-block ml-4">
                                <input type="checkbox" class="form-check-input" id="halfDayYes" name="halfDayYes" <?php get_input_data('Yes'); ?>>
                                <label for="halfDayYes" class="form-check-label">Yes</label>
							</div>
							<div class="form-group d-inline-block ml-4">
                                <input type="checkbox" class="form-check-input" id="halfDayNo" name="halfDayNo" <?php get_input_data('No'); ?>>
                                <label for="halfDayNo" class="form-check-label">No</label>
							</div>
						</div>
						<div class="d-block">
							<div class="form-group d-inline-block ml-5">
								<label for="afterHighSchool">Attend After High School</label>
							</div>
							<div class="form-group d-inline-block ml-4">
                                <input type="checkbox" class="form-check-input" id="afterHighSchoolYes" name="afterHighSchoolYes" <?php get_input_data('Yes'); ?>>
                                <label for="afterHighSchoolYes" class="form-check-label">Yes</label>
							</div>
							<div class="form-group d-inline-block ml-4">
                                <input type="checkbox" class="form-check-input" id="afterHighSchoolNo" name="afterHighSchoolNo" <?php get_input_data('No'); ?>>
                                <label for="afterHighSchoolNo" class="form-check-label">No</label>
							</div>
						</div>
						<div class="form-group d-inline-block">
								<label for="ratingDrop">Event Rating</label>
								<select class="form-control" id="ratingDrop" name="Rating">
									<option value="">1</option>
									<option value="">2</option>
									<option value="">3</option>
									<option value="">4</option>
									<option value="">5</option>
						<button type="submit" class="btn btn-success">Filter</button>
                    </form>
				</div>

                <div class="d-block">
                    <div class="content-title-bar d-inline-block">
                        <h4 class="content-title">Survey</h4>
                    </div>
                    <div class="content-path d-inline-block">
                        <span class="path">Home > Survey</span>
                    </div>
                </div>

                <div class="scroll mt-4">
                    <?php
                        create_table("SELECT QR_Scan_Results.UserEmail, PhoneNo, Program, Call, Email, Shadow, Tour, Visit "
                                    ."FROM QR_Scan_Results JOIN Registration ON Registration.UserEmail=QR_Scan_Results.UserEmail",
                                    ['UserEmail', 'PhoneNo', 'Program', 'Call', 'Email', 'Shadow', 'Tour', 'Visit']);
                    ?>
                </div>
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@4.4.7/dist/ionicons.js"></script>
    <script src="JS/MainContentResize.js"></script>
</body>
</html>
