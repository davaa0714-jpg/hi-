
// 1
const ctx = document.getElementById("doughnut").getContext("2d");
Chart.defaults.font.family = "'Montserrat', sans-serif"


const data = {
    labels: [
      'Ирсэн албан бичиг',
      'Ирсэн өргөдөл, гомдол'
    ],
    datasets: [{
      label: 'Албан бичиг',
      data: [2257, 212],
      backgroundColor: [
        '#e34b69',
        'rgba(169, 169, 169, 1)'
      ],
      hoverOffset: 4,
      fontColor: '#212529',
       borderRadius: 15,
    }]
};

//plugin
const counter = {
    id: 'counter',
    beforeDraw(chart, args, options){
        const {ctx, chartArea: {top, right, bottom, left, width, height}} = chart;
        ctx.save();
        ctx.fillStyle = 'rgb(255, 99, 132)';
        // ctx.fillRect(width / 2, top + (height /2), 10, 10);
        ctx.font = '700 43px Montserrat';
        ctx.textAlign = 'center';
        ctx.fillText('', width / 2, top + (height /2));
    }
};


const config = {
    type: 'doughnut',
    data: data,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    color: '#212529',
                    font: {
                        family: "'Montserrat', sans-serif",
                        size: 15.5,
                        weight: 200,
                    }    
                },
            },
            tooltip: {
                titleAlign: 'center',
                bodyAlign: 'center',
                bodyFont:{
                    size: 14,
                },
                padding: 17,
                cornerRadius: 13,
                displayColors: false,
                caretPadding: 20,
                caretSize: 7,
                backgroundColor: 'rgba(255, 255, 255, 0.9)',
                titleColor: 'crimson',
                bodyColor: 'black',
                borderWidth: 0.5,
                borderColor: 'lightgray',
            },

        },
    },
    plugins: [counter],
};

const myChart = new Chart(ctx, config);

// 2
const ctx2 = document.getElementById("doughnut2").getContext("2d");


const data2 = {
    labels: [
      'Шийдвэрлэсэн албан бичиг',
      'Шийдвэрлэсэн өргөдөл, гомдол'
    ],
    datasets: [{
      label: 'Албан бичиг',
      data: [2198, 201],
      backgroundColor: [
        '#e34b69',
        'rgba(169, 169, 169, 1)'
      ],
      hoverOffset: 4,
      fontColor: '#212529',
      borderRadius: 15,
    //   cutout: '80%',
    }]
};

//plugin
const counter2 = {
  id: 'counter',
  beforeDraw(chart, args, options){
      const {ctx, chartArea: {top, right, bottom, left, width, height}} = chart;
      ctx.save();
      ctx.fillStyle = 'rgb(255, 99, 132)';
      // ctx.fillRect(width / 2, top + (height /2), 10, 10);
      ctx.font = '700 43px Montserrat';
      ctx.textAlign = 'center';
      ctx.fillText('', width / 2, top + (height /2));
  }
};


const config2 = {
  type: 'doughnut',
  data: data2,
  options: {
      responsive: true,
      plugins: {
          legend: {
              position: 'bottom',
              labels: {
                  color: '#212529',
                  font: {
                      family: "'Montserrat', sans-serif",
                      size: 15.5,
                      weight: 200,
                  }    
              },
          },
          tooltip: {
                titleAlign: 'center',
                bodyAlign: 'center',
                bodyFont:{
                    size: 14,
                },
                padding: 17,
                cornerRadius: 13,
                displayColors: false,
                caretPadding: 20,
                caretSize: 7,
                backgroundColor: 'rgba(255, 255, 255, 0.9)',
                titleColor: 'crimson',
                bodyColor: 'black',
                borderWidth: 0.5,
                borderColor: 'lightgray',
            },

      },
  },
  plugins: [counter],
};

const myChart2 = new Chart(ctx2, config2);

// 3
const ctx3 = document.getElementById("doughnut3").getContext("2d");


const data3 = {
    labels: [
      'Судалж буй албан бичиг',
      'Судалж буй өргөдөл, гомдол'
    ],
    datasets: [{
      label: 'Албан бичиг',
      data: [59, 11],
      backgroundColor: [
        '#e34b69',
        'rgba(169, 169, 169, 1)'
      ],
      hoverOffset: 4,
      fontColor: '#212529',
      borderRadius: 15,
    //   cutout: '80%',
    }]
};

//plugin
const counter3 = {
  id: 'counter',
  beforeDraw(chart, args, options){
      const {ctx, chartArea: {top, right, bottom, left, width, height}} = chart;
      ctx.save();
      ctx.fillStyle = 'rgb(255, 99, 132)';
      // ctx.fillRect(width / 2, top + (height /2), 10, 10);
      ctx.font = '700 43px Montserrat';
      ctx.textAlign = 'center';
      ctx.fillText('', width / 2, top + (height /2));
  }
};


const config3 = {
  type: 'doughnut',
  data: data3,
  options: {
      responsive: true,
      plugins: {
          legend: {
              position: 'bottom',
              labels: {
                  color: '#212529',
                  font: {
                      family: "'Montserrat', sans-serif",
                      size: 15.5,
                      weight: 200,
                  }    
              },
          },
          tooltip: {
                titleAlign: 'center',
                bodyAlign: 'center',
                bodyFont:{
                    size: 14,
                },
                padding: 17,
                cornerRadius: 13,
                displayColors: false,
                caretPadding: 20,
                caretSize: 7,
                backgroundColor: 'rgba(255, 255, 255, 0.9)',
                titleColor: 'crimson',
                bodyColor: 'black',
                borderWidth: 0.5,
                borderColor: 'lightgray',
            },

      },
  },
  plugins: [counter],
};

const myChart3 = new Chart(ctx3, config3);

// const ctxbar = document.getElementById("barhorizontal").getContext("2d");

// Chart.register(ChartjsPluginStacked100.default);

// const databar = {
//     labels: [
//       '',
//     ],
//     datasets: [{
//       label: 'Шийдвэрлэсэн (Зөрчилгүй)',
//       data: [2257],
//       backgroundColor: [
//         'rgb(255, 99, 132)'
//       ],
//       barThickness: 30,
//       hoverOffset: 4,
//       fontColor: '#212529'
//     }, {
//       label: 'Шийдвэрлэсэн (Зөрчил үүссэн)',
//       data: [6],
//       backgroundColor: [
//         'rgb(54, 162, 235)'
//       ],
//       hoverOffset: 4,
//       barThickness: 30,
//       fontColor: '#212529'
//     }, {
//         label: 'Судалж байгаа',
//         data: [31],
//         backgroundColor: [
//           'rgb(100, 35, 235)'
//         ],
//         hoverOffset: 4,
//         barThickness: 30,
//         fontColor: '#212529'
//     }]
// };

// var stackedbar = new Chart(ctxbar, {
//     type: 'bar',
//     data: databar,
//     options: {
//         indexAxis: 'y',
//         plugins: {
//             responsive: true,
//             legend: {
//                 display: false
//             },
//             stacked100: {
//                 enable: true,
//             }
//         },
//         scales: {
//             x: {
//               stacked: true,
//               display: false
//             },
//             y: {
//               stacked: true,
//               display: false
//             }
//         },
//     }
    
// });

// 4
const ctx4 = document.getElementById("doughnut4").getContext("2d");


const data4 = {
    labels: [
      'Ирсэн албан бичиг',
      'Ирсэн өргөдөл, гомдол'
    ],
    datasets: [{
      label: 'Албан бичиг',
      data: [1636, 2412],
      backgroundColor: [
        '#e34b69',
        'rgba(169, 169, 169, 1)'
      ],
      hoverOffset: 4,
      fontColor: '#212529',
       borderRadius: 15,
    }]
};

//plugin
const counter4 = {
    id: 'counter',
    beforeDraw(chart, args, options){
        const {ctx, chartArea: {top, right, bottom, left, width, height}} = chart;
        ctx.save();
        ctx.fillStyle = 'rgb(255, 99, 132)';
        // ctx.fillRect(width / 2, top + (height /2), 10, 10);
        ctx.font = '700 43px Montserrat';
        ctx.textAlign = 'center';
        ctx.fillText('', width / 2, top + (height /2));
    }
};


const config4 = {
    type: 'doughnut',
    data: data4,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    color: '#212529',
                    font: {
                        family: "'Montserrat', sans-serif",
                        size: 15.5,
                        weight: 200,
                    }    
                },
            },
            tooltip: {
                titleAlign: 'center',
                bodyAlign: 'center',
                bodyFont:{
                    size: 14,
                },
                padding: 17,
                cornerRadius: 13,
                displayColors: false,
                caretPadding: 20,
                caretSize: 7,
                backgroundColor: 'rgba(255, 255, 255, 0.9)',
                titleColor: 'crimson',
                bodyColor: 'black',
                borderWidth: 0.5,
                borderColor: 'lightgray',
            },

        },
    },
    plugins: [counter],
};

const myChart4 = new Chart(ctx4, config4);

// 5
const ctx5 = document.getElementById("doughnut5").getContext("2d");


const data5 = {
    labels: [
      'Шийдвэрлэсэн албан бичиг',
      'Шийдвэрлэсэн өргөдөл, гомдол'
    ],
    datasets: [{
      label: 'Албан бичиг',
      data: [1459, 2330],
      backgroundColor: [
        '#e34b69',
        'rgba(169, 169, 169, 1)'
      ],
      hoverOffset: 4,
      fontColor: '#212529',
      borderRadius: 15,
    //   cutout: '80%',
    }]
};

//plugin
const counter5 = {
  id: 'counter',
  beforeDraw(chart, args, options){
      const {ctx, chartArea: {top, right, bottom, left, width, height}} = chart;
      ctx.save();
      ctx.fillStyle = 'rgb(255, 99, 132)';
      // ctx.fillRect(width / 2, top + (height /2), 10, 10);
      ctx.font = '700 43px Montserrat';
      ctx.textAlign = 'center';
      ctx.fillText('', width / 2, top + (height /2));
  }
};


const config5 = {
  type: 'doughnut',
  data: data5,
  options: {
      responsive: true,
      plugins: {
          legend: {
              position: 'bottom',
              labels: {
                  color: '#212529',
                  font: {
                      family: "'Montserrat', sans-serif",
                      size: 15.5,
                      weight: 200,
                  }    
              },
          },
          tooltip: {
                titleAlign: 'center',
                bodyAlign: 'center',
                bodyFont:{
                    size: 14,
                },
                padding: 17,
                cornerRadius: 13,
                displayColors: false,
                caretPadding: 20,
                caretSize: 7,
                backgroundColor: 'rgba(255, 255, 255, 0.9)',
                titleColor: 'crimson',
                bodyColor: 'black',
                borderWidth: 0.5,
                borderColor: 'lightgray',
            },

      },
  },
  plugins: [counter],
};

const myChart5 = new Chart(ctx5, config5);

// 6
const ctx6 = document.getElementById("doughnut6").getContext("2d");


const data6 = {
    labels: [
      'Судалж буй албан бичиг',
      'Судалж буй өргөдөл, гомдол'
    ],
    datasets: [{
      label: 'Албан бичиг',
      data: [177, 82],
      backgroundColor: [
        '#e34b69',
        'rgba(169, 169, 169, 1)'
      ],
      hoverOffset: 4,
      fontColor: '#212529',
      borderRadius: 10,
    //   cutout: '80%',
    }]
};

//plugin
const counter6 = {
  id: 'counter',
  beforeDraw(chart, args, options){
      const {ctx, chartArea: {top, right, bottom, left, width, height}} = chart;
      ctx.save();
      ctx.fillStyle = 'rgb(255, 99, 132)';
      // ctx.fillRect(width / 2, top + (height /2), 10, 10);
      ctx.font = '700 43px Montserrat';
      ctx.textAlign = 'center';
      ctx.fillText('', width / 2, top + (height /2));
  }
};


const config6 = {
  type: 'doughnut',
  data: data6,
  options: {
      responsive: true,
      plugins: {
          legend: {
              position: 'bottom',
              labels: {
                  color: '#212529',
                  font: {
                      family: "'Montserrat', sans-serif",
                      size: 15.5,
                      weight: 200,
                  }    
              },
          },
          tooltip: {
                titleAlign: 'center',
                bodyAlign: 'center',
                bodyFont:{
                    size: 14,
                },
                padding: 17,
                cornerRadius: 13,
                displayColors: false,
                caretPadding: 20,
                caretSize: 7,
                backgroundColor: 'rgba(255, 255, 255, 0.9)',
                titleColor: 'crimson',
                bodyColor: 'black',
                borderWidth: 0.5,
                borderColor: 'lightgray',
            },

      },
  },
  plugins: [counter],
};

const myChart6 = new Chart(ctx6, config6);


const ctx_line = document.getElementById("chart_line").getContext("2d");

Chart.defaults.font.family = "'Montserrat', sans-serif"

const labels = [
  "2023 оны 01 сар",
  "2023 оны 02 сар",
  "2023 оны 03 сар",
  "2023 оны 04 сар",
  "2023 оны 05 сар",
  "2023 оны 06 сар",
  "2023 оны 07 сар",
  "2023 оны 08 сар",
  "2023 оны 09 сар",
  "2023 оны 10 сар",
];

const linechartdata = {
  labels,
  datasets: [{
      data: [184, 207, 401, 443, 658, 658, 493, 857, 834, 817],
      label: 'Ирсэн албан бичиг, өргөдөл, гомдол',
      pointStyle: 'circle',
      pointRadius: 9,
      pointHoverRadius: 12,
      pointHoverBorderColor: 'white',
      pointHoverBorderWidth: 3,
      pointBorderColor: 'white',
      pointBorderWidth: 3,
      borderColor: "rgba(220, 20, 60, 0.4)",
      backgroundColor: "#e34b69"
      },
      {
      data: [17, 160, 387, 371, 509, 545, 407, 670, 619, 575],
      label: 'Шийдвэрлэсэн албан бичиг, өргөдөл, гомдол',
      pointStyle: 'circle',
      pointRadius: 9,
      pointHoverRadius: 12,
      pointHoverBorderColor: 'white',
      pointHoverBorderWidth: 3,
      pointBorderColor: 'white',
      pointBorderWidth: 3,
      borderColor: "rgba(169, 169, 169, 1)",
      backgroundColor: "rgba(169, 169, 169, 1)"
      },
  ],
};

const lineconfig = {
  type: 'line',
  data: linechartdata,
  options: {
      hitRadius: 40,
      responsive: true,
      maintainAspectRatio: false,
      scales: {
          y: {
              display: false,
              ticks: {
                  display: false,
              }
          },
          X: {
              ticks: {
                  display: false,
              },
          }
      },
      plugins: {
          legend: {
              display: false
          },
          tooltip: {
              titleAlign: 'center',
              bodyAlign: 'center',
              titleFont: {
                size: 14,
              },
              bodyFont:{
                size: 14,
              },
              padding: 17,
              cornerRadius: 13,
              displayColors: false,
              caretPadding: 20,
              caretSize: 7,
              backgroundColor: 'rgba(255, 255, 255, 0.9)',
              titleColor: 'crimson',
              bodyColor: 'black',
              borderWidth: 0.5,
              borderColor: 'lightgray',
          },
      }
  }
};

const newChart = new Chart(ctx_line, lineconfig);
