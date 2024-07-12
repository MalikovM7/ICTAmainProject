<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
        }

        .sidebar h4 {
            color: #fff;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            display: block;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        .admin-dashboard {
            padding: 20px;
        }

        .dashboard-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .dashboard-overview {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .stats-card {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 30%;
        }

        .stats-number {
            font-size: 2em;
            font-weight: bold;
        }

        .stats-change {
            color: #888;
        }

        .dashboard-recent-activity {
            margin-bottom: 30px;
        }

        .activity-list {
            list-style-type: none;
            padding: 0;
        }

        .activity-list li {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #e0e0e0;
        }

        .activity-time {
            font-weight: bold;
        }

        .dashboard-quick-actions {
            margin-bottom: 30px;
        }

        .actions-grid {
            display: flex;
            justify-content: space-between;
        }

        .action-button {
            background: #007bff;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 8px;
            text-align: center;
            width: 30%;
            font-size: 1em;
        }

        .action-button i {
            display: block;
            margin-bottom: 5px;
            font-size: 1.5em;
        }

        .btn-custom {
            background-color: #28a745;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Admin Panel</h4>
        <a href="{{ route('admin') }}">Products</a>
        <a href="{{ route('category.index') }}">Categories</a>
        <a href="{{ route('admin.users') }}">Users</a>
        <a href="{{ route('admin.cvs') }}">View Uploaded CVs</a>
        <a href="{{ route('admin.manualCVs') }}">View Manual CVs</a>

        <form action="{{ route('logout') }}" method="post" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-outline-light btn-block">Logout</button>
        </form>
    </div>

    <!-- Page Content -->
    <div class="content">
        <div class="container mt-5">
            <div class="admin-dashboard">
                <header class="dashboard-header">
                    <h1>Welcome, Malik</h1>
                    <p>Here is a quick overview of the system status and recent activity.</p>
                </header>

                <!-- VIP CVs Section -->
                <div class="section mb-4">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <h2>VIP CVs</h2>
                        </div>
                        <div class="card-body">
                            <p>Explore our VIP CVs to find the most qualified candidates for your job openings. VIP CVs are highlighted for your convenience.</p>
                            <a href="{{ route('vip_cvs') }}" class="btn btn-secondary">View VIP CVs</a>
                        </div>
                    </div>
                </div>

                <section class="dashboard-overview">
                    <div class="stats-card">
                        <h2>Total Users</h2>
                        @isset($usercount)
                        <p class="stats-number">{{ $usercount }}</p>
                        @endisset
                    </div>
                    <div class="stats-card">
                        @isset($activeSessionsCount)
                        <h2>Active Sessions</h2>
                        <p class="stats-number">{{ $activeSessionsCount }}</p>
                        @endisset
                    </div>
                    <div class="stats-card">
                        @isset($newSignupsToday)
                        <h2>New Signups</h2>
                        <p class="stats-number">Today: {{ $newSignupsToday }}</p>
                        <p class="stats-number">This Week: {{ $newSignupsThisWeek }}</p>
                        <p class="stats-number">This Month: {{ $newSignupsThisMonth }}</p>
                        @endisset
                    </div>
                </section>

                <section class="dashboard-recent-activity">
                    @isset($activities)
                    <h2>Recent Activity</h2>
                    <ul class="activity-list">
                        @foreach ($activities as $activity)
                        <li>
                            <span class="activity-time">{{ $activity->created_at->format('M d, Y H:i') }}</span>
                            <span>User {{ $activity->user->name }} {{ $activity->action }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endisset
                </section>

                <section class="dashboard-quick-actions">
                    <h2>Quick Actions</h2>
                    <div class="actions-grid">
                        <button class="action-button" onclick="location.href='view-reports.html'">
                            <i class="fa fa-chart-line"></i>
                            View Reports
                        </button>
                        <button class="action-button" onclick="location.href='settings.html'">
                            <i class="fa fa-cogs"></i>
                            Settings
                        </button>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom JS for dynamic content (optional) -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Fetch and update stats (example, replace with actual endpoint)
        fetchStats();
    });

    function fetchStats() {
        // Example fetch request (replace with actual API endpoint)
        fetch('/api/stats')
            .then(response => response.json())
            .then(data => {
                document.querySelector('.stats-card:nth-child(1) .stats-number').textContent = data.totalUsers;
                document.querySelector('.stats-card:nth-child(2) .stats-number').textContent = data.activeSessions;
                document.querySelector('.stats-card:nth-child(3) .stats-number').textContent = data.newSignups;
                // Add more updates as needed
            });
    }
    </script>
</body>

</html>