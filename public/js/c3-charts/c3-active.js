(function ($) {
 "use strict";


            c3.generate({
                bindto: '#chart_dt',
                data:{
                   x: 'x',
                    columns: [
                        ['x', 1,2,3,4,5,6,7,8,9,10,12],
                        ['Chi phí doanh thu', 30, 200, 100, 400, 150, 250]
                    ],
                    colors:{
                       ' Chi phí doanh thu': '#006DF0',
                    },
                    type: 'bar'
                }
                
            });
            c3.generate({
                bindto: '#chart_vp',
                data:{
                    x: 'x',
                    columns: [
                        ['x', 1,2,3,4,5,6,7,8,9,10,12],
                        ['Chi phí văn phòng', 30, 200, 100, 400, 150, 250]
                    ],
                    colors:{
                        'Chi phí văn phòng': '#47ac47',
                    },
                    type: 'bar'
                }
            });
            c3.generate({
                bindto: '#chart_ns',
                data:{
                    x: 'x',
                    columns: [
                        ['x', 1,2,3,4,5,6,7,8,9,10,12],
                        ['Chi phí nhân sự', 30, 200, 100, 400, 150, 250]
                    ],
                    colors:{
                        'Chi phí nhân sự': '#e80b92',
                    },
                    type: 'bar'
                }
            });
            c3.generate({
                bindto: '#chart_tong_hop',
                data:{
                    x: 'x',
                    
                    columns: [
                        ['x', 1,2,3,4,5,6,7,8,9,10,12],
                        ['Doanh thu', 300000, 2000000, 100000, 4000000, 15000000, 2503123],
                        ['Chi phí văn phòng', 3000, 2002222, 100999, 400999, 150999, 2509999],
                        ['Chi phí nhân sự', 30999, 200999, 100999, 400999, 150999, 2509999]
                    ],
                    colors:{
                        'Doanh thu': '#006DF0',
                        'Chi phí văn phòng': '#47ac47',
                        'Chi phí nhân sự': '#e80b92'
                    },
                    type: 'spline'
                }
            });

})(jQuery); 