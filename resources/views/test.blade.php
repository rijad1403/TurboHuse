<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body>

    <style>
        .loader {
            border: 10px solid #f3f3f3;
            border-radius: 50%;
            border-top: 10px solid #3498db;
            width: 20px;
            height: 20px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>



    <form id="form" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple id="">
        <button type="submit">Spremi</button>
        <div></div>
    </form>

    <button id="button" disabled="true">Spremi artikl</button>
    <div class="loader" style="display: none"></div>




    <script>
        $(document).ready(() => {
            $('#form').on('submit', (event) => {
                $('.loader').css('display',' block');
                event.preventDefault();
                $.ajax({
                    // url: 'http://127.0.0.1:8000/upload',
                    url: 'https://shielded-gorge-54004.herokuapp.com/testPage',
                    method: 'POST',
                    data: new FormData($('#form')[0]),
                    dataType: 'JSON',
                    contentType: false,
                    cache:false,
                    processData: false,
                    success: (data) => {
                        $('.loader').css('display',' none');
                        $('#button').prop('disabled', false);
                    }


                })
            })
        });
    </script>


</body>

</html>
