@extends('layouts.admin')
@section('styles') 
<style>
	select{
		font-family: fontAwesome
	}
</style>
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.taskStatus.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.task-statuses.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.taskStatus.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskStatus.fields.name_helper') }}</span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="icon">{{ trans('cruds.taskStatus.fields.icon') }}</label> 
                        <select name="icon" class="form-control">
                            <option value='fa-check'>&#xf00c; fa-check</option>
                            <option value='fa-check-circle'>&#xf058; fa-check-circle</option>
                            <option value='fa-check-circle-o'>&#xf05d; fa-check-circle-o</option>
                            <option value='fa-check-square'>&#xf14a; fa-check-square</option>
                            <option value='fa-check-square-o'>&#xf046; fa-check-square-o</option>
                            <option value='fa-ban'>&#xf05e; fa-ban</option>
                            <option value='fa-adjust'>&#xf042; fa-adjust</option>
                            <option value='fa-battery'>&#xf240; fa-battery</option>
                            <option value='fa-battery-0'>&#xf244; fa-battery-0</option>
                            <option value='fa-battery-1'>&#xf243; fa-battery-1</option>
                            <option value='fa-battery-2'>&#xf242; fa-battery-2</option>
                            <option value='fa-battery-3'>&#xf241; fa-battery-3</option>
                            <option value='fa-battery-4'>&#xf240; fa-battery-4</option>
                            <option value='fa-battery-empty'>&#xf244; fa-battery-empty</option>
                            <option value='fa-battery-full'>&#xf240; fa-battery-full</option>
                            <option value='fa-battery-half'>&#xf242; fa-battery-half</option>
                            <option value='fa-battery-quarter'>&#xf243; fa-battery-quarter</option>
                            <option value='fa-battery-three-quarters'>&#xf241; fa-battery-three-quarters</option>
                            <option value='fa-bell'>&#xf0f3; fa-bell</option>
                            <option value='fa-bell-o'>&#xf0a2; fa-bell-o</option>
                            <option value='fa-bell-slash'>&#xf1f6; fa-bell-slash</option>
                            <option value='fa-bell-slash-o'>&#xf1f7; fa-bell-slash-o</option>
                            <option value='fa-edit'>&#xf044; fa-edit</option>
                            <option value='fa-hourglass'>&#xf254; fa-hourglass</option>
                            <option value='fa-hourglass-1'>&#xf251; fa-hourglass-1</option>
                            <option value='fa-hourglass-2'>&#xf252; fa-hourglass-2</option>
                            <option value='fa-hourglass-3'>&#xf253; fa-hourglass-3</option>
                            <option value='fa-hourglass-end'>&#xf253; fa-hourglass-end</option>
                            <option value='fa-hourglass-half'>&#xf252; fa-hourglass-half</option>
                            <option value='fa-hourglass-o'>&#xf250; fa-hourglass-o</option>
                            <option value='fa-hourglass-start'>&#xf251; fa-hourglass-start</option>
                            <option value='fa-refresh'>&#xf021; fa-refresh</option>
                            <option value='fa-remove'>&#xf00d; fa-remove</option>
                            <option value='fa-close'>&#xf00d; fa-close</option>
                        </select>
                        @if($errors->has('icon'))
                            <div class="invalid-feedback">
                                {{ $errors->first('icon') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.taskStatus.fields.icon_helper') }}</span>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="icon_color">{{ trans('cruds.taskStatus.fields.icon_color') }}</label>
                        <input class="form-control {{ $errors->has('icon_color') ? 'is-invalid' : '' }}" type="color" name="icon_color" id="icon_color" value="{{ old('icon_color', '') }}" required>
                        @if($errors->has('icon_color'))
                            <div class="invalid-feedback">
                                {{ $errors->first('icon_color') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.taskStatus.fields.icon_color_helper') }}</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection