(function ($) {
    "use strict";

    var array_dt_tt = ['Revenue'];
    var array_dt_gf = ['Gross profit'];
    var array_dt_cf = ['Cash flow'];
    var array_dt_days = ['Daily Revenue'];
    new Date();
    var array_x_dt_days = [];
    for (let i = 1; i <= 7; i++) {
        var temp = new Date(Date.now() - i * 24 * 60 * 60 * 1000);
        array_x_dt_days.push(temp.toLocaleDateString('en-GB'));
    }
    array_x_dt_days.reverse();
    array_x_dt_days.unshift('x');

    $.get("./ajax/get_array_doanh_thu_7_ngay_gan_nhat", function (data) {
        var final_array_dt_days = array_dt_days.concat(JSON.parse(data));
        c3.generate({
            bindto: '#chart-day',
            data: {
                x: 'x',
                columns: [
                    array_x_dt_days,
                    final_array_dt_days
                ],
                colors: {
                    ' Daily Revenue': '#006DF0',
                },
                type: 'spline',
                labels: {
                    format: {
                        "Daily Revenue": d3.format("đ,")
                    }
                },
            },
            axis: {
                x: {
                    type: 'category'
                },
                y: {
                    tick: {
                        format: d3.format("đ,")
                    }
                }
            },
            grid: {
                x: {
                    show: true
                },
                y: {
                    show: true
                }
            }
        });
    });
    $.get("./ajax/get_array_doanh_thu_trong_nam", function (data) {
        var final_array_dt = array_dt_tt.concat(JSON.parse(data));
        c3.generate({
            bindto: '#chart_doanh_thu',
            data: {
                x: 'x',
                columns: [
                    ['x', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'De'],
                    final_array_dt
                ],
                colors: {
                    'Revenue': '#6a9352',
                },
                type: 'bar',
                labels: {
                    format: {
                        "Revenue": d3.format(",.2r")
                    }
                },
            },
            axis: {
                x: {
                    type: 'category'

                },
                y: {
                    tick: {
                        format: d3.format(",.2r")
                    },
                    show: false
                }
            },
            grid: {
                x: {
                    show: false
                },
                y: {
                    show: true
                }
            }
        });
    });
    $.get("./ajax/get_array_doanh_thu_thuc_te", function (data) {
        var final_array_dttt = array_dt_gf.concat(JSON.parse(data));
        c3.generate({
            bindto: '#chart_dt_goc',
            data: {
                x: 'x',
                columns: [
                    ['x', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'De'],
                    final_array_dttt
                ],
                colors: {
                    'Gross profit': '#cb42f5',
                },
                type: 'bar',
                labels: {
                    format: {
                        "Gross profit": d3.format(",.2r"),
                    }
                },
            },
            axis: {
                x: {
                    type: 'category'
                },
                y: {
                    tick: {
                        format: d3.format(",.2r"),
                    }
                }
            },
        });

    });
    // Cost flow
    $.get("./ajax/ajax_get_array_chart_cost_flow", function (data) {
        var final_array_cf = array_dt_cf.concat(JSON.parse(data));
        c3.generate({
            bindto: '#chart_cf',
            data: {
                x: 'x',
                columns: [
                    ['x', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'De'],
                    final_array_cf
                ],
                colors: {
                    'Cash flow': '#6a9352',
                },
                type: 'bar',
                labels: {
                    format: {
                        "Cash flow": d3.format(",.2r")
                    }
                },
            },
            axis: {
                x: {
                    type: 'category'
                },
                y: {
                    tick: {
                        format: d3.format(",.2r")
                    },
                    show:false
                }
            },
        });

    });
    // So sánh chi phí Văn Phòng và chi phí Nhân Sự
    c3.generate({
        data: {
            url: './ajax/get_chi_phi_vp_ns',
            mimeType: 'json',
            colors: {
                "Operation Cost": '#ff0000',
                "HRs Cost": '#0000ff'
            },
            labels: {
                format: {
                    "Operation Cost": d3.format(",.2r"),
                    "HRs Cost": d3.format(",.2r")
                }
            },

        },
        types: 'bar',
        bindto: '#chart_vp_ns',
        axis: {
            x: {
                type: 'category',
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'De']
            },
            y: {
                tick: {
                    format: d3.format(",.2r")
                }
            }
        },
    });
    // Đầu ra đầu vào
    c3.generate({
        data: {
            url: './ajax/get_array_dau_ra_dau_vao',
            mimeType: 'json',
            types: {
                'Revenue': 'bar',
                'Cost': 'line'
            },
            labels: {
                format: {
                    "Revenue": d3.format(",.2r"),
                    "Cost": d3.format(",.2r")
                }
            },
            colors: {
                Revenue: '#6a9352', // ADD
                Cost: '#0000ff'
            },
            types: {
                Revenue: 'bar', // ADD
                Cost: 'line'
            }
        },
        bindto: '#chart_dau_ra_dau_vao',

        axis: {
            x: {
                type: 'category',
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'De']
            },
            y: {
                tick: {
                    format: d3.format(",.2r")
                },
                show:false
            }
        },
    });
    // So sánh chi phí Văn Phòng và chi phí Nhân Sự
    c3.generate({
        data: {
            url: './ajax/ajax_get_array_cost_year',
            mimeType: 'json',
            colors: {
                "Operation": '#f00',
                "Reinvest": '#00002f',
                "Staff Cost": '#0000ff'
            },
            labels: {
                format: {
                    "Operation": d3.format(",.2r"),
                    "Reinvest": d3.format(",.2r"),
                    "Staff Cost": d3.format(",.2r")
                },
            },
        },
        types: 'line',
        bindto: '#chart_cost',
        axis: {
            x: {
                type: 'category',
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'De']
            },
            y: {
                tick: {
                    format: d3.format(",.2r")
                },
                show:false
            }
        },
       
    });
    //Biểu đồ thống kê giờ dạy
    c3.generate({
        data: {
            url: './ajax/ajax_get_array_teaching_hours',
            mimeType: 'json',
            // iris data from R
            // columns: [
            //     ['data1', 30],
            //     ['data2', 120],
            // ],
            // colors: {
            //     "data1": '#f00',
            //     "data2": '#00002f'
            // },
            type : 'donut'
        },
        bindto: '#teaching_chart'
    });
})(jQuery);