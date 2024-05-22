@extends('adminlte::page')

@section('title', 'Form Example')

@section('content_header')
    <h1 class="mb-0 text-dark">Form Example</h1>
@stop

@section('plugins.Select2', true)

@section('content')
    <div class="max-1200">
        <form action="{{ route('test.form.save') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="card-title">basic form</h1>
                        <x-adminlte-input name="search" placeholder="search" igroup-size="md" fgroup-class="mb-0" class="border-danger">
                            <x-slot name="appendSlot">
                                <x-adminlte-button theme="outline-danger" label="Go!" />
                            </x-slot>
                            <x-slot name="prependSlot">
                                <div class="input-group-text text-danger border-danger">
                                    <i class="fas fa-search"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>
                <div class="card-body">
                    <x-adminlte-input class="rounded-0" name="basic" label="basic" placeholder="basic" :value="old('basic', @$basic)" />
                    <x-adminlte-input class="rounded-0" name="email" label="email" placeholder="example@mail.com" :value="old('email', @$email)" type="email" />
                    <x-adminlte-input class="rounded-0" name="password" label="password" :value="old('password', @$password)" type="password" />

                    @php
                        $person_config = [
                            "placeholder" => "Select multiple options...",
                            "allowClear" => true,
                        ]
                    @endphp
                    <x-adminlte-select2 id="person" name="person[]" label="person" label-class="text-info" igroup-size="md" :config="$person_config" multiple>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-blue">
                                <i class="fas fa-tag"></i>
                            </div>
                        </x-slot>
                        @foreach (range(0,10) as $item)
                            <option>{{ fake()->name() }}</option>
                        @endforeach
                    </x-adminlte-select2>

                    <x-adminlte-select2 id="user" name="user[]" label="user" label-class="text-info" igroup-size="md" :config="[
                        'placeholder' => 'Select multiple options...',
                        'allowClear' => true,
                        'ajax' => [
                            'url' => route('admin.user.select2', ['selected_id' => 1]),
                            'dataType' => 'json'
                        ]
                    ]" multiple />

                    <div class="text-right">
                        <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success" icon="fas fa-sm fa-save" />
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

{{-- @push('js')
    <script>
        $('#user').select2({
            ajax: {
                url: @json(route('admin.user.select2')),
                dataType: 'json'
            },
            placeholder: 'Pilih User',
            theme: 'bootstrap4',
        })
    </script>
@endpush --}}