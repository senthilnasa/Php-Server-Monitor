function generate_chart(suc,fail){
    new Chart(document.getElementById("history_short").getContext('2d'), {
        type: 'line',
        data: {
            datasets: [
            {
                data: fail,
                label: 'Offline',
                backgroundColor: '#dc3545',
                borderColor: '#dc3545',
                borderWidth: 2,
                radius: 0,
                pointStyle: 'crossRot',
                fill: true,
                spanGaps: false,
            },
            {
                data: suc,
                label: 'Online',
                fill: false,
                spanGaps: false,
                backgroundColor: '#28a745',
                borderColor: '#28a745',
                lineTension: 0,
                steppedLine: true
            },
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Report'
            },	
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0.0
                    }
                }],
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'minute',
                        minUnit: 'hour',
                        min: starttime,
                        max: endtime,
                    },
                    distribution: 'linear',
                    ticks: {
                        source: 'auto',
                    }
                }]
            },
            plugins: {
                zoom: {
                    pan: {
                        enabled: true,
                        mode: 'x',
                        rangeMax: {
                            x: new Date,
                        },
                    },
                    zoom: {
                        enabled: true,
                        mode: 'x',
                        rangeMax: {
                            x: new Date,
                        },
                        speed: 0.05,
                    }
                }
            }
        }
    });
    }

    function generate_pie(online,offline){
        var ctx = document.getElementById("online_report").getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Online","Offline"],
                datasets: [{    
                    data: [online,offline], 
                    borderColor: ['#2196f38c', '#f443368c'],
                    backgroundColor: ['#2196f38c', '#f443368c'],
                    borderWidth: 1
                }]},         
            options: {
                title: {
                display: true,
                text: 'Online/Offline'
            },
            responsive: true,
            maintainAspectRatio: true,
            }
        });
    }


    function dashboard(){
        let func = (data) => {
            $('#d1').html(data.d1);
            $('#d2').html(data.d2);
            $('#d3').html(data.d3);
            $('#d4').html(data.d4);
            generate_pie(data.d2,data.d3);
        }
        let err = () => {
            toast('try again later!');
        }
        ajax('/api/data/', { "fun": "dashboard_data" }, func, err);
        chart1();
    }
    let online;
    let offine;
    function chart1(){
        let func = (data) => {
            online=data;
            chart2();
        }
        let err = () => {
            toast('try again later!');
        }
        ajax('/api/data/', { "fun": "dashboard_chart_online" }, func, err);
    }
    function chart2(){
        let func = (data) => {
            offine=data;
            generate_chart(online,offine);
        }
        let err = () => {
            toast('try again later!');
        }
        ajax('/api/data/', { "fun": "dashboard_chart_offline" }, func, err);
        
    }

$(document).ready(() => {
dashboard();
$('.container').hide();
$('body').fadeIn(1000);
$('#progress').fadeOut(1000);
$('.sidenav').sidenav();
$('.tooltipped').tooltip();	
$('.container').fadeIn(1000);
});