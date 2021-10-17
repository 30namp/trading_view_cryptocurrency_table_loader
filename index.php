<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .loader {
            height: 0;
            width: 0;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="loader">
        <?php
        echo file_get_contents('https://www.tradingview.com/markets/cryptocurrencies/prices-all/');
        ?>
    </div>
    <table class="test">
        <tbody>

        </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>

<script>
    function get_tr_data(n) {
        let object = $('#js-screener-container > div > table > tbody > tr:nth-child(' + n + ') > td:nth-child(1) a');
        let object2 = $('#js-screener-container > div > table > tbody > tr:nth-child(' + n + ') > td');
        let a = Array(object2.length);
        a[0] = object.text();
        for (let i = 1; i < a.length; i++) {
            a[i] = object2[i].innerHTML;
        }
        return a;
    }

    let data = Array($('#js-screener-container > div > table > tbody')[0]['childNodes'].length);
    for (let i = 0; i < data.length; i++) {
        data[i] = get_tr_data(i + 1);
    }

    for (let i = 0; i < data.length; i++) {
        let tr = document.createElement('tr');
        for (let j = 0; j < data[i].length; j++) {
            let td = document.createElement('td');
            td.innerHTML = data[i][j];
            tr.appendChild(td);
        }
        document.querySelector('.test > tbody').appendChild(tr);
    }
</script>