$(document).ready(function () {
  $.ajax({
    url: "http://localhost/php_testing/tutorials/tutorial_9/tutorial_9.php",
    method: "GET",
    success: function (data) {
      console.log(data);

      var name = [];
      var mark = [];

      for (var i in data) {
        name.push(data[i]['name']);
        mark.push(data[i]['mark']);
      }
      var chartdata = {
        labels: name,
        datasets: [
          {
            label: 'Student mark',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: mark
          }
        ]
      };

      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
    },
    error: function (data) {
      console.log(data);
    }
  });
});