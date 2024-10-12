<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/autorentbatam.png" type="image/svg+xml">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="style.css">
    <title>AutoRent Admin</title>
    <style>
        /* Add your custom styles here */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            margin: 10% auto;
            padding: 20px;
            width: 80%;
            max-width: 600px;
            background-color: #fefefe;
            border: 1px solid #888;
            border-radius: 5px;
            position: relative;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            position: absolute;
            top: 0;
            right: 10px;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="https://www.autorentbatam.com" class="brand">
			<img src="img/autorentbatam.png" style="width: 300px; height: 70px; margin-top: 50px;"/>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="index.php">
					<i class='bx bxs-user-check' ></i>
					<span class="text">Registrars</span>
				</a>
			</li>
            <li>
				<a href="#">
					<i class='bx bxs-user-check' ></i>
					<span class="text">Members</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Analytics</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->
    <!-- CONTENT -->
    <section id="content">
        		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->
        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Registrars Confirmation</h1>
                </div>
            </div>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Registrars</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>KTP Image</th>
                                <th>Driver License</th>
                                <th>Insurance Image</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Your database connection code goes here
                            $servername = "localhost";
$dbuser = "u645387238_rico";
$password = "2468g0a7A7B7*";
$dbname = "u645387238_carrent";

                            // Create connection
                            $conn = new mysqli($servername, $dbuser, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Directory containing folders
                            $directory = '../../uploads';

                            // Get list of folders
                            $folders = array_filter(glob($directory . '/*'), 'is_dir');

                            // Loop through each folder
                            foreach ($folders as $index => $folder) {
                                // Get folder name
                                $folderName = basename($folder);

                                // Fetch status from the database based on username
                                $sql = "SELECT Status FROM user WHERE Username = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("s", $folderName);
                                $stmt->execute();
                                $stmt->store_result();

                                if ($stmt->num_rows > 0) {
                                    $stmt->bind_result($status);
                                    $stmt->fetch();
                                } else {
                                    // Default status if no record found in the database
                                    $status = 'Not Found';
                                }

                                // Render table row based on status
                                echo "<tr>";
                                echo "<td><p>$folderName</p></td>";
                                echo "<td><a href=\"#\" class=\"ktp-image\" data-folder=\"$folderName\">View KTP Image</a></td>";
                                echo "<td><a href=\"#\" class=\"license-image\" data-folder=\"$folderName\">View Driver License</a></td>";
                                echo "<td><a href=\"#\" class=\"insurance-image\" data-folder=\"$folderName\">View Insurance Image</a></td>";
                                if ($status === 'Waiting Approval') {
                                    // Display Accept and Decline buttons
                                    echo "<td>";
                                    echo "<span class='status completed' style='cursor: pointer;' data-username='$folderName'>Accept</span>";
                                    echo "<span class='status pending' style='cursor: pointer;' data-username='$folderName'>Decline</span>";
                                    echo "</td>";
                                } else {
                                    // Display status fetched from the database
                                    echo "<td><span class='status process'>$status</span></td>";
                                }
                                echo "</tr>";

                                $stmt->close();
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img id="modalImg" class="modal-img">
        </div>
    </div>
    
    <!-- CONTENT -->
    <script src="script.js"></script>
    <script>
        // JavaScript code to handle image viewer pop-up
        document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("myModal");
    const modalImg = document.getElementById("modalImg");

    const ktpImageLinks = document.querySelectorAll('.ktp-image');
    const licenseImageLinks = document.querySelectorAll('.license-image');
    const insuranceImageLinks = document.querySelectorAll('.insurance-image');

    ktpImageLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const folderName = this.getAttribute('data-folder');
            const imagePath = `../../uploads/${folderName}/ktp_image.jpg`;
            modalImg.src = imagePath;
            modal.style.display = "block";
        });
    });

    licenseImageLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const folderName = this.getAttribute('data-folder');
            const imagePath = `../../uploads/${folderName}/driver_license.jpg`;
            modalImg.src = imagePath;
            modal.style.display = "block";
        });
    });
    
    insuranceImageLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const folderName = this.getAttribute('data-folder');
            const imagePath = `../../uploads/${folderName}/insurance_image.jpg`;
            modalImg.src = imagePath;
            modal.style.display = "block";
        });
    });

    // Close the modal when the user clicks on <span> (x)
    const span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        modal.style.display = "none";
    };

    // Close the modal when the user clicks anywhere outside of the modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
});
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const acceptButtons = document.querySelectorAll('.status.completed');
        const declineButtons = document.querySelectorAll('.status.pending');

        acceptButtons.forEach(button => {
            button.addEventListener('click', function () {
                const row = this.parentElement.parentElement;
                const username = this.getAttribute('data-username');
                updateStatus(username, 'Approved', row);
            });
        });

        declineButtons.forEach(button => {
            button.addEventListener('click', function () {
                const row = this.parentElement.parentElement;
                const username = this.getAttribute('data-username');
                updateStatus(username, 'Not Approved', row);
            });
        });

        function updateStatus(username, status, row) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_status.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Handle success
                    console.log(xhr.responseText);
                    // Replace buttons with status span
                    const newStatus = document.createElement('span');
                    newStatus.textContent = status;
                    newStatus.classList.add('status');
                    if (status === 'Approved') {
                        newStatus.classList.add('completed');
                    } else {
                        newStatus.classList.add('pending');
                    }
                    newStatus.style.cursor = 'pointer';
                    newStatus.setAttribute('data-username', username);
                    row.querySelector('.status.completed').remove();
                    row.querySelector('.status.pending').remove();
                    row.querySelector('td:nth-child(4)').appendChild(newStatus);
                } else {
                    // Handle error
                    console.error(xhr.statusText);
                }
            };
            xhr.send(`username=${username}&status=${status}`);
        }
    });
</script>
</body>
</html>
