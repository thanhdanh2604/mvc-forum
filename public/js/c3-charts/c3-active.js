(function ($) {
 "use strict";
            var array_dt = ['Chi phí doanh thu'];
            var array_vp = ['Chi phí văn phòng'];
            var array_ns = ['Chi phí nhân sự'];
            var array_dt_tt = ['Doanh thu'];
            var final_dt;
            $.get( "./ajax/get_array_doanh_thu_trong_nam", function( data ) {
                 final_dt =  array_dt.concat(JSON.parse(data));
                c3.generate({
                    bindto: '#chart_dt',
                    data:{
                       x: 'x',
                        columns: [
                            ['x', 1,2,3,4,5,6,7,8,9,10,11,12],
                            final_dt
                        ],
                        colors:{
                           ' Chi phí doanh thu': '#006DF0',
                        },
                        type: 'bar'
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
                            ['x', 1,2,3,4,5,6,7,8,9,10,11,12],
                            final_array_dttt
                        ],
                        colors:{
                            'Doanh thu': '#cb42f5',
                        
                        },
                        type: 'spline'
                    }
                });
              
           });
            $.get( "./ajax/get_array_chi_phi_van_phong", function( data ) {
                var final_vp =  array_vp.concat(JSON.parse(data));
                c3.generate({
                    bindto: '#chart_vp',
                    data:{
                       x: 'x',
                        columns: [
                            ['x', 1,2,3,4,5,6,7,8,9,10,11,12],
                            final_vp
                        ],
                        colors:{
                           'Chi phí văn phòng': '#47ac47',
                        },
                        type: 'spline'
                    }
                });
            });
            $.get( "./ajax/get_array_chi_phi_nhan_su", function( data ) {
                var final_ns =  array_ns.concat(JSON.parse(data));
                c3.generate({
                    bindto: '#chart_ns',
                    data:{
                        x: 'x',
                        columns: [
                            ['x', 1,2,3,4,5,6,7,8,9,10,12],
                            final_ns
                        ],
                        colors:{
                            'Chi phí nhân sự': '#e80b92',
                        }
                       
                    }
                });
            });
            
           
            c3.generate({
                bindto: '#chart_tong_hop',
                data:{
                    x: 'x',
                    columns: [
                        ['x', 1,2,3,4,5,6,7,8,9,10,12],
                        ['Chi phí doanh thu', 1200, 2002, 109, 4999, 1509, 2399],
                        ['Chi phí văn phòng', 3022, 2022, 1999, 4099, 1999, 2999],
                        ['Chi phí nhân sự', 3599, 2009, 1099, 4009, 1599, 2299]
                    ],
                    colors:{
                        'Doanh thu': '#006DF0',
                        'Chi phí văn phòng': '#47ac47',
                        'Chi phí nhân sự': '#e80b92'
                    },
                    type: 'bar'
                }
            });
            

})(jQuery); 