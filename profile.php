<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="dashboardstyle.css">
    <link rel="stylesheet" href="profilestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="dashboard.php">Home</a>
        <a href="services.php">Services</a>
        <a href="profile.php">Profile</a>
        <a href="aboutus.php">About Us</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>

    <div class="topnav">
        <div class="left">
            <a href="javascript:void(0);" class="icon" onclick="openNav()">
                <i class="fa fa-bars"></i>
            </a>
            <img src="img\screenshot--72--removebg-2-1@2x.png" class="logo" alt="Company Logo"> 
            <div class="company-name">ReTech</div>
        </div>
    </div>

    <div id="myOverlay" class="overlay"></div>

    <div class="main">
        <div class="profile-container">
            <h2>User Profile</h2>
            <div class="profile-details">
                <p><b>Full Name:</b> <span id="fullName"></span></p>
                <p><b>Email:</b> <span id="email"></span></p>
                <p><b>Phone Number:</b> <span id="phoneNumber"></span></p>
                <p><b>City:</b> <span id="city"></span></p>
            </div>
            <div class="profile-picture">
                <img id="userPic" src="" alt="User Profile Picture" />
                <input type="file" id="profilePicInput" style="display: none;" />
                <button onclick="document.getElementById('profilePicInput').click()">Change Picture</button>
            </div>
            <form id="updateForm">
                <h3>Update Info</h3>
                <label for="city">City</label>
                <input type="text" id="cityUpdate" name="city" required />
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" id="phoneNumberUpdate" name="phoneNumber" required />
                <button type="submit">Update</button>
            </form>
        </div>
    </div>

    <script src="dashboard.js"></script>
    <script src="profile.js"></script>
</body>
</html>
