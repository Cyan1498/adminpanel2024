@extends('layouts.themes.app')

@section('content')

<div class="row mt-4">
    <div class="col-md-6 mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Gráfico de Calorías Diarias</h5>
                <!-- Contenedor para el gráfico de líneas (puedes ajustar el estilo según tu diseño) -->
                <div id="chart-container"></div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Comparación de Calorías de Frutas</h5>
                <!-- Contenedor para el gráfico de barras -->
                <div id="bar-chart-container"></div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-firestore.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- Incluye ApexCharts desde su CDN (ajusta la versión según tu preferencia) -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>


<script>
    // Configura Firebase con tus credenciales
    const firebaseConfig = {
        apiKey: "AIzaSyAfzZQvPDq_2EtI1oMyx5EgzZVfTRYfJqQ"
        , authDomain: "project-152534759981.firebaseapp.com"
        , projectId: "healthfitnessdb"
        , storageBucket: "project-152534759981.appspot.com"
        , messagingSenderId: "152534759981"
        , appId: "1:152534759981:android:3de635579cfc1dd7d356a4"
    };

    // Inicializa Firebase
    firebase.initializeApp(firebaseConfig);

    // Inicializa Firestore
    const db = firebase.firestore();

    // Supongamos que tienes una colección llamada 'feeding'
    const chartData = [];

    // Obtiene los datos de Firestore y los agrega a chartData
    db.collection('feeding').get().then(querySnapshot => {
        querySnapshot.forEach(doc => {
            const data = doc.data();
            if (data) { // Verifica que data esté definido
            // Agrega los datos necesarios para el gráfico (ajusta según tu estructura)
            // const timestamp = new Date(data.dia + ' ' + data.hora).getTime();
            // Utiliza moment.js para convertir la fecha y la hora en una marca de tiempo
        const timestamp = moment(data.dia + ' ' + data.hora, 'DD/MM/YYYY HH:mm').valueOf();
            chartData.push({
                x: timestamp,
                y: data.calorias
            });

            // Imprime los datos en la consola
            console.log('Datos Firestore:', data);
        } else {
            console.error('Error: El documento no tiene datos.');
        }
        });
        // Imprime los datos en la consola
        // console.log('Datos Firestore:', data);
        // Configura el gráfico con ApexCharts
        const options = {
            chart: {
                type: 'line'
            }
            , series: [{
                name: 'Calorías'
                , data: chartData.map(item => item.y)
            }]
            , xaxis: {
                type: 'datetime'
                , categories: chartData.map(item => item.x)
            }
        };

        // Crea el gráfico en el elemento con id "chart-container"
        const chart = new ApexCharts(document.querySelector("#chart-container"), options);
        chart.render();
    });

    // / Supongamos que tienes una colección llamada 'food'
    // const chartData = [];
    const barChartData = [];

    // Obtiene los datos de Firestore y los agrega a chartData y barChartData
    db.collection('food').get().then(querySnapshot => {
        querySnapshot.forEach(doc => {
            const data = doc.data();
            if (data) {
                // Agrega los datos necesarios para el gráfico de líneas
                const timestamp = moment(data.nombre, 'DD/MM/YYYY HH:mm').valueOf();
                chartData.push({
                    x: timestamp,
                    y: data.calorias
                });

                // Agrega los datos necesarios para el gráfico de barras
                barChartData.push({
                    nombre: data.nombre,
                    calorias: data.calorias
                });

                // Imprime los datos en la consola
                console.log('Datos Firestore:', data);
            } else {
                console.error('Error: El documento no tiene datos.');
            }
        });

        // Configura el gráfico de líneas con ApexCharts
        const lineChartOptions = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'Calorías',
                data: chartData.map(item => item.y)
            }],
            xaxis: {
                type: 'datetime',
                categories: chartData.map(item => item.x)
            }
        };

        

        // Configura el gráfico de barras con ApexCharts
        const barChartOptions = {
            chart: {
                type: 'bar'
            },
            series: [{
                name: 'Calorías',
                data: barChartData.map(item => item.calorias)
            }],
            xaxis: {
                categories: barChartData.map(item => item.nombre),
                labels: {
                    rotate: -45,
                    formatter: function(val) {
                        return val.split(" ").join("\n"); // Pone un salto de línea en cada espacio
                    }
                }
            }
        };

        // Crea el gráfico de barras en el elemento con id "bar-chart-container"
        const barChart = new ApexCharts(document.querySelector("#bar-chart-container"), barChartOptions);
        barChart.render();
    });

</script>
@endsection
