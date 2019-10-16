@extends('admin.main')

@section('box')
    <div class="box">
        <h3>应用列表</h3>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">名称</th>
                <th scope="col">秘钥</th>
                <th scope="col">重定向</th>
                <th scope="col">创建时间</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $row)
                <tr>
                    <td scope="row">{{ $row->name  }}</td>
                    <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#secret-modal" data-secret="{{ $row->secret }}">点击查看</button></td>
                    <td>{{ $row->redirect  }}</td>
                    <td>{{ $row->created_at  }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="secret-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">查看秘钥</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-primary" role="alert">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')
    <script>
        $('#secret-modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var secret = button.data('secret')
            var modal = $(this)
            modal.find('.modal-body .alert').text(secret)
        })
    </script>
@endsection