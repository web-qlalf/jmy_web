$(document).ready(function(e){

  var elementID = 'lineChart1';
 var ctx = document.getElementById('"' + elementID + '"');
    $('#lineChart1').height = "200";
var ctx2 = document.getElementById('lineChart1');

    var myChart = new Chart(ctx2 , {
        type: 'line',
        data: {
            labels: ["2012", "2013", "2014", "2015", "2016", "2017", "2018"],
            datasets: [
                {
                    label: ["New Users","","","","","",""],
                    borderColor: "rgb(236, 41, 107)",
                    borderWidth: "5",
                    backgroundColor: "rgb(236, 41, 107, 0.6)",
                    data:[20, 20, 47, 20, 49, 20, 50]
                },
                {
                    label: ["Register Users","","","","","",""],
                    borderColor: "rgb(72, 1, 255)",
                    borderWidth: "5",
                    backgroundColor: "rgba(72, 1, 255, 0.6)",
                    pointHighlightStroke: "rgba(255,43,136, 1)",
                    data: [26, 46, 30, 71, 20, 35, 20],
                }
                        ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                intersect: false,

            },
			tooltips: {

				},
            hover: {
                mode: 'nearest',
                intersect: true
            }

        }
    } );



/* Chart-js (#lineChart1) */
	var myCanvas = document.getElementById("lineChart1");
	myCanvas.height="290";
	var myCanvasContext = myCanvas.getContext("2d");
	var gradientStroke1 = myCanvasContext.createLinearGradient(0, 0, 0, 200);
	gradientStroke1.addColorStop(0, 'rgb(236, 41, 107 ,0.3)');

	var gradientStroke2 = myCanvasContext.createLinearGradient(0, 0, 0, 190);
	gradientStroke2.addColorStop(0, 'rgb(72, 1, 255,0.3)');
	var myChart = new Chart( myCanvas, {
		type: 'line',
		data : {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
			type: 'line',
			 datasets: [
			{
				label: "Expenses",
				data: [2,7,3,5,4,5,2,8,4,6,5,2,8,4,7,2,4,6,4,8,4,],
				backgroundColor: gradientStroke1,
				borderColor: '#ec296b ' ,
				pointBackgroundColor:'#fff',
				pointHoverBackgroundColor:gradientStroke1,
				pointBorderColor :gradientStroke1,
				pointHoverBorderColor :gradientStroke1,
				pointBorderWidth :0,
				pointRadius :0,
				pointHoverRadius :0,
				labelColor:gradientStroke1,
				borderWidth: 2,

			}, {
				label: "Budget",
				data: [5,9,5,9,5,9,7,3,5,2,5,3,9,6,5,9,7,3,5,2,7,10],
				backgroundColor: gradientStroke2,
				borderColor: ' #4801ff',
				pointBackgroundColor:'#fff',
				pointHoverBackgroundColor:gradientStroke2,
				pointBorderColor :gradientStroke2,
				pointHoverBorderColor :gradientStroke2,
				pointBorderWidth :0,
				pointRadius :0,
				pointHoverRadius :0,
				borderWidth: 2,

			}
		  ]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
			    labels: {
					fontColor: '#605e7e'
			    }
			},
			tooltips: {
				show: true,
				showContent: true,
				alwaysShowContent: true,
				triggerOn: 'mousemove',
				trigger: 'axis',
				axisPointer:
				{
					label: {
						show: false,
						color: '#605e7e',
					},
				}
			},

			scales: {
				xAxes: [ {
					gridLines: {
						color: 'rgba(0,0,0,0.1)',
						zeroLineColor: 'rgba(0,0,0,0.5)'
					},
					ticks: {
						fontSize: 12,
						fontColor: '#605e7e',
						beginAtZero: true,
						padding: 0
					}
				} ],
				yAxes: [ {
					gridLines: {
						color: 'transparent',
						zeroLineColor: 'rgba(0,0,0,0.5)'
					},
					ticks: {
						fontSize: 12,
						fontColor: '#605e7e',
						beginAtZero: false,
						padding: 0
					}
				} ]
			},
			title: {
				display: false,
			},
			elements: {
				line: {
					borderWidth: 2
				},
				point: {
					radius: 0,
					hitRadius: 10,
					hoverRadius: 4
				}
			}
		}
	})
	/* Chart-js (#lineChart1) closed */

	/* Chartjs (#survey) */
	var myCanvas2 = document.getElementById("survey");
	$('#survey').height="335";

	var myCanvasContext = myCanvas2.getContext("2d");
	var gradientStroke1 = myCanvasContext.createLinearGradient(0, 0, 0, 380);
	gradientStroke1.addColorStop(0, 'rgb(236, 41, 107 ,0.8)');

	var gradientStroke2 = myCanvasContext.createLinearGradient(0, 0, 0, 300);
	gradientStroke2.addColorStop(0, 'rgb(72, 1, 255,0.8)');
	var myChart = new Chart(myCanvas, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
			datasets: [{
				label: 'Manager Count',
				data: [15, 18, 12, 14, 10, 15, 7, 14],
				backgroundColor: gradientStroke1,
				hoverBackgroundColor: gradientStroke1,
				hoverBorderWidth: 2,
				hoverBorderColor: 'gradientStroke1'
			}, {

			    label: 'Employee Count',
				data: [10, 14, 10, 15, 9, 14, 15, 20],
				backgroundColor: gradientStroke2,
				hoverBackgroundColor: gradientStroke2,
				hoverBorderWidth: 2,
				hoverBorderColor: 'gradientStroke2'
			}
		  ]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: 'rgba(225,225,225,0.9)',
				bodyFontColor: 'rgba(225,225,225,0.9)',
				backgroundColor: 'rgba(0,0,0,0.7)',
				cornerRadius: 3,
				intersect: false,
			},
			legend: {
				display: true,
				labels: {
					display: true,
					usePointStyle: true,
					fontColor: '#605e7e'
				},
			},
			scales: {
				xAxes: [{
					 barPercentage: 0.5,
					ticks: {
						fontColor: "#605e7e",

					 },
					display: true,
					gridLines: {
						display: true,
						color: 'rgba(0,0,0,0.1)',
						drawBorder: false
					},
					scaleLabel: {
						display: false,
						labelString: 'Month',
						fontColor: '#605e7e'
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "#605e7e",
					 },
					display: true,
					gridLines: {
						display: true,
						color: 'rgba(0,0,0,0.1)',
						drawBorder: false
					},
					scaleLabel: {
						display: false,
						labelString: 'sales',
						fontColor: '#605e7e'
					}
				}]
			},
			title: {
				display: false,
				text: 'Normal Legend'
			}
		}
	});
	/* Chartjs (#survey) closed */
});
//morris chart
$(document).ready(function(e){
  'use strict'

	new Morris.Donut({
		  element: 'morrisBar8',
		  data: [
			{value: 95, label: 'Total Sales'},
			{value: 30, label: 'Jobs'},
			{value: 45, label: 'Cars'},
			{value: 20, label: 'Classifieds'},
		  ],
		  colors: [
		'#ec296b', '#4801FF ', '#00e682', '#ff382b'

	  ],
		  formatter: function (x) { return x + "%"}
		}).on('click', function(i, row){
		  console.log(i, row);
	});
});
