<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard FitPlus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar p-3">
            <h4>FitPlus</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Ventas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Inventario</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Clientes</a></li>
            </ul>
        </nav>

        <!-- Contenido principal -->
        <main class="col-md-10 ms-sm-auto px-md-4">
            <h2 class="mt-3">Dashboard De FITPLUS</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header">Total Ventas</div>
                        <div class="card-body">
                            <h5 class="card-title">$25,000</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header">Pedidos Completados</div>
                        <div class="card-body">
                            <h5 class="card-title">150</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-header">Clientes Nuevos</div>
                        <div class="card-body">
                            <h5 class="card-title">45</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráficos -->
            <div class="row">
                <div class="col-md-6">
                    <canvas id="ventasChart"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="productosChart"></canvas>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    const ctx1 = document.getElementById('ventasChart').getContext('2d');
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
            datasets: [{
                label: 'Ventas Mensuales',
                data: [5000, 7000, 8000, 6000, 9000],
                backgroundColor: 'rgba(54, 162, 235, 0.6)'
            }]
        }
    });

    const ctx2 = document.getElementById('productosChart').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Proteínas', 'Vitaminas', 'Energizantes', 'Snacks'],
            datasets: [{
                label: 'Productos más vendidos',
                data: [50, 25, 30, 5],
                backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#4bc0c0']
            }]
        }
    });
</script>
</body>
</html>
