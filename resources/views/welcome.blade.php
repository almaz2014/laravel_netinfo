@extends('layouts.app')
@section('content')


    <h4>Поиск по Сетевому журналу</h4>
    {!! Form::open(['action' => 'SearchMeController@find','method'=>'get','class'=>'form-horizontal']) !!}

    <div class="form-group">
        {{Form::label('search','Search')}}
        {{Form::text('search','',['class'=>'form-control','placeholder'=>'Enter search text here ...'])}}
    </div>

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-outline-secondary" id="ajaxSubmit">
        Show in window
    </button>
    {!! Form::close() !!}


<div id="divid"></div>
    <script>
        $(document).ready(function() {
            $('#ajaxSubmit').click(function (e) {
                // e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('/ajax') }}",
                    method: 'post',
                    data: {
                        search: $('#search').val()
                    },
                    success: function (result) {
                        $("#modalbody").html(result);
                        //alert(result);
                        //console.log(result);
                    }
                });
                $("#myModal").modal('show');
            });
        });


        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $( "#search" ).autocomplete({
            source: "/ajaxc", // url-адрес
            minLength: 2, // минимальное количество для совершения запроса
            delay:1000
        });

        });


    </script>




    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Результат поиска</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="modalbody">
                    Modal body..
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

            @endsection