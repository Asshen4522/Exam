@extends('layout.app')
@section('body')
<div class="entry">
    <? \App\Http\Controllers\FunctionController::MainRequest() ?>
</div>

@endsection
