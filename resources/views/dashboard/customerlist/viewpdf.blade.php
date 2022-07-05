<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <style type="text/css">
        *{
        font-family: "DejaVu Sans";
        font-size: 8px;
        margin: 0%;
        padding: 0%;
        }
        .text{
            color: white;
            font-size: 5rem;
            display: flex;
            position: relative;
            left: 100px;
            top:700px ;

        }
        .text2{
            color:black;
            font-size: 30px;
            display: flex;
            position: relative;
            left: 10px;
            top:30px ;

        }
        .text3{
            color:black;
            font-size: 18px;
            display: flex;
            position: relative;
            left: 10px;
            top:50px ;

        }
        .text4{

            display: flex;
            position: relative;
            left: 60px;
            /* top:50px ; */

        }
        .text5{

                display: flex;
                position: relative;
                left: 60px;
                top:50px ;

              }
              .texts{

                    display: flex;
                    position: relative;
                    left: 360px;
                    /* top:50px ; */

                   }
        .linkimg{
            /* color:rgb(231, 27, 27); */
            /* font-size: 25px; */
            margin: 0px;
            display: flex;
            position: relative;
            /* left: 10px; */
            top:50px ;

        }
        .p1 {
            color:black;
            width: 290px;
            display: flex;
            position: relative;
            left: 10px;
            top:40px ;

        }
        .p1 p {
            font-size: 20px;


        }
        .upn  {
        /* background-image:url('img/pdf-layer-2.jpg'); */
    background: url(img/pdf-layer-2.jpg) no-repeat center bottom;


        /* background-repeat: no-repeat; */
        background-size: cover;
        /* margin: 10px 0px 0px 0px; */
        /* background-repeat:no-repeat; */
        width: 100%;
        height: 900px;

        /* background-position: center; */
        background-position: 90% 10%;

        }
        .full{

        }
        .qrmobile{
            display: flex;
            position: relative;
            left: 240px;
            top:170px ;

        }
        .QR-card{
            width: 150px;
            height: 150px;
            color: black;
            /* display: flex;
            position: relative;
            left: 10px;
            top:170px ; */


               }
        /* .rotate{
            margin: 0;
            overflow: hidden;
            transform-origin: right;
            transform: translate(-100vw, 0) rotate(180deg);
            writing-mode: vertical-rl;
                } */





     </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <meta http-equiv="Content-Type" content="charset=utf-8" />
        <meta charset="UTF-8">




</head>
  <body>

    <div class="full">
        @foreach ($test_pdf as $pdf)
            @foreach ($pdf->customer_lists as $customer_list)
            <div class="upn">
                <h1 class="text">{{ $pdf->name }} <br> für <br> Max Mustermann</h1>
            </div>
    </div>
            <div class="rotate">

                <h2 class="text2">Hallo {{ $pdf->name }} </h2>

                <div class="p1">
                <p >Ihre aktuelle Brille tragen Sie nun schon einige Zeit auf der Nase. Gut möglich, dass sich Ihre Werte schon verändert haben. Testen Sie das doch schnell mit Ihrem ganz persönlichen Sehtest. </p>
                </div>

                <h6 class="text3">Hier geht es zu Ihrem Sehtest</h6>

                <img src="img/linkbg.png" class="linkimg" alt="">

                <h1 class="text4">{{ $customer_list->opticians->url_homepage }}{{ $customer_list->opticians->id }}/{{ $customer_list->opticians->name }}</h1>

                <h1 class="text5" >Order  QR-Code   scannen </h1>

                <img src="img/qrmobile.png" class="qrmobile" width="60px" alt="">

                <div class="QR-card">
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::size(200)->generate('{{ $customer_list->opticians->url_homepage }}{{ $customer_list->opticians->id }}/{{ $customer_list->opticians->name }}')) !!} ">

                </div>

                <div class="texts">
                    <h1>Order  QR-Code</h1>
                    <h1>Order  QR-Code</h1>
                    <h1>Order  QR-Code</h1>


                </div>

            </div>
            @endforeach
        @endforeach


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
