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
            width: 100%;
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
            justify-content: space-around;
            margin-bottom: 30px;
        }
        .stats-card {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 22%;
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
            justify-content: space-around;
        }
        .action-button {
            background: #007bff;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 8px;
            text-align: center;
            width: 22%;
            font-size: 1em;
        }
        .action-button i {
            display: block;
            margin-bottom: 5px;
            font-size: 1.5em;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Admin Panel</h4>
        <a href="{{ route('admin') }}">Products</a>
        <a href="{{ route('admin.categories') }}">Categories</a>
        <a href="{{ route('category.index') }}">Action</a>
        <a href="{{ route('admin.users') }}">Users</a>

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
                    <h1>Welcome, [Admin Name]</h1>
                    <p>Here is a quick overview of the system status and recent activity.</p>
                </header>

                <section class="dashboard-overview">
                    <div class="stats-card">
                        <h2>Total Users</h2>
                        <p class="stats-number">[Total Users]</p>
                        <p class="stats-change">[+/- Users Change]</p>
                    </div>
                    <div class="stats-card">
                        <h2>Active Sessions</h2>
                        <p class="stats-number">[Active Sessions]</p>
                        <p class="stats-change">[+/- Sessions Change]</p>
                    </div>
                    <div class="stats-card">
                        <h2>New Signups</h2>
                        <p class="stats-number">[New Signups]</p>
                        <p class="stats-change">[+/- Signups Change]</p>
                    </div>
                    <div class="stats-card">
                        <h2>Support Tickets</h2>
                        <p class="stats-number">[Open Tickets]</p>
                        <p class="stats-change">[+/- Tickets Change]</p>
                    </div>
                </section>

                <section class="dashboard-recent-activity">
                    <h2>Recent Activity</h2>
                    <ul class="activity-list">
                        <li>
                            <span class="activity-time">[Timestamp]</span>
                            <span class="activity-desc">[User] signed up</span>
                        </li>
                        <li>
                            <span class="activity-time">[Timestamp]</span>
                            <span class="activity-desc">[User] created a support ticket</span>
                        </li>
                        <li>
                            <span class="activity-time">[Timestamp]</span>
                            <span class="activity-desc">[User] updated their profile</span>
                        </li>
                        <li>
                            <span class="activity-time">[Timestamp]</span>
                            <span class="activity-desc">[User] logged in</span>
                        </li>
                    </ul>
                </section>

                <section class="dashboard-quick-actions">
                    <h2>Quick Actions</h2>
                    <div class="actions-grid">
                        <button class="action-button" onclick="location.href='view-reports.html'">
                            <i class="fa fa-chart-line"></i>
                            View Reports
                        </button>
                        <button class="action-button" onclick="location.href='support-tickets.html'">
                            <i class="fa fa-life-ring"></i>
                            Support Tickets
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
            // Fetch and update stats
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
                    document.querySelector('.stats-card:nth-child(4) .stats-number').textContent = data.openTickets;
                });
        }
    </script>
</body>
</html>