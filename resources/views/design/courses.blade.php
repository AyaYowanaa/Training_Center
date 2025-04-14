@extends('dashbord.layouts.master')

@section('toolbar')
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack ">
        <!--begin::Page title-->
        <div  class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"> courses</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless   fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">
                        {{trans('Toolbar.home')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.UserManagement.users.index') }}" class="text-muted text-hover-primary">{{trans('Toolbar.users')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.UserManagement.users.create') }}" class="text-muted text-hover-primary">{{trans('users.create')}}</a>
                </li>


            </ul>
            <!--end::Breadcrumb-->
        </div>

    </div>
    <!--end::Toolbar container-->
@endsection

@section('content')

    <div id="kt_app_content_container" class="app-container  container-fluid ">
    <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="card py-4">

                    <div class="card-header">
                        <h2>Setup your Course</h2>
                    </div>

                    <div class="card-body pt-15">
      <div class="row justify-content">
                             <div class="col-md-10">
                                <div class="progress px-1" style="height: 3px;background: var(--bs-border-color);">
                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                        <div class="step-container d-flex justify-content-between">
                            <div class="step-circle" onclick="displayStep(1)">1</div>
                            <div class="step-circle" onclick="displayStep(2)">2</div>
                            <div class="step-circle" onclick="displayStep(3)">3</div>
                            <div class="step-circle" onclick="displayStep(4)">4</div>
                        </div>
                            </div>
                        </div>
                        <form id="multi-step-form" action="#" method="post">
                            <!-- Step 1 form fields here -->
                            <div class="step step-1">
                                 <h2 class="mb-121 ">Info</h2>
                                <h3 class="mb-25 ">Basic course data</h3>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-5">
                                            <div>
                                                <label for="password1" class="required form-label"> Course Name</label>
                                            </div>
                                            <div>
                                                <input name="session_name" type="text" class="form-control mb-2" required="required">
                                                <!-- <p class="requiredinput">required</p>-->
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-5">
                                            <div >
                                                <label for="password1" class="required form-label">Short Description</label>
                                            </div>
                                            <div >
                                                <textarea   name="short_description" type="textarea" class="form-control form-control-solid"  required="required" cols="50" rows="4"></textarea>
                                            </div>
                                        </div>
                                        </div>
                                      </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-5">
                                            <div>
                                                <label for="Course" class="form-label">Course Description</label>
                                            </div>
                                            <div>
                                                <textarea  name="description" type="textarea" class=" form-control form-control-solid ckeditor1" data-options="required:true" id="description" cols="50" rows="4"></textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-5">
                                            <div>
                                                <label for="introduction" class="form-label">Introduction</label>
                                            </div>
                                            <div>
                                                <textarea   name="introduction" type="textarea" class="  form-control form-control-solid ckeditor1"   id="introduction" cols="50" rows="4"></textarea>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <button type="button" class="btn btn-primary mt-3 next-step float1">Next Step</button>
                            </div>

                            <!-- Step 2 form fields here -->
                            <div class="step step-2">
                                <h2 class="mb-121 ">Options</h2>
                                <h3 class="mb-25 ">Course Options</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <div >
                                                <label for="password1" class="form-label">Payment Required</label>
                                            </div>
                                            <div >
                                                <select type="select" name="payment_required" class="form-select form-control mb-2" data-options="required:true" required="required"><option value="0">No</option><option value="1">Yes</option></select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <div >
                                                <label for="password1" class="form-label">Course Fee</label>
                                            </div>
                                            <div >
                                                <input name="amount" type="text" class="form-control mb-2" data-options="required:true" placeholder="Digits only. Optional">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <div >
                                                <label for="password1" class="form-label">Effort</label>
                                            </div>
                                            <div >
                                                <input name="effort" type="text" class="form-control mb-2 " data-options="required:true" placeholder="Example: 6 hours per week">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <div >
                                                <label for="password1" class="form-label">Length</label>
                                            </div>
                                            <div >
                                                <input name="length" type="text" class="form-control mb-2" data-options="required:true" placeholder="Example: 10 weeks">

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-5">

                                            <label for="password1" class="form-label">Course Categories (Optional)</label>
   <div>
  <select type="select" name="session_category_id[]" class="form-control select2" data-options="required:true" multiple="multiple">
      <option value="1">Programming</option>
      <option value="2">Business</option>
  </select>
                                             </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <div >
                                                <label for="password1" class="form-label">Status</label>
                                            </div>
                                            <div >
                                                <select type="select" name="session_status" class="form-select form-control mb-2" data-options="required:true" required="required">
                                                    <option value="0">Disabled</option>
                                                    <option value="1">Enabled</option>
                                                </select>
                                             </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <div >
                                                <label for="enable_discussion" class="form-label">Enable Discussions?</label>
                                            </div>
                                            <div >
                                                <select type="select" name="enable_discussion" class="form-select form-control mb-2" data-options="required:true" required="required">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                             </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <div >
                                                <label for="password1" class="form-label"><label for="enable_chat">Enable Live Chat</label></label>
                                            </div>
                                            <div >
                                                <select type="select" name="enable_chat" class="form-select form-control mb-2" data-options="required:true" required="required" id="enable_chat">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <div >
                                                <label for="enable_discussion" class="form-label">Enforce Class Order </label>
                                            </div>
                                            <div >
                                                <select type="select" name="enforce_order" class="form-select" data-options="required:true" required="required" id="enforce_order">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                             </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <div >
                                                <label for="enable_discussion" class="form-label">Enable Student Forum?</label>
                                            </div>
                                            <div >
                                                <select type="select" name="enable_forum" class="form-select form-control mb-2" data-options="required:true" required="required"><option value="1">Yes</option><option value="0">No</option></select>
                                             </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <div >
                                                <label for="enable_discussion" class="form-label">Capacity</label>
                                            </div>
                                            <div >
                                                <input name="capacity" type="text" class="form-control mb-2" data-options="required:true" placeholder="Digits only. Optional">
                                             </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <div >
                                                <label for="enable_discussion" class="form-label">Enforce Capacity</label>
                                            </div>
                                            <div >
                                                <select type="select" name="enforce_capacity" class="form-select form-control mb-2" data-options="required:true" required="required">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-wizard mt-3 prev-step float1">Previous step</button>
                                <button type="button" class="btn btn-primary mt-3 next-step float1">Next step</button>
                            </div>

                            <!-- Step 3 form fields here -->
                            <div class="step step-3">
                                <h2 class="mb-121 ">Scheduling</h2>
                                <h3 class="mb-25 ">Start & End Dates</h3>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <div >
                                                <label for="password1" class="form-label">Course Start Date (Optional)</label>
                                            </div>
                                            <div >
                                                <input name="session_date" type="date" class="form-control mb-2">
                                             </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <div>
                                                <label for="session_end_date" class="form-label">Course End Date (Optional)</label>
                                            </div>
                                            <div >
                                                <input name="session_end_date" type="date" class="form-control mb-2">
                                             </div>
                                        </div>
                                    </div>
                                                </div>

                                <div class="row">
                                   <div class="col-md-6">
                                        <div class="mb-5">
                                            <div >
                                                <label for="enrollment_closes" class="form-label">Enrollment Closes (Optional)</label>
                                            </div>
                                            <div >
                                                <input name="enrollment_closes" type="text" class="form-control mb-2">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <button type="button" class="btn btn-wizard mt-3  prev-step float1">Previous step</button>
                                <button type="button" class="btn btn-primary mt-3 next-step float1">Next step</button>
                            </div>

                            <!-- Step 4 form fields here -->
                            <div class="step step-4">
                                <h2 class="mb-121 ">Instructors</h2>
                                <h3 class="mb-25 ">Course Instructors</h3>

                                 <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-5">
                                       <label for="session_instructor" class="form-label">Course Instructors (Optional)</label>
                                        <select type="select" name="session_instructor" class="form-control mb-2 select2" data-options="required:true" multiple="multiple">
                                                <option value="2">John (admin@email.com)</option>
                                            </select>
                                          </div>
                                    </div>

                                </div>
                                <button type="button" class="btn btn-wizard mt-3 prev-step float1">Previous step</button>
                                <button type="submit" class="btn btn-success mt-3 float1">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
    </div>



@endsection

@section('css')

@endsection

@section('js')

@endsection