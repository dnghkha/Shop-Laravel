@extends('admin.layout.master')
@section('content')

<div class="row">
    @if (session('msg'))
    <div class="col-md-12">
        <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
            <strong>{!!session('msg')!!}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="">Tên người dùng: {{$user->Firstname.' '.$user->Lastname}}</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="text-center text-primary">
                    <h3>Danh sách quyền</h3>
                </div>
                <form method="POST" action="{{route('admin.role.update', $user->id)}}">
                    @csrf
                    @method('PUT')
                    @foreach ($func as $item)
                    @if ($item->parent_id == 0)
                    <div class="form-group card">
                        <div class="card-header">
                            <label class="text-primary mb-0 btn-link" data-toggle="collapse"
                                data-target="#role{{$item->id}}">
                                <h6>{{$item->name}}</h6>
                            </label>
                        </div>
                        <div class="collapse m-2" id="role{{$item->id}}">
                            @foreach ($func as $item2)
                            @if ($item2->parent_id == $item->id)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input @isset($role[$item2->id])
                                    checked
                                    @endisset type="checkbox" class="form-check-input" name="func[]" id=""
                                    value="{{$item2->id}}">
                                    {{$item2->name}}
                                </label>
                            </div>
                            @endif
                            @endforeach
                        </div>

                    </div>
                    @endif
                    @endforeach
                    <div class="text-center">
                        <a href="{{route('admin.role.index')}}" class="btn btn-primary">Trở về</a>
                        <button type="submit" class="btn btn-success">Ghi</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection