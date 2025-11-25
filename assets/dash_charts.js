
const ctx = document.getElementById("chart1").getContext("2d");

Chart.defaults.font.family = "'Montserrat', sans-serif"

const labels = [
    "2022 оны 08 сар",
    "2022 оны 09 сар",
    "2022 оны 10 сар",
    "2022 оны 11 сар",
    "2022 оны 12 сар",
    "2023 оны 01 сар",
    "2023 оны 02 сар",
    "2023 оны 03 сар",
    "2023 оны 04 сар",
    "2023 оны 05 сар",
    "2023 оны 06 сар",
    "2023 оны 07 сар",
];

const chartdata = {
    labels,
    datasets: [{
        // data: [5, 15, 13, 18, 20, 24, 16, 3, 25, 23, 30, 25],
        data: [19, 15, 28, 28, 32, 33, 15, 20, 17, 12, 8, 18],
        label: 'Ашиглалтад орсон барилга',
        pointStyle: 'circle',
        pointRadius: 7,
        pointHoverRadius: 10,
        pointHoverBorderColor: 'white',
        pointHoverBorderWidth: 2,
        pointBorderColor: 'white',
        pointBorderWidth: 2,
        borderColor: "rgba(220, 20, 60, 0.4)",
        backgroundColor: "#e34b69"
        },
    ],
    
};

const config = {
    type: 'line',
    data: chartdata,
    options: {
        hitRadius: 30,
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
                // display: false,
                // grid: {
                //     drawOnChartArea: false
                // }
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

const newChart = new Chart(ctx, config);

// chart 1 alt

const ctx_alt = document.getElementById("chart1-alt").getContext("2d");

Chart.defaults.font.family = "'Montserrat', sans-serif"


const chartdata_alt = {
    labels:[
        "2023 оны 01 сар",
        "2023 оны 02 сар",
        "2023 оны 03 сар",
        "2023 оны 04 сар",
        "2023 оны 05 сар",
        "2023 оны 06 сар",
    ],
    datasets: [{
        data: [15, 20, 17, 12, 8, 18],
        label: 'Ашиглалтад орсон барилга',
        pointStyle: 'circle',
        pointRadius: 7,
        pointHoverRadius: 10,
        pointHoverBorderColor: 'white',
        pointHoverBorderWidth: 2,
        pointBorderColor: 'white',
        pointBorderWidth: 2,
        borderColor: "rgba(220, 20, 60, 0.4)",
        backgroundColor: "#e34b69"
        },
    ],
    
};

const config_alt = {
    type: 'line',
    data: chartdata_alt,
    options: {
        hitRadius: 30,
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

const newChart_alt = new Chart(ctx_alt, config_alt);


// chart 2

const ctx2 = document.getElementById("chart2").getContext("2d");

Chart.defaults.font.family = "'Montserrat', sans-serif"

// const labels2 = [
//     "2020 он",
//     "2021 он",
//     "2022 он",
//     "2023 он",
// ];

const chartdata2 = {
    labels: [
        "2020 онд ашиглалтад орсон",
        "2021 онд ашиглалтад орсон",
        "2022 онд ашиглалтад орсон",
        "2023 онд ашиглалтад орсон",
    ],
    datasets: [{
        data: [42, 117, 146, 75],
        label: 'Орон сууцны барилга',
        pointStyle: 'circle',
        pointRadius: 7,
        pointHoverRadius: 10,
        pointHoverBorderColor: 'white',
        pointHoverBorderWidth: 2,
        pointBorderColor: 'white',
        pointBorderWidth: 2,
        borderColor: "rgba(220, 20, 60, 0.4)",
        backgroundColor: "#e34b69"
        },
    ],
    
};

const config2 = {
    type: 'line',
    data: chartdata2,
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
                // display: false,
                // grid: {
                //     drawOnChartArea: false
                // }
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
            }
        }
    }
};

const newChart2 = new Chart(ctx2, config2);

// chart 3

const ctx3 = document.getElementById("chart3").getContext("2d");

Chart.defaults.font.family = "'Montserrat', sans-serif"

const chartdata3 = {
    labels: [
        "2020 онд ашиглалтад орсон",
        "2021 онд ашиглалтад орсон",
        "2022 онд ашиглалтад орсон",
        "2023 онд ашиглалтад орсон",
    ],
    datasets: [{
        data: [62, 145, 142, 60],
        label: 'Олон нийтийн барилга',
        pointStyle: 'circle',
        pointRadius: 7,
        pointHoverRadius: 10,
        pointHoverBorderColor: 'white',
        pointHoverBorderWidth: 2,
        pointBorderColor: 'white',
        pointBorderWidth: 2,
        borderColor: "rgba(220, 20, 60, 0.4)",
        backgroundColor: "#e34b69"
        },
    ],
    
};

const config3 = {
    type: 'line',
    data: chartdata3,
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
            }
        }
    }
};

const newChart3 = new Chart(ctx3, config3);