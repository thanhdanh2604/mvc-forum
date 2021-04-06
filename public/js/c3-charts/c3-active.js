(function ($) {
 "use strict";
    var array_dt = ['Chi phí doanh thu'];
    var array_vp = ['Chi phí văn phòng'];
    var array_ns = ['Chi phí nhân sự'];
    var array_dt_tt = ['Doanh thu'];
    var array_dt_days = [' Doanh thu trong ngày'];
    new Date();
    var array_x_dt_days = [];
    for (let i = 1; i <= 7; i++) {
        var temp = new Date(Date.now() - i*24*60*60*1000);
        array_x_dt_days.push( temp.toLocaleDateString('en-GB'));
    }
    array_x_dt_days.reverse();
    array_x_dt_days.unshift('x');
    var final_dt;

    $.get( "./ajax/get_array_doanh_thu_7_ngay_gan_nhat", function( data ) {
        var final_array_dt_days =  array_dt_days.concat(JSON.parse(data));
        c3.generate({
            bindto: '#chart-day',
            data:{
                x: 'x',
                columns: [
                array_x_dt_days,
                    final_array_dt_days
                ],
                colors:{
                    ' Doanh thu trong ngày': '#006DF0',
                },
                type: 'spline',
                labels: {
                    format: {
                        "Doanh thu trong ngày": d3.format("$,")
                    }
                },
            },
            axis: {
                x: {
                    type: 'category'
                },
                y : {
                    tick: {
                        format: d3.format("$,")
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
    $.get( "./ajax/get_array_doanh_thu_trong_nam", function( data ) {
        final_dt =  array_dt.concat(JSON.parse(data));
        c3.generate({
            bindto: '#chart_dt',
            data:{
                x: 'x',
                columns: [
                    ['x', 'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','De'],
                    final_dt
                ],
                colors:{
                    ' Chi phí doanh thu': '#006DF0',
                },
                type: 'bar',
                labels: {
                    format: {
                        "Chi phí doanh thu": d3.format("$,")
                    }
                },
            },
            axis: {
                x: {
                    type: 'category'
                },
                y : {
                    tick: {
                        format: d3.format("$,")
                    }
                }
            }
        });
    });
    $.get( "./ajax/get_array_doanh_thu_thuc_te", function( data ) {
        var final_array_dttt =  array_dt_tt.concat(JSON.parse(data));
        c3.generate({
            bindto: '#chart_dt_goc',
            data:{
                x: 'x',
                columns: [
                    ['x', 'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','De'],
                    final_array_dttt
                ],
                colors:{
                    'Doanh thu': '#cb42f5',
                },
                type: 'bar',
                labels: {
                    format: {
                        "Doanh thu": d3.format("$,")
                    }
                },
            },
            axis: {
                x: {
                    type: 'category'
                },
                y : {
                    tick: {
                        format: d3.format("$,")
                    }
                }
            },
        });
        
    });
    // So sánh chi phí Văn Phòng và chi phí Nhân Sự
    c3.generate({
        data: {
            url: './ajax/get_chi_phi_vp_ns',
            mimeType: 'json',
            colors:{
                "Chi phí Văn Phòng": '#ff0000',
                "Chi phí Nhân Sự": '#0000ff'
            },
            labels: {
                format: {
                    "Chi phí Văn Phòng": d3.format("$,"),
                    "Chi phí Nhân Sự": d3.format("$,")
                }
            },
            
        },
        types: {
            "Chi phí Văn Phòng": 'line',
            "Chi phí Nhân Sự": 'spline'
        },
        bindto: '#chart_vp_ns',
        axis: {
            x: {
                type: 'category',
                categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','De']
            },
            y : {
                tick: {
                    format: d3.format("$,")
                }
            }
        },  
    });
    c3.generate({
        data: {
            url: './ajax/get_array_dau_ra_dau_vao',
            mimeType: 'json',
            types: {
                'Doanh thu đầu vào': 'bar',
                'Tổng chi đầu ra': 'line'
            },
            labels: {
                format: {
                    "Doanh thu đầu vào": d3.format("$,"),
                    "Tổng chi đầu ra": d3.format("$,")
                }
            },
        },
        bindto: '#chart_dau_ra_dau_vao',
        
        axis: {
            x: {
                type: 'category',
                categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','De']
            },
            y : {
                tick: {
                    format: d3.format("$,")
                }
            }
        },  
    })
})(jQuery); 

