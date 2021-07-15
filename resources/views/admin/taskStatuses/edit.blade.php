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
        {{ trans('global.edit') }} {{ trans('cruds.taskStatus.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.task-statuses.update", [$taskStatus->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.taskStatus.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $taskStatus->name) }}" required>
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
                            <option value='fa-check' @if($taskStatus->icon == 'fa-check') selected @endif>&#xf00c; fa-check</option>
                            <option value='fa-check-circle' @if($taskStatus->icon == 'fa-check-circle') selected @endif>&#xf058; fa-check-circle</option>
                            <option value='fa-check-circle-o' @if($taskStatus->icon == 'fa-check-circle-o') selected @endif>&#xf05d; fa-check-circle-o</option>
                            <option value='fa-check-square' @if($taskStatus->icon == 'fa-check-square') selected @endif>&#xf14a; fa-check-square</option>
                            <option value='fa-check-square-o' @if($taskStatus->icon == 'fa-check-square-o') selected @endif>&#xf046; fa-check-square-o</option>
                            <option value='fa-ban' @if($taskStatus->icon == 'fa-ban') selected @endif>&#xf05e; fa-ban</option>
                            <option value='fa-adjust' @if($taskStatus->icon == 'fa-adjust') selected @endif>&#xf042; fa-adjust</option>
                            <option value='fa-battery' @if($taskStatus->icon == 'fa-battery') selected @endif>&#xf240; fa-battery</option>
                            <option value='fa-battery-0' @if($taskStatus->icon == 'fa-battery-0') selected @endif>&#xf244; fa-battery-0</option>
                            <option value='fa-battery-1' @if($taskStatus->icon == 'fa-battery-1') selected @endif>&#xf243; fa-battery-1</option>
                            <option value='fa-battery-2' @if($taskStatus->icon == 'fa-battery-2') selected @endif>&#xf242; fa-battery-2</option>
                            <option value='fa-battery-3' @if($taskStatus->icon == 'fa-battery-3') selected @endif>&#xf241; fa-battery-3</option>
                            <option value='fa-battery-4' @if($taskStatus->icon == 'fa-battery-4') selected @endif>&#xf240; fa-battery-4</option>
                            <option value='fa-battery-empty' @if($taskStatus->icon == 'fa-battery-empty') selected @endif>&#xf244; fa-battery-empty</option>
                            <option value='fa-battery-full' @if($taskStatus->icon == 'fa-battery-full') selected @endif>&#xf240; fa-battery-full</option>
                            <option value='fa-battery-half' @if($taskStatus->icon == 'fa-battery-half') selected @endif>&#xf242; fa-battery-half</option>
                            <option value='fa-battery-quarter' @if($taskStatus->icon == 'fa-battery-quarter') selected @endif>&#xf243; fa-battery-quarter</option>
                            <option value='fa-battery-three-quarters' @if($taskStatus->icon == 'fa-battery-three-quarters') selected @endif>&#xf241; fa-battery-three-quarters</option>
                            <option value='fa-bell' @if($taskStatus->icon == 'fa-bell') selected @endif>&#xf0f3; fa-bell</option>
                            <option value='fa-bell-o' @if($taskStatus->icon == 'fa-bell-o') selected @endif>&#xf0a2; fa-bell-o</option>
                            <option value='fa-bell-slash' @if($taskStatus->icon == 'fa-bell-slash') selected @endif>&#xf1f6; fa-bell-slash</option>
                            <option value='fa-bell-slash-o' @if($taskStatus->icon == 'fa-bell-slash-o') selected @endif>&#xf1f7; fa-bell-slash-o</option>
                            <option value='fa-edit' @if($taskStatus->icon == 'fa-edit') selected @endif>&#xf044; fa-edit</option>
                            <option value='fa-hourglass' @if($taskStatus->icon == 'fa-hourglass') selected @endif>&#xf254; fa-hourglass</option>
                            <option value='fa-hourglass-1' @if($taskStatus->icon == 'fa-hourglass-1') selected @endif>&#xf251; fa-hourglass-1</option>
                            <option value='fa-hourglass-2' @if($taskStatus->icon == 'fa-hourglass-2') selected @endif>&#xf252; fa-hourglass-2</option>
                            <option value='fa-hourglass-3' @if($taskStatus->icon == 'fa-hourglass-3') selected @endif>&#xf253; fa-hourglass-3</option>
                            <option value='fa-hourglass-end' @if($taskStatus->icon == 'fa-hourglass-end') selected @endif>&#xf253; fa-hourglass-end</option>
                            <option value='fa-hourglass-half' @if($taskStatus->icon == 'fa-hourglass-half') selected @endif>&#xf252; fa-hourglass-half</option>
                            <option value='fa-hourglass-o' @if($taskStatus->icon == 'fa-hourglass-o') selected @endif>&#xf250; fa-hourglass-o</option>
                            <option value='fa-hourglass-start' @if($taskStatus->icon == 'fa-hourglass-start') selected @endif>&#xf251; fa-hourglass-start</option>
                            <option value='fa-refresh' @if($taskStatus->icon == 'fa-refresh') selected @endif>&#xf021; fa-refresh</option>
                            <option value='fa-remove' @if($taskStatus->icon == 'fa-remove') selected @endif>&#xf00d; fa-remove</option>
                            <option value='fa-close' @if($taskStatus->icon == 'fa-close') selected @endif>&#xf00d; fa-close</option>
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
                        <input class="form-control {{ $errors->has('icon_color') ? 'is-invalid' : '' }}" type="color" name="icon_color" id="icon_color" value="{{ old('icon_color', $taskStatus->icon_color) }}" required>
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
