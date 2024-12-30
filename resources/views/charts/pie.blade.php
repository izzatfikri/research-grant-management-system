<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pie Chart - Milestone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Milestone Pie Chart</h1>
        <div class="card">
    <div class="card-body">
        <canvas id="milestonePieChart" width="800" height="400"></canvas>
    </div>
</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const data = @json($data); // Pass data from PHP to JavaScript

        const ctx = document.getElementById('milestonePieChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Pending', 'Completed'], // Define milestone statuses
                datasets: [{
                    label: 'Milestones Status',
                    data: [data['Pending'], data['Completed']], // Use pending and completed counts
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.2)', // Pending color
                        'rgba(75, 192, 192, 0.2)', // Completed color
                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)', // Pending border color
                        'rgba(75, 192, 192, 1)', // Completed border color
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                    },
                }
            }
        });
    });
</script>
</body>
</html>