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
                       type: 'spline'
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
                        type: 'bar'
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
                        type: 'spline'
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
            $.get( "./ajax/get_array_chi_phi_van_phong", function( data ) {
                var final_vp =  array_vp.concat(JSON.parse(data));
                c3.generate({
                    bindto: '#chart_vp',
                    data:{
                       x: 'x',
                        columns: [
                            ['x', 'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','De'],
                            final_vp
                        ],
                        colors:{
                           'Chi phí văn phòng': '#47ac47',
                        },
                        type: 'spline'
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
            $.get( "./ajax/get_array_chi_phi_nhan_su", function( data ) {
                var final_ns =  array_ns.concat(JSON.parse(data));
                c3.generate({
                    bindto: '#chart_ns',
                    data:{
                        x: 'x',
                        columns: [
                            ['x', 'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','De'],
                            final_ns
                        ],
                        colors:{
                            'Chi phí nhân sự': '#e80b92',
                        }
                       
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

})(jQuery); 