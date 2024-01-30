<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xrHNUqM/1C0Ij+3hiAOpT2/hfjI60p0MEKWeL1zBHfrZIvaHR0+c5NPLvSG7IJkiK/XL1l4LdT9gQxBfQ4R8Q==" crossorigin="anonymous" />
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Your existing styles remain unchanged */

        body {
            background-color: #2c3137;
            color: #fff;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-around;
            background-color: #1a1e22; /* Darker background color */
            border-radius: 8px;
            overflow: hidden;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            display: block;
            padding: 14px 16px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #e44d26;
        }

        nav i {
            margin-right: 8px;
        }

        .dashboard-container {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }

        .graph-container {
            width: 60%;
        }

        .table-container {
            width: 35%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #1a1e22; /* Darker background color */
        }

        .table-actions {
            display: flex;
            justify-content: space-around;
        }

        .action-btn {
            padding: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            background-color: #e44d26;
            color: #fff;
            border: none;
            border-radius: 4px;
        }

        .action-btn:hover {
            background-color: #1a1e22; /* Darker background color on hover */
        }

        .card {
            background-color: #1a1e22; /* Darker background color for cards */
            color: #fff;
            margin-bottom: 20px;
        }

        .card h2 {
            border-bottom: 1px solid #fff;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .card p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<header>
    <h1>Dashboard</h1>
</header>

<nav>
    <ul>
        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="#"><i class="fas fa-chart-bar"></i> Analytics</a></li>
        <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
        <li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</nav>


<div class="dashboard-container">
    <div class="graph-container">
        <!-- Add your chart/graph content here -->
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>

    <div class="table-container">
        <table>
            <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td class="table-actions">
                    <button class="action-btn"><i class="fas fa-eye"></i> View</button>
                    <button class="action-btn"><i class="fas fa-edit"></i> Update</button>
                    <button class="action-btn"><i class="fas fa-trash"></i> Delete</button>
                </td>
            </tr>
            <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>



<main>
    <section class="card">
        <h2>Statistics</h2>
        <canvas id="myChart" style=""></canvas>
        <!-- Replace the existing chart configuration with this updated one -->
        <script>
            // Chart.js code
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Users', 'Revenue', 'Orders'],
                    datasets: [{
                        label: 'Dashboard Statistics',
                        data: [100, 10000, 50],
                        backgroundColor: [
                            'rgba(255, 255, 255, 0.5)',  // Lighter white
                            'rgba(255, 173, 173, 0.5)',  // Lighter red
                            'rgba(173, 216, 230, 0.5)',  // Lighter blue
                            'rgba(255, 235, 156, 0.5)'   // Lighter yellow
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

    </section>

    <section class="card">
        <h2>Recent Activities</h2>
        <table>
            <tr>
                <th>Date</th>
                <th>Activity</th>
            </tr>
            <tr>
                <td>2024-01-01</td>
                <td>User registered</td>
            </tr>
            <tr>
                <td>2024-01-02</td>
                <td>Product added</td>
            </tr>
            <tr>
                <td>2024-01-03</td>
                <td>Payment received</td>
            </tr>
        </table>
    </section>

    <section class="card">
        <h2>Custom Data</h2>
        <p>Total Revenue: $10,000</p>
        <p>New Users Today: 10</p>
        <p>Open Orders: 5</p>
    </section>


</main>

<footer>
    <p>&copy; 2024 Dashboard App</p>
</footer>

</body>
</html>
