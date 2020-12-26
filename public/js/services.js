import '../../node_modules/chart.js/dist/Chart.bundle.js';

/** This is a library contains all consume services of API */

let url = "http://localhost/sunmedia/public/index.php/api/number_registers"
let datasets = []

function getNumbers(){
    fetch(url)
    .then(response => response.json())
    .then(data => {
        let labels = []
        let datasets = []

        data.data.map((dat,i)=>{
            labels.push(dat.ip_user)
            datasets.push(dat.nro)
        })

        var ctx = document.getElementById('chart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                labels: labels,
                datasets: [{
                    label: 'Number of Events',
                    // data: [12, 19, 3, 5, 2, 3],
                    data: datasets,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    })
}

export default getNumbers