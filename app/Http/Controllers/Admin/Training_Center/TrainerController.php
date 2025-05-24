<?php

namespace App\Http\Controllers\Admin\Training_Center;

use App\Http\Controllers\Controller;
use App\Models\training_center\Trainer;
use App\Models\training_center\Course;
use App\Models\training_center\Trainer_Files;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\training_center\Trainers\StoreRequest;
use App\Http\Requests\training_center\Trainers\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class TrainerController extends Controller
{
    protected $upload_folder = 'Instructors';

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $allData = Trainer::select('*');
            return Datatables::of($allData)
                ->editColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('courses_id', function ($row) {
                    return $row->coursesData?->name ?? '—';
                })
                ->addColumn('action', function ($row) {

                    return ' <a class="btn btn-icon btn-active-light-warning w-30px h-30px me-3 "
                                   href="' . route('admin.Settings.Instructor.edit', $row->id) . '"
                               title="' . trans('forms.edite_btn') . '">
                                    <i class="ki-duotone ki-notepad-edit fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </a>
                                <a class="btn btn-icon btn-active-light-info w-30px h-30px me-3 "
                                href="javascript:void(0)" data-kt-table-details="details_row" data-url="' . route('admin.Settings.Instructor.load_details', $row->id) . '"
                                   data-bs-toggle="modal" data-bs-target="#kt_modal_1"   title="' . trans('forms.details') . '">
                                     <i class="ki-duotone ki-information fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                 </a>
                                <a class="btn btn-icon btn-active-light-danger w-30px h-30px" href="' . route('admin.Settings.Instructor.destroy', $row->id) . '" data-kt-table-delete="delete_row"
                                           title="' . trans('forms.delete_btn') . '">
                                    <i class="ki-duotone ki-trash fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                </a>';

                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashbord.admin.Training_Center.Trainers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['one_data'] = new Trainer();
        $data['courses'] = Course::all();
        return view('dashbord.admin.Training_Center.Trainers.create', $data);

    }

    public function show_load($id)
    {
        $data['one_data'] = Trainer::findOrFail($id);

        return view('dashbord.admin.Training_Center.Trainers.load_details', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        try {

            $insert_data = $request->all();
            $insert_data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $dataX = $this->saveImage($file, $this->upload_folder);
                $insert_data['image'] = $dataX;
            }

            $inserted_data = Trainer::create($insert_data);
            $insert_id = $inserted_data->id;

            if ($request->hasFile('files')) {
                $images = [];
                foreach ($request->file('files') as $image) {
                    if ($this->isImage($image)) {
                        $dataX = $this->saveImage($image, $this->upload_folder);
                        $images[] = [
                            'trainer_id' => $insert_id,
                            'file' => $dataX,
                        ];
                    } else {
                        $dataX = $this->upload_file($image, $this->upload_folder);
                        $images[] = [
                            'trainer_id' => $insert_id,
                            'file' => $dataX,
                        ];
                    }

                }
                Trainer_Files::insert($images);
//                dd($insert_data, $blog_images);
            }
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.Settings.Instructor.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function edit($id)
    {
        $data['one_data'] = Trainer::findOrFail($id);
        $data['courses'] = Course::all();
        return view('dashbord.admin.Training_Center.Trainers.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $data = Trainer::find($request->id);
            $update_data = $request->all();
            $update_data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $dataX = $this->saveImage($file, $this->upload_folder);
                $update_data['image'] = $dataX;
            }
            $data->update($update_data);

            if ($request->hasFile('files')) {
                $images = [];
                foreach ($request->file('files') as $image) {
                    if ($this->isImage($image)) {
                        $dataX = $this->saveImage($image, $this->upload_folder);
                        $images[] = [
                            'trainer_id' => $request->id,
                            'file' => $dataX,
                        ];
                    } else {
                        $dataX = $this->upload_file($image, $this->upload_folder);
                        $images[] = [
                            'trainer_id' => $request->id,
                            'file' => $dataX,
                        ];
                    }

                }
                Trainer_Files::insert($images);
            }
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.Settings.Instructor.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            $one_data = Trainer::find($id);

            $one_data->delete();
            toastr()->error(trans('forms.Delete'));
            return response()->json(['message' => trans('forms.Delete')], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }
    public function destroy_file($id)
    {
        try {
            $delete_data = Trainer_Files::find($id);
            $this->deleteImage($delete_data->file);

            $delete_data->delete();
            toastr()->error(trans('forms.Delete'));

            /*            return redirect()->back();*/
            return response()->json(['message' => 'Image deleted successfully.'], 200);
        } catch (\Exception $e) {
            /*            return redirect()->back()->withErrors(['error' => $e->getMessage()]);*/
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }


}
