try {
    fetch('admin/statistical/amountStatistical')
      .then(function (response) {
        return response.json();
      })
      .then(function (data) {
        if (data.code == 200) {
          createChartAmount(data.data);
          createChartOrderTotal();
        }
      });
  } catch (error) {
    console.log(error);
  }
  
  let dataAmount = [];
  let dataTotalOrder = [];
  function createChartAmount(dataQW) {
    const data = [
      { order_month: 1, total_orders: 0, total_amount: 0 },
      { order_month: 2, total_orders: 0, total_amount: 0 },
      { order_month: 3, total_orders: 0, total_amount: 0 },
      { order_month: 4, total_orders: 0, total_amount: 0 },
      { order_month: 5, total_orders: 0, total_amount: 0 },
      { order_month: 6, total_orders: 0, total_amount: 0 },
      { order_month: 7, total_orders: 0, total_amount: 0 },
      { order_month: 8, total_orders: 0, total_amount: 0 },
      { order_month: 9, total_orders: 0, total_amount: 0 },
      { order_month: 10, total_orders: 0, total_amount: 0 },
      { order_month: 11, total_orders: 0, total_amount: 0 },
      { order_month: 12, total_orders: 0, total_amount: 0 },
    ];
    data.forEach((item, index) => {
      const matchingItem = dataQW.find(
        (qwItem) => qwItem.order_month === item.order_month,
      );
  
      if (matchingItem) {
        data[index].total_amount = +matchingItem.total_amount;
        data[index].total_orders = +matchingItem.total_orders;
      }
    });
  
    data.map((item) => {
      dataAmount.push(item.total_amount);
      dataTotalOrder.push(item.total_orders);
    });
  
    let options = {
      series: [
        {
          name: 'Doanh thu',
          data: dataAmount,
        },
      ],
      chart: {
        height: 320,
        type: 'bar', // Chuyển thành biểu đồ cột
        toolbar: {
          show: true,
        },
        zoom: {
          enabled: true,
        },
      },
      plotOptions: {
        bar: {
          borderRadius: 4,
          horizontal: false, // Đặt thành true nếu muốn biểu đồ cột ngang
        },
      },
      dataLabels: {
        enabled: false,
      },
      legend: {
        show: false,
      },
      colors: ['#FFA500'],
      grid: {
        xaxis: {
          lines: {
            show: true,
          },
        },
        yaxis: {
          lines: {
            show: true,
          },
        },
        padding: {
          right: -112,
          bottom: 0,
          left: 15,
        },
      },
      responsive: [
        {
          breakpoint: 1200,
          options: {
            grid: {
              padding: {
                right: -95,
              },
            },
          },
        },
        {
          breakpoint: 992,
          options: {
            grid: {
              padding: {
                right: -69,
              },
            },
          },
        },
        {
          breakpoint: 767,
          options: {
            chart: {
              height: 200,
            },
          },
        },
        {
          breakpoint: 576,
          options: {
            yaxis: {
              labels: {
                show: false,
              },
            },
          },
        },
      ],
      yaxis: {
        labels: {
          formatter: function (value) {
            return formatCurrency(value);
          },
        },
      },
      xaxis: {
        categories: [
          'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
          'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12',
        ],
      },
    };
  
    const reportChart = document.querySelector('#report-chart');
    if (reportChart) {
      var chart = new ApexCharts(reportChart, options);
      chart.render();
    }
  }
  
  
  function createChartOrderTotal() {
    let options = {
      series: [
        {
          name: 'Lượt bán',
          data: dataTotalOrder,
        },
      ],
      chart: {
        height: 320,
        type: 'bar', // Chuyển thành biểu đồ cột
        toolbar: {
          show: true,
        },
        zoom: {
          enabled: true,
        },
      },
      plotOptions: {
        bar: {
          borderRadius: 4,
          horizontal: false, // Đặt thành true nếu muốn biểu đồ cột ngang
        },
      },
      legend: {
        show: false,
      },
      colors: ['#FFA500'],
      yaxis: {
        labels: {
          formatter: function (value) {
            return parseInt(value);
          },
        },
      },
      xaxis: {
        categories: [
          'T1', 'T2', 'T3', 'T4', 'T5', 'T6',
          'T7', 'T8', 'T9', 'T10', 'T11', 'T12',
        ],
        labels: {
          show: true,
        },
      },
      responsive: [
        {
          breakpoint: 1400,
          options: {
            chart: {
              height: 300,
            },
          },
        },
        {
          breakpoint: 992,
          options: {
            chart: {
              height: 210,
              width: '100%',
              offsetX: 0,
            },
          },
        },
        {
          breakpoint: 578,
          options: {
            chart: {
              height: 200,
              width: '105%',
              offsetX: -20,
              offsetY: 10,
            },
          },
        },
        {
          breakpoint: 430,
          options: {
            chart: {
              width: '108%',
            },
          },
        },
        {
          breakpoint: 330,
          options: {
            chart: {
              width: '112%',
            },
          },
        },
      ],
    };
  
    const earningChart = document.querySelector('#earning-chart');
    if (earningChart) {
      var chart2 = new ApexCharts(earningChart, options);
      chart2.render();
    }
  }
  
  
  //api
  try {
    fetch('admin/statistical/getProdForCateChart')
      .then(function (response) {
        return response.json();
      })
      .then(function (data) {
        if (data.code == 200) {
          createChartProductCate(data.data);
        }
      });
  } catch (error) {
    console.log(error);
  }
  
  function createChartProductCate(data) {
    const series = [];
    const labels = [];
    data.map((dataProdCate) => {
      labels.push(dataProdCate.name);
      series.push(dataProdCate.product_count);
    });
  
    let options = {
      series: [{
        name: 'Số lượng sản phẩm',
        data: series,
      }],
      chart: {
        type: 'bar',
        height: 325,
        width: '100%',
      },
      plotOptions: {
        bar: {
          horizontal: false, // Đặt là true để tạo biểu đồ cột ngang
          columnWidth: '50%', // Độ rộng của các cột
          endingShape: 'rounded' // Định dạng của đỉnh cột
        },
      },
      dataLabels: {
        enabled: true, // Hiển thị số lượng trên cột
      },
      xaxis: {
        categories: labels,
        labels: {
          style: {
            fontSize: '12px', // Cỡ chữ của nhãn trên trục x
          },
        },
      },
      yaxis: {
        title: {
          text: 'Số lượng sản phẩm',
        },
        labels: {
          style: {
            fontSize: '12px', // Cỡ chữ của nhãn trên trục y
          },
        },
      },
      legend: {
        fontSize: '14px',
        position: 'bottom',
        offsetX: 1,
        offsetY: -1,
        markers: {
          width: 10,
          height: 10,
        },
        itemMargin: {
          vertical: 2,
        },
      },
     
      colors: [
        '#FF4560', 
        '#00E396', 
        '#008FFB', 
        '#FEB019', 
        '#775DD0', 
        '#FF66C3', 
        '#3C90EB', 
        '#03A9F4', 
        '#4CAF50', 
        '#F9CE1D', 
        '#FF9800', 
        '#33B2DF'  
      ],
      tooltip: {
        y: {
          formatter: function (val) {
            return val + " sản phẩm"; // Thêm chú thích cho tooltip
          }
        }
      },
      responsive: [
        {
          breakpoint: 1835,
          options: {
            chart: {
              height: 320,
            },
            legend: {
              position: 'right',
              itemMargin: {
                horizontal: 5,
                vertical: 1,
              },
            },
          },
        },
        {
          breakpoint: 1388,
          options: {
            chart: {
              height: 330,
            },
            legend: {
              position: 'bottom',
            },
          },
        },
        {
          breakpoint: 1275,
          options: {
            chart: {
              height: 300,
            },
            legend: {
              position: 'bottom',
            },
          },
        },
        {
          breakpoint: 1158,
          options: {
            chart: {
              height: 280,
            },
            legend: {
              fontSize: '10px',
              position: 'bottom',
              offsetY: 10,
            },
          },
        },
        {
          theme: {
            mode: 'dark',
            palette: 'palette1',
            monochrome: {
              enabled: true,
              color: '#255aee',
              shadeTo: 'dark',
              shadeIntensity: 0.65,
            },
          },
        },
        {
          breakpoint: 598,
          options: {
            chart: {
              height: 280,
            },
            legend: {
              fontSize: '12px',
              position: 'bottom',
              offsetX: 5,
              offsetY: -5,
              markers: {
                width: 10,
                height: 10,
              },
              itemMargin: {
                vertical: 1,
              },
            },
          },
        },
      ],
    };
  
    const productCate = document.querySelector('#productCate');
    if (productCate) {
      var chart3 = new ApexCharts(productCate, options);
      chart3.render();
    }
  }
  