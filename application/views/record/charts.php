<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }

    var test = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    // Area Chart Example
    var cData = JSON.parse(`<?php echo $chart_data; ?>`);
    console.log("555555555555")
    console.log(cData.expends)
    var ctx = document.getElementById("recordChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: cData.month,
            datasets: [{
                label: "รายรับ",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.1)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: cData.incomes,
            }, {
                label: "รายจ่าย",
                lineTension: 0.3,
                backgroundColor: "rgba(222, 132, 132, 0.1)",
                borderColor: "rgba(255, 88, 88, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(255, 88, 88, 1)",
                pointBorderColor: "rgba(255, 88, 88, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(255, 88, 88, 1)",
                pointHoverBorderColor: "rgba(255, 88, 88, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: cData.expends,
            }],
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'เปรียบเทียบรายรับ - รายจ่ายในแต่ละเดือน',
                fontSize: 20
            },
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'เดือน',
                        fontSize: 18
                    }
                }],
                yAxes: [{
                    // stacked:true,
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return commaSeparateNumber(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'จำนวนเงิน (บาท)',
                        fontSize: 18
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + commaSeparateNumber(tooltipItem.yLabel.toFixed(2)) + ' บาท';      
                    }
                }
            }
        }
    });


    // var ctx = document.getElementById('myChart').getContext('2d');
    // var chart = new Chart(ctx, {
    //     // The type of chart we want to create
    //     type: 'line',

    //     // The data for our dataset
    //     data: {
    //         // labels: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฏาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
    //         labels: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม'],
    //         datasets: [{
    //             label: 'รายได้',
    //             // fontSize: 200,
    //             fill: false,
    //             borderColor: 'rgb(102,207,297)',
    //             // backgroundColor: 'lightblue',
    //             data: [500, 100, 55]
    //         }, {
    //             label: 'รายจ่าย',
    //             fill: false,
    //             borderColor: 'rgb(255, 64, 115)',
    //             // backgroundColor: 'rgb(255, 176, 176)',
    //             data: [230, 0, 130]
    //         }],
    //         fontSize: 200
    //     },

    //     // Configuration options go here
    //     options: {
    //         responsive: true,
    //         title: {
    //             display: true,
    //             text: 'เปรียบเทียบรายรับ - รายจ่ายในแต่ละเดือน',
    //             fontSize: 20
    //         },
    //         tooltips: {
    //             mode: 'index',
    //             intersect: false,
    //         },
    //         hover: {
    //             mode: 'nearest',
    //             intersect: true
    //         },
    //         scales: {
    //             xAxes: [{
    //                 display: true,
    //                 scaleLabel: {
    //                     display: true,
    //                     labelString: 'เดือน',
    //                     fontSize: 15
    //                 }
    //             }],
    //             yAxes: [{
    //                 display: true,
    //                 scaleLabel: {
    //                     display: true,
    //                     labelString: 'จำนวนเงิน (บาท)',
    //                     fontSize: 15
    //                 }
    //             }]
    //         }
    //     }
    // });
</script>