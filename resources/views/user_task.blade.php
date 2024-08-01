@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{__('User Task Form')}</div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                    @endif
                </div>

                <form action="{{ url('user_task') }}" method="POST">
        @csrf
        <div class="row mb-3 mx-3">
        <label for="task_name">Task Name</label>
        <input type="text" id="name" name="task_name" class="form-control @error('task_name') is-invalid @enderror" value="{{ old('task_name') }}">
        @error('task_name')
        <div class="invalid-feedback p-0" role="alert">{{ $message }}</div>
        @enderror
        </div>

        <div class="invalid-feedback p-0" role="alert">
            <label for="status">Status:</label>
            <select name="status" id="status">
            <option value="">--</option>
            <option value="pending">Pending</option>
            <option value="on_progress">On Progress</option>
            <option value="completed">Completed</option>
            </select>
            @error('status')
               <divdiv class="invalid-feedback p-0" role="alert">{{$message}}</div>
            @enderror
        </div>

        <div class="invalid-feedback p-0" role="alert">
            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="5" style="width:100%" class="form-control @error('task_name') is-invalid @enderror"></textarea>
            @error('description')
              <div>{{$message}}</div>
            @enderror
        </div>

        <div class="invalid-feedback p-0" role="alert">
            <label for="deadline">Deadline:</label>
            <input type="date" id="deadline" name="deadline" value="{{ old('deadline') }}"/>
            @error('deadline')
              <div>{{$message}}</div>
            @enderror
        </div>
        

        <div>
            <button type="submit">Submit</button>
        </div>

    </form>


            </div>
        </div>
    </div>
</div>
@endsection
