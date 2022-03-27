@extends('layouts.app')

@section('content')
    <div class="container" >
        <div class="container mt-5" style=" border: 15px; border-bottom: solid;border-left: solid;border-right: solid">
            <ul class="m-0 nav nav-fill nav-justified nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class=" nav-link" id="110-tab" data-bs-toggle="tab" data-bs-target="#db110"
                            type="button" role="tab" aria-controls="110" aria-selected="true"><i
                            class="fas fa-home"></i> 10.1.12.110
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="active nav-link" id="75-tab" data-bs-toggle="tab" data-bs-target="#db75"
                            type="button" role="tab" aria-controls="75" aria-selected="false"><i
                            class="fas fa-user-astronaut"></i> 10.1.12.75
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="db100-tab" data-bs-toggle="tab" data-bs-target="#db100"
                            type="button" role="tab" aria- ="db100" aria-selected="false"><i
                            class="far fa-envelope-open"></i> 10.1.12.100
                    </button>
                </li>
            </ul>
            <div class="border-grey bg-white p-3 tab-content">

                <div class="tab-pane " id="db110" role="tabpanel" aria-labelledby="110-tab">

                    @include('zip-download')
                </div>

                <div class="tab-pane active" id="db75" role="tabpanel" aria-labelledby="75-tab">
                    @include('zip75-download')
                </div>
                <div class="tab-pane" id="db100" role="tabpanel" aria-labelledby="db100-tab">
                    <p>10.1.12.100</p>
                </div>
            </div>
        </div>
@endsection




