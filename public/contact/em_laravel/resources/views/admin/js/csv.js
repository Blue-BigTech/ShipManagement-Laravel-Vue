$ (function() {
    $ ('.csv_down_load').on ('click', function() {

        let d = [];
        let c = [];
        $ ('#data_table tr').each (function(i, e) {
            let dd = [];
            let cc = [];
            if (i === 0) {
                $ (this).find ('th').each (function(j, el) {
                    if (!$ (this).hasClass ("csv_skip")) {
                        cc.push ('"' + $ (this).text ().trim () + '"');
                    }
                })
                c.push (cc);
            }
            else {
                $ (this).find ('td').each (function(j, el) {
                    if (!$ (this).hasClass ("csv_skip")) {
                        dd.push ('"' + $ (this).text ().trim () + '"');
                    }
                })
                d.push (dd);
            }
        })
        let array_data = $.merge (c, d);
        console.log (array_data);


        // 配列 の用意
        // let array_data = [
        //     [ 'りんご', 1, 200 ],
        //     [ 'メロン', 2, 4000 ],
        //     [ 'バナナ', 4, 500 ]
        // ];

        // BOM の用意（文字化け対策）
        let bom = new Uint8Array ([ 0xEF, 0xBB, 0xBF ]);

        // CSV データの用意
        let csv_data = array_data.map (function(l) {return l.join (',')}).join ('\r\n');

        let blob = new Blob ([ bom, csv_data ], { type: 'text/csv' });

        let url = (window.URL || window.webkitURL).createObjectURL (blob);

        let a = document.getElementById ('csv_downloader');
        a.download = 'data.csv';
        a.href = url;

        // ダウンロードリンクをクリックする
        $ ('#csv_downloader')[0].click ();

    });
});
