<!DOCTYPE html>
<html lang="en">

<?php include("vendor/inc/head.php"); ?>

<style>
/* General Styles */
body, html {
    height: 100%; 
    margin: 0; 
    padding: 0;
    display: flex;
    flex-direction: column; /* Use flexbox for sticky footer */
}

.container {
    flex: 1; /* Allow container to grow and take available space */
    padding: 20px;
}

/* Navigation Bar */
.navbar {
    background-color: #4B3D3D;
}
.navbar a {
    color: #f3e0c7 !important;
}

/* Cards */
.card {
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    transition: transform 0.3s;
}
.card:hover {
    transform: scale(1.05); /* Slight zoom on hover */
}
.card-header {
    background-color: #4e3b31; 
    color: white;
    font-weight: bold;
    text-align: center;
}
.card-body {
    background-color: #fdf5e6; /* Cream background for a soft look */
}

/* Footer */
.footer {
    background-color: #4B3D3D;
    color: white;
    text-align: center;
    padding: 10px 0;
    width: 100%;
    margin-top: auto; /* Push footer to bottom */
    position: relative;
}

/* Scrollable section */
.scrollable {
    max-height: 300px; /* Adjust height as needed */
    overflow-y: auto; /* Vertical scroll if content overflows */
    padding: 15px;
    background-color: #fff;
    border-radius: 10px;
}

/* Images */
.img-fluid {
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Shadow for images */
}

/* Responsive Design */
@media (max-width: 768px) {
    .card {
        margin-bottom: 15px;
    }
    .navbar-brand {
        font-size: 1.2rem;
    }
}
</style>

<body>

<!-- Navigation -->
<?php include("vendor/inc/nav.php"); ?>
<br>
<br>
<br>
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-1">Welcome to HAKIEMI'S Cat Hotel</h1>

    <!-- Image Header -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <img class="img-fluid rounded" src="doktor-1.jpg" alt="Doctor 1">
        </div>
        <div class="col-lg-6 mb-4">
            <img class="img-fluid rounded" src="doktor-2.jpg" alt="Doctor 2">
        </div>
    </div>

    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <h4 class="card-header">Our Philosophy</h4>
                <div class="card-body scrollable">
                    <p>
                        At HAKIEMI'S, we believe that every cat deserves personalized care and attention. Our dedicated team is trained in feline behavior and is committed to ensuring that each guest feels loved and secure.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <h4 class="card-header">Our Facilities</h4>
                <div class="card-body scrollable">
                    <p>
                        Our hotel is equipped with spacious and cozy accommodations designed for cats of all shapes and sizes. We provide a nurturing environment that feels like home, with toys, climbers, and special treats for your feline friends.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; 2024 HAKIEMI'S E-BOOKING CAT HOTEL | All Rights Reserved</p>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
