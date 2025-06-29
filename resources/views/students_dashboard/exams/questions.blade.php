@extends('students_dashboard.layouts.master')
@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                {{trans('trainingCenter.StudentDetails')}}</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">

                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">
                        {{trans('Toolbar.home')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    {{trans('Toolbar.Student')}}
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.TrainingCenter.Student.index') }}"
                       class="text-muted text-hover-primary">{{trans('Toolbar.Students')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    {{trans('Toolbar.StudentDetails')}}
                </li>


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="d-flex">
            </div>
            <!--end::Filter menu-->
            <!--begin::Secondary button-->
            <!--end::Secondary button-->
            <!--begin::Primary button-->
            <!--end::Primary button-->
        </div>
        <!--end::Actions-->

    </div>
    <!--end::Toolbar container-->
@endsection
@section('content')

    <div id="kt_app_content_container" class="app-container container-xxxl">

        <div class="card card-flush">

            <div class="card-body pt-0">
                <!--begin::Navbar-->
                <div class="card mb-5 mb-xxl-8">
                    <div class="card-body pt-9 pb-0">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap mb-6">

                            <!--begin::Wrapper-->
                            <div class="flex-grow-1">
                                <!--begin::Head-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::Details-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Status-->
                                        <div class="d-flex align-items-center mb-1">
                                            <a href="#"
                                               class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">{{$exam->name}}</a>
                                            <span class="badge badge-light-success me-auto">In Progress</span>
                                        </div>
                                        <!--end::Status-->
                                        <!--begin::Description-->
                                        <div
                                            class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-500">{{$exam->coursesData->title}}</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Actions-->
                                    <div class="d-flex mb-4">
                                        <button type="button"
                                                class="btn btn-sm btn-bg-light btn-active-color-primary me-3"
                                                id="startBtn">Start
                                        </button>
                                        <button class="btn btn-sm btn-primary me-3" type="button" id="pauseBtn">Pause
                                        </button>
                                        <button id="resetBtn">Reset</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Head-->
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap justify-content-start">
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-calendar  fs-3 text-success me-2  ">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="fs-4 fw-bold">{{formatDateDayDisplay($exam->date)}}</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-time fs-3 text-danger me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="fs-4 fw-bold" data-kt-countup="true"
                                                     data-kt-countup-value="{{$exam->duration}}">{{$exam->duration}}</div>
                                                <input type="hidden" id="minutes" min="1" value="{{$exam->duration}}">

                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div
                                                class="fw-semibold fs-6 text-gray-500">{{trans('exams.duration')}}</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-timer      fs-3 text-success me-2 ">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                                <div class="fs-4 fw-bold" id="timer">0
                                                </div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                        {{--                                            <div class="fw-semibold fs-6 text-gray-500">Budget Spent</div>--}}
                                        <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    </div>
                                    <!--end::Stats-->

                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Details-->
                        <div class="separator"></div>

                    </div>
                </div>
                <!--end::Navbar-->

                <form action="{{ route('student.Exams.submitAnswers') }}" method="POST" class="mb-10">
                    @csrf
                    <input type="hidden" name="exam_id" value="{{ $exam->id }}">

                    <!--begin::Timeline-->
                    <div class="timeline timeline-border-dashed">
                    @foreach($questions as $question)
                        <!--begin::Timeline item-->
                            <div class="timeline-item">
                                <!--begin::Timeline line-->
                                <div class="timeline-line"></div>
                                <!--end::Timeline line-->
                                <!--begin::Timeline icon-->
                                <div class="timeline-icon">
                                    <i class="ki-duotone ki-message-text-2 fs-2 text-gray-500">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </div>
                                <!--end::Timeline icon-->
                                <!--begin::Timeline content-->
                                <div class="timeline-content mb-10 mt-n1">
                                    <!--begin::Timeline heading-->
                                    <div class="pe-3 mb-5">
                                        <!--begin::Title-->
                                        <div class="fs-5 fw-semibold mb-2">{{$question->q_text}}</div>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center mt-1 fs-6">

                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Timeline heading-->
                                    <!--begin::Timeline details-->
                                    <div class="overflow-auto pb-5">
                                        <div class="row p-2">
                                            @foreach($question->q_choices as $key=>$choices)
                                                <div class="form-check form-check-custom form-check-solid col m-2">
                                                    <input class="form-check-input" name="question[{{$question->id}}]"
                                                           type="radio" value="{{$choices}}"
                                                           id="flexRadioDefault{{$question->id}}-{{$key}}"/>
                                                    <label class="form-check-label"
                                                           for="flexRadioDefault{{$question->id}}-{{$key}}">
                                                        {{$choices}}
                                                    </label>
                                                </div>

                                            @endforeach
                                            {{--                                                                            {{dd($question->q_choices)}}--}}


                                        </div>
                                    </div>
                                    <!--end::Timeline details-->
                                </div>
                                <!--end::Timeline content-->
                            </div>
                            <!--end::Timeline item-->
                        @endforeach
                    </div>
                    <!--end::Timeline-->
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="fas fa-save"></i> {{ trans('exams.Add') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>


@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const timerDisplay = document.getElementById('timer');
            const startBtn = document.getElementById('startBtn');
            const pauseBtn = document.getElementById('pauseBtn');
            const resetBtn = document.getElementById('resetBtn');
            const minutesInput = document.getElementById('minutes');

            let timeLeft = 0;
            let timerInterval = null;
            let isRunning = false;

            // Format time as MM:SS
            function formatTime(seconds) {
                const mins = Math.floor(seconds / 60);
                const secs = seconds % 60;
                return `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
            }

            // Update the timer display
            function updateDisplay() {
                timerDisplay.textContent = formatTime(timeLeft);
            }

            // Start the timer
            function startTimer() {
                if (isRunning) return;

                if (timeLeft <= 0) {
                    timeLeft = parseInt(minutesInput.value) * 60;
                }

                isRunning = true;
                timerInterval = setInterval(() => {
                    timeLeft--;
                    updateDisplay();

                    if (timeLeft <= 0) {
                        clearInterval(timerInterval);
                        isRunning = false;
                        alert('Time is up!');
                    }
                }, 1000);
            }

            // Pause the timer
            function pauseTimer() {
                if (!isRunning) return;
                clearInterval(timerInterval);
                isRunning = false;
            }

            // Reset the timer
            function resetTimer() {
                pauseTimer();
                timeLeft = parseInt(minutesInput.value) * 60;
                updateDisplay();
            }

            // Event listeners
            startBtn.addEventListener('click', startTimer);
            pauseBtn.addEventListener('click', pauseTimer);
            resetBtn.addEventListener('click', resetTimer);

            // Initialize the display
            resetTimer();
        });
    </script>
@endsection
