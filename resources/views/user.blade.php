<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProJob - Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
        }
        .header h1 {
            margin: 0;
            text-align: center;
        }
        .section {
            margin: 40px 0;
        }
        .section h2 {
            margin-bottom: 20px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #28a745;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
            margin-right: 5px;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .btn-lg {
            padding: 10px 20px;
            font-size: 1.25rem;
        }
        .section-card {
            margin-bottom: 20px;
        }
        .card-header.bg-primary {
            background-color: #007bff;
        }
        .card-header.bg-secondary {
            background-color: #6c757d;
        }
        /* Scroll-to-Top Button Styles */
        #scrollToTopBtn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: none;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            font-size: 24px;
        }
        #scrollToTopBtn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>ProJob</h1>
    </header>

    <div class="container mt-5">
        <!-- About Us Section -->
        <div class="section">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h2>About Us</h2>
                </div>
                <div class="card-body">
                    <p>Welcome to ProJob! Our platform connects job seekers with employers, helping you find the perfect job or the ideal candidate. We offer a variety of services, including CV uploads, category-based job searches, and VIP CV listings. Explore our features to learn more.</p>
                </div>
            </div>
        </div>

        <!-- Contact Us Section -->
        <div class="section">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h2>Contact Us</h2>
                </div>
                <div class="card-body">
                    <p>If you have any questions or need assistance, please reach out to us. You can contact us via email at <a href="mailto:support@projob.com">support@projob.com</a> or through our contact form below.</p>
                    <form action="{{ route('user.mail') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="greeting">Greeting</label>
                            <input class="form-control" type="text" id="greeting" name="greeting" placeholder="Enter greeting">
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <input class="form-control" type="text" id="body" name="body" placeholder="Enter email body">
                        </div>
                        <div class="form-group">
                            <label for="actiontext">Action Text</label>
                            <input class="form-control" type="text" id="actiontext" name="actiontext" placeholder="Enter action text">
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input class="form-control" type="text" id="url" name="url" placeholder="Enter URL">
                        </div>
                        <div class="form-group">
                            <label for="lastline">Last Line</label>
                            <input class="form-control" type="text" id="lastline" name="lastline" placeholder="Enter last line">
                        </div>
                        <button type="submit" class="btn btn-custom">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Search by Category Section -->
        <div class="section">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h2>Search by Category</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="category" name="category" placeholder="Enter category">
                        </div>
                        <button type="submit" class="btn btn-custom">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Uploaded CVs Section -->
        <div class="section">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h2>Uploaded CVs</h2>
                </div>
                <div class="card-body">
                    <p>Browse through the uploaded CVs. You can view and manage CVs uploaded by users.</p>
                    <a href="{{ route('cvdashboard') }}" class="btn btn-secondary">View Uploaded CVs</a>
                </div>
            </div>
        </div>

        <!-- Manual CVs Section -->
        <div class="section">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h2>Manual CVs</h2>
                </div>
                <div class="card-body">
                    <p>Review and manage manually submitted CVs. These CVs are not uploaded through the standard file upload process.</p>
                    <a href="{{ route('manual_cvs') }}" class="btn btn-secondary">View Manual CVs</a>
                </div>
            </div>
        </div>

        <!-- Upload CVs Section -->
        <div class="section">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3>Upload CV</h3>
                </div>
                <div class="card-body">
                    <p>Click the button below to upload your CV.</p>
                    <a href="{{ route('cv.create') }}" class="btn btn-custom">Upload CV</a>
                </div>
            </div>
        </div>

        <!-- Create Manual CVs Section -->
        <div class="section">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h3>Create Manual CV</h3>
                </div>
                <div class="card-body">
                    <p>Click the button below to create a manual CV.</p>
                    <a href="{{ route('cv.manual.create') }}" class="btn btn-secondary">Create Manual CV</a>
                </div>
            </div>
        </div>

        <!-- Logout Button -->
        <div class="text-center mt-4">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg">Logout</button>
            </form>
        </div>
    </div>

    <!-- Scroll-to-Top Button -->
    <button id="scrollToTopBtn" onclick="scrollToTop()">
        <span>&#8593;</span> <!-- Up arrow icon -->
    </button>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Get the button
        var scrollToTopBtn = document.getElementById("scrollToTopBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollToTopBtn.style.display = "block";
            } else {
                scrollToTopBtn.style.display = "none";
            }
        };

        // When the user clicks on the button, scroll to the top of the document
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
</body>
</html>