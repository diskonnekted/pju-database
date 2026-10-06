function numberWithCommas(x) {
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
$(document).ready(function(){
// alert('as')/
	// 'use strict';
	/***** PIE CHART *****/
	if ($('#line-chart').is(':empty')){
		//do something
		alert('');
		$.ajax({
			url: "/admin/pju/grafik",
			method: "GET", //dummy server requires GET not POST
			datatype: "json",
			success: function (data) {
				// alert('ad');
				var datamor = JSON.parse(data);
				// console.log(datamor)
				var m1 = new Morris.Line({
					// ID of the element in which to draw the chart.
					element: 'line-chart',
					// Chart data records -- each entry in this array corresponds to a point on
					// the chart.
					data: datamor,
					xkey: 'bulan',
					ykeys: ['total', 'kwh', 'nkwh'],
					labels: ['Total', 'KWH', 'nkwh'],
					lineColors: ['#D9534F', '#5BC0DE', '#5BC0aE'],
					//pointFillColors: ['#fff', '#000'],
					lineWidth: '3px',
					hideHover: true,
					gridTextColor: '#fff',
					grid: false
				});

			}, error: function (a) {
				// alert(a)
				// console.log(a)
			}
		});
	}
	if ($('#pjmlpju').is(':empty')){

		// pjml
		$.ajax({
			url: "/admin/pju/pie/1",
			method: "GET", //dummy server requires GET not POST
			datatype: "json",
			success: function (data) {
				$.plot('#pjmlpju',  JSON.parse(data), {
					series: {
						pie: {
							show: true,
							radius: 1,
							label: {
								show: true,
								radius: 2 / 3,
								formatter: labelFormatter,
								threshold: 0.1
							}
						}
					},
					grid: {
						hoverable: true,
						clickable: true
					},
					legend: {show: true}

				});


			}, error: function (a) {
				// alert(a)
				// console.log(a)
			}
		});
	}
	if ($('#pppju').is(':empty')){
		//do something

		// pjml
		$.ajax({
			url: "/admin/pju/pie/2",
			method: "GET", //dummy server requires GET not POST
			datatype: "json",
			success: function (data) {
				$.plot('#pppju',  JSON.parse(data), {
					series: {
						pie: {
							show: true,
							radius: 1,
							label: {
								show: true,
								radius: 2 / 3,
								formatter: labelFormatter,
								threshold: 0.1
							}
						}
					},
					grid: {
						hoverable: true,
						clickable: true
					},
					legend: {show: true}

				});


			}, error: function (a) {
				// alert(a)
				// console.log(a)
			}
		});
	}
	if ($('#ppempju').is(':empty')){
		//do something

		// pjml
		$.ajax({
			url: "/admin/pju/pie/3",
			method: "GET", //dummy server requires GET not POST
			datatype: "json",
			success: function (data) {

				$.plot('#ppempju',  JSON.parse(data), {
					series: {
						pie: {
							show: true,
							radius: 1,
							label: {
								show: true,
								radius: 2 / 3,
								formatter: labelFormatter,
								threshold: 0.1
							}
						}
					},
					grid: {
						hoverable: true,
						clickable: true
					},
					legend: {show: true}

				});


			}, error: function (a) {
			}
		});
		//PIE
	}
	var piedata = [
		{ label: 'non kWh', data: 10, color: '#D9534F'},
		{ label: 'kWh', data: 30, color: '#1CAF9A'},
	];
	var piedata1 = [
		{ label: 'non kWh', data: 10000, color: '#D9534F'},
		{ label: 'kWh', data: 3012, color: '#1CAF9A'},
	];
	var piedata2 = [
		{ label: 'non kWh', data: 9837736610, color: '#D9534F'},
		{ label: 'kWh', data: 12377398, color: '#1CAF9A'},
	];

	function labelFormatter(label, data) {
		console.log(data)
		let str=data.data+'';
		return '<div style="font-size:8pt; text-align:center; padding:2px; color:white;">' + label + '<br>' + numberWithCommas(str.split(',')[1])+ '</div>';
	}
	// Knob
	$('.dial-success').knob({
		readOnly: true,
		width: '70px',
		bgColor: '#E7E9EE',
		fgColor: '#259CAB',
		inputColor: '#262B36'
	});

	$('.dial-danger').knob({
		readOnly: true,
		width: '70px',
		bgColor: '#E7E9EE',
		fgColor: '#D9534F',
		inputColor: '#262B36'
	});

	$('.dial-info').knob({
		readOnly: true,
		width: '70px',
		bgColor: '#66BAC4',
		fgColor: '#fff',
		inputColor: '#fff'
	});

	$('.dial-warning').knob({
		readOnly: true,
		width: '70px',
		bgColor: '#E48684',
		fgColor: '#fff',
		inputColor: '#fff'
	});


});
