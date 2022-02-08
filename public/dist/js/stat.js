$( document ).ready(function() {
  var statPays =   $("#myChartPays");
  let Categraph = new Chart(statPays , {
      type: 'bar' , 
      data: {
        labels: ['janvier', 'fevrier', 'mars', 'avril' , 'mai','juin' ],
        datasets: [{
            label: 'Nombre de flux sortant',
            data: [126, 30, 37, 51 , 70,23 ], 
            backgroundColor: ['red', 'blue', 'yellow', 'green', 'purple', 'orange']
        }]
      },
      options: {
           title: {
                    display: false,
                    text: 'Mon joli graphique'
                },
                legend: {
                    position: 'top'
                }
      }
  })
});